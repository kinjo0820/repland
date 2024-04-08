<!-- component -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Repland')</title>
</head>

<body class="">
    <nav class="bg-white border-b border-gray-300">
        <div class="flex justify-between items-center px-9">
          
            <!-- メニューアイコン -->
            <button id="menuBtn" class="md:hidden">
                <i class="fas fa-bars text-cyan-500 text-lg "></i>
            </button>

            <!-- Logo -->
            <div class="ml-1 flex justify-center items-center">
                <h1 class="text-4xl m-4 font-mono">Repland</h1>
                <p class="">管理画面</p>
                {{-- <img src="" alt="logo" class="h-20 w-28"> --}}
            </div>
            
            <div class="space-x-4">
                <button>
                    <i class="fas fa-user text-lg"></i>
                </button>
            </div>
        </div>
    </nav>

   
    <div id="sideNav" class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none">
      
        <div class="p-4 space-y-4">
         
            <a href="/admin" aria-label="dashboard"
                class="relative px-4 py-3 flex items-center space-x-4 rounded-lg ">
                <i class="fas fa-home"></i>
                <span class="-mr-1 font-medium">ホーム</span>
            </a>

            <a href="/admin/reptiles" class="px-4 py-3 flex items-center space-x-4 rounded-md group">
                <i class="fas fa-wallet"></i>
                <span>爬虫類一覧</span>
            </a>
            
            <a href="/admin/user" class="px-4 py-3 flex items-center space-x-4 rounded-md group">
                <i class="fas fa-user"></i>
                <span>ユーザー管理</span>
            </a>
            
            <a href="https://admin.thebase.com/dashboard" target="_blank" class="px-4 py-3 flex items-center space-x-4 rounded-md group">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>ストア管理</span>
            </a>
            <a href="https://www.instagram.com/reptile_island_official/" target="_blank" class="px-4 py-3 flex items-center space-x-4 rounded-md group">
                <i class="fa-brands fa-instagram"></i>
                <span>インスタグラム</span>
            </a>
            <a href="/" class="px-4 py-3 flex items-center space-x-4 rounded-md group">
                <i class="fas fa-sign-out-alt"></i>
                <span>ユーザー画面へ</span>
            </a>
        </div>
    </div>

    <main class="lg:ml-64 lg:pl-4 lg:flex lg:flex-col lg:w-75%">
        @yield('content')
    </main>
    
    


    <!-- Script  -->
    <script>

        // メニューアイコンをクリックしたときにサイドナビゲーションを表示／非表示する
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle('hidden');
        });
    </script>
</body>

</html>