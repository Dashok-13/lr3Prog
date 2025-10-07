<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'is_correct' => ['required', 'boolean'],
            'confidence_level' => ['required', 'numeric', 'between:0,1'],
        ];
    }
}