<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimetableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'time' => 'Время',
            'place' => 'Место проведения',
            'description' => 'Новость',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'time' => ['required', 'string'],
            'place' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sort' => ['nullable', 'string'],
            'active' => ['nullable', 'string'],
        ];
    }
}
