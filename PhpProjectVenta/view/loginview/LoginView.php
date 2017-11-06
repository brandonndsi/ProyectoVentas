<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" charset=iso-8859-1" />
<meta charset="utf-8">
<title>Iniciar Sesi&oacute;n</title>

<!-- CSS -->
<link rel="stylesheet" href="../../css/estilo.css">

</head>
<body>
    <div class="page-container">
        <h1 align="center">Iniciar Sesi&oacute;n</h1>
        <form action="../../business/sesionaccion/SesionIniciarAccion.php" method="post" name="frm_ingreso">
            <table width="500" align="center">

                <tr>
                <td>    
                <input name="correo" type="emal" id="correo" class="username" size="30" placeholder="Correo Electr&oacute;nico" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/>
                </td>
                </tr>
                <tr>
                <td>     
                <input name="contrasenia" type="password" id="contrasenia" class="password" size="30" placeholder="Contrase&ntilde;a" required/>
                </td>
                </tr>
                <tr>
                <td >
                <button type="submit" class="btn btn-success"name="Entrar">Iniciar Sesi&oacute;n</button>
                </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
