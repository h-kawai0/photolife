@section('header')
<header class="l-header">

    <a class="p-header__logo" href="">
        <i class="fa fa-camera p-header__icon" aria-hidden="true"></i>
        <h1 class="p-header__title">ふぉとらいふ</h1>
    </a>

    <div class="p-header__hamburger">
        <span class="p-header__sp-menu"></span>
        <span class="p-header__sp-menu"></span>
        <span class="p-header__sp-menu"></span>
    </div>

    <nav class="p-header__nav">
        <ul class="p-header__menu">

            <li class="p-header__item">
            <a class="p-header__link" href="{{ route('top') }}">
            <span class="p-header__title u-text--large">
                ふぉとらいふ
            </span>
            </a>
            </li>
            <li class="p-header__item">
                <a class="p-header__link" href="{{ route('top') }}">TOP</a>
            </li>
            @guest
            <li class="p-header__item">
                <a class="p-header__link" href="{{ route('login') }}">LOGIN</a>
            </li>
            @if (Route::has('register'))
            <li class="p-header__item">
                <a class="p-header__link" href="{{ route('register')}}">REGISTER</a>
            </li>

            @endif
            @else
            <li class="p-header__item">
                <a class="p-header__link" href="">MYPAGE</a>
            </li>
            <li class="p-header__item">
                <a class="p-header__link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">LOGOUT</a>

                <form id="logout-form" action="{{ route('logout' )}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="p-header__item">
                <a class="p-header__link" href="">EDIT</a>
            </li>
            @endguest
            <li class="p-header__item">
                <a class="p-header__link" href="">SEARCH</a>
            </li>
        </ul>
    </nav>

</header>
@endsection