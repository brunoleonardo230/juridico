<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta charset="utf-8">
    
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>JURIDICO - {{ $title }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
		
        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
		
        <!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>

@include('layouts.header')

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            @include('layouts.sidebar')
        </div>    
        <div class="col-sm-10">
            @include('layouts.msg')
            @yield('content')
        </div>
            
    </div>
</div>
<!-- /Main -->

<footer class="text-center">IDAC - Instituto de Desenvolvimento e Apoio a Cidadania</footer>

	<!-- script references -->
        <!-- jQuery -->
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.maskedinput.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

        <!-- Custom JavaScript -->
        <script src="{{ URL::asset('js/scripts.js') }}"></script>

	</body>

<script>
   jQuery(function($){
       $("#telefone1, #telefone2").mask("(99) 9999-9999");
       $("#celular1, #celular2").mask("(99) 9-9999-9999");
       $("#cpf").mask("999.999.999-99");
       $("#cnpj").mask("99.999.999/9999-99");
       $("#cep").mask("99999-999");
       $("#datanasc").mask("99/99/9999");
       $("#inscricaomunicipal").mask("999999999");
   });
</script>
</html>