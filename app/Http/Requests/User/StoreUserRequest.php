<?php

namespace App\Http\Requests\User;

use App\Acl\Acl;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return checkPermission(Acl::PERMISSION_PERMISSION_MANAGE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
                'max:20'
            ],
            'last_name' => [
                'required',
                'string',
                'max:20'
            ],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'phone_number' => [
                'required', 'numeric', 'unique:users'
            ],
            'roles' => [
                'required'
            ]
        ];
    }

    protected function passedValidation()
    {
        $this->merge(['password' => Hash::make($this->input('password'))]);
    }
}
