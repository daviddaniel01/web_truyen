<?php

namespace App\Http\Requests\User;

use App\Enums\UserLevelEnum;
use App\Enums\UserStatusEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
                Rule::unique(User::class)->ignore($this->user),
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
                Rule::unique(User::class)->ignore($this->user),
            ],
            'gender' => [
                'bail',
                'required',
                'boolean',
                Rule::unique(User::class)->ignore($this->user),
            ],
            'birthday' => [
                'bail',
                'required',
                'date',
                'before:today',
                Rule::unique(User::class)->ignore($this->user),
            ],
            'status' => [
                'bail',
                'required',
                Rule::in(UserStatusEnum::asArray()),
                Rule::unique(User::class)->ignore($this->user),
            ],
            'level' => [
                'bail',
                'required',
                Rule::in(UserLevelEnum::asArray()),
                Rule::unique(User::class)->ignore($this->user),
            ],
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
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'gender' => ' Giới tính',
            'birthdate' => 'Ngày sinh',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'status' => 'Trạng thái',
            'level' => 'Vai trò',
        ];
    }
}
