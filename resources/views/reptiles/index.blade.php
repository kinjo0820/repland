@extends('layouts.default')
@section('title', 'Repland | カテゴリー')

@section('content')



<!-- ▼▼▼▼爬虫類一覧表示▼▼▼▼　-->
<div id="reptiles" class="px-3 py-10 bg-opacity-10 " style="">
    <h2 class="font-medium text-center text-xl mb-10">カテゴリー</h2>
    <div class="grid grid-cols-2 md:lg:xl:grid-cols-6 group">
      @foreach ($reptiles as $reptile)
        <div class="p-3 flex flex-col items-center text-center group  cursor-pointer mb-1">
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





@endsection