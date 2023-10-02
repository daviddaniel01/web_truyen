<?php

namespace App\Http\Requests\User;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'string',
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique(User::class)->ignore($this->user),
            ],
            'password' => [
                'bail',
                'required',
            ],
            'gender' => [
                'bail',
                'required',
                'boolean',
            ],
            'birthday' => [
                'bail',
                'required',
                'date',
                'before:today'
            ],
            'status' => [
                'bail',
                'required',
                Rule::in(UserStatusEnum::asArray()),
            ],
            'level' => [
                'bail',
                'required',
                Rule::in(UserLevelEnum::asArray()),
            ],
            'avatar' => [
                'nullable',
                'file',
                'image',
            ]
        ];
    }


    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
            'before:today' => ':attribute không hợp lệ',
            'email' => 'Bắt buộc phải là email',
            'image' => 'Bắt buộc là ảnh',
            'file' => 'Bắt buộc là file',
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'gender' => ' Giới tính',
            'birthday' => 'Sinh nhật',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'status' => 'Trạng thái',
            'level' => 'Vai trò',
            'avatar' => 'Ảnh',
        ];
    }
}
