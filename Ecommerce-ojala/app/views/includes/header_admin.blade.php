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
                <li><a href="{{URL::to('/admin/index')}}" class="navbar-brand">Inicio</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Bienvenido {{Auth::user()->nombre}}<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('admin/orden/index')}}">Gestion Ordenes</a></li>
                        <li><a href="{{URL::to('admin/usuario/index')}}">Gestion Usuarios</a></li>
                        <li><a href="{{URL::to('admin/autor/index')}}">Gestion Autores</a></li>
                        <li><a href="{{URL::to('admin/categoria/index')}}">Gestion Categorias</a></li>
                        <li><a href="{{URL::to('admin/libro/index')}}">Gestion Libros</a></li>
                        <li><a href="{{URL::to('usuario/logout')}}">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>