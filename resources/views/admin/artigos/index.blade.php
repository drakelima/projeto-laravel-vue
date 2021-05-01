@extends('layouts.app')

@section('content')
  <pagina tamanho="12">
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
      <tabela-lista v-bind:titulos="['id','titulo','curso','data']"
        v-bind:itens="{{$listaArtigos}}"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="432746238"
        ordem="asc" ordemCol="2" modal="sim"
      ></tabela-lista>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" placeholder="descricao">
      </div>
      <div class="form-group">
        <label for="conteudo">Conteudo</label>
        <textarea name="conteudo" id="conteudo" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" name="data">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="1234">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Titulo">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" placeholder="descricao" v-model="$store.state.item.descricao">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

  <modal nome="detalhe" :titulo="$store.state.item.titulo">
      <p>@{{$store.state.item.descricao}}</p>
  </modal>
@endsection
