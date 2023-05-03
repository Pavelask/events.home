<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'surName.required' => 'Вы не указали :attribute',
            'firstName.required' => 'Вы не указали :attribute',
            'middleName.required' => 'Вы не указали :attribute',
            'snils.required' => 'Вы не указали :attribute',
            'contactPhone.required' => ':attribute обязателен',
            'job_title.required' => ':attribute не заполнена',
            'name_ppo.required' => ':attribute не указано',
            'name_to.required' => 'Территориальная организация не указана',
            'birthDate.required' => 'Запоните дату рождения',
            'integer' => 'В данное поле вводятся только цифры',
            'accepted' => ':attribute обязательно',
            'snils.digits' => ':attribute должен состоять из :digits цифр',
            'contactPhone.digits' => ':attribute должен состоять из :digits цифр',
        ];
    }/**
 * Get custom attributes for validator errors.
 *
 * @return array<string, string>
 */
    public function attributes(): array
    {
        return [
            'surName' => 'Фамилию',
            'firstName' => 'Имя',
            'middleName' => 'Отчество',
            'snils' => 'СНИЛС',
            'contactPhone' => 'Номер телефона',
            'job_title' => 'Должность',
            'name_to' => 'Территориальная организация',
            'name_ppo' => 'ППО',
            'agreement' => 'Согласие на обработку персональных данных',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['string'],
            'events_id' => ['string'],
            'eventsName' => ['string'],
            'surName' => ['required','string'],
            'firstName' => ['required','string'],
            'middleName' => ['required','string'],
            'snils' => ['required','digits:11'],
            'birthDate' => ['required','string','date_format:Y-m-d'],
            'education' => ['nullable'],
            'contactPhone' => ['required','digits:10'],
            'email' => ['email'],
            'workPhone' => ['nullable'],
            'job_title' => ['required','nullable'],
            'name_ppo' => ['required','nullable'],
            'name_to' => ['required','nullable'],
            'note' => ['nullable'],
            'qr_code' => ['nullable'],
            'qr_code_pic' => ['nullable'],
            'region' => ['nullable'],
            'confirmation' => ['string'],
            'agreement' => ['accepted'],
        ];
    }
}
