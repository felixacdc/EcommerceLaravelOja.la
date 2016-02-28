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
                <li><a href="{{URL::to('/admin/index')}}" class="navbar-brand"></a>Inicio</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">Bienvenido {{Auth::user()->nombre}}<b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('admin/orden/index')}}"></a>Gestion Ordenes</li>
                        <li><a href="{{URL::to('admin/orden/index')}}"></a>Gestion Usuarios</li>
                        <li><a href="{{URL::to('admin/orden/index')}}"></a>Gestion Autores</li>
                        <li><a href="{{URL::to('admin/orden/index')}}"></a>Gestion Categorias</li>
                        <li><a href="{{URL::to('admin/orden/index')}}"></a>Gestion Libros</li>
                        <li><a href="{{URL::to('usuario/logout')}}"></a>Cerrar Sesion</li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>