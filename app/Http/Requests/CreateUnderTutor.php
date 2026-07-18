<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUnderTutor extends FormRequest
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
            'underFname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'underLname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'underBday' => ['required'],
            'underEmail' => ['required', 'email', 'unique:user_profiles,email'],
            'underGender' => ['required'],
            'underCountry' => ['required',  /*'exists:countries,id'*/],
            'underCity' => ['required', /*'exist:cities,id'*/],
            'underAddress' => ['required'],
            'underCpNum' => ['required', 'digits:11', 'starts_with:09', 'unique:user_profiles,contact_num'],

            'underPassword' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'underConfirm' => ['required', 'same:underPassword'],
            'underSchool' => ['required'],


            'coe' => ['required', 'mimes:pdf'],
            'underResume' => ['required', 'mimes:pdf'],
            'underUploadValid' => ['required', 'mimes:pdf'],
            'underValid' => ['required'],
            'underValidNum' => ['required', 'string', 'regex:/^[a-zA-Z0-9]{1,20}$/'],
        ];
    }


    public function messages()
    {

        return [
            'underFname.regex' => 'The firstname field must contain letters only.',
            'underLname.regex' => 'The lastname field must contain letters only.',

            'underEmail.required' => 'Email is required',
            'underEmail.email' => 'Email must be a valid email address',
            'underEmail.unique' => 'Email already exists',

            'underPassword.required' => 'Password is required',
            'underPassword.min' => 'Password should be more than 8 characters',
            'underPassword.regex' => 'Password must contain at least 1 special character, 1 uppercase', '1 lowercase', '1 digit',
            'underConfirm.same' => 'Password did not match',

            'underConfirm.required' => 'Confirm password is required',
            'underSchool.required' => 'School is required',

            'underCpNum.required' => 'Contact number is required',
            'underCpNum.digits' => 'Contact number must be 11 digits',
            'underCpNum.starts_with' => 'number must start in  09',


            'underResume.required' => 'Upload Resume is required',
            'underResume.mimes' => 'Upload Resume must be in pdf format',

            'underUploadValid.required' => 'Upload Valid ID is required',
            'underUploadValid.mimes' => 'Upload Valid ID must be in pdf format',

            'underValid.required' => 'Valid ID type is required',
            'underValidNum.required' => 'Valid ID Number is required',
            'underValidNum.regex' => 'Valid ID Number must not exceed 20 digits',
            

            'underAddress.required' => 'Address is required',
            
            'coe.mimes' => 'Upload Valid ID must be in pdf format',
            'coe.required' => 'Certificate of enrollment is required',
            
        ];
    }
}
