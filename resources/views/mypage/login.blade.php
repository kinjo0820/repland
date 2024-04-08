@extends('layouts.default')

@section('content')

<!-- This is an example component -->
<div class="h-screen font-sans login bg-cover">
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
          <div class="leading-loose">
            <form action="{{ route('mypage.login') }}" method="POST" class="m-4 p-10 bg-white bg-opacity-25 rounded shadow-xl">
                @csrf
                <p class="text-white text-center text-lg font-bold">ログイン</p>
                  <div class="">
                    <label class="block text-sm text-white" for="email">メールアドレス</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white" type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
                  </div>
                  <div class="mt-2">
                    <label class="block  text-sm text-white">パスワード</label>
                     <input class="w-full px-5 py-1 text-gray-700 bg-gray-300 rounded focus:outline-none focus:bg-white"
                     type="password" placeholder="パスワード" name="password">
                  </div>
    
                  <div class="mt-4 items-center flex justify-between">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 hover:bg-gray-800 rounded"
                      type="submit">ログイン</button>
                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 text-white hover:text-red-400"
                      href="/mypage/register">新規アカウントを作成</a>
                  </div>
    
            </form>
    
          </div>
        </div>
      </div>
    </div>
    <style>
      .login{
      /*
        background: url('https://tailwindadmin.netlify.app/dist/images/login-new.jpeg');
      */
      background: url('/images/top/iguana-3192772_1280.jpg');
      background-repeat: no-repeat;
      
    }
    </style>


{{-- <div>
  <section class="h-screen py-48 bg-blueGray-50">
    <div class="container px-4 mx-auto">
      <div class="flex max-w-md mx-auto flex-col text-center">
        <div class="mt-12 mb-8 p-8 bg-white rounded shadow">
          <h1 class="mb-6 text-3xl">管理者ログイン</h1>

          @if($errors->any())
            <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
              <p class="text-red-400">ログインに失敗しました</p>
            </div>
          @endif

          <form action="{{ route('mypage.login') }}" method="POST">
            @csrf
            <div class="flex mb-4 px-4 bg-blueGray-50 rounded">
              <input class="w-full py-4 text-xs placeholder-blueGray-400 font-semibold leading-none bg-blueGray-50 outline-none" type="email" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
              <svg class="h-6 w-6 ml-4 my-auto text-blueGray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
              </svg>
            </div>

            <div class="flex mb-6 px-4 bg-blueGray-50 rounded">
              <input class="w-full py-4 text-xs placeholder-blueGray-400 font-semibold leading-none bg-blueGray-50 outline-none" type="password" placeholder="パスワード" name="password">
              <button class="ml-4">
                <svg class="h-6 w-6 my-auto text-blueGray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
              </button>
            </div>
            <button type="submit" class="block w-full p-4 text-center text-xs text-white font-semibold leading-none bg-blue-600 hover:bg-blue-700 rounded">ログイン</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div> --}}
@endsection