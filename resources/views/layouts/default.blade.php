<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="爬虫類専用SNS Repland | あなたのお気に入りの爬虫類が見つかる">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    @vite('resources/css/app.css')
    <title>@yield('title', 'Repland')</title>

</head>

<body class="">
    <nav class="bg-white  border-gray-300 fixed w-full block pb-2  ">
        <div class="flex justify-between items-center px-4">
          
            <!-- メニューアイコン -->
            <button id="menuBtn" class="md:hidden">
                <i class="fas fa-bars text-cyan-500 text-lg "></i>
            </button>

            <!-- Logo -->
            <div class="ml-1">
                <a href="/"><h1 class="text-4xl m-4 font-mono">Repland</h1></a>
            </div>

            
            <div class="space-x-4">
               
                    <button>
                        {{-- <i class="fas fa-user text-cyan-500 text-lg"></i> --}}
                        <div class="flex">
                            @if (Auth::check()) <!-- ログインしているかどうかを確認 -->
                            <a href="{{ route('mypage.users.index', Auth::user()->id) }}">
                                <img class="mt-4 w-10 h-10 rounded-full object-cover" src="{{ asset('storage/' . \Auth::user()->image) }}" alt="">
                            </a>
                            @else
                                <i class="mt-2 fas fa-user text-cyan-500 text-lg"></i>
                            @endif
                        </div>
                        
                    </button>
            </div>
        </div>
    </nav>
   
    <div id="sideNav" class="lg:block hidden  w-64 h-screen fixed rounded-none border-none mt-20 bg-white">
        <div class="p-4 space-y-4">
            <a href="/post/create" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-camera-retro"></i>
                <span>投稿する</span>
            </a>
            <a href="/posts" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-heart"></i>
                <span class="-mr-1 font-medium">オススメ</span>
            </a>

            <a href="/reptiles" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span class="-mr-1 font-medium">カテゴリー</span>
            </a>
            {{-- <a href="/reptiles" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-calendar-days"></i>
                <span>イベント情報</span>
            </a> --}}
            <a href="https://repland.official.ec/" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>限定グッズ</span>
            </a>

            {{-- <a href="https://twitter.com/champloo_life" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-x"></i>
                <span>エックス</span>
            </a> --}}
            <a href="/contact" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-envelope"></i>
                <span>お問い合せ</span>
            </a>
            @if(Auth::check())
            <a href="{{ route('mypage.users.index', Auth::user()->id) }}" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fas fa-user"></i>
                <span>プロフィール</span>
            </a>
            @endif
            {{-- <a href="" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fa-duotone fa-house"></i>
                <span>ケージレイアウト</span>
            </a> --}}
            
            {{-- <a href="/" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-500 group">
                <i class="fa-solid fa-calendar-days"></i>
                <span>イベント情報</span>
            </a> --}}

            <form action="{{ route('mypage.logout') }}" method="post" class="py-3  flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                @csrf
                <button>
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>ログアウト</span>
                </button>
            </form>
        </div>
    </div>

    <main class="lg:ml-64  lg:flex lg:flex-col lg:w-75% pt-20">
        @yield('content')
    </main>

     <!-- ▼▼▼▼共通フッター▼▼▼▼　-->
     <footer class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% relative pt-8 pb-6 ">
        <div class="container mx-auto px-4">
     
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-4xl fonat-semibold text-blueGray-700">Repland</h4>
                <h5 class="text-sm mt-2 mb-2 text-blueGray-600">
                    爬虫類マニアのためのプラットフォーム
                </h5>
            
            </div>

           
           
        </div>
        <hr class="my-6 border-blueGray-300">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-blueGray-500 font-semibold py-1">
                Copyright © <span id="get-current-year">2024</span>
                <a href="" class="text-blueGray-500 hover:text-blueGray-800">Repland</a>.
            </div>
            </div>
        
        </div>
    </footer>
     <!-- ▲▲▲▲共通フッター▲▲▲　-->
    
    


   <!-- Script  -->
    <script>

        // メニューアイコンをクリックしたときにサイドナビゲーションを表示／非表示する
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', ( ) => {
            sideNav.classList.toggle('hidden');
        });
    </script>
</body>


</html>