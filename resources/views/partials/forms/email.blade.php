@include('partials.forms.input', [
    'label' => 'E-Mail Address',
    'name' => 'email',
    'type' => 'email',
    'value' => Auth::check() ? Auth::user()->email : null, 
    'required' => true,  
])
