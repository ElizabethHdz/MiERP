<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
require('../../php/conexion.php');//solicitamosla conexion para las consultas

  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: index.php");
  }

  $idUsuario = $_SESSION['Usuario'];//sacamos de la sesion el usuario que se logueo
  if ($_SESSION['Tipo_Usuario'] == 3 || $_SESSION['Tipo_Usuario'] == 4) {
    if (!isset($_SESSION['Productos'])) {
      $_SESSION['Productos'] = array();
    }

  }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/estilosPrincipal.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/owl.carousel.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <title>Bievenido</title>
  </head>
  <body>
    <!--Evaluamos el perfil del usuario para otorgar los privilegios-->
    <nav class="navbar navbar-inverse">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="inicio.php">Mi ERP</a>
       </div>
       <ul class="nav navbar-nav">
         <li class="active"><a href="inicio.php">Inicio</a></li>
         <?php
          if ($_SESSION['Tipo_Usuario'] == 1) {?>
           <li><a href="../registrar.php">Registrar usuario</a></li>
           <li><a href="../direccion/indexdirecciones.php" >Direcciones</a></li>
           <li><a href="../producto/iniciop.php" >Productos</a></li>
           <li><a href="../venta/iniciov.php">Ventas</a> </li>
           <li><a href="compraprov.php">Compras</a></li>
         <?php } else {?>
           <li> <a href="perfil.php">Perfil</a> </li>
           <?php
         }?>
       </ul>
       <ul class="nav navbar-nav navbar-right">
           <li> <a href="compra/fincompra.php"> <?php echo count($_SESSION['Productos']); ?> <span>Finalizar cotizacion</span></a></li>
         <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
       </ul>
     </div>
    </nav>

    <!--imprimimos los datos en pantalla-->
    <!--<h1><?php //echo "Bienvenido ".utf8_decode($row['nombre']); ?></h1>en caso de tener la tabla empelados, con esto y los comentarios de arriba sacamos el nombre y lo imprimimos-->

    <h2>¿Qué deseas hacer?</h2><br>

    <h3> <a href="consultarCot.php">Consultar cotizaciones</a> </h3>
    <h3> <a href="requisicion.php">Realizar una nueva requizición</a> </h3>

  </body>
</html>
