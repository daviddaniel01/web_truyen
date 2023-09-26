<?php

namespace App\Http\Requests\Chapter;

use App\Models\Chapter;
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
            'chapter' => [
                'required',
                Rule::exists(Chapter::class, 'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['chapter' => $this->route('chapter')]);
    }
}
