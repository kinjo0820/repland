@extends('layouts.admin')
@section('title', '管理画面')

@section('content')


    <!-- ▼▼▼▼爬虫類一覧表示▼▼▼▼　-->
<div id="reptiles" class="px-3 py-10 bg-opacity-10 " style="">
    <div class="flex px-6 pb-4 border-b">
        <h2 class="text-xl">爬虫類一覧</h2>
        <div class="ml-auto">
            <a href="/admin/reptiles/create" class="py-2 px-3 text-xs text-white font-semibold bg-black rounded-md">新規登録</a>
        </div>
    </div>
    <div class="grid grid-cols-2 md:lg:xl:grid-cols-6 group">
      @foreach ($reptiles as $reptile)
        <div class="p-3 flex flex-col items-center text-center group   cursor-pointer">
            <a href="{{ route('admin.reptiles.edit',['reptile'=> $reptile->id]) }}">
             <img class="h-24 w-24 rounded-full text-white shadow-lg shadow-green-900 object-cover" src="{{ asset('storage/'. $reptile->image) }}" alt="">
            </a>
            <p class="text-sm font-medium text-slate-700 mt-3">{{ $reptile->name }}</p>
            
        </div>
            
      @endforeach
  
    </div>
  
   
  
</div>
  <!-- ▲▲▲▲爬虫類一覧表示▲▲▲　-->


@endsection