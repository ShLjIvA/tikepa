<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'number' => 'required|string|min:8|max:10',
            'zip' => "required|string|min:5|max:5",
            'address' => 'required|string|min:3|max:50',
            'city' => 'required|string|min:3|max:30',

        ];
    }
//    public function messages()
//    {
//        return [
//            'emailRegister.required' => "Email is a required field.",
//            'passwordRegister.required' => "Password is required field.",
//            'passwordRegister.same' => "Passwords are not the same.",
//            'passwordRegister.min' => "Password needs to be at least 8 characters long.",
//            'passwordRegister.regex' => "Password must contain at least one lowercase letter, one uppercase letter, one digit and one special character.",
//            'firstName.required' => "First name is a required field.",
//            'lastName.required' => "Last name is a required field.",
//        ];
//    }
}
