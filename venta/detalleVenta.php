<?php
  session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: ../index.php");
  }
  require('../php/conexion.php');
  $fGet = $_GET['Folio'];
  $sql = "SELECT * FROM detalle_venta where Folio_Venta = '$fGet'";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/estilosPrincipal.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Detalle de venta</title>

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
    <h1>Detalle de venta</h1><br>
    <table>
      <thead>
        <th>Folio</th>
        <th>Nombre de producto</th>
        <th>Cantidad</th>
        <th>Importe</th>
        <th>Incluye IVA</th>
      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
          $var2 = $row['Id_Producto'];
          $sql2 = "SELECT Nombre FROM producto where ID_Producto = '$var2'";
          $result2 = $mysqli->query($sql2);
          $row2 = $result2->fetch_assoc()
        ?>
        <tr>
          <td><?php echo $row['Folio_Venta']; ?></td>
          <td><?php echo $row2['Nombre']; ?></td>
          <td><?php echo $row['Cantidad_Articulos']; ?></td>
          <td><?php echo $row['Importe']; ?></td>
          <td><?php if ($row['Aplica_IVA'] == 1) {?> Si
            <?php}else {?>
              No
            <?php } ?></td>
        </tr>
      <?php } ?>
    <?php } ?>
    </table>
    <br><br>
    <?php if ($_SESSION['Tipo_Usuario'] == 1) { ?>
        <a class="btn btn-warning" href="consultarv.php">Regresar</a>
    <?php }else { ?>
        <a class="btn btn-warning" href="../compra/miscompras.php">Regresar</a>
    <?php } ?>


</body>
</html>
