{{ \Auth::user()->name }} 様よりお問い合わせ
下記の内容でお問い合わせがありました
内容を確認しご対応をお願いします。

【お問い合わせ内容】
お名前: {{  \Auth::user()->name }}
メールアドレス: {{  \Auth::user()->email }}
お問い合わせ内容:{{ $contactInfo['body'] }}

