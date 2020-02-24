@section('footer')
<footer class="l-footer @isset($authPage) {{$authPage }} @endisset">
    @if ($msgFlg === true)
    既にアカウントをお持ちの方は<a href="{{ route('login')}}" class="l-footer__link">コチラ</a>
    @else
    CopyRight <span class="l-footer__title">ふぉとらいふ</span>
    @endif

</footer>
@endsection