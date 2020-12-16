@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Confirm Password')</div>

    <div class="card-body">        
        <h5 class="card-subtitle text-center">@lang('Please confirm your password before continuing.')</h5>
        <hr>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            @include('partials.forms.password')

            @include('partials.forms.submit', [ 'text' => 'Confirm Password', ])

            @if (Route::has('password.request'))
                <a class="paper-btn right" href="{{ route('password.request') }}">
                    @lang('Forgot Your Password?')
                </a>
            @endif

        </form>
    </div>
@endsection
