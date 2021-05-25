@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard" cor="bg-escuro">
        <migalhas v-bind:lista="{{ $listaMigalhas }}" ></migalhas>
        <div class="row">
            <div class="col-md-4">
                <caixa quantidade="{{$quantidadeArtigos}}" url="{{route('artigos.index')}}" titulo="Artigos" cor="bg-aqua" icone="ion-bag"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="{{$quantidadeUsuarios}}" url="{{route('usuarios.index')}}" titulo="Usuários" cor="bg-red" icone="ion-person-stalker"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="{{$quantidadeAutores}}" url="{{route('autores.index')}}" titulo="Autores" cor="bg-orange" icone="ion-person"></caixa>
            </div>
        </div>
    </painel>
</pagina>
            
    
@endsection
