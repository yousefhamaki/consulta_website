<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
            'name' => 'required|max:255', 
            'age' => 'required|max:2', 
            'go' => 'required|max:255', 
            'country' => 'required|max:100', 
            'country_code' => 'required|max:100', 
            'phone' => 'required', 
            'email' => 'required|max:255',
            'consulta' => 'required',
            'message' => 'required',
            'service_id' => 'required',
            'time' => 'required',
        ];
    }
}
