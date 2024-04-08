@extends('layouts.default')
@section('title', '人気の爬虫類')

@section('content')


<div class="max-w-md mx-auto  md:max-w-4xl mb-10">
  <div class="md:flex">
    <div class="md:flex-shrink-0">
      <img class="h-64 w-full object-cover md:h-80 md:w-80 rounded-xl" src="{{ asset('storage/' . $reptile->image) }}" alt="{{ $reptile->name }}">
    </div>
    <div class="pl-8 pt-4">
      <div class="uppercase tracking-wide  text-green-900 font-semibold">{{ $reptile->name }}</div>
      <p class="mt-2 text-gray-500 text-sm">平たく太い体型と喉を真っ黒にして膨らませる姿がアゴ髭みたいに見えることから、フトアゴヒゲトカゲと名付けられ、フトアゴの愛称で呼ばれているんだ。
        見た目のいかつさとは違い、トゲはゴムのような触感性格は温厚で人に馴れやすく仕草もかわいいんだよ。また砂漠を生き抜いているのでとても丈夫なのも魅力のひとつだよ！</p>

      <div class="mt-2">
        <span class="text-gray-400">生息地</span>
        <p class="mt-1 text-gray-900 text-sm">オーストラリア中央部～南東部の乾燥地帯
        </p>
    
      </div>
      <div class="mt-2">
        <span class="text-gray-400">全長</span>
        <p class="mt-1 text-gray-900 text-sm">{{ $reptile->length }}44~55cm</p>
      
      </div>
      <div class="mt-2">
        <span class="text-gray-400">寿命</span>
        <p class="mt-1 text-gray-900 text-sm">{{ $reptile->lifespan }}8~10年</p>
      </div>
    </div>
  </div>
</div>


<!-- component -->
<div class="mx-auto mt-5 w-4/5" style="max-width: 800px;">
  <div class="flex flex-col items-center">
      <h2 class="text-xl text-gray-800 mb-2">育て方のポイント</h2>
  </div>
  <div class="mx-auto mt-2">
      <div class="bg-green-300  rounded-md">
          <details class="group">
              <summary class="flex justify-between items-center px-6  py-4 font-medium cursor-pointer">
                  <span class="text-gray-800"><span class="mx-2">1.</span>ケージの大きさ</span>
                  <span class="transform transition duration-300 group-hover:rotate-180">
                      <i class="fa-solid fa-arrow-down"></i>
                  </span>
              </summary>
              <p class=" px-6 pb-4 hidden group-open:block">全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。</p>
          </details>
      </div>
  </div>

  <div class="mx-auto mt-2">
    <div class="bg-green-300  rounded-md">
        <details class="group">
            <summary class="flex justify-between items-center px-6  py-4 font-medium cursor-pointer">
                <span class="text-gray-800"><span class="mx-2">1.</span>ケージの大きさ</span>
                <span class="transform transition duration-300 group-hover:rotate-180">
                    <i class="fa-solid fa-arrow-down"></i>
                </span>
            </summary>
            <p class=" px-6 pb-4 hidden group-open:block">全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。</p>
        </details>
    </div>
  </div>

  <div class="mx-auto mt-2">
    <div class="bg-green-300  rounded-md">
        <details class="group">
            <summary class="flex justify-between items-center px-6  py-4 font-medium cursor-pointer">
                <span class="text-gray-800"><span class="mx-2">1.</span>ケージの大きさ</span>
                <span class="transform transition duration-300 group-hover:rotate-180">
                    <i class="fa-solid fa-arrow-down"></i>
                </span>
            </summary>
            <p class=" px-6 pb-4 hidden group-open:block">全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。全長40cm〜50cmまで成長するので900*450*450のケージがおすすめです。</p>
        </details>
    </div>
  </div>
</div>



 <!-- ▼▼▼▼投稿一覧画面▼▼▼▼　-->
<div class="min-h-screen flex-col justify-center overflow-hidden">
    <div class="">
        <h1></h1>
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
              
              <h3 class="mt-3 pb-4 border-b border-slate-300">{{ $post->caption }}</h3>
  
              <h3 class="mt-3 pb-4 border-b border-slate-300">#{{ $post->reptiles->name }}</h3>
  
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






@endsection