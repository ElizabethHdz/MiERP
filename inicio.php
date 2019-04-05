<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
require('php/conexion.php');//solicitamosla conexion para las consultas

  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: index.php");
  }

  $idUsuario = $_SESSION['Usuario'];//sacamos de la sesion el usuario que se logueo
  if (isset($_SESSION['Tipo_Usuario'])) {
    if (!isset($_SESSION['Productos'])) {
      $_SESSION['Productos'] = array();
      $_SESSION['Productos2'] = array();
    }

  }
  //
  $sqlP = "SELECT * FROM producto WHERE Id_Producto IN(SELECT Id_Producto FROM inventario WHERE Cantidad > 0);";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultP = $mysqli->query($sqlP);//ejecutamos la consulta y guardamos

  if (isset($_GET['Id_Producto'])) {
      $valor = $_GET['Id_Producto'];
      array_push($_SESSION['Productos'], $valor);
  }

  //var_dump($_SESSION['Productos']);
  $_SESSION['Productos2'] = array_count_values($_SESSION['Productos']);


 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->
     <script src="js/jquery-3.3.1.min.js"></script>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/bootstrap.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="css/estilosPrincipal.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/responsive.css">
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
            <li><a href="registrar.php">Registrar usuario</a></li>
            <li><a href="direccion/indexdirecciones.php" >Direcciones</a></li>
            <li><a href="producto/iniciop.php" >Productos</a></li>
            <li><a href="venta/iniciov.php">Ventas</a> </li>
            <li><a href="comprasprov/compraprov.php">Compras</a></li>
            <li><a href="inventario/mostrarinventario.php">Inventario</a></li>
          <?php } else {?>
            <li> <a href="perfil.php">Perfil</a> </li>
            <?php
          }?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li> <a href="compra/fincompra.php"> <?php echo count($_SESSION['Productos']); ?> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            <li> <a href="/compra/miscompras.php"> Mis compras</a> </li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
        </ul>
      </div>
     </nav>

     <!--imprimimos los datos en pantalla-->
     <!--<h1><?php //echo "Bienvenido ".utf8_decode($row['nombre']); ?></h1>en caso de tener la tabla empelados, con esto y los comentarios de arriba sacamos el nombre y lo imprimimos-->
     <h1><?php echo "Bienvenido ".utf8_decode($_SESSION['Usuario']); ?></h1>

     <div class="pantallaproductos">
       <?php  while ($row = $resultP->fetch_assoc()) {
         if ($row['Bandera']  == 1) {
         ?>
       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
 				<div class="service">
 					<img src="img/chivas.png">
 					<h2><?php echo $row['Nombre']; ?></h2>
 					<div class="service_hoverly">
 						<i class="fa fa-glass"></i>
 						<h2><?php echo $row['Precio_Venta']; ?></h2>
 						<p><?php echo $row['Descripcion']; ?> </p>
            <?php if ($_SESSION['Tipo_Usuario'] > 1) { ?>
            <button type="button" name="button"> <a href="inicio.php?Id_Producto=<?php echo $row['Id_Producto']?>">Agregar al carrito</a> </button>
          <?php } ?>
 					</div>
 				</div>
 			</div>
      <?php } ?>
    <?php } ?>
  </div>

   </body>
 </html>
