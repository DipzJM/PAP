<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil()
    {
        $alert = Alert::where('ativo', 1)->first();
        $user = User::with('UserDetails')->find(Auth::user()->id);
        return view('perfil', compact('user'), compact('alert'));        
    }    

}