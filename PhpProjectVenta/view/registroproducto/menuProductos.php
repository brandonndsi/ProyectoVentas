<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--CSS-->    
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Menu de Productos</title>
    <h2>
        Menu
    </h2> 
</head>
<body>
    <nav class="navbar navbar-default sidebar" role="navigation" style="padding-left: 1%">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
            <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal  <span style="font-size:16px;" class="pull-right glyphicon glyphicon-home"></span></a>        
        </button>      

        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <ul class="dropdown-menu" role="menu">
                    <li><a href="../registrocategoriaproductoview/RegistroCategoriaProductoView.php" target="_parent" class="btn btn-info">Categoria de Productos</a></li>
                    <li><a href="../registrotamanioproductoview/RegistroTamanioProductoView.php" target="_parent" class="btn btn-info">Tamaño de Productos</a></li>
                    <li><a href="../registrotipoproductoview/RegistroTipoProductoView.php" target="_parent" class="btn btn-info">Tipo de Productos</a></li>
                    <li><a href="../registrocombos/RegistroCombos.php" target="_parent" class="btn btn-info">Combos</a></li>
                </ul>
            </ul>
        </div>
    </nav>
</body>
</html>
