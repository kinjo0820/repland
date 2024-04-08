<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('contact.index');
    }
    public function confirm(ContactRequest $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $validated = $request->validated();
        
        //フォームから受け取ったすべてのinputの値を取得

        //入力内容確認ページのviewに変数を渡して表示
        return view('contact.confirm', [
            'validated' => $validated,
        ]);
    }

    function sendMail(ContactRequest $request) {
        $validated = $request->validated();
        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)
        $user = Auth::user();
        Log::debug($user->name. 'さんよりお問い合わせがありました');
        Mail::to('t.kinjo820@gmail.com')->send(new ContactAdminMail($validated));
        Mail::to($user->email)->send(new ContactUserMail($validated));

        return to_route('contact.complete');
    }

    public function complete()
    {
        //
        return view('contact.complete');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
