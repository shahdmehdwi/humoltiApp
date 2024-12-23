<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class advertisementRequest extends FormRequest
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
                'title'=> 'required','string',
                'description'=> 'required','string',
                'price'=> 'nullable','numeirc',
                'priceNow'=> 'nullable','numeirc',
                'discount'=> 'nullable','numeirc',
                'imageUrl'=> 'image | mimes:png,jpg'
        ];
    }
}
