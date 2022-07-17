<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

class InternalErrorException extends Exception
{
    private array $errors;

    public function __construct(array $errors = [], int $code = 0, ?Throwable $previous = null)
    {
        $this->errors = $errors;

        foreach ($this->errors as $key => $error) {
            if (!is_array($error)) {
                $this->errors[$key] = [$error];
            }
        }

        parent::__construct('', $code, $previous);
    }

    public function render(): JsonResponse
    {
        $status = 400;

        return response()->json([
            'errors' => $this->errors,
        ], $status);
    }
}
