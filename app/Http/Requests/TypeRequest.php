<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    // Mendapatkan karakter pertama dari string
                    $firstCharacter = mb_substr($value, 0, 1);

                    // Memeriksa apakah karakter pertama adalah huruf kapital
                    if (!ctype_upper($firstCharacter)) {
                        $fail('The ' . $attribute . ' must start with a capital letter.');
                    }
                },
            ],
        ];
    }
}
