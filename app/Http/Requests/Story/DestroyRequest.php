<?php

namespace App\Http\Requests\Story;

use App\Models\Story;
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
            'story' => [
                'required',
                Rule::exists(Story::class, 'id')
            ],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge(['story' => $this->route('story')]);
    }
}
