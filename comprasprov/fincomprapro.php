<?php
  session_start();//Inicia una nueva sesion o reaunuda la existente
  require('../php/conexion.php');//solicitamosla conexion para las consultas

  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: index.php");
  }

  $idUsuario = $_SESSION['Usuario'];//sacamos de la sesion el usuario que se logueo
  if ($_SESSION['Tipo_Usuario'] == 3 || $_SESSION['Tipo_Usuario'] == 4) {
    if (!isset($_SESSION['Productos'])) {
      $_SESSION['Productos'] = array();
    }
  }

$proveedor = $_SESSION['Proveedor'];
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->
     <script src="../js/jquery-3.3.1.min.js"></script>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <script src="../js/bootstrap.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="../css/estilosPrincipal.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/responsive.css">

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

     <title>Bievenido</title>
   </head>
   <body>

     <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../inicio.php">Mi ERP</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="../inicio.php">Inicio</a></li>
          <?php
           if ($_SESSION['Tipo_Usuario'] == 1) {?>
            <li><a href="../registrar.php">Registrar usuario</a></li>
            <li><a href="../direccion/indexdirecciones.php" >Direcciones</a></li>
            <li><a href="../producto/iniciop.php" >Productos</a></li>
            <li><a href="../venta/iniciov.php">Ventas</a> </li>
          <?php } else {?>
            <li> <a href="../perfil.php">Perfil</a> </li>
            <?php
          }?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if ($_SESSION['Tipo_Usuario'] != 1) {?>
            <li> <a href="compra/fincompra.php"> <?php echo count($_SESSION['Productos']); ?> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
            <li> <a href="miscompras.php"> Mis compras</a> </li>
          <?php  } ?>
          <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
        </ul>
      </div>
     </nav>

     <!--imprimimos los datos en pantalla-->
     <h1><?php echo "En tu carrito ".utf8_decode($_SESSION['Usuario']); ?></h1>
<table>

      <thead>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>IVA</th>
        <th>Total del producto</th>
      </thead>

     <?php
     $total = 0;
     $totalp = 0;
     $cantidades = 0;
     foreach ($_SESSION['Productos2'] as $key => $value) {
       //$sqlpf = "SELECT * FROM producto where Id_Producto = '$key'";//consultamos los tipos de usuario existentes, se usa para el registro
       $sqlpf =  "SELECT P.Nombre, P.Descripcion, P.Bandera, P.IVA, Q.Precio_Compra FROM producto P INNER JOIN producto_proveedor Q WHERE P.Id_Producto=Q.Id_Producto AND P.Id_Producto='$key' AND Q.RFC_Direcciones='$proveedor';";
       $resultpf = $mysqli->query($sqlpf);//ejecutamos la consulta y guardamos

       while ($row = $resultpf->fetch_assoc()) {
         if ($row['Bandera']  == 1) {
           $totalp = $row['Precio_Compra'] * $value;
           $ivap = ($row['IVA'] * $totalp) / 100 ;
           $totalp = $ivap + $totalp ;
           $total = $total + $totalp;
           $cantidades = $cantidades + $value;

         ?>
         <tr>
           <td><?php echo $row['Nombre']; ?></td>
           <td><?php echo $row['Precio_Compra']; ?></td>
           <td><?php echo $value; ?> </td>
           <td><?php echo $row['IVA']; ?></td>
           <!-- <td><?php echo $row['Unidad_Medida']; ?></td> -->
           <td><?php echo $totalp; ?></td>
         </tr>
       <?php }
        }
      }
      ?>
      <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Subtotal de la compra</b></td>
        <td> <b> <?php echo $total ?></b></td>
      </tr>
      <?php $_SESSION['Subtotal'] = $total;
      $_SESSION['Cantidad_Articulos'] = $cantidades;
      ?>
</table>
<br />
  <a href="registrarvint.php" class="btn btn-success" style="margin-left: 85em;">Realizar compra</a>
   </body>
 </html>
