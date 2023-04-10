<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil()
    {
        $user  = User::find(Auth::user()->id);
        return view('perfil',compact('user'));
    }
}
