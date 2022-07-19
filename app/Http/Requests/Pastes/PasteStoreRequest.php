<?php

namespace App\Http\Requests\Pastes;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\PasteConstants;

class PasteStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:1|max:255',
            'body' => 'required|string|min:1|max:' . PasteConstants::MAX_LENGTH_BODY,
            'visibility' => 'required|integer|in:' . join(',', PasteConstants::VISIBILITY_TYPES),
            'expiration_time' => 'required|integer|in:' . join(',', PasteConstants::AVAILABLE_EXPIRATION_TIMES),
        ];
    }
}
