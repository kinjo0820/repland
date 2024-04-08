<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mypage\StoreUserRequest;
use App\Http\Requests\Mypage\UpdateUserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mypage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //  ユーザー登録処理
    public function store(StoreUserRequest $request)
    {
        //
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('users','public');
        $validated['password'] = Hash::make($validated['password']); 
        User::create($validated);

        return to_route('index')->with('success','新規登録完了');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        // 選択したユーザーのポストを取得
        $posts = Post::where('user_id', $id)->get();

        return view('mypage.users.index',['user' => $user,'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('mypage.users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        //
        $user = User::findOrFail($id);
        $updateData = $request->validated();

        //画像を変更する場合
        if ($request->has('image')) {
            //　変更前の画像を削除
            Storage::disk('public')->delete($user->image);
            //変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('users','public');
        }

    
        $user->update($updateData);
        return to_route('mypage.users.index',Auth::user()->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 実際には削除せずにフラグで論理削除する方法でいこう
        $user = User::findOrFail($id);
        
       
       
        return to_route('mypage.users.create');
    }
}
