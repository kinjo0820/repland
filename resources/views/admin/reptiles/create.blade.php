@extends('layouts.admin')

@section('content')
<div class="   py-10 bg-opacity-10" style="">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
           
            <form action="{{ route('admin.reptiles.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">爬虫類登録</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                    @if ($errors->any())
                    <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-red-400">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">名前</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name') }}">
                    </div>


                    <div class="mb-6 text-center">
                        <label class="block text-sm font-medium mb-2 cursor-pointer" for="image">
                            <input id="image" class="hidden" type="file" accept='image/*' name="image">
                      
                        <div class="flex justify-center items-center">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded-full shadow-md w-64 h-64 object-cover cursor-pointer">
                        </div>
                        </label>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="body">本文</label>
                        <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body" rows="5">{{ old('body') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="habitat">生息地</label>
                        <input id="habitat" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="habitat" value="{{ old('habitat') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="length">全長</label>
                        <input id="length" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="length" value="{{ old('length') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="lifespan">寿命</label>
                        <input id="lifespan" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="lifespan" value="{{ old('lifespan') }}">
                    </div>

                    <div class="mb-6">
                        
                    </div>
                    

                   
                    <div class="flex">
                        <a href="/admin/reptiles">
                            <p class="py-2 px-4 ml-3 text-xs text-white font-semibold bg-blue-500 rounded-md">戻る</p>
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