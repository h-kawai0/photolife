<a href="{{ config('app.url')}}">{{ config('app.name') }}</a><br>
<br>

本メールアドレス宛にパスワードリセットのご依頼がありました。
以下のリンクをクリックすると、パスワードをリセットできます。
このメールに身に覚えがない場合は破棄をお願い致します。
<p>
{{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>