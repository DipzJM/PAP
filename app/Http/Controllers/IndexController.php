<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Alert;
use Illuminate\Http\Request;
use App\Models\User;
class IndexController extends Controller
{
    public function indexPage()
    {
        $alert = Alert::where('ativo', 1)->first();
        $user = User::with('UserDetails')->find(Auth::user()->id);
        return view('index', isset($user) ? compact('user') : [], compact('alert'));
    }

}