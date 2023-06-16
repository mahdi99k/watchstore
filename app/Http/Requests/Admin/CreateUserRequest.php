<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //request->name input  =>  database(condition validation)
        return [
            'name' => 'required|string|max:100',
            'mobile' => 'required|unique:users,phone',
            'email' => 'required|email|max:200|unique:users,email',
            'password' => 'required|min:6|max:100'
        ];
    }
}
