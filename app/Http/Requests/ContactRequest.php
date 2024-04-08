<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'body' => ['required', 'string', 'max:2000'],
        ];
    }
    public function attributes()
    {
        return [
            'introduction' => '自己紹介',
            'name' => '生体の名前',
            'image' => '画像',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'body' => 'お問合せ内容',
            '' => '',
        ];
    }   
}
