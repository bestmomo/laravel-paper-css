
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <br><br>
    <main class="paper container container-md text-center align-middle">
        <h1>Bienvenue sur notre site !</h1>
        <a href="{{ route('login') }}" type="button" class="paper-btn">@lang('Login')</a>
    </main>
</body>
</html>