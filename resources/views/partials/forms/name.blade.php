@include('partials.forms.input', [
    'label' => 'Name',
    'name' => 'name',
    'type' => 'text',
    'value' => Auth::check() ? Auth::user()->name : null,
    'required' => true, 
])