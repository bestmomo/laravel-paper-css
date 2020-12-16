@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Verify Your Email Address')</div>

    <div class="card-body row flex-center">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                @lang('A fresh verification link has been sent to your email address.')
            </div>
        @endif

        <p>@lang('Before proceeding, please check your email for a verification link.')</p>
        
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            @include('partials.forms.submit', [ 'text' => 'If you did not receive the email click here to request another', ])
        </form>
    </div>
@endsection
