<?php

namespace Modules\Student\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:students,email',
            'password' => 'required|min:8|max:15',
            'phone' => 'required|max:9',
            'gender' => 'required|in:male,female',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'الإيميل مطلوب',
            'email.unique' => 'يجب أن يكون الإيميل فريد',
            'password.required' => 'كلمة السر مطلوبة',
            'password.min' => 'يجب أن تكون كلمة السر على الأقل 8 خانات',
            'password.max' => 'يجب أن تكون كلمة السر على الأكثر 15 خانة',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.max' => 'يجب أن يكون رقم الهاتف السر على الأكثر 9 خانات',
            'gender.required' => 'نوع الجنس مطلوب',
            'gender.in' => 'يجب أن يكون نوع الجنس إما ذكر أو أنثى',
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
