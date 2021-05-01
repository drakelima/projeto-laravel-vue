@extends('layouts.app')

@section('content')
<pagina tamanho="10">
    <painel titulo="Dashboard" cor="bg-escuro">
        <migalhas v-bind:lista="{{ $listaMigalhas }}" ></migalhas>
        <div class="row">
            <div class="col-md-4">
                <caixa quantidade="80" url="{{route('artigos.index')}}" titulo="Artigos" cor="bg-aqua" icone="ion-bag"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="1500" titulo="Usuários" cor="bg-red" icone="ion-person-stalker"></caixa>
            </div>
            <div class="col-md-4">
                <caixa quantidade="3" titulo="Autores" cor="bg-orange" icone="ion-person"></caixa>
            </div>
        </div>
    </painel>
</pagina>
            
    
@endsection
