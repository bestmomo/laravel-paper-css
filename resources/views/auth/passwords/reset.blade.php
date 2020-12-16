@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Reset Password')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            @include('partials.forms.email')

            @include('partials.forms.password')

            @include('partials.forms.password-confirm')

            @include('partials.forms.submit', [ 'text' => 'Reset Password', ])

        </form>
    </div>
@endsection
