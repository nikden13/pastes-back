<?php

namespace App\Dto\Pastes;

use App\Dto\AbstractDto;

class PasteStoreDto extends AbstractDto
{
    public string $title;
    public string $body;
    public string $visibility;
    public ?int $expiration_time = null;
}
