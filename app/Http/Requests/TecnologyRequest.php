<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:100',
            'language' => 'required|min:2|max:100',
            'file' => 'required|integer|between:0,65535',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri.',
            'title.max' => 'Il titolo non può contenere più di :max caratteri.',
            'language.required' => 'Il campo lingua è obbligatorio.',
            'language.min' => 'La lingua deve contenere almeno :min caratteri.',
            'language.max' => 'La lingua non può contenere più di :max caratteri.',
            'file.required' => 'Il campo file è obbligatorio.',
            'file.integer' => 'Il file deve essere un numero intero.',
            'file.between' => 'Il file deve essere compreso tra :min e :max.',
        ];
    }
}

