@extends('layouts.default')
@section('title', 'お問い合わせ')

@section('content')


<section class="pb-24 text-center">
  <div class="mx-auto">
    <div class="">
      <form action="{{ route('contact.confirm')}}" method="post">
        @csrf
        <div class="flex justify-center items-center pt-10">
            <img class="w-40 h-40 rounded-full object-cover" src="{{ asset('storage/' . \Auth::user()->image) }}" alt="">
        </div>
        <div class="">
          <label for="name" class="block  font-medium text-xl">{{ \Auth::user()->name }}</label>
        </div>
    
        <div class="mb-10">
          <label for="email" class="block  font-medium text-xs">{{ \Auth::user()->email }}</label>
        </div>
        <div class="">
            <textarea id="body" class="w-full sm:w-96 h-40 sm:h-32 p-4 text-xs leading-none resize-none bg-blueGray-50 rounded outline-none border" type="text" placeholder="改善や要望などご自由にご記入ください" name="body">{{ old('body') }}</textarea>
            @error('body')
            <p class="text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="relative flex  flex-col  justify-center overflow-hidden sm:py-12 text-center text-xs">
            <button class="bg-gradient-to-b mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 px-10 py-3 rounded-2xl shadow-blue-400 shadow-md hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">入力内容確認</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection