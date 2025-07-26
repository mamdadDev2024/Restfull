<?php

namespace App\Http\ApiRequest\Admin\User;

use App\Contracts\ApiFormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends ApiFormRequest
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
            'user_name' => 'required|string|unique:users,'.Auth::id(),
            'email' => 'required|email|unique:users,'.Auth::id(),
            'password' => 'required|string|min:6'
        ];
    }
}
