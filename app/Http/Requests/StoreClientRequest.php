<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreClientRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'postcode' => 'required|digits:5',
            'city' => 'required',
            'country' => 'required',
            'oib' => 'digits:11|unique:clients',
            'type' => 'required',
            'international' => 'required',
            'email' => 'required|email',
            'services' => 'required'
        ];
    }
}
