<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'emailRegister' => 'required|email',
            'passwordRegister' => [
                'required',
                'string',
                'min:8',              // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'required_with:passwordRegisterConfirm',
                'same:passwordRegisterConfirm',
            ],
            'firstName' => "required|string|min:3",
            'lastName' => 'required|string|min:3',

        ];
    }
    public function messages()
    {
        return [
            'emailRegister.required' => "Email is a required field.",
            'passwordRegister.required' => "Password is required field.",
            'passwordRegister.same' => "Passwords are not the same.",
            'passwordRegister.min' => "Password needs to be at least 8 characters long.",
            'passwordRegister.regex' => "Password must contain at least one lowercase letter, one uppercase letter, one digit and one special character.",
            'firstName.required' => "First name is a required field.",
            'lastName.required' => "Last name is a required field.",
        ];
    }
}
