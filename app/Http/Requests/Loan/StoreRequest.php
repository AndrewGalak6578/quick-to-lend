<?php

namespace App\Http\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
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
            'note' => 'nullable|string',

            // Bank info validation rules
            'guest_id' => 'nullable|exists:guests,id',
            'card_number' => 'nullable|string|max:19|regex:/^\d{16,19}$/', // Assuming card number is between 16-19 digits
            'card_holder' => 'nullable|string|max:255',
            'cvv' => 'nullable|string|size:3', // Assuming CVV is exactly 3 digits
            'expiration_date' => 'nullable|date|after:today',
            'expMonth' => 'nullable',
            'expYear' => 'nullable',
            'bank_name' => 'nullable|string|max:255',
            'routing_number' => 'nullable|string|max:9|regex:/^\d{9}$/', // Assuming routing number is exactly 9 digits
            'account_number' => 'nullable|string|max:20', // Assuming account number max length is 20
            'bank_year' => 'nullable|integer', // Assuming bank year is between 1900 and current year

            // Document info validation rules
            'driving_number' => 'nullable|string|max:255',
            'driving_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'driving_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_front' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_back' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'passport' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'selfie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'additional_document' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',

            // Jobs info validation rules
            'job_title' => 'nullable|string|max:255',
            'employer_name' => 'nullable|string|max:255',
            'employment_length' => 'nullable|integer|min:0|max:100',
            'salary' => 'nullable|numeric|min:0|max:999999.99',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'date_of_birth.before' => 'The date of birth must be a date before today.',

            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',

            'social_number.string' => 'The social number must be a string.',
            'social_number.max' => 'The social number may not be greater than 20 characters.',
            'social_number.regex' => 'The social number format is invalid.',

            'cell_phone.string' => 'The cell phone must be a string.',
            'cell_phone.max' => 'The cell phone may not be greater than 20 characters.',
            'cell_phone.regex' => 'The cell phone format is invalid.',

            'work_phone.string' => 'The work phone must be a string.',
            'work_phone.max' => 'The work phone may not be greater than 20 characters.',
            'work_phone.regex' => 'The work phone format is invalid.',

            'country.string' => 'The country must be a string.',
            'country.max' => 'The country may not be greater than 255 characters.',

            'state.string' => 'The state must be a string.',
            'state.max' => 'The state may not be greater than 255 characters.',

            'city.string' => 'The city must be a string.',
            'city.max' => 'The city may not be greater than 255 characters.',

            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be greater than 255 characters.',

            'zip_code.string' => 'The zip code must be a string.',
            'zip_code.max' => 'The zip code may not be greater than 10 characters.',
            'zip_code.regex' => 'The zip code format is invalid.',

            'post_index.string' => 'The post index must be a string.',
            'post_index.max' => 'The post index may not be greater than 10 characters.',

            'is_live.boolean' => 'The is live field must be true or false.',

            'military_service.boolean' => 'The military service field must be true or false.',

            'residential_status.string' => 'The residential status must be a string.',
            'residential_status.max' => 'The residential status may not be greater than 255 characters.',

            'address_years.integer' => 'The address years must be an integer.',
            'address_years.min' => 'The address years must be at least 0.',
            'address_years.max' => 'The address years may not be greater than 100.',

            'unique_token.string' => 'The unique token must be a string.',
            'unique_token.max' => 'The unique token may not be greater than 255 characters.',
            'unique_token.unique' => 'The unique token has already been taken.',

            'bank_id.exists' => 'The selected bank ID is invalid.',
            'job_info_id.exists' => 'The selected job info ID is invalid.',
            'documents_id.exists' => 'The selected documents ID is invalid.',

            'guest_id.exists' => 'The selected guest ID is invalid.',
            'card_number.required' => 'The card number is required.',
            'card_number.string' => 'The card number must be a string.',
            'card_number.max' => 'The card number may not be greater than 19 characters.',
            'card_number.regex' => 'The card number format is invalid.',

            'card_holder.required' => 'The card holder name is required.',
            'card_holder.string' => 'The card holder name must be a string.',
            'card_holder.max' => 'The card holder name may not be greater than 255 characters.',

            'cvv.required' => 'The CVV is required.',
            'cvv.string' => 'The CVV must be a string.',
            'cvv.size' => 'The CVV must be exactly 3 characters.',

            'expiration_date.required' => 'The expiration date is required.',
            'expiration_date.date' => 'The expiration date must be a valid date.',
            'expiration_date.after' => 'The expiration date must be a date after today.',

            'bank_name.required' => 'The bank name is required.',
            'bank_name.string' => 'The bank name must be a string.',
            'bank_name.max' => 'The bank name may not be greater than 255 characters.',

            'routing_number.string' => 'The routing number must be a string.',
            'routing_number.max' => 'The routing number may not be greater than 9 characters.',
            'routing_number.regex' => 'The routing number format is invalid.',

            'account_number.required' => 'The account number is required.',
            'account_number.string' => 'The account number must be a string.',
            'account_number.max' => 'The account number may not be greater than 20 characters.',

            'bank_year.required' => 'The bank year is required.',
            'bank_year.integer' => 'The bank year must be an integer.',
            'bank_year.min' => 'The bank year must be at least 1900.',
            'bank_year.max' => 'The bank year may not be greater than the current year.',

            'driving_number.string' => 'The driving number must be a string.',
            'driving_number.max' => 'The driving number may not be greater than 255 characters.',

            'driving_front.image' => 'The driving front must be an image.',
            'driving_front.mimes' => 'The driving front must be a file of type: jpeg, png, jpg, gif, svg.',
            'driving_front.max' => 'The driving front may not be greater than 2048 kilobytes.',

            'driving_back.image' => 'The driving back must be an image.',
            'driving_back.mimes' => 'The driving back must be a file of type: jpeg, png, jpg, gif, svg.',
            'driving_back.max' => 'The driving back may not be greater than 2048 kilobytes.',

            'id_front.image' => 'The ID front must be an image.',
            'id_front.mimes' => 'The ID front must be a file of type: jpeg, png, jpg, gif, svg.',
            'id_front.max' => 'The ID front may not be greater than 2048 kilobytes.',

            'id_back.image' => 'The ID back must be an image.',
            'id_back.mimes' => 'The ID back must be a file of type: jpeg, png, jpg, gif, svg.',
            'id_back.max' => 'The ID back may not be greater than 2048 kilobytes.',

            'passport.image' => 'The passport must be an image.',
            'passport.mimes' => 'The passport must be a file of type: jpeg, png, jpg, gif, svg.',
            'passport.max' => 'The passport may not be greater than 2048 kilobytes.',

            'selfie.image' => 'The selfie must be an image.',
            'selfie.mimes' => 'The selfie must be a file of type: jpeg, png, jpg, gif, svg.',
            'selfie.max' => 'The selfie may not be greater than 2048 kilobytes.',

            'additional_document.mimes' => 'The additional document must be a file of type: jpeg, png, jpg, gif, svg, pdf.',
            'additional_document.max' => 'The additional document may not be greater than 2048 kilobytes.',

            'job_title.string' => 'The job title must be a string.',
            'job_title.max' => 'The job title may not be greater than 255 characters.',

            'employer_name.string' => 'The employer name must be a string.',
            'employer_name.max' => 'The employer name may not be greater than 255 characters.',

            'employment_length.integer' => 'The employment length must be an integer.',
            'employment_length.min' => 'The employment length must be at least 0.',
            'employment_length.max' => 'The employment length may not be greater than 100.',

            'salary.numeric' => 'The salary must be a number.',
            'salary.min' => 'The salary must be at least 0.',
            'salary.max' => 'The salary may not be greater than 999,999.99.',
        ];
    }
}
