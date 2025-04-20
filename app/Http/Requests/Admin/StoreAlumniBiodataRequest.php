<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumniBiodataRequest extends FormRequest
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
            // Checkbox state
            'select_existing_user' => ['nullable', 'string', 'in:on'],

            // Kalau centang, wajib pilih user_id
            'user_id' => ['required_if:select_existing_user,on', 'nullable', 'exists:users,id'],

            // Kalau tidak centang, wajib input user baru
            'user_name' => ['required_unless:select_existing_user,on', 'nullable', 'string', 'max:255'],
            'user_email' => ['required_unless:select_existing_user,on', 'nullable', 'email', 'max:255', 'unique:users,email'],
            'user_password' => ['required_unless:select_existing_user,on', 'nullable', 'string', 'min:8'],

            // Biodata wajib
            'full_name' => ['required', 'string', 'max:255'],
            'nis_nisn' => ['nullable', 'string', 'max:50'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
            'major' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'graduation_year_group_id' => ['required', 'exists:graduation_year_groups,id'],
        ];
    }
}
