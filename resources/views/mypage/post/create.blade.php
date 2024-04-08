@extends('layouts.default')

@section('content')
<div class="py-10 bg-opacity-10 text-center" style="">
    <div class="container">

        <div class="flex justify-center items-center h-screen">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8">
                @csrf
        
                <div class="mb-8">
                    <!-- エラーメッセージ -->
                    @if ($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- <div class="mb-9">
                        <label class="block text-sm font-medium mb-2" for="user_id">ユーザーID</label>
                        <input id="user_id" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="user_id" value="{{ \Auth::user()->id }}">
                    </div> --}}
                   
                    <div class="mb-6 text-center">
                        <label class="block text-sm font-medium mb-2 cursor-pointer" for="image">
                            <!-- 非表示のファイル選択フィールド -->
                            <input id="image" class="hidden" type="file" accept='image/*' name="image">
                            <div class="flex justify-center items-center">
                                <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64 h-64 object-cover cursor-pointer">
                            </div>
                        </label>
                    </div>
                    
                    <!-- JavaScriptを使用して、画像をクリックしたときにファイル選択フィールドをクリックする -->
                    <script>
                        document.getElementById('previewImage').addEventListener('click', function() {
                            document.getElementById('image').click();
                        });
                    </script>
        
                    <div class="mb-6 text-center">
                        <label class="block text-sm font-medium mb-2" for="body">キャプション</label>
                        <div class="flex justify-center items-center">
                            <textarea id="caption" class="block w-72 px-3 py-3 mb-2 text-sm bg-white border rounded" name="caption" rows="5">{{ old('caption') }}</textarea>
                        </div>
                    </div>

                    <div class="mb-6 w-2/3 mx-auto">
                        <select id="reptiles" name="reptiles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>#ハッシュタグ</option>
                            @foreach ($reptiles as $reptile)
                                <option value="{{ $reptile->id }}">{{ $reptile->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pb-4 border-b">
                        {{-- <div class="ml-4">
                            <a href="/" class="flex items-center">
                                <p class="py-2 px-4 text-xs text-white font-semibold bg-black rounded-md">戻る</p>
                            </a>
                        </div>

                        <div class="mr-4">
                            <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">投稿する</button>
                        </div> --}}
                        
                        <div class="relative flex  flex-col  justify-center py-3">
                            <button type="submit"  class="bg-gradient-to-b mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 w-44 py-3 rounded-2xl shadow-blue-400 shadow-md hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">投稿</button>
                        </div>
                        <a href="/" class="relative flex  flex-col  justify-center py-3">
                            <button class="bg-slate-200 mx-auto text-black font-semibold  w-44 py-3 rounded-2xl shadow-black shadow-sm hover border-b border-black hover:shadow-sm transition-all duration-500">戻る</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


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