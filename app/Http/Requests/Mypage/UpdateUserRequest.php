<?php

namespace App\Http\Requests\Mypage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'image' => [
                // 'required',
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                // 'max:2000', // ファイル容量が2000kb以下である
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
               
            ],
            'introduction' => ['required', 'string', 'max:255'],
        ];
    }
     // 属性名の翻訳
     public function attributes()
     {
         return [
             'introduction' => '自己紹介',
             'name' => '名前',
             'image' => '画像',
             'email' => 'メールアドレス',
             'password' => 'パスワード',
             'body' => '内容',
             '' => '',
         ];
     }   
}
