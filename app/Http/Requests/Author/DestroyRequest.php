<?php

namespace App\Http\Requests\Author;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author' => [
                'required',
                Rule::exists(Author::class, 'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['author' => $this->route('author')]);
    }
}
