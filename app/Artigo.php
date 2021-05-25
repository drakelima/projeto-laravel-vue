<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function listaArtigos($paginate){
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

        $listaArtigos = DB::table('artigos')
                        ->join('users','users.id','=','artigos.user_id')
                        ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                        ->whereNull('deleted_at')
                        ->paginate($paginate);

        return $listaArtigos;
    }

}
