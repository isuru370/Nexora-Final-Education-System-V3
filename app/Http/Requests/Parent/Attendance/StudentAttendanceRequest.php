<?php

namespace App\Http\Requests\Parent\Attendance;

use Illuminate\Foundation\Http\FormRequest;

class StudentAttendanceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => ['required', 'integer', 'exists:students,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'Student id is required.',
            'student_id.exists' => 'Student not found.',
        ];
    }
}