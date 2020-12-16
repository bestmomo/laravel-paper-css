@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row flex-center">
            <div class="sm-10 md-8 col">
                <div class="card">
                    @yield('card-content')
                </div>
            </div>
        </div>
    </div>
@endsection