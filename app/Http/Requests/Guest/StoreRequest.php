<?php

namespace App\Http\Requests\Guest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date|before:today',
            'email' => 'nullable|email|max:255',
            'social_number' => 'nullable|string|max:20|regex:/^\d{3}-\d{2}-\d{4}$/',
            'cell_phone' => 'nullable|string|max:20|regex:/^\+?[0-9]{10,20}$/',
            'work_phone' => 'nullable|string|max:20|regex:/^\+?[0-9]{10,20}$/',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:10|regex:/^\d{5}(?:[-\s]\d{4})?$/',
            'post_index' => 'nullable|string|max:10',
            'is_live' => 'nullable|boolean',
            'military_service' => 'nullable|boolean',
            'residential_status' => 'nullable|string|max:255',
            'address_years' => 'nullable|integer|min:0|max:100',
            'unique_token' => 'nullable|string|max:255|unique:guests,unique_token',
            'bank_id' => 'nullable|exists:bank_data,id',
            'job_info_id' => 'nullable|exists:job_info,id',
            'documents_id' => 'nullable|exists:documents,id',

            // Bank info validation rules
            'guest_id' => 'nullable|exists:guests,id',
            'card_number' => 'required|string|max:19|regex:/^\d{16,19}$/', // Assuming card number is between 16-19 digits
            'card_holder' => 'required|string|max:255',
            'cvv' => 'required|string|size:3', // Assuming CVV is exactly 3 digits
            'expiration_date' => 'required|date|after:today',
            'bank_name' => 'required|string|max:255',
            'routing_number' => 'nullable|string|max:9|regex:/^\d{9}$/', // Assuming routing number is exactly 9 digits
            'account_number' => 'nullable|string|max:20', // Assuming account number max length is 20
            'bank_year' => 'nullable|integer|min:1900|max:' . date('Y'), // Assuming bank year is between 1900 and current year
        ];

    }
    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя обязательно к заполнению.',
            'name.string' => 'Имя пользователя должно быть строкой.',
            'name.max' => 'Имя пользователя не должно превышать 255 символов.',

            'date_of_birth.date' => 'Дата рождения должна быть корректной датой.',
            'date_of_birth.before' => 'Дата рождения должна быть до сегодняшнего дня.',

            'email.email' => 'Электронная почта должна быть корректной.',
            'email.max' => 'Электронная почта не должна превышать 255 символов.',

            'social_number.string' => 'Социальный номер должен быть строкой.',
            'social_number.max' => 'Социальный номер не должен превышать 20 символов.',
            'social_number.regex' => 'Социальный номер должен быть в формате XXX-XX-XXXX.',

            'cell_phone.string' => 'Мобильный телефон должен быть строкой.',
            'cell_phone.max' => 'Мобильный телефон не должен превышать 20 символов.',
            'cell_phone.regex' => 'Мобильный телефон должен быть в корректном формате.',

            'work_phone.string' => 'Рабочий телефон должен быть строкой.',
            'work_phone.max' => 'Рабочий телефон не должен превышать 20 символов.',
            'work_phone.regex' => 'Рабочий телефон должен быть в корректном формате.',

            'country.string' => 'Страна должна быть строкой.',
            'country.max' => 'Страна не должна превышать 255 символов.',

            'state.string' => 'Штат/Регион должен быть строкой.',
            'state.max' => 'Штат/Регион не должен превышать 255 символов.',

            'city.string' => 'Город должен быть строкой.',
            'city.max' => 'Город не должен превышать 255 символов.',

            'address.string' => 'Адрес должен быть строкой.',
            'address.max' => 'Адрес не должен превышать 255 символов.',

            'zip_code.string' => 'Почтовый индекс должен быть строкой.',
            'zip_code.max' => 'Почтовый индекс не должен превышать 10 символов.',
            'zip_code.regex' => 'Почтовый индекс должен быть в корректном формате.',

            'post_index.string' => 'Дополнительный индекс должен быть строкой.',
            'post_index.max' => 'Дополнительный индекс не должен превышать 10 символов.',

            'is_live.boolean' => 'Значение для живой ли пользователь должно быть булевым.',

            'military_service.boolean' => 'Значение для военной службы должно быть булевым.',

            'residential_status.string' => 'Статус проживания должен быть строкой.',
            'residential_status.max' => 'Статус проживания не должен превышать 255 символов.',

            'address_years.integer' => 'Количество лет по адресу должно быть целым числом.',
            'address_years.min' => 'Количество лет по адресу не может быть меньше 0.',
            'address_years.max' => 'Количество лет по адресу не должно превышать 100.',

            'unique_token.string' => 'Уникальный токен должен быть строкой.',
            'unique_token.max' => 'Уникальный токен не должен превышать 255 символов.',
            'unique_token.unique' => 'Такой уникальный токен уже существует.',

            'bank_id.exists' => 'Выбранное значение для банковских данных некорректно.',
            'job_info_id.exists' => 'Выбранное значение для информации о работе некорректно.',
            'documents_id.exists' => 'Выбранное значение для документов некорректно.',

            'guest_id.exists' => 'Выбранное значение для гостя некорректно.',
            'card_number.required' => 'Номер карты обязателен к заполнению.',
            'card_number.string' => 'Номер карты должен быть строкой.',
            'card_number.max' => 'Номер карты не должен превышать 19 символов.',
            'card_number.regex' => 'Номер карты должен быть в корректном формате.',

            'card_holder.required' => 'Имя владельца карты обязательно к заполнению.',
            'card_holder.string' => 'Имя владельца карты должно быть строкой.',
            'card_holder.max' => 'Имя владельца карты не должно превышать 255 символов.',

            'cvv.required' => 'CVV обязателен к заполнению.',
            'cvv.string' => 'CVV должен быть строкой.',
            'cvv.size' => 'CVV должен быть длиной в 3 символа.',

            'expiration_date.required' => 'Дата истечения срока действия обязательна к заполнению.',
            'expiration_date.date' => 'Дата истечения срока действия должна быть корректной датой.',
            'expiration_date.after' => 'Дата истечения срока действия должна быть после сегодняшнего дня.',

            'bank_name.required' => 'Название банка обязательно к заполнению.',
            'bank_name.string' => 'Название банка должно быть строкой.',
            'bank_name.max' => 'Название банка не должно превышать 255 символов.',

            'routing_number.string' => 'Маршрутный номер должен быть строкой.',
            'routing_number.max' => 'Маршрутный номер не должен превышать 9 символов.',
            'routing_number.regex' => 'Маршрутный номер должен быть в корректном формате.',

            'account_number.required' => 'Номер счета обязателен к заполнению.',
            'account_number.string' => 'Номер счета должен быть строкой.',
            'account_number.max' => 'Номер счета не должен превышать 20 символов.',

            'bank_year.required' => 'Год открытия счета обязателен к заполнению.',
            'bank_year.integer' => 'Год открытия счета должен быть целым числом.',
            'bank_year.min' => 'Год открытия счета не может быть раньше 1900 года.',
            'bank_year.max' => 'Год открытия счета не может быть позже текущего года.',
        ];
    }
}
