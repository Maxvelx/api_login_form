<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|max:255',
            'lastname' => 'required|max:255',
            'email'    => 'required|max:255|email',
            'password' => 'required|max:255|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'error' => [
                'name.required'      => 'Поле ім\'я обов\'язково до заповнення',
                'password.min'       => 'Не менше 8 символів',
                'password.confirmed' => 'Поле підтвердження паролю не збігається з полем пароль',
            ]
        ];
    }
}
