<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editTeacherRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'room' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name must not be Blank',
            'name.regex' => 'Name must contain only letters and spaces.',
            'subject.required' => 'Subject must not be Blank',
            'email.required' => 'Email must not be Blank',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email already exists.',
            'phone.required' => 'Phone must not be Blank',
            'phone.regex' => 'Invalid phone number format. (e.g., 9434243576)',
            'room.required' => 'Room must not be Blank',
        ];
    }
}
