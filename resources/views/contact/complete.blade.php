@extends('layouts.default')
@section('title', 'Repland | お問い合わせ完了')

@section('content')
        <section class="pt-2">
          <div class="container mx-auto">

            <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">お問い合わせが完了しました</h1>
          </div>
        </section>

        <section class="pb-64 ">
          <div class="container mx-auto text-center ">
            <p class="inline-block text-left">
              お問い合わせいただきありがとうございました。<br>
              通常お問い合わせから3営業日以内に登録頂いたメールアドレスに返信させていただきます<br>
              恐れ入りますが、しばらくお待ちください。<br>
              合わせて、t.kinjo820@gmail.com からの返信が受信できるように設定のご確認をお願い致します。<br>
              なお、登録いただいたメールアドレス宛に受付完了メールを配信しております。<br>
              完了メールが届かない場合、処理が正常に行われていない可能性があります。<br>
              大変お手数ですが、再度お問い合わせの手続きをお願い致します。<br>
            </p>

            <p class="pt-10"><a href="/" class="text-blue-600 hover:underline">トップページ</a>に戻る</p>
          </div>
        </section>
@endsection