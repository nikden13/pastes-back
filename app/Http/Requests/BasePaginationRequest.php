<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasePaginationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page' => 'integer|min:1|max:' . PHP_INT_MAX,
            'limit' => 'integer|min:1|max:' . PHP_INT_MAX,
        ];
    }
}
