<?php

namespace App\Http\Requests\Story;

use App\Models\Author;
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
            'title' => [
                'bail',
                'required',
                'string',
            ],
            'author_id' => [
                'bail',
                'required',
                Rule::exists(Author::class, 'id'),
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc phải điền',
            'string' => ':attribute bắt buộc là chữ',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên truyện',
            'author_id' => 'Tác giả',
        ];
    }
}
