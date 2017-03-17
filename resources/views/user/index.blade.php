@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
      {{ $title }}
      </h1>
   </div>
</div>

<div class="row">
   <div class="col-md-4"><a href="{{ url('/user/register') }}" class="btn btn-success">Cadastrar</a></div>
   <div class="col-md-3 col-md-offset-5">
      <form class="form-inline">
         <div class="form-group">
            <label class="sr-only" for="search">Buscar</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Buscar" required />
         </div>
         <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </form>
   </div>
</div>

<br />

<div class="row">
   <div class="col-md-12">
      <table class="table table-striped table-hover">
         <thead>
            <tr>
               <th>
                  Nome Usuário
               </th>
               <th>
                  Login
               </th>
               <th>
                  Nível
               </th>
            </tr>
         </thead>

         <tbody>
            @foreach($user as $key => $value)
               <tr>
                  <td>{{$value->name}}</td>
                  <td>{{$value->username}}</td>
                  <td>{{$value->nome}}</td>
                  <td>
                     <a href="{{ url('/user/edit/'.$value->iduser) }}"><span class="text-warning glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  </td>
                  <td>
                     <a href="{{ url('/user/delete/'.$value->iduser) }}" onclick="return confirm('Você tem certeza disso?!')"><span class="text-danger glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                  </td>
                  <td>
                     <a href="{{ url('/user/redefinirsenha/'.$value->iduser.'/'.$value->userlogin) }}" onclick="return confirm('Você tem certeza disso?!')"><span class="text-primary glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

@endsection
