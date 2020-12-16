@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Register')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            @include('partials.forms.name')

            @include('partials.forms.email')

            @include('partials.forms.password')

            @include('partials.forms.password-confirm')

            @include('partials.forms.submit', [ 'text' => 'Register', ])
                   
        </form>
    </div>
@endsection
