<?php

namespace App\Interfaces;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

interface PasteRepositoryInterface
{
    public function getList();
}
