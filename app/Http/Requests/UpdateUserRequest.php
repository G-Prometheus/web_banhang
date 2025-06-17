<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'required|integer|gt:0',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.string' => 'Email phải là chuỗi ký tự',
            'email.max' => 'Email dài tối đa 191 ký tự',
            'name.require' => 'Bạn chưa nhập tên',
            'name.string' => 'Tên phải là chuỗi ký tự',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm người dùng',
        ];
    }
}
