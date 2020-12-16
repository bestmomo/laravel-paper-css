@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Update Password')</div>

    <div class="card-body">

        @include('partials.forms.alertsuccess')

        <h5 class="card-subtitle text-center">@lang("Ensure your account is using a long, random password to stay secure.")</h5>
        <br>
        
        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            @include('partials.forms.input', [
                'label' => 'Current Password',
                'name' => 'current_password',
                'type' => 'password',
                'required' => true,   
            ])

            @include('partials.forms.input', [
                'label' => 'New Password',
                'name' => 'password',
                'type' => 'password',
                'required' => true,   
            ])

            @include('partials.forms.password-confirm')

            <a href="{{ route('home') }}" type="button" class="paper-btn">@lang('<- Back')</a>

            @include('partials.forms.submit', [ 
                'text' => 'Save',
                'class' => 'right',
            ])

        </form>
    </div>
@endsection
