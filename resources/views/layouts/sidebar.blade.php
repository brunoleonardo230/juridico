<!-- Left column -->
    <a href="#"><strong><i class="glyphicon glyphicon-link"></i>Sistema</strong></a>

    <hr>

    <ul class="nav nav-stacked">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#config"><i class="glyphicon glyphicon-wrench"></i> Configurações <i class="glyphicon glyphicon-chevron-right"></i></a>
            <ul class="nav nav-stacked collapse" id="config">
                <li><a href="#"> Localização</a></li>
                <li><a href="#"> Categoria do Processo</a></li>
                <li><a href="#"> SucCatedoria do Processo</a></li>
                <li><a href="#"> Juízo</a></li>
                <li><a href="#"> Tribunal</a></li>
                <li><a href="#"> Estagio do Processo</a></li>
            </ul>
        </li>

        <li><a href="{{ url('/user') }}"><i class="glyphicon glyphicon-user"></i> Usuários</a></li>

        <li><a href="{{ url('/password/'.session()->get('user')['id']) }}"><i class="glyphicon glyphicon-refresh"></i> Trocar Senha</a></li>
        
    </ul>

    

<!-- /col-3 -->