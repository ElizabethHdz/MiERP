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

     <style>
         table {
           font-family: arial, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }

         td, th {
           border: 1px solid #dddddd;
           text-align: left;
           padding: 8px;
         }

         tr:nth-child(even) {
           background-color: #dddddd;
         }
       </style>

     <title>Requisición</title>
   </head>
   <body>

     <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../../inicio.php">Mi ERP</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../../inicio.php">Inicio</a></li>
          <?php
           if ($_SESSION['Tipo_Usuario'] == 1) {?>
            <li><a href="../../registrar.php">Registrar usuario</a></li>
            <li><a href="../../direccion/indexdirecciones.php" >Direcciones</a></li>
            <li><a href="../../producto/iniciop.php" >Productos</a></li>
            <li><a href="../../venta/iniciov.php">Ventas</a> </li>
          <?php } else {?>
            <li> <a href="../../perfil.php">Perfil</a> </li>
            <?php
          }?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
        </ul>
      </div>
     </nav>

     <!--imprimimos los datos en pantalla-->
     <h1><?php echo "Detalle de Requisición ".utf8_decode($_SESSION['Usuario']); ?></h1><br />
<table>

      <thead>
        <th>Nombre</th>
        <th>Cantidad</th>
      </thead>

     <?php
     $cantidades = 0;
     foreach ($_SESSION['Productos2'] as $key => $value) {
       $sqlpf = "SELECT Nombre, Bandera FROM producto where Id_Producto = '$key'";
       $resultpf = $mysqli->query($sqlpf);//ejecutamos la consulta y guardamos

       while ($row = $resultpf->fetch_assoc()) {
         if ($row['Bandera']  == 1) {?>
         <tr>
           <td><?php echo $row['Nombre']; ?></td>
           <td><?php echo $value; ?> </td>
         </tr>
       <?php }
        }
      }
      ?>
      <tr>
        <td> </td>
        <td> </td>
      </tr>
      <?php       $_SESSION['Cantidad_Articulos'] = $cantidades; //envio la cantidad de articulos     ?>
</table>
<br />
  <a href="registrocotizacion.php" class="btn btn-success" style="margin-left: 85em;">Enviar</a>
   </body>
 </html>
