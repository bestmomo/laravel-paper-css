@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Reset Password')</div>

    <div class="card-body">

        @include('partials.forms.alertsuccess')

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            @include('partials.forms.email')

            @include('partials.forms.submit', [ 'text' => 'Send Password Reset Link', ])

        </form>
    </div>
@endsection
