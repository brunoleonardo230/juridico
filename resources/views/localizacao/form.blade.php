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
				<label for="localizacao">Localização:</label>
				<input type="text" class="form-control" name="nome" id="nome" placeholder="Localização" value="@if(isset($query)){{$query['nome']}}@endif">
				@if(isset($query))<input type="hidden" id="id" name="id" value="{{$query['id']}}"> @endif
			</div>

			<div class="form-group">
				<label for="uf">Estado:</label>
				<select class="form-control" name="uf" id="uf">
				<option value="0">---Estado---</option>
				 @foreach($estados as $key => $value)
				 	  @if(isset($query) && $value->id == $query['uf'])
				      	<option value="{{$value->id}}" selected>{{ $value->descricao }}</option>
				      @else
				      	<option value="{{$value->id}}">{{ $value->descricao }}</option>
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
