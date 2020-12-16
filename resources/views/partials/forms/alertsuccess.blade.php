@if (session('status'))
    <div class="alert alert-success" role="alert">
        @lang(session('status'))
    </div>
@endif