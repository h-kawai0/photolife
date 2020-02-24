@section('footer')
<footer class="l-footer @isset($authPage) {{$authPage }} @endisset">

    @switch($msgFlg)
        @case(1)
        既にアカウントをお持ちの方は<a href="{{ route('login')}}" class="l-footer__link">コチラ</a>         
            @break
        @case(2)
        新規登録の方は<a href="{{ route('register')}}" class="l-footer__link">コチラ</a>         

        @break
        @default
        CopyRight <span class="l-footer__title">ふぉとらいふ</span>  
    @endswitch

</footer>
@endsection