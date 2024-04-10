<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editStudentRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'room' => 'required',
            'parent' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
                'name.required' => 'Name must not be Blank',
                'phone.required' => 'Phone must not be Blank',
                'email.required' => 'Email must not be Blank',
                'room.required' => 'Room must not be Blank',
                'parent.required' => 'Parent must not be Blank'
        ];
        
    }
}
