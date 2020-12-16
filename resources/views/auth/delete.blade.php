@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Delete account')</div>

    <div class="card-body">
        <form method="POST" action="{{ route('deleteAccount.delete') }}">
            @csrf
            @method('PUT')

            <h5 class="card-subtitle text-center">
                @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')
            </h5>
            
            <a href="{{ route('home') }}" type="button" class="paper-btn">@lang('<- Back')</a>

            @include('partials.forms.submit', [ 
                'text' => 'Delete account',
                'class' => 'btn-danger right',
            ])

        </form>
    </div>
@endsection