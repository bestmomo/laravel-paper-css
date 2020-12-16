@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Login')</div>

    <div class="card-body">
        <form method="POST" action="{{ url('two-factor-challenge') }}">
            @csrf

            <h5 class="card-subtitle text-center">
                <span class="toggle">@lang('Please confirm access to your account by entering the authentication code provided by your authenticator application.')</span>
                <span class="toggle" hidden>@lang('Please confirm access to your account by entering one of your emergency recovery codes.')</span>
            </h5>

            @include('partials.forms.input', [
                'label' => 'Code',
                'name' => 'code',
                'type' => 'text',
                'class' => 'toggle',
            ])

            @include('partials.forms.input', [
                'label' => 'Recovery code',
                'name' => 'recovery_code',
                'type' => 'text',
                'class' => 'toggle',
                'attribute' => 'hidden',
            ])

            @include('partials.forms.submit', [ 
                'text' => 'Login',
                'class' => 'wide',
            ])

            <br><br>

            <div id="command" class="text-center">
                <a href="#" class="toggle">@lang('Use a recovery code')</a>
                <a href="#" class="toggle" hidden>@lang('Use an authentication code')</a>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('#command').addEventListener('click', e => {
                e.preventDefault();            
                document.querySelectorAll('.toggle').forEach((element) => {
                    element.toggleAttribute('hidden');
                });              
            });
        })
    </script>
@endsection