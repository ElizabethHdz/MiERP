<?php
  session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"]) || $_SESSION['Tipo_Usuario'] != 1) {//si no existe, entonces devolvemos al login
    header("Location: ../index.php");
  }
  require('../php/conexion.php');

  $sql = "SELECT * FROM ingresos";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Cuentas</title>

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

    <h1>Cuentas</h1><br>
    <table>
      <thead>
        <th>ID ingreso</th>
        <th>Folio de la Venta</th>
        <th>Id de la Cuenta</th>
        <th>Fecha de la venta</th>
        <th>Cantidad</th>
        <th>Estado</th>
        <th>Fecha limite de pago</th>

      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <td><?php echo $row['Id_Ingreso']; ?></td>
          <td><?php echo $row['Folio_Venta']; ?></td>
          <td><?php echo $row['Id_Cuenta']; ?></td>
          <td><?php echo $row['Fecha_Movimiento']; ?></td>
          <td><?php echo $row['Cantidad']; ?></td>
          <td><?php echo $row['Estado']; ?></td>
          <td><?php echo $row['Fecha_Limite']; ?></td>
        </tr>
      <?php } ?>
    <?php } ?>
    </table>
    <br><br>
    <a class="btn btn-warning" href="indexConta.php">Regresar</a>

</body>
</html>
