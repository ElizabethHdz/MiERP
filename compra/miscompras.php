<?php
  session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"]) || $_SESSION['Tipo_Usuario'] == 1) {//si no existe, entonces devolvemos al login
    header("Location: ../index.php");
  }
  require('../php/conexion.php');

  $usuario = $_SESSION['Usuario'];
  $sql = "SELECT RFC FROM direcciones where Email = '$usuario';";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
  $result = $result->fetch_assoc();
  $usuario = $result['RFC'];


  $sql = "SELECT * FROM venta where RFC_Direcciones = '$usuario'";//consultamos los tipos de usuario existentes, se usa para el registro
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

  <h1>Mis compras</h1><br>
    <table>
      <thead>
        <th>Folio</th>
        <th>RFC</th>
        <th>Fecha de entrega</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cantidad de articulos</th>
        <th>Subtotal</th>
        <th>IVA</th>
        <th>Total</th>
        <th>Detalle de venta</th>
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
          <td><a href="../venta/detalleVenta.php?Folio=<?php echo $row['Folio']?>">Detalle de la Venta</a></td>
          <td> <a href="generarfactura.php?Folio=<?php echo $row['Folio']; ?>">Generar factura</a> </td>

        </tr>
      <?php } ?>
    <?php } ?>
    </table>
    <br><br>
    <a class="btn btn-warning" href="../inicio.php">Regresar</a>

</body>
</html>
