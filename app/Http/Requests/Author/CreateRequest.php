<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        return [
            'name' => [
                'bail',
                'required',
                'string',
            ],
            'alias' => [
                'bail',
                'required',
                'string',
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

        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
            'before:today' => ':attribute không hợp lệ',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'alias' => 'Bí danh',
            'birthday' => 'Sinh nhật',
            'gender' => 'Giới tính',
        ];
    }
}
