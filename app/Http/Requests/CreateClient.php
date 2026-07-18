<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClient extends FormRequest
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
            'fname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'lname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'bday' => ['required'],
            'clientEmail' => ['required', 'email', 'unique:user_profiles,email'],
            'gender' => ['required'],
            'relation' => ['required'],
            'country' => ['required',  /*'exists:countries,id'*/],
            'city' => ['required', /*'exist:cities,id'*/],
            'address' => ['required'],
            'cpNum' => ['required', 'digits:11', 'starts_with:09', 'unique:user_profiles,contact_num'],

            'clientPassword' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'clientConfirm' => ['required', 'same:clientPassword'],
            'studFname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'studLname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'studBday' => ['required'],
            'studGender' => ['required'],
            'studSchool' => ['required'],
            'yearLevel' => ['required'],
            'lrn' => ['nullable', 'string', 'regex:/^\d{12}$/']

        ];
    }
    public function messages()
    {

        return [
            'fname.required' => 'First name is required',
            'fname.regex' => 'First name must only contain letters and spaces',

            'lname.required' => 'Last name is required',
            'lname.regex' => 'Last name must only contain letters and spaces',

            'bday.required' => 'Birthdate is required',

            'clientEmail.required' => 'Email is required',
            'clientEmail.email' => 'Email must be in email format',
            'clientEmail.unique' => 'Email is already exists',

            'gender.required' => 'Gender is required',

            'relation.required' => 'Relation is required',

            'country.required' => 'Country is required',

            'city.required' => 'City is required',

            'address.required' => 'Address is required',

            'cpNum.required' => 'Contact number is required',

            'cpNum.digits' => 'Contact number must be 11 digits',
            'cpNum.starts_with' => 'Contact number must start with 09',

            'clientPassword.required' => 'Password is required',
            'clientPassword.min' => 'Password must be at least 8 characters',
            'clientPassword.regex' => 'Password must contain at least 1 special character, 1 uppercase, 1 lowercase, 1 digit',
            'clientConfirm.required' => 'Confirm password is required',
            'clientConfirm.same' => 'Passwords did not match',

            'studFname.required' => 'Child first name is required',
            'studFname.regex' => 'Child first name must only contain letters and spaces',

            'studLname.required' => 'Child last name is required',
            'studLname.regex' => 'Child last name must only contain letters and spaces',

            'studBday.required' => 'Child birthdate is required',

            'studGender.required' => 'Child gender is required',

            'studSchool.required' => 'Child school is required',

            'yearLevel.required' => 'Year level is required',

            'lrn.regex' => 'LRN must be in number format and must be 12 digits',

        ];
    }
}
