<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DeleteAccount extends Controller
{
    public function __invoke()
    {
        Auth::user()->fresh()->delete();

        Auth::logout();

        return redirect()->route('welcome');
    }
}
