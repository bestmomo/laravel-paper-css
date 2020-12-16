<form 
    id="{{ $id }}" 
    action="{{ $action }}" 
    method="POST" 
    hidden>
    @csrf
    @isset($method) @method($method) @endisset
</form>