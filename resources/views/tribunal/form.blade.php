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
				<label for="nome">Nome Tribunal:</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Tribunal" value="@if(isset($query)){{$query['nome']}}@endif">
				@if(isset($query))<input type="hidden" id="id" name="id" value="{{$query['id']}}"> @endif
			</div>

			<div class="form-group">
				<label for="idlocalizacao">Localização:</label>
				<select class="form-control" name="idlocalizacao" id="idlocalizacao">
				<option value="0">---Localização---</option>
				 @foreach($localizacao as $key => $value)
				 	  @if(isset($query) && $value->id == $query['idlocalizacao'])
				      	<option value="{{$value->id}}" selected>{{ $value->nome }}</option>
				      @else
				      	<option value="{{$value->id}}">{{ $value->nome }}</option>
				      @endif
				 @endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="idtribunalcategoria">Juízo:</label>
				<select class="form-control" name="idtribunalcategoria" id="idtribunalcategoria">
				<option value="0">---Juízo---</option>
				 @foreach($categoriatribunal as $key => $value)
				 	  @if(isset($query) && $value->id == $query['idtribunalcategoria'])
				      	<option value="{{$value->id}}" selected>{{ $value->nome }}</option>
				      @else
				      	<option value="{{$value->id}}">{{ $value->nome }}</option>
				      @endif
				 @endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="descrocao">Descrição:</label>
				<textarea class="form-control" name="descricao" id="descricao">@if(isset($query)){{$query['descricao']}}@endif</textarea>
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
