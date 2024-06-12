<?php

namespace App\Http\Requests\User;

use App\Acl\Acl;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
            'phone_number' => [
                'sometimes', 'numeric', 'unique:users,id,' . $this->user->id
            ],
            'roles' => [
                'required'
            ]
        ];
    }
}
