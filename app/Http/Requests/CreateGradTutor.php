<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGradTutor extends FormRequest
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
            'gradFname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'gradLname' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'gradBday' => ['required'],
            'gradEmail' => ['required', 'email', 'unique:user_profiles,email'],
            'gradGender' => ['required'],
            'gradCountry' => ['required',  /*'exists:countries,id'*/],
            'gradCity' => ['required', /*'exist:cities,id'*/],
            'gradAddress' => ['required'],
            'gradCpNum' => ['required', 'digits:11', 'starts_with:09', 'unique:user_profiles,contact_num'],

            'gradPassword' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
            'gradConfirm' => ['required', 'same:gradPassword'],
            'employment' => ['required'],
            'gradSchool' => ['required'],
            'gradYear' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'degree' => ['required'],
            'gradTor' => ['required', 'mimes:pdf'],
            'diploma' => ['required', 'mimes:pdf'],
            'gradResume' => ['required', 'mimes:pdf'],
            'gradUploadValid' => ['required', 'mimes:pdf'],
            'uploadPrc' => ['nullable', 'mimes:pdf'],
            'gradValid' => ['required'],
             'gradValidNum' => ['required', 'string', 'regex:/^[a-zA-Z0-9]{1,20}$/'],
            'prcNum' => ['nullable', 'string','regex:/^\d{7}$/']
        ];
    }

    public function messages()
    {

        return [
            'gradFname.regex' => 'The firstname field must contain letters and spaces only.',
            'gradFname.required' => 'First name is required',

            'gradLname.required' => 'Last name is required',
            'gradLname.regex' => 'The lastname field must contain letters and spaces only.',

            'gradBday.required' => 'Birthdate is required',

            'gradEmail.required' => 'Email is required',
            'gradEmail.email' => 'Email must be in email format',
            'gradEmail.unique' => 'Email already exists',
            'gradEmail.min' => 'Email must be more than 5 characters',
            'gradEmail.max' => 'Email must be not exceed 100 characters',
            'gradEmail.regex' => 'Email must be in email format',

            'gradGender.required' => 'Gender is required',

            'gradCountry.required' => 'Country is required',

            'gradCity.required' => 'City is required',

            'gradAddress.required' => 'Address is required',

            'gradCpNum.required' => 'Contact number is required',
            'gradCpNum.starts_with' => 'number must start in  09',
            'gradCpNum.min' => 'Contact number must be more than 1 digits',
            'gradCpNum.max' => 'Contact number must be not exceed 11 digits',
            'gradCpNum.regex' => 'Contact number must be in number format',


            'gradpPassword.required' => 'Password is required',
            'gradPassword.min' => 'Password must be more than 8 characters',
            'gradPassword.regex' => 'Password must contain at least 1 special character, 1 uppercase, 1 lowercase, 1 digit',
            'gradConfirm.required' => 'Confirm password is required',
            'gradConfirm.same' => 'Password did not match',

            'employment.required' => 'Employment type is required',
            'gradSchool.required' => 'School is required',
            'gradSchool.regex' => 'The school field must contain letters only.',
            'gradSchool.max' => 'School must be not exceed 100 characters',
            'gradSchool.min' => 'School must be more than 5 characters',

            'gradYear.required' => 'Graduation Year is required',
            'gradYear.integer' => 'Graduation year must be year (ex.2020)',
            'gradYear.min' => 'Minimum graduation year is 1900',

            'degree.required' => 'Degree is required',

            'gradTor.required' => 'TOR is required',
            'gradTor.mimes' => 'TOR must be in pdf format',

            'diploma.required' => 'Diploma is required',
            'diploma.mimes' => 'Diploma must be in pdf format',

            'gradResume.required' => 'Resume is required',
            'gradResume.mimes' => 'Resume must be in pdf format',

            'gradUploadValid.required' => 'Valid ID file is required',
            'gradUploadValid.mimes' => 'Valid ID file must be in pdf format',

            'uploadPrc.mimes' => 'PRC must be in pdf format',

            'gradValid.required' => 'Valid ID type is required',

            'gradValidNum.required' => 'Valid ID Number is required',
            'gradValidNum.regex' => 'Valid ID Number must not exceed 20 digits',

            'prcNum.regex' => 'PRC number must be in number format and must be 7 digits',

        ];
    }
}
