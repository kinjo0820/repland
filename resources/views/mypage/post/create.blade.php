@extends('layouts.default')
@section('title', 'Repland | 投稿')

@section('content')
<div class="py-  text-center" style="">
    <div class="container">

        <div class="flex justify-center items-center ">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8">
                @csrf
        
                <div class="">
                    <!-- エラーメッセージ -->
                    @if ($errors->any())
                    <div class="mb-4 py-4 px-6 border border-red-300 bg-red-50 rounded">
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
                   
                    <div class="mb-6 mt-10 md:mt-0 text-center">
                        <label class="block text-sm font-medium mb-2 cursor-pointer" for="image">
                            <!-- 非表示のファイル選択フィールド -->
                            <input id="image" class="hidden" type="file" accept='image/*' name="image">
                            <div class="flex justify-center items-center">
                                <img id="previewImage" src="/images/post/no_image.jpg" data-noimage="/images/post/no_image.jpg" alt="" class="rounded shadow-md w-80 h-80 object-cover cursor-pointer">
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
                        <select id="reptiles" name="reptiles" class=" border  text-sm rounded-lg  p-2">
                            <option value="" disabled selected>#ハッシュタグ</option>
                            @foreach ($reptiles as $reptile)
                                <option value="{{ $reptile->id }}">{{ $reptile->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pb-4 border-b">
                        
                        <div class="flex  flex-col  justify-center py-3">
                            <button type="submit"  class=" mx-auto text-white bg-gray-600 font-semibold  w-44 py-3 rounded-2xl  border-b">投稿する</button>
                        </div>
                        <a href="/" class="flex  flex-col  justify-center py-3">
                            <button class="bg-slate-200 mx-auto text-black font-semibold  w-44 py-3 rounded-2xl  shadow-sm hover border-b border-black ">戻る</button>
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