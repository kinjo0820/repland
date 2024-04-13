@extends('layouts.default')

@section('content')

<!-- This is an example component -->
<div class="mt-10 mb-32 font-sans bg-cover ">
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
          <div class="leading-loose">
            <img src="{{ asset('images/top/logo.jpg') }}" alt="">
            <form action="{{ route('mypage.login') }}" method="POST" class="p-10 bg-white bg-opacity-25 rounded ">
                @csrf
                <p class="text-black text-center text-lg font-bold">ログイン</p>
                  <div class="">
                    <label class="block text-sm text-black" for="email">メールアドレス</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-btext-black" type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="mt-2">
                    <label class="block  text-sm text-black">パスワード</label>
                     <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-btext-black"
                     type="password" placeholder="パスワード" name="password">
                  </div>
    
                  <div class="mt-4 items-center flex justify-between">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-green-900  rounded"
                      type="submit">ログイン</button>
                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 text-black hover:text-red-400"
                      href="/mypage/register">新規アカウントを作成</a>
                  </div>
    
            </form>
    
          </div>
        </div>
      </div>
    </div>
  



@endsection