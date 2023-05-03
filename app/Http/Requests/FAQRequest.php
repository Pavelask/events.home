<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question' => ['required'],
            'answer' => ['required'],
            'sort' => ['nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'question.required' => 'Вы не указали :attribute',
            'answer.required' => 'Вы не указали :attribute',

        ];
    }

    public function attributes(): array
    {
        return [
            'question' => 'Вовпрос',
            'answer' => 'Ответ',
        ];
    }
}
