<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\Reptile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
   public function like($id)
   {
    Like::create([
      'post_id' => $id,
      'user_id' => Auth::id(),
    ]);

    session()->flash('success', 'You Liked the Post.');
    return redirect()->back();
    }


    public function unlike($id)
    {
    $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Post.');
    return redirect()->back();
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        $posts = Post::withCount('likes')
        ->orderByDesc('likes_count')
        ->get();
        
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        //
        $reptiles = Reptile::all();
        return view('mypage.post.create',['reptiles' => $reptiles,'post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //

        $savedImagePath = $request->file('image')->store('blogs','public');
        $reptiles_id = $request->input('reptiles');
        $posts = new Post($request->validated());
        $posts->image =$savedImagePath;
        $posts->user_id = Auth::user()->id;
        $posts->reptiles_id = $reptiles_id;



        $posts->save();

        return to_route('mypage.users.index', $posts->user->id);



    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // 投稿に紐づく全てのいいねを取得して削除する
        $post->likes()->delete();

        // 投稿の画像を削除する
        Storage::disk('public')->delete($post->image);

        // 投稿を削除する
        $post->delete();

        return redirect()->route('mypage.users.index', $post->user->id);
    }
}
