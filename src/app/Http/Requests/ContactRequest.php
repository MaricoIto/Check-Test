<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|integer|in:1,2,3',
            'email' => 'required|email|max:255',
            'phone1' => 'required|digits:3',
            'phone2' => 'required|digits:4',
            'phone3' => 'required|digits:4',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'inquiry_type' => 'required|integer',
            'inquiry_content' => 'required|string|max:2000',
        ];
    }
}
