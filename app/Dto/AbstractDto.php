<?php

namespace App\Dto;

abstract class AbstractDto
{
    public function __construct(array $params)
    {
        foreach ($params as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
