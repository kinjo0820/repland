@extends('layouts.default')
@section('title', 'お問い合わせ完了')

@section('content')
<section class="pb-24 text-center">
<form method="POST" action="{{ route('contact') }}">
    @csrf
  
    <div class="flex justify-center items-center pt-10">
        <img class="w-40 h-40 rounded-full object-cover" src="{{ asset('storage/' . \Auth::user()->image) }}" alt="">
    </div>
    
    <div class="">
        <label for="name" class="block  font-medium text-xl">{{ \Auth::user()->name }}</label>
    </div>
  
    <div class="mb-10">
        <label for="email" class="block  font-medium text-xs">{{ \Auth::user()->email }}</label>
    </div>
  
    <div class="text-center">
        <p class="mb-3">お問い合わせ内容</p>
        <p style="text-align: left; display: inline-block; margin: 0 auto;">
            <?php echo wordwrap($validated['body'], 60, "<br>\n", true); ?>
        </p>
        <input name="body" value="{{ $validated['body'] }}" type="hidden">
    </div>

    <div class="relative flex  flex-col  justify-center overflow-hidden py-12 text-center text-xs">
        <p>送信される際は、<a href="#" class="text-blue-600 hover:underline">個人情報保護方針</a>に同意したものとします。</p>
        <button type="submit" name="action" value="submit" class="mt-5 bg-gradient-to-b mx-auto text-blue-500 font-semibold from-slate-50 to-blue-100 px-10 py-3 rounded-2xl shadow-blue-400 shadow-md hover border-b border-blue-200 hover:shadow-sm transition-all duration-500">入力内容確認</button>
    </div>

</form>
</section>
  
@endsection