<?php

namespace Modules\Student\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8|max:15',
            'phone' => 'required|max:9',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'كلمة السر مطلوبة',
            'password.min' => 'يجب أن تكون كلمة السر على الأقل 8 خانات',
            'password.max' => 'يجب أن تكون كلمة السر على الأكثر 15 خانة',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.max' => 'يجب أن يكون رقم الهاتف السر على الأكثر 9 خانات',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
