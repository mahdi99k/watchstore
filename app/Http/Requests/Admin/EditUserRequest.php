<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'mobile' => 'required|max:11|unique:users,phone,' . $this->user,  //unique phone (except self user منحصر به فرد باش موبایل به جز خودش)
            'email' => 'required|email|max:200|unique:users,email,' .$this->user,  //unique email (except self user منحصر به فرد باش ایمیل به جز خودش)
        ];
    }
}
