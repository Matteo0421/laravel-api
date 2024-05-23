<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:100',
            'description' => 'nullable|min:3',
            'language' => 'required|min:2|max:100',
        ];


    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.min' => 'Il titolo deve contenere almeno :min caratteri',
            'title.max' => 'Il titolo deve contenere non più di :max caratteri',
            'description.min' => 'La descrizione deve contenere almeno :min caratteri',
            'language.required' => 'La lingua è un campo obbligatorio',
            'language.min' => 'La lingua deve contenere almeno :min caratteri',
            'language.max' => 'La lingua deve contenere non più di :max caratteri',
        ];
    }
}
