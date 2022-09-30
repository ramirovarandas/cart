<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'external_id' => 'required|uuid',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'address' => 'required|max:200',
            'cc_number' => 'required|max:20',
            'cc_expiracy' => 'required|max:10',
            'cc_cvv' => 'required|max:5',
            'cc_name' => 'required|max:100',
        ];
    }
}
