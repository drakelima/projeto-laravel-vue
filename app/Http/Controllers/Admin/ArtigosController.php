<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Artigo;
use App\User;


class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Admin", "url"=>route('admin')],
            ["titulo"=>"Lista de Artigos", "url"=>""]
        ]);
        /* Forma pior de fazer (deve se fazer no model)

        $listaArtigos = Artigo::select('id','titulo','descricao','user_id','data')->paginate(2);

            foreach ($listaArtigos as $key => $value) {
                //fazendo por find
                //$value->user_id = User::find($value->user_id)->name;

                //fazendo direto pela relação no sistema
                //$value->user_id = $value->user_name;
                //unset($value->user);
            }
        */

        $listaArtigos = Artigo::listaArtigos(3);

        return view('admin.artigos.index', compact('listaMigalhas','listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validacao = Validator::make($data, [
            "titulo" => "required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required"
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        //dd($request->all());
        Artigo::create($data);
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Artigo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validacao = Validator::make($data, [
            "titulo" => "required",
            "descricao" => "required",
            "conteudo" => "required",
            "data" => "required"
        ]);
        
        //dd($request->all());
        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Artigo::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::find($id)->delete();
        return redirect()->back();
    }
}
