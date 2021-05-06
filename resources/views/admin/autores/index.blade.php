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
    <painel titulo="Lista de Autores">
      <migalhas v-bind:lista="{{ $listaMigalhas }}"></migalhas>
      <tabela-lista v-bind:titulos="['id','nome','email']"
        v-bind:itens="{{json_encode($listaModelo)}}"
        criar="#criar" detalhe="autores/" editar="/admin/autores/"
        ordem="desc" ordemCol="1" modal="sim"
      ></tabela-lista>
      <div align="center">
        {{ $listaModelo }}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('autores.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="nome" value="{{old('name')}}">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{old('email')}}">
      </div>
      <div class="form-group">
        <label for="autor">Autor</label>
        <select name="autor" id="autor" v-model="$store.state.item.autor">
          <option {{old('autor') && old('autor') == 'N' ? 'selected' : ''}} value="N">Não</option>
          <option {{old('autor') && old('autor') == 'N' ? 'selected' : ''}} {{!old('autor') ? 'selected':''}} value="S">Sim</option>
        </select>        
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>
  </modal>

  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" css="" :action="'/admin/autores/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="email">Descrição</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" v-model="$store.state.item.email">
      </div>
      <div class="form-group">
        <label for="autor">Autor</label>
        <select name="autor" id="autor" v-model="$store.state.item.autor">
          <option value="N">Não</option>
          <option value="S">Sim</option>
        </select>        
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" v-model="$store.state.item.password">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>

  <modal nome="detalhe" :titulo="$store.state.item.name">
      <p>@{{$store.state.item.email}}</p>
  </modal>
@endsection
