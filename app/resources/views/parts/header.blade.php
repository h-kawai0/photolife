@section('header')


<header-item @isset($user)
user="{{ $user }}"
@endisset></header-item>


@endsection