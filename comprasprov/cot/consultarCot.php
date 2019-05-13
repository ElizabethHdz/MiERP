<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if ($_SESSION['Tipo_Usuario'] == 1 || $_SESSION['Tipo_Usuario'] == 6) {//si no existe, entonces devolvemos al login

}else {
  header("Location: cotizacion.php");
}
  require('../../php/conexion.php');

  $sql = "SELECT * FROM requisicion;";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

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
  <title>Bievenido</title>


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

    <table border="1">
      <thead>
        <th>Folio de cotizacion</th>
        <th>Proveedor</th>
        <th>Fecha de realizacion</th>
        <th>Cantidad de articulos</th>
        <th>Vigencia</th>
        <th>Estado</th>
        <th></th>
      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <form class="" action="detalleCot.php" method="get">

          <td> <input type="text" name="Folio" readonly value="<?php echo $row['Folio']; ?>"></td>
          <td>
            <?php
            $sql = "SELECT RFC, Nombre_Fiscal FROM direcciones WHERE Bandera=1 AND (Tipo_Direccion=2 OR Tipo_Direccion=3);";//consultamos los tipos de usuario existentes, se usa para el registro
            $resultP = $mysqli->query($sql);//ejecutamos la consulta y guardamos
             ?>
            <select class="" name="RFC_Proveedor">
              <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
              while ($row2 = $resultP->fetch_assoc()) { ?>
                <option value="<?php echo $row2['RFC']; ?>"><?php echo $row2['Nombre_Fiscal']; ?></option>
              <?php }; ?>
            </select>
          </td>
          <td><?php echo $row['Fecha_E']; ?></td>
          <td><?php echo $row['Cantidad_Articulos']; ?></td>
          <td><?php echo $row['Vigencia']; ?></td>
          <td><?php echo $row['Estado']; ?></td>
          <td> <input type="submit" name="" value="Detalle de cotizacion"> </td>
          </form>
        </tr>
      <?php } ?>
    <?php } ?>
  </table><br><br>

    <a style="color:green;" href="cotizacion.php" class="btn btn-warning">Regresar</a>
</body>
</html>
