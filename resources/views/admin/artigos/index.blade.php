@extends('layouts.app')

@section('content')
  <pagina tamanho="12">

    @if($errors->all())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button style="background: black" type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
      @foreach ($errors->all() as $key => $value)
        <li><strong>{{$value}}</strong></li>
      @endforeach
    </div>
    @endif
    <painel titulo="Lista de Artigos">
      <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
      <tabela-lista v-bind:titulos="['id','titulo','descrição','Autor','data']"
        v-bind:itens="{{json_encode($listaArtigos)}}"
        criar="#criar" detalhe="artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
        ordem="desc" ordemCol="1" modal="sim"
      ></tabela-lista>
      <div align="center">
        {{ $listaArtigos }}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{old('titulo')}}">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao" value="{{old('descricao')}}">
      </div>
      <div class="form-group">
        <label for="addConteudo">Conteudo</label>

        <vue-ckeditor
        id="addConteudo"
        name="conteudo"
        value="{{old('conteudo')}}" 
        :config="{
          toolbar: [
            'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'
          ],
          height: 300
        }">
        </vue-ckeditor>
      </div>
      <div class="form-group">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" name="data" value="{{old('data')}}">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" :action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Titulo">
      </div>
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao" v-model="$store.state.item.descricao">
      </div>
      <div class="form-group">
        <label for="editconteudo">Conteudo</label>
        <textarea name="conteudo" id="editconteudo" class="form-control" v-model="$store.state.item.conteudo"></textarea>
      </div>
      <div class="form-group">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" name="data" v-model="$store.state.item.data">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

  <modal nome="detalhe" :titulo="$store.state.item.titulo">
      <p>@{{$store.state.item.descricao}}</p>
      <p>@{{$store.state.item.conteudo}}</p>
  </modal>
@endsection
