<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['max:255'],
            'date_start' => ['required'],
            'date_end' => ['required'],
            'event_type' => ['nullable'],
            'status' => ['required'],
            'sort' => ['nullable'],
            'agreement' => ['nullable'],
        ];
    }
}
