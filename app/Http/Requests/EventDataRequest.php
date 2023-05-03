<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'events_data' => ['string'],
            'contacts' => ['nullable', 'string'],
            'info' => ['nullable', 'string'],
            'locate' => ['nullable', 'string'],
            'adress' => ['nullable', 'string'],
            'shema' => ['nullable', 'string'],
            'map' => ['nullable', 'string'],
//            'banner' => ['nullable','string'],
//            'image' => ['nullable','string'],
//            'banner_existing' => ['nullable','string'],
//            'image_existing' => ['nullable','string'],
        ];
    }
}
