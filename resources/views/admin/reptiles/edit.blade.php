@extends('layouts.admin')

@section('content')
<div class="  py-10 bg-opacity-10" style="">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
           
            <form action="{{ route('admin.reptiles.update',['reptile' => $reptile->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">爬虫類編集</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">更新</button>
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
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name',$reptile->name) }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像＊正方形</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="{{ asset('storage/'. $reptile->image) }}" data-noimage="{{ asset('storage/'. $reptile->image) }}" alt="" class="rounded shadow-md w-64">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="body">本文</label>
                        <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body" rows="5">{{ old('body',$reptile->body) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="habitat">生息地</label>
                        <input id="habitat" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="habitat" value="{{ old('habitat',$reptile->habitat) }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="length">全長</label>
                        <input id="length" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="length" value="{{ old('length',$reptile->length) }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="lifespan">寿命</label>
                        <input id="lifespan" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="lifespan" value="{{ old('lifespan',$reptile->lifespan) }}">
                    </div>
                  
                    
                    
                </div>
            </form>
            <div class="flex justify-between">

                <a href="/admin/reptiles">
                    <p class="py-2 px-4 ml-3 text-xs text-white font-semibold bg-blue-500 rounded-md">戻る</p>
                </a>
        
                <form action="{{ route('admin.reptiles.destroy',['reptile' => $reptile]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="py-2 px-4 ml-3 text-xs text-white font-semibold bg-red-500 rounded-md">削除</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    
    $('#js-pulldown').select2();

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