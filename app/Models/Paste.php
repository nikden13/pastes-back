<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель пасты
 *
 * @property  string $title Название
 * @property string $body Текст
 * @property int $visibility Видимость
 * @property int|null $expiration_time Время истечения доступа (timestamp)
 * @property string $hash Хэш для доступа по ссылке
 */
class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'body',
        'visibility',
        'expiration_time',
        'hash',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
