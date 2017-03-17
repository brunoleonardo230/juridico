@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
      {{ $title }}
      </h1>
   </div>
</div>

@include('layouts.msg')
@include('layouts.erro')

<div class="row">
	<div class="col-lg-9">
		<form action="{{ url($url) }}" method="post">
		{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nome Usuário:</label>
				<input type="text" class="form-control" name="name" id="name" placeholder="Primeiro Nome" value="@if(isset($query)){{$query['name']}}@endif">
				@if(isset($query))<input type="hidden" id="id" name="id" value="{{$query['id']}}"> @endif
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="@if(isset($query)){{$query['email']}}@endif">
			</div>
			
			<div class="form-group">
				<label for="username">Login:</label>
				<input type="text" class="form-control" name="username" id="username" placeholder="Login" value="@if(isset($query)){{$query['username']}}@endif">
			</div>
			<div class="form-group">
				<label for="uf">Nivel de Usuário:</label>
				<select class="form-control" name="nivelacesso" id="nivelacesso">
				<option value="0">---Nivel de Usuário---</option>
				 @foreach($niveluser as $key => $value)
				 	  @if(isset($query) && $value->id == $query['nivelacesso'])
				      	<option value="{{$value->id}}" selected>{{ $value->nome }}</option>
				      @else
				      	<option value="{{$value->id}}">{{ $value->nome }}</option>
				      @endif
				 @endforeach
				</select>
			</div>
				<br />
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Cadastrar" />
					<input type="reset" class="btn btn-danger" value="Limpar" />
				</div>

		</form>
	</div>
</div>

@endsection
