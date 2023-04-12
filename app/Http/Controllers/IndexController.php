<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function indexPage()
    {
        $alert = Alert::where('ativo', 1)->first();
        return view('index', compact('alert'));
    }

}