<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function attributes()
    {
        return [
            'title' => 'Sarlavha',
            'short_content' => 'Qisqacha mazmun',
            'content' => 'Maqola',
            'photo' => 'rasm'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required','min:3','max:30'],
            'short_content' => ['required','min:8'],
            'content' => ['required','min:15'] ,
            'photo' => ['nullable','image','max:2048']
        ];
    }
}
