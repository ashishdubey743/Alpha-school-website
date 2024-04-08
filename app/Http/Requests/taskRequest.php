<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class taskRequest extends FormRequest
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
            'taskname' => 'required',
            'duedate' => 'required',
            'subject' => 'required',
            'room' => 'required',
            'assigned' => 'required',
            'status' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'taskname.required' => 'Taskname must not be Blank',
            'duedate.required' => 'Duedate must not be Blank',
            'subject.required' => 'Subject must not be Blank',
            'room.required' => 'Room must not be Blank',
            'assigned.required' => 'Assignee must not be Blank',
            'status.required' => 'Status must not be Blank'
        ];
    }
}
