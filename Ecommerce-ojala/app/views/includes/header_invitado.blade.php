<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tienda</a>
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}" class="navbar-brand"></a>Inicio</li>
                <li><a href="{{URL::to('usuarios/create')}}" class="navbar-brand"></a>Crear Usuario</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Login</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            {{Form::open(array('url' => '/usuario/login','class' => 'navbar-form navbar-left'))}}

                                <div class="form-group">
                                    <input type="text" placeholder="Email" class="form-control" name="email">
                                    <input type="password" placeholder="Password" class="form-control" name="password">
                                </div>
                                <button type="submit" class="btn btn-default btn-block submitBtn">Iniciar Sesion</button>

                            {{Form::close()}}
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>