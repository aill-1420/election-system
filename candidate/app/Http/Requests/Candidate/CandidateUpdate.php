<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class CandidateUpdate extends FormRequest
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
            'name'        => 'required|string|max:200',
            'username'    => 'required|string|max:200',
            'email'       => 'required|string|max:200|email',
            'password'    => 'nullable|string|max:200',
            'description' => 'required|string',
            'phone'       => 'required',
            'image'       => 'nullable|mimes:jpg,png,jpeg',
        ];
    }
}
