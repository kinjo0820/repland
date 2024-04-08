@extends('layouts.default')

@section('content')

<main class="profile-page">
 
<section class="py-2">


<div class="container mx-auto px-4">
  <div class="flex flex-col min-w-0 break-words w-full py-4">
      <div class="flex flex-col sm:flex-row items-center justify-center">
          <img alt="Profile Image" src="{{ asset('storage/' . $user->image) }}" class="w-40 h-40 rounded-full border-white sm:mb-0 shadow-lg object-cover">
          <div class="text-center sm:text-left ml-0 sm:ml-8">
              <h2 class="text-xl mb-2 font-light mt-5">{{ $user->name }}</h2>
              @if (auth()->check() && auth()->user()->id === $user->id)
              <p class="text-xs mb-1 font-light ">{{ $user->email }}</p>
              <a href="{{ route('mypage.users.edit',Auth::user()->id)}}" class="">
                <button type="submit" class="py-1 px-2 my-2 text-xs text-black bg-white rounded-md border border-black hover:bg-black hover:text-blue-50">プロフィールを編集する</button>
              </a>
              @endif
              <div class="flex justify-center sm:justify-start mb-2">
                  <div class="mr-4">
                      <span class="">3</span>
                      <span class="text-xs text-gray-500">フォロワー</span>
                  </div>
                  <div class="mr-4">
                      <span class="">7</span>
                      <span class="text-xs text-gray-500">フォロー中</span>
                  </div>
                  <div>
                      <span class="">{{ $posts->count() }}</span>
                      <span class="text-xs text-gray-500">投稿</span>
                  </div>
              </div>
              <p class="text-sm text-gray-700">{{ $user->introduction }}</p>
          </div>
      </div>
  </div>
</div>





</section>

<!-- ▼▼▼▼投稿一覧画面▼▼▼▼　-->
<div class="min-h-screen flex-col justify-center overflow-hidden">
  <div class="">
    <div class="max-w-screen-lg mx-auto">
      <h2 class="p-6 font-medium text-center text-xl">#投稿</h2>
      <div class="gap-6 grid grid-cols-1 md:lg:xl:grid-cols-3 group">
        @foreach ($posts as $post)
        <div class="bg-white shadow  overflow-hidden">
          <img src="{{ asset('storage/' . $post->image)}}" class="object-cover h-80 w-full" alt="">
          <div class="p-6">
          
            <div class="flex items-center">
              <span class="block text-slate-400 font-semibold text-sm">
                  <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('storage/' . $post->user->image) }}" alt="">
              </span>
              <span class="ml-2 font-medium text-start flex-grow flex items-center">
                  {{ $post->user->name }}
              </span>
              <form action="{{ route('posts.destroy',$post->id)}}" method="post">
                @csrf
                @method('DELETE')
                @if (auth()->check() && auth()->user()->id === $user->id)
                <button>
                  <span class=" my-2 text-xs text-black bg-white"><i class="fa-solid fa-trash"></i></span>
                </button>
                @endif
              </form>
            </div>
            
            <h3 class="mt-3 pb-4 border-b border-slate-300">
              #{{ $post->reptiles->name }}
            </h3>

            <div class="flex mt-4 gap-4 items-center justify-end">
                @if($post->is_liked_by_auth_user())
                  <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="flex gap-1 items-center text-sm"><i class="fa-solid fa-heart text-rose-500"></i><span class="">{{ $post->likes->count() }}</span></a>
                @else
                  <a href="{{ route('post.like', ['id' => $post->id]) }}" class="flex gap-1 items-center text-sm"><i class="fa-regular fa-heart"></i><span class="">{{ $post->likes->count() }}</span></a>
                @endif
  
                {{-- <span class="flex gap-1 items-center text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-lime-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                  </svg>
                </span> --}}
  
              </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>
    <div class="mt-8 mb-8 text-center">
      <a href="#" class="inline-block text-xs font-semibold leading-none rounded py-4 text-black border-solid bg-white border-black border-2 px-16 hover:text-white hover:bg-black">もっと見る</a>
  </div>
  </div>
</div>

<!-- ▲▲▲▲投稿一覧画面▲▲▲　-->



        
</main>

@endsection