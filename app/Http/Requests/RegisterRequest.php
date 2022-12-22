<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|min:4|max:30|unique:accounts',
            'password' => [Password::min(10)->letters()->mixedCase()->symbols()],
        ];
    }

    public function messages()
    {
        return [
          'username.required' => 'Email đã tồn tại!',
          'password' => 'Mật khẩu phải có 10 kí tự bao gồm ít nhất 1 chữ thường, chữ in hoa, số 0-9 và kí tự đặc biệt (@, !, ...)'
        ];
    }
}
