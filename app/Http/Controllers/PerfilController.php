<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserDetails;

class PerfilController extends Controller
{
    public function perfil()
    {
        $alert = Alert::where('ativo', 1)->first();
        $user = User::with('UserDetails')->find(Auth::user()->id);
        return view('perfil', compact('user'), compact('alert'));
    }

    public function updateImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagem = $request->file('image');
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();
            $imagem->move(public_path('img/imagens_utilizadores'), $nomeImagem);
            $user = User::with('UserDetails')->find(Auth::user()->id);

            if (!$user->userDetails) {
                $user->userDetails = new UserDetails();
                $user->userDetails->user_id = $user->id;
            }
            
            $user->userDetails->imagem = '/img/imagens_utilizadores/' . $nomeImagem;
            $user->userDetails->save();
            $alert = Alert::where('ativo', 1)->first();
            return view('perfil', compact('user'), compact('alert'));
        }
    }



}