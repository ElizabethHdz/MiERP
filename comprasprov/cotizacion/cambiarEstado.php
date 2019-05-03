<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if ($_SESSION['Tipo_Usuario'] == 1) {//si no existe, entonces devolvemos al login

}else {
  header("Location: consultarCot.php");
}
  require('../../php/conexion.php');

  $folio = $_GET['Folio'];
  $_SESSION['Folio'] = $folio;

  $sql = "SELECT * FROM cotizacion where Folio='$folio';";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
  $row = $result->fetch_assoc();

  $nombrep = $row['RFC_Proveedor'];

  $sql = "SELECT Nombre_Fiscal, Direccion, Telefono, Email FROM direcciones where RFC='$nombrep';";//consultamos los tipos de usuario existentes, se usa para el registro
  $dProveedor = $mysqli->query($sql);//ejecutamos la consulta y guardamos
  $dProveedor = $dProveedor->fetch_assoc();

  $sql = "SELECT * FROM detalle_cotizacion where Folio_Cotizacion='$folio';";//consultamos los tipos de usuario existentes, se usa para el registro
  $detalleCot = $mysqli->query($sql);//ejecutamos la consulta y guardamos


 ?>
<!DOCTYPE html>
<html lang="es">
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
  <title>Detalle de cotizacion</title>


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
         <li><a href="../../../registrar.php">Registrar usuario</a></li>
         <li><a href="../../../direccion/indexdirecciones.php" >Direcciones</a></li>
         <li><a href="./../../producto/iniciop.php" >Productos</a></li>
         <li><a href="../../../venta/iniciov.php">Ventas</a> </li>
         <li><a href="../compraprov.php">Compras</a></li>
       <?php } else {?>
         <li> <a href="perfil.php">Perfil</a> </li>
         <?php
       }?>
     </ul>
     <ul class="nav navbar-nav navbar-right">
         <li> <a href="compra/fincompra.php"> <?php echo count($_SESSION['Productos']); ?> <span>Finalizar cotizacion</span></a></li>
       <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
     </ul>
   </div>
  </nav>

  <h1>Detalle de cotizacion</h1><br>
  <h2>Proveedor</h2>

  <label>Nombre:</label> <?php echo $dProveedor['Nombre_Fiscal']; ?><br>
  <label>Direccion:</label> <?php echo $dProveedor['Direccion']; ?><br>
  <label>Teléfono:</label> <?php echo $dProveedor['Telefono']; ?>
  <label>Email:</label> <?php echo $dProveedor['Email']; ?>
  <?php

   ?>

    <table border="1">
      <thead>
        <th>Folio</th>
        <th>Proveedor</th>
        <th>Fecha de realizacion</th>
        <th>Cantidad de articulos</th>
        <th>Subtotal</th>
        <th>IVA</th>
        <th>Total</th>
        <th>Vigencia</th>
        <th>Estado</th>

      </thead>

        <tr>
          <td><?php echo $row['Folio']; ?></td>
          <td><?php echo $row['RFC_Proveedor']; ?></td>
          <td><?php echo $row['Fecha_R']; ?></td>
          <td><?php echo $row['Cantidad_Articulos']; ?></td>
          <td><?php echo $row['Subtotal']; ?></td>
          <td><?php echo $row['IVA']; ?></td>
          <td><?php echo $row['Total']; ?></td>
          <td><?php echo $row['Vigencia']; ?></td>
          <td><?php echo $row['Estado']; ?></td>
        </tr>
  </table><br>

  <h3>Detalle de cotización</h3>

  <table>
    <thead>
      <th>Nombre de producto</th>
      <th>Cantidad</th>
      <th>Importe</th>
    </thead>

    <?php  while ($row3 = $detalleCot->fetch_assoc()) {
      if ($row3['Bandera']  == 1) {
        $var2 = $row3['Id_Producto'];
        $sql2 = "SELECT Nombre FROM producto where ID_Producto = '$var2'";
        $result2 = $mysqli->query($sql2);
        $row2 = $result2->fetch_assoc()
      ?>
      <tr>
        <td><?php echo $row2['Nombre']; ?></td>
        <td><?php echo $row3['Cantidad_Articulos']; ?></td>
        <td><?php echo $row3['Importe']; ?></td>
      </tr>
    <?php } ?>
  <?php } ?>
  </table>



    <h3>Cambiar estado</h3><br>

    <?php if ($row['Estado'] == 'Autorizado') { ?>
      <a href="registrarCompraCot.php?Folio=<?php echo $folio; ?>" class="btn btn-primary">Recibido</a>
    <?php } ?>
    <a href="cambiarE.php?Estado=Revision" class="btn btn-primary">En revision</a>
    <a href="cambiarE.php?Estado=Autorizado" class="btn btn-primary">Autorizado</a>
    <a href="cambiarE.php?Estado=Enviado" class="btn btn-primary">Enviado</a><br><br>



    <a style="color:green;" href="consultarCot.php" class="btn btn-warning">Regresar</a>
</body>
</html>
