<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $base = [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|confirmed|min:6',
            'role'       => 'required|in:user,provider',
            'status'     => 'nullable|in:active,hold,inactive',
        ];

        if ($this->input('role') === 'provider') {
            $base = array_merge($base, [
                'provider_store_name' => 'required|string|max:255',
                'establish_since'     => 'required|string|max:255',
                'description'         => 'required|string',
                'logo'                => 'required|image|mimes:jpg,jpeg,png,webp',
                'certificate'         => 'required|file|mimes:pdf,doc,docx,jpg,png',
            ]);
        }

        return $base;
    }
}
