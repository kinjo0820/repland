<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreReptileRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'image' => [
                'required',
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'max:6000', // ファイル容量が2000kb以下である
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
               
            ],
            'body' => ['required', 'max:20000'],
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
            'body' => '概要',
            '' => '',
        ];
    }   
}
