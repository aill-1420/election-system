<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRegister extends FormRequest
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
            'password'    => 'required|string|max:200',
            'description' => 'required|string',
            'image'       => 'required|mimes:jpg,png,jpeg',
            'election'    => 'required|integer|exists:elections,id'
        ];
    }
}
