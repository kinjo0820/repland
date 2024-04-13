@extends('layouts.default')
@section('title', 'Repland | オススメ')

@section('content')

<!-- ▼▼▼▼!!!!!▼▼▼▼　-->
 
<!-- ▲▲▲▲!!!!!▲▲▲　-->

<!-- ▼▼▼▼投稿一覧画面▼▼▼▼　-->
<div class="min-h-screen flex-col justify-center overflow-hidden">
  <div class="">
    <div class="max-w-screen-lg mx-auto">
      <h2 class="p-6 font-medium text-center text-xl">＃投稿</h2>
      <div class="gap-6 grid grid-cols-1 md:lg:xl:grid-cols-3 group">

        @foreach ($posts as $post)
        <div class="bg-white shadow  overflow-hidden">
          <img src="{{ asset('storage/' . $post->image)}}" class="object-cover h-80 w-full" alt="">
          <div class="p-6">
          
            <div class="flex items-center">
              <span class="block text-slate-400 font-semibold text-sm">
                  <a href="{{ route('mypage.users.index',$post->user->id)}}"><img class="w-10 h-10 rounded-full object-cover" src="{{ asset('storage/' . $post->user->image) }}" alt=""></a>
              </span>
              <span class="ml-2 font-medium text-start flex-grow flex items-center">
                <a href="{{ route('mypage.users.index',$post->user->id)}}">{{ $post->user->name }}</a>
              </span>
            </div>
            
            {{-- <h3 class="mt-3 pb-4 border-b border-slate-300">
              {{ $post->caption }}
            </h3> --}}
            <div class="flex mt-4 gap-4 items-center justify-end">
              @if($post->is_liked_by_auth_user())
                <a href="{{ route('post.unlike', ['id' => $post->id]) }}" class="flex gap-1 items-center text-sm"><i class="fa-solid fa-heart text-rose-500"></i><span class="">{{ $post->likes->count() }}</span></a>
              @else
                <a href="{{ route('post.like', ['id' => $post->id]) }}" class="flex gap-1 items-center text-sm"><i class="fa-regular fa-heart"></i><span class="">{{ $post->likes->count() }}</span></a>
              @endif
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





<!-- ▼▼▼▼商品一覧画面▼▼▼▼　-->

<div class="min-h-screen flex-col justify-center overflow-hidden">
  <div class="min-h-28 ">
    <div class="max-w-screen-lg mx-auto">
      <h2 class="p-6 font-medium text-center text-xl">人気の商品</h2>
      <div class="gap-6 grid grid-cols-1 md:lg:xl:grid-cols-3 group">
        
        
      <a href="https://repland.official.ec/items/77664944">
        <div class="bg-white shadow  overflow-hidden">
          <img src="/images/products/IMG_8031.PNG" class="object-cover h-80 w-full" alt="">
          <div class="p-6">
            <h3 class="mt-3 pb-4 border-b border-slate-300">
              フトアゴしがみつきTシャツ
            </h3>

            <div class="flex mt-4 justify-end items-center">
              
              <span class="flex gap-1 items-center text-sm">
                  ￥3,300
              </span>
          </div>
          
          </div>
        </div>
      </a>

      <a href="https://repland.official.ec/items/77664944">
        <div class="bg-white shadow  overflow-hidden">
          <img src="/images/products/IMG_8031.PNG" class="object-cover h-80 w-full" alt="">
          <div class="p-6">
            <h3 class="mt-3 pb-4 border-b border-slate-300">
              フトアゴしがみつきTシャツ
            </h3>

            <div class="flex mt-4 justify-end items-center">
              
              <span class="flex gap-1 items-center text-sm">
                  ￥3,300
              </span>
          </div>
          
          </div>
        </div>
      </a>

      <a href="https://repland.official.ec/items/77664944" class="flex justify-end">
        <div class="bg-white shadow  overflow-hidden">
            <img src="/images/products/IMG_8031.PNG" class="object-cover h-80 w-full" alt="">
            <div class="p-6">
                <h3 class="mt-3 pb-4 border-b border-slate-300">
                    フトアゴしがみつきTシャツ
                </h3>
                <div class="flex mt-4 justify-end items-center">
                    
                    <span class="flex gap-1 items-center text-sm">
                        ￥3,300
                    </span>
                </div>
            </div>
        </div>
    </a>
      </div>

      <div class="mt-8 mb-8 text-center">
        <a href="#" class="inline-block text-xs font-semibold leading-none rounded py-4 text-black border-solid bg-white border-black border-2 px-16 hover:text-white hover:bg-black">もっと見る</a>
    </div>
    </div>
  </div>
</div>

<!-- ▲▲▲▲商品一覧画面▲▲▲　-->





@endsection