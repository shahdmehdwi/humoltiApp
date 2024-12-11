<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class driverRequest extends FormRequest
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
            'vechileId'=> 'required',
            'name'=> 'required','string',
            'email' => 'required|email',
            'password'=> 'required',
            'imagegUrl'=> 'image | mimes:png,jpg',
            'phoneNumber'=> 'required',
            'SecondaryNumber' => 'nullable|string',
            'location'=> 'required',

        ];
    }
}
