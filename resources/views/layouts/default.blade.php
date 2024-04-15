<!DOCTYPE html>
<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="爬虫類専用SNS Repland | あなたのお気に入りの爬虫類が見つかる">

    <meta property="og:type" content="TOP" />
    <meta property="og:title" content="Repland" />
    <meta property="og:description" content="あなたのお気に入りの爬虫類が見つかる" />
    <meta property="og:site_name" content="爬虫類専用SNS Repland" />
    <meta property="og:url" content="https://repland.net/" />
    <meta property="og:image" content="public/images/top/logo.jpg" alt="Repland" />
<!-- Twitterシェア時の表示形式指定 -->
<meta name="twitter:card" content="summary_large_image" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    @vite('resources/css/app.css')
    <title>@yield('title', 'Repland')</title>

</head>

<body class="">
    <nav class="bg-white  border-gray-300  w-full block pb-2 ">
        <div class="flex justify-between items-center px-4">
            <!-- メニューアイコン -->
            <button id="menuBtn" class="md:hidden">
                <i class="fas fa-bars text-green-600 text-lg "></i>
            </button>
            <!-- Logo -->
            <div class="ml-2 mt-2 w-40">
                <a href="/"><img src="{{ asset('images/top/logo.svg') }}" alt=""></a>
            </div>
            
            <div class="space-x-4">
                    <button>
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
   
    <div id="sideNav" class="lg:block hidden  w-64  fixed rounded-none border-none  bg-white pb-80">
        <div class="p-4 space-y-4 pl-6">

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
          
            <a href="https://repland.official.ec/" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>限定グッズ</span>
            </a>

           
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

            {{-- ログインの可否で表示を変える --}}
            @if(Auth::check())
            <form action="{{ route('mypage.logout') }}" method="post" class="py-3  flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                @csrf
                <button>
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>ログアウト</span>
                </button>
            </form>
             
            @else
            <form action="{{ route('mypage.logout') }}" method="post" class="py-3  flex items-center space-x-4 rounded-lg hover:text-white hover:bg-gradient-to-r hover:from-sky-600 hover:to-cyan-400">
                @csrf
                <button>
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>ログイン</span>
                </button>
            </form>
                  
            @endif
        </div>
    </div>

    <main class="lg:ml-64  lg:flex lg:flex-col lg:w-75% ">
        @yield('content')
    </main>

     <!-- ▼▼▼▼共通フッター▼▼▼▼　-->
     <footer class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75% relative pt-8 pb-6 ">
        <div class="container mx-auto px-4">
     
            <div class="w-full lg:w-6/12">
                <img class="w-40" src="{{ asset('images/top/logo.svg') }}" alt="">
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