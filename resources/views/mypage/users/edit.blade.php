@extends('layouts.default')
@section('title', 'Repland | アカウント編集')

@section('content')
<section class="py-8 ">
    <div class="container px-4 mx-auto">
        <div class="py-4 rounded">
            <form action="{{ route('mypage.users.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-6 pb-4 border-b text-center">
                    <h3 class="text-xl">プロフィール編集</h3>
                </div>

                <div class="pt-4 px-6">
                    <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                    @if($errors->any())
                        <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li class="text-red-400">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->

                    <div class="mb-6 text-center">
                        <label class="block text-sm font-medium mb-2 cursor-pointer" for="image">
                            <!-- 非表示のファイル選択フィールド -->
                            <input id="image" class="hidden" type="file" accept='image/*' name="image">
                            <div class="flex justify-center items-center">
                                <img id="previewImage" src="{{ asset('storage/' . $user->image) }}" data-noimage="{{ asset('storage/' . $user->image) }}" alt="" class="rounded-full shadow-md w-32 h-32 object-cover cursor-pointer">
                            </div>
                        </label>
                    </div>

        
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name',$user->name) }}">
                        @error('name')
                        <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="email">メールアドレス</label>
                        <input id="email" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="email" name="email" value="{{ old('email',$user->email) }}">
                        @error('email')
                        <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password">パスワード</label>
                        <input id="password" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password">
                        @error('password')
                        <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="password_confirmation">パスワード(確認)</label>
                        <input id="password_confirmation" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="password" name="password_confirmation">
                        @error('password')
                        <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    </div> --}}


                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="introduction">自己紹介</label>
                        <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="introduction" rows="2">{{ old('introduction',$user->introduction) }}</textarea>
                        @error('introduction')
                        <p class="text-red-400">{{ $message }}</p>
                        @enderror
                        
                    </div>
                </div>

                <div class="relative flex  flex-col  justify-center sm:py-12">
                    <button class="bg-gradient-to-b mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 w-52 py-3 rounded-2xl shadow-blue-400 shadow-md hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">変更を保存</button>
                </div>

            </form>

            <form action="{{ route('mypage.users.destroy',Auth::user()->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="relative flex  flex-col  justify-center mt-5">
                    <button class="mx-auto  border-b-red-200 text-red-800 text-sm">アカウントを削除</button>
                </div>
            </form>
            
        </div>
    </div>
</section>

<script>
    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })
</script>
@endsection