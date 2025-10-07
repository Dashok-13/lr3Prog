<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'front_text' => ['required', 'string', 'max:255'],
            'back_text' => ['required', 'string'],
            'example_sentence' => ['nullable', 'string', 'max:500'],
            'pronunciation' => ['nullable', 'string', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'difficulty_level' => ['required', 'integer', 'between:1,5'],
            'tags' => ['sometimes', 'array'],
            'tags.*' => ['exists:tags,id'],
            'is_public' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'front_text.required' => 'Текст на лицьовій стороні обовʼязковий',
            'back_text.required' => 'Текст на зворотній стороні обовʼязковий',
            'category_id.required' => 'Оберіть категорію',
            'difficulty_level.between' => 'Рівень складності має бути від 1 до 5',
        ];
    }
}