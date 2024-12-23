<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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

        'customerId'=>'required',
        'driverId'=>'required',
        'categoryId'=>'required',
        'paymentId'=>'required',
        'pickUpLocation'=>'required',
        'deliveryLocation'=>'required',
        'distance'=>'required',
        'price'=>'required|numeric',

        ];
        
    }
}
