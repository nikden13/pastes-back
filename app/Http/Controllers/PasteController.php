<?php

namespace App\Http\Controllers;

use App\Dto\BasePaginationDto;
use App\Dto\Pastes\PasteStoreDto;
use App\Http\Requests\BasePaginationRequest;
use App\Http\Requests\Pastes\PasteStoreRequest;
use App\Interfaces\Pastes\PasteServiceInterface;
use Illuminate\Http\JsonResponse;

class PasteController extends Controller
{
    protected PasteServiceInterface $pasteService;

    public function __construct(PasteServiceInterface $pasteService)
    {
        $this->pasteService = $pasteService;
    }

    public function store(PasteStoreRequest $request): JsonResponse
    {
        $dto = new PasteStoreDto($request->validated());
        $paste = $this->pasteService->store($dto);

        return response()->json($paste, 201);
    }

    public function getItemByHash(string $hash): JsonResponse
    {
        $paste = $this->pasteService->getItemByHash($hash);

        if (is_null($paste)) {
            return response()->json([
                'paste' => 'Not found.',
            ], 404);
        }

        return response()->json($paste);
    }

    public function getList(BasePaginationRequest $request)
    {
        $dto = new BasePaginationDto($request->validated());
        $data = $this->pasteService->getList($dto);

        return response()->json($data);
    }
}
