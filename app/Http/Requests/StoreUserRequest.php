<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:users'],
            'password' => ['confirmed', 'required', 'string', 'min:5'],
            /*'avatar' => ['required', 'image'],*/
            'role' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
        ];
    }
}
