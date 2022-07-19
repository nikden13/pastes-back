<?php

namespace App\Interfaces\Pastes;

use App\Dto\BasePaginationDto;
use App\Dto\Pastes\PasteStoreDto;
use App\Models\Paste;

interface PasteServiceInterface
{
    public function store(PasteStoreDto $dto): Paste;
    public function getItemByHash(string $hash): ?Paste;
    public function getList(BasePaginationDto $dto): array;
}
