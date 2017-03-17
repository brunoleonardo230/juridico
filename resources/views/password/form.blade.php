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
				<label for="password">Nova Senha:</label>
				<input type="text" class="form-control" name="password" id="password" placeholder="Digite a nova senha">
				@if(isset($query))<input type="hidden" id="id" name="id" value="{{$query['id']}}"> @endif
			</div>
			<div class="form-group">
				<label for="password2">Confirme a Senha:</label>
				<input type="text" class="form-control" name="password2" id="password2" placeholder="Confirme a nova senha">
			</div>
				<br />
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Salvar" />
					<input type="reset" class="btn btn-danger" value="Limpar" />
				</div>

		</form>
	</div>
</div>

@endsection
