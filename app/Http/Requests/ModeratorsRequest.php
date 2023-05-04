<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorsRequest extends FormRequest
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
            'name' => 'ФИО',
            'image' => 'Картинку (фото)',
            'description' => 'Новость',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Вы не указали :attribute',
            'image.required' => 'Вы не указали :attribute',
            'description.required' => 'Вы не указали :attribute',
        ];
    }

    public function rules(): array
    {
        return [
            'events_data' => 'string',
            'name' => ['required', 'string'],
            'jobtitle' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
            'description' => ['nullable', 'string'],
            'sort' => ['nullable', 'string'],
            'active' => ['nullable', 'string'],
        ];
    }
}
