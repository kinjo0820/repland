@extends('layouts.default')
@section('title', 'Repland')

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
            
            <h3 class="mt-3 pb-4 border-b border-slate-300">
              {{ $post->caption }}
            </h3>

            @isset($post->reptiles)
                @if($post->reptiles !== null)
                    <h3 class="mt-3 pb-4 border-b border-slate-300">
                        #{{ $post->reptiles->name }}
                    </h3>
                @endif
            @endisset

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
                15
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

<!-- ▼▼▼▼爬虫類一覧表示▼▼▼▼　-->
<div id="reptiles" class="px-3 py-10 bg-opacity-10 " style="">
  <h2 class="font-medium text-center text-xl mb-4">人気の爬虫類</h2>
  <div class="grid grid-cols-2 md:lg:xl:grid-cols-6 group">
    @foreach ($reptiles as $reptile)
      <div class="p-3 flex flex-col items-center text-center group   cursor-pointer">
        <a href="{{ route('reptiles.show',$reptile->id)}}">
          <img class="h-24 w-24 rounded-full text-white shadow-lg shadow-green-900 object-cover" src="{{ asset('storage/'. $reptile->image) }}" alt="">
        </a>
          <p class="text-sm font-medium text-slate-700 mt-3">{{ $reptile->name }}</p>
      </div>
          
    @endforeach

  </div>

  <div class="mt-8 text-center">
      <a href="#" class="inline-block text-xs font-semibold leading-none rounded py-4 text-black border-solid bg-white border-black border-2 px-16 hover:text-white hover:bg-black">もっと見る</a>
  </div>

</div>
<!-- ▲▲▲▲爬虫類一覧表示▲▲▲　-->


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


<!-- ▼▼▼▼お知らせ▼▼▼▼　-->

<section id="event" class="">
  <p class="text-center text-2xl">お知らせ</p>
  <div class="text-center">
    <ul class="mt-8 inline-block">
        <li class="flex py-4 border-b"><p class="font-bold w-40">2024. 3. 13</p><a href="#" class="ml-2 ">プロジェクトを開始しました</a></li>
        <li class="flex py-4 border-b"><p class="font-bold w-40">2024. 4. 20</p><a href="#" class="ml-2 ">サイト公開予定！！</a></li>
      </ul>
  </div>
  
  <div class="mt-8 mb-8 text-center">
    <a href="#" class="inline-block text-xs font-semibold leading-none rounded py-4 text-black border-solid bg-white border-black border-2 px-16 hover:text-white hover:bg-black">もっと見る</a>
  </div>
</section>
 
<!-- ▲▲▲▲お知らせ▲▲▲　-->


@endsection