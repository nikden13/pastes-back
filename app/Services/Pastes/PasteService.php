<?php

namespace App\Services\Pastes;

use App\Constants\PasteConstants;
use App\Dto\BasePaginationDto;
use App\Dto\Pastes\PasteStoreDto;
use App\Helpers\RandomHelper;
use App\Interfaces\Pastes\PasteServiceInterface;
use App\Models\Paste;
use App\Models\User;

class PasteService implements PasteServiceInterface
{
    /**
     * Создание пасты
     *
     * @param PasteStoreDto $dto
     *
     * @return Paste
     */
    public function store(PasteStoreDto $dto): Paste
    {
        $hash = $this->generateHash();
        $expirationTime = $dto->expiration_time > 0
            ? $this->calculateExpirationTime($dto->expiration_time)
            : null;

        return Paste::create([
            'author_id' => User::first()->id,
            'title' => $dto->title,
            'body' => $dto->body,
            'visibility' => $dto->visibility,
            'expiration_time' => $expirationTime,
            'hash' => $hash,
        ]);
    }

    /**
     * Получение списка публичных паст с пагинацией
     *
     * @param BasePaginationDto $dto
     *
     * @return array
     */
    public function getList(BasePaginationDto $dto): array
    {
        $baseQuery = $this->baseQueryGetPaste()
            ->where('visibility', PasteConstants::VISIBILITY_PUBLIC);

        $count = $baseQuery->count();
        $items = $baseQuery->orderByDesc('created_at')->forPage($dto->page, $dto->limit)->get();

        return [
            'count' => $count,
            'items' => $items,
        ];
    }

    /**
     * Получение пасты по хэшу
     *
     * @param string $hash
     *
     * @return Paste|null
     */
    public function getItemByHash(string $hash): ?Paste
    {
        $baseQuery = $this->baseQueryGetPaste();

        return $baseQuery->where('hash', '=', $hash)->first();
    }

    /**
     * Составление базового запроса для получение пасты, которая ещё доступна
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function baseQueryGetPaste(): \Illuminate\Database\Eloquent\Builder
    {
        $currentTime = time();

        return Paste::query()
            ->where(function ($query) use ($currentTime) {
                $query->whereNull('expiration_time')
                    ->orWhere('expiration_time', '>', $currentTime);
            });
    }

    /**
     * Генерация хэша пасты
     *
     * @return string
     */
    protected function generateHash(): string
    {
        $currentTime = time();
        $randomString = RandomHelper::generateRandomString();

        return md5($currentTime) . $randomString;
    }

    /**
     * Расчёт срока окончания доступа пасты
     *
     * @param ?int $time
     *
     * @return ?int
     */
    protected function calculateExpirationTime(?int $time): ?int
    {
        if (is_null($time)) {
            return null;
        }

        $currentTime = time();
        return $time + $currentTime;
    }
}
