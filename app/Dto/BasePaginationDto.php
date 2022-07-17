<?php

namespace App\Dto;

class BasePaginationDto extends AbstractDto
{
    public int $page = 1;
    public int $limit = 1;
}
