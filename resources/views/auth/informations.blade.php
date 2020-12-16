@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Profile Information')</div>

    <div class="card-body">

        @include('partials.forms.alertsuccess')

        <h5 class="card-subtitle text-center">@lang("Update your account's profile information and email address.")</h5>
        <br>
        
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')

            @include('partials.forms.name')

            @include('partials.forms.email')

            <a href="{{ route('home') }}" type="button" class="paper-btn">@lang('<- Back')</a>

            @include('partials.forms.submit', [ 
                'text' => 'Save',
                'class' => 'right',
            ])

        </form>
    </div>
@endsection
