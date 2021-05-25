<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artigo;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Admin", "url"=>""]
        ]);

        $quantidadeArtigos = Artigo::count();
        $quantidadeUsuarios = User::count();
        $quantidadeAutores = User::where('autor','=','S')->count();

        return view('admin', compact('listaMigalhas','quantidadeArtigos','quantidadeUsuarios','quantidadeAutores'));
    }
}
