<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForkRequest extends FormRequest
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
            'name' => 'required|max:100', 
            'content' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans(key: 'messages.offer_required_name'),
            'content.required' => trans(key: 'messages.offer_required_price'),
        ];
    }
}
