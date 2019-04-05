<?php
  session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"]) || $_SESSION['Tipo_Usuario'] != 1) {//si no existe, entonces devolvemos al login
    header("Location: ../index.php");
  }
  require('../php/conexion.php');

  $sql = "SELECT * FROM compra";//consultamos los tipos de usuario existentes, se usa para el registro
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
    <title>Ventas</title>

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
  <h1>Compras</h1><br>
    <table>
      <thead>
        <th>Folio</th>
        <th>RFC de proveedor</th>
        <th>Fecha de entrega</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cantidad de articulos</th>
        <th>Subtotal</th>
        <th>IVA</th>
        <th>Total</th>
        <th>Detalle de Compra</th>
        <th>Factura</th>
      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <td><?php echo $row['Folio']; ?></td>
          <td><?php echo $row['RFC_Direcciones']; ?></td>
          <td><?php echo $row['Fecha_Entrega']; ?></td>
          <td><?php echo $row['Fecha']; ?></td>
          <td><?php echo $row['Hora']; ?></td>
          <td><?php echo $row['Cantidad_Articulos']; ?></td>
          <td><?php echo $row['Subtotal']; ?></td>
          <td><?php echo $row['IVA']; ?></td>
          <td><?php echo $row['Total']; ?></td>
          <td><a href="detalleCompra.php?Folio=<?php echo $row['Folio']?>">Detalle de la Compra</a></td>
          <td> <a href="#">Generar factura</a> </td>

        </tr>
      <?php } ?>
    <?php } ?>
    </table>
    <br><br>
    <a class="btn btn-warning" href="compraprov.php">Regresar</a>

</body>
</html>
