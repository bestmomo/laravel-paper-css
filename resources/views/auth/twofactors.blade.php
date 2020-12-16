@extends('layouts.card')

@section('card-content')
    <div class="card-header">@lang('Two Factor Authentication')</div>

    <div class="card-body">
        <h5 class="card-subtitle text-center">
            @lang('Add additional security to your account using two factor authentication.')</h5>
        <br>

        {{-- Forms --}}
        @include('partials.forms.form', [
            'id' => 'twofactors-form',
            'action' => url('user/two-factor-authentication'),
        ])

        @include('partials.forms.form', [
            'id' => 'twofactors-form-delete',
            'action' => url('user/two-factor-authentication'),
            'method' => 'DELETE',
        ])

        {{-- Not enabled --}}
        @if(empty(Auth::user()->two_factor_secret))
            <h4 class="card-title">
                @lang('You have not enabled two factor authentication.')
            </h4>
            <p class="card-text">
                @lang("When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.")
            </p>         
            <button 
                class="wide text-center"
                onclick="document.getElementById('twofactors-form').submit();">
                @lang('Enable')
            </button>

        {{-- Enabled --}}
        @else
            <h4 class="card-title">
                @lang('You have enabled two factor authentication.')
            </h4>
            <p class="card-text">
                @lang("When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application.")
            </p>

            {{-- Reload --}}
            @if (session('status') == 'two-factor-authentication-enabled')
                <p>@lang("Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application.")</p>      
                <p>{!! Auth::user()->twoFactorQrCodeSvg() !!}</p>
            @endif

            <span id="codes" @unless (session('status')) hidden @endunless>
                <p class="card-text">
                    @lang('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.')
                </p>  
                <div id="codeList" class="alert alert-secondary">
                    @foreach (json_decode(decrypt(Auth::user()->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>          
                <button id="recoveryButton">
                    @lang('REGENERATE RECOVERY CODES')
                </button>
            </span>
          
            @unless (session('status'))
                <button 
                    onclick="document.getElementById('codes').toggleAttribute('hidden'); this.toggleAttribute('hidden');">
                    @lang('SHOW RECOVERY CODES')
                </button>
            @endunless

            <button
                class="btn-danger right"
                onclick="document.getElementById('twofactors-form-delete').submit();">
                @lang('DISABLE')
            </button>

        @endif
    </div>
@endsection

@section('scripts')
    <script>

        const sendRequest = async (method) => {
            
            const response = await fetch('{{ url('user/two-factor-recovery-codes') }}', { 
                method: method,
                headers: { 
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if(response.ok) {
                return response.json();
            }
        }    


        const regenerateCodes = async () => {

            await sendRequest('POST');
            const data = await sendRequest('GET');
            
            let dom = '';
            for(element of data) {
                dom += '<div>' + element + '</div>';
            }
            document.querySelector('#codeList').innerHTML = dom;         
        }

        window.addEventListener('DOMContentLoaded', () => {
            document.querySelector('#recoveryButton').addEventListener('click', regenerateCodes);
        })

    </script>
@endsection
