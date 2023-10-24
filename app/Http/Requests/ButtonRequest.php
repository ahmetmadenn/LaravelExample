<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ButtonRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=> ['required'],
            'book_code'=> ['required'],
            'author'=> ['required'],


    ];
    }

    public function messages()
    {
        return [
            'name'.'.required' => 'Kitap adını girmelisiniz.',
            'book_code'.'.required' => 'Kitap kodunu girmelisiniz.',
            'author'.'.required' => 'Yazar adını girmelisiniz.',


        ];
}
}
