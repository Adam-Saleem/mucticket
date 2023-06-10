<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        if($this->method() == 'PATCH' or $this->method() == 'PUT') {
            $user = $this->route('user');
            return [
                'username' => ['required',Rule::unique('users')->ignore($user->id)],
                'password' => ['confirmed'],

            ];
        }
        return [
            'username' => 'required|unique:users',
            'password' => ['required', 'confirmed'],
        ];
    }
}
