<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>El Expresso</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/estilos.css">
     <script type="text/javascript" src="../../js/jquery.min.js"></script>
   

    <style>
      #muro_tags{
          background-image: url(../../images/fondob.jpg);
          background-attachment: fixed;
          background-position: top right;
          margin-top: 60px;
          margin-left: 30px;
      }
   
    </style>

</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" >
    
    <div class="container-fluid" >
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-target="#menuOpciones" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

      </div>
     
      <a class="navbar-brand" href="../../index.php">El Expresito</a>
      
      <div class="collapse navbar-collapse " id="menuOpciones">
        
        <ul class="nav navbar-nav">
          <li><a href="../../index.php">Principal</a></li>
          <li><a href="../catalogo/Catalogo.php">Menu</a></li>
        </ul>

        <form class="navbar-form navbar-right" id="barraBusqueda">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar en la Web">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="" data-toggle="modal" data-target="#NuevaVenta-modal">Nuevo Express</a></li>
          <li><a href="" data-toggle="modal" data-target="#registrar-modal">Registar</a></li>
          <li><a href="" data-toggle="modal" data-target="#login-modal">Ingresar</a>
          </li>          
        </ul>
      </div>
    </div>
    
  </nav>
  
  <br>
  <div="container" >      
    <div style="border: 450px; margin-top: -25px;" class"img-responsive row" >
      <article height="60" class="col-md-2">
        <div id="muro_tags">
          <ul>
            <font face="Comic Sans MS,arial,verdana" color="black" size="2">
              <li> </li>
              <li style="padding-top:4px;"><a href="">Promociones</a></li><br>
              <li> </li>
              <li style="padding-top:4px;"><a href="">Combos</a></li><br>
              <li> </li>
              <li style="padding-top:4px;"><a href="">De Temporada</a></li><br>
              <li> </li>
              <li style="padding-top:4px;"><a href="">Novedades</a></li><br>   
              <li> </li>           
              <li style="padding-top:4px;"><a href="">Proximamente</a></li><br>
              <li> </li>

              <br>
            </font>
          </ul>
        </div>
      </article>
      
      <aside class="col-md-9">
        <h2>
          <font color="Lime">
            Lo más Nuevo:
          </font>
        </h2>
        <div id="myCarousel" class="carousel slide" >
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
  <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item"><img  src="../../images/combo1.jpg" alt="banner1"></div>
            <div class="item"><img  src="../../images/combo2.jpg" alt="banner2"></div>
            <div class="item"><img  src="../../images/combi.jpg" alt="banner3"></div>
          </div>
<!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
      </aside>     
    </div>
  </div>
</div>


 <!--Modal Nueva Pedido-->
  <div class="modal fade" id="NuevaVenta-modal" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h1><span class=""></span> Nuevo Pedido</h1>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                   <form role="form">
                   <div class="form-group">
                            <div class="row">
                              <div class="col-xs-8">
                                <label for="IdVenta"><span class=""></span>NumeroVenta</label>
                                <input type="text" class="form-control col-sm-2" id="IdVenta" placeholder="Nueva Venta">
                              </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span> Empleado</label>
                              <input type="text" class="form-control col-sm-2" id="IdEmpleado" placeholder="Nombre Empleado">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span>Nombre Producto </label>
                              <input type="text" class="form-control col-sm-2" id="IdProducto" placeholder="Nombre Producto">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span>Zona </label>
                              <input type="text" class="form-control col-sm-2" id="IdZona" placeholder="Nombre Zona">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span>Nombre Cliente </label>
                              <input type="text" class="form-control col-sm-2" id="IdCliente" placeholder="Nombre Cliente">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span>Numero Celuar </label>
                              <input type="text" class="form-control col-sm-2" id="IdCelularCliente" placeholder="Numero Cliente">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-8">
                              <label for="userRegistrar"><span class=""></span>Total</label>
                              <input type="text" class="form-control col-sm-2" id="IdTotal" placeholder="Total a pagar">
                          </div>
                        </div>
                    </div>

                     
                   </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span> Cancelar</span></button>
                  <button type="submit"  id="btnAceptarR" class="btn btn-success btn-default pull-right"><span> Procesar</span></button>
                 </div>
      </div>
  </div>

  <!--Modal Registrar-->
  <div class="modal fade" id="registrar-modal" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header" style="padding:35px 30px;">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h1><span class="glyphicon glyphicon-user"></span> Registrarme</h1>
                 </div>
                 <div class="modal-body" style="padding:40px 50px;">
                   <form role="form" id="form-Registrar">
                        <div class="form-group">
                          <div class="row">
                           <div class="col-xs-8">
                             <label for="userRegistrar"><span class="glyphicon glyphicon-user"></span>  *Usuario</label>
                             <input type="text" class="form-control col-sm-2" id="userRegistrar" placeholder="Ingrese Usuario">
                             <div id="mensUser" class="errores alert alert-danger">*Ingrese Usuario</div>
                           </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-xs-8">
                                <label for="correoRegistrar"><span class="glyphicon glyphicon-envelope"></span>*Correo Electronico</label>
                                <input type="text" class="form-control col-sm-2" id="correoRegistrar" placeholder="Ingrese Correo Electronico">
                                <div id="mensCorreo" class="errores alert alert-danger">*Ingrese Correo</div>
                              </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="row">
                              <div class="col-xs-8">
                                <label for="passRegistrar"><span class="glyphicon glyphicon-lock"></span>*Password</label>
                                <input type="password" class="form-control" id="passRegistrar" placeholder="Ingrese Password">
                                <div id="mensPass1" class="errores2 alert alert-danger">*Ingrese Password</div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-8">
                                  <label for="pass2Registrar"><span class="glyphicon glyphicon-lock"></span>*Ingrese otra vez la Password</label>
                                  <input type="password" class="form-control" id="pass2Registrar" placeholder="Confirme la Password">
                                  <div id="mensPass2" class="errores2 alert alert-danger">*Password no coinciden</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="row">
                              <div class="col-xs-8">
                                <label for="fechaRegistrar"><span class="glyphicon glyphicon-calendar"></span>*Fecha Nacimiento</label>
                                <input type="date" class="form-control" data-date-format="dd MM yyyy" id="fechaRegistrar" placeholder="Dia/Mes/Año" >
                                <div id="mensFecha" class="errores2 alert alert-danger">Ingrese fecha</div>

                              </div>
                            </div>
                        </div>


                   </form>
                 </div>
                 <div class="modal-footer">
                  <div class="checkbox" >
                         <label><input type="checkbox" id="checkRegistrar" unchecked >Acepto los <a href="#">Términos y condiciones</a></label>
                   </div>
                   <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"> Cancelar</span></button>
                   <button type="submit"  id="btnAceptarR" class="btn btn-success btn-default pull-right"><span class="glyphicon glyphicon-ok" > Aceptar</span></button>
                 </div>
            </div>
      </div>
  </div> 

  <!--Modal Login-->

  <div class="modal fade" id="login-modal" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h1><span class="glyphicon glyphicon-user"></span> Iniciar sesion</h1>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                   <form role="form">
                   <div class="form-group">
                      <label for="Usuario"><span class="glyphicon glyphicon-user"></span>Usuario</label>
                      <input type="text" class="form-control" id="user_login" placeholder="Ingrese Usuario">
                   <div class="form-group">
                   <br/>
                      <label for="Password"><span class="glyphicon glyphicon-lock"></span>Contraseña</label>
                      <input type="password" class="form-control" id="pass_login" placeholder="Ingrese Password">
                   </div>
                   <button type="button" class="btn btn-success btn-block" onclick="login()"><span class="glyphicon glyphicon-share" >  Login</span></button>
                   </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Cancelar</button>
                   <p>No tengo Cuenta? <a href="" data-toggle="modal" data-target="#registrar-modal" data-dismiss="modal">Registrarme </a></p>
                   <p>Olvide mi contraseña <a href="#">Contraseña?</p>
                </div>
          </div>
      </div>
  </div>


  <footer>
    <HR align="left" size="2" width="1310" color="Green" noshade>
    <p align="center"> <font face="arial" color="Black">
                          Derechos Reservados<br>
                          Sistemas JBD<br>
                           Expresso<br>
                          2017°<br>
                         </font>
      </p>
  </footer>


    
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

</body>
</html>

