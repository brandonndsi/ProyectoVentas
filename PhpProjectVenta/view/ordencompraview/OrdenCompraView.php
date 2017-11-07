<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--CSS-->    
        <link rel="stylesheet" href="../../css/estilo.css">
        <title>Orden de Compra</title>
    <h2>
        Perfilacion
    </h2> 
</head>
<body>
    <nav class="navbar navbar-default sidebar" role="navigation" style="padding-left: 1%">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
            <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> <span style="font-size:16px;" class="pull-right glyphicon glyphicon-home"></span></a>        
        </button>   
        <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li 
                    class="active"><a href="#" class="btn btn-warning" >Cantidad de Productos Vistos <span style="font-size:16px;"></span></a>
                </li>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="../registroeventotoview/RegistroEventoView.php" target="_parent" class="btn btn-info">Agregados</a></li>
                    <li><a href="../productonocompradosview/productoNoCompradoView.php" target="_parent" class="btn btn-info">Eliminados</a></li>
                    <li><a href="../registrotipoproducto/RegistroTipoProducto.php" target="_parent" class="btn btn-info">Mas Vistos</a></li>
                </ul>  
            </ul>
        </div>
    </nav>
</body>
</html>
