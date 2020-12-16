@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Login')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @include('partials.forms.email')

            @include('partials.forms.password')

            @include('partials.forms.submit', [ 'text' => 'Login', ])

            @if (Route::has('password.request'))
                <a class="paper-btn right" href="{{ route('password.request') }}">
                    @lang('Forgot Your Password?')
                </a>
            @endif

        </form>
    </div>
@endsection
