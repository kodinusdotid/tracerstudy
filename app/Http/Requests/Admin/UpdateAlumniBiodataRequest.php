<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumniBiodataRequest extends FormRequest
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
            'id' => 'required|integer',
            'full_name' => 'required|string|max:255',
            'nis_nisn' => 'required|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'required|string|in:male,female,other',
            'major' => 'required|string|max:255',
            'graduation_year_group_id' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'socmed_facebook' => 'nullable|url',
            'socmed_twitter' => 'nullable|url',
            'socmed_instagram' => 'nullable|url',
            'socmed_linkedin' => 'nullable|url',
            'socmed_youtube' => 'nullable|url',
            'socmed_tiktok' => 'nullable|url',
            'is_verified' => 'nullable|boolean',
        ];
    }
}

