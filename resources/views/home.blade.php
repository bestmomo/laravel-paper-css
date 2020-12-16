@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row flex-center">
            <div class="sm-12 md-10 col">
                <div class="card">
                    <div class="card-header">@lang('Profile')</div>

                    <div class="card-body">
                        <div class="row">

                            @if (Route::has('profile.edit'))
                                <div class="sm-12 md-6 col">
                                    <a href="{{ route('profile.edit') }}" type="button" class="paper-btn wide text-center">@lang('Profile Information')</a>
                                </div>
                            @endif

                            @if (Route::has('password.edit'))
                                <div class="sm-12 md-6 col">
                                    <a href="{{ route('password.edit') }}" type="button" class="paper-btn wide text-center">@lang('Update Password')</a>
                                </div>
                            @endif

                            @if (Route::has('twofactors'))
                                <div class="sm-12 md-6 col">
                                    <a href="{{ route('twofactors') }}" type="button" class="paper-btn btn-warning-outline wide text-center">@lang('Two Factor Authentication')</a>
                                </div>
                            @endif

                            @if (Route::has('deleteAccount.view'))
                                <div class="sm-12 md-6 col">
                                    <a href="{{ route('deleteAccount.view') }}" type="button" class="paper-btn btn-danger-outline wide text-center">@lang('Delete account')</a>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
