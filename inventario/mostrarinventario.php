<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
  require('../php/conexion.php');

  $sql = "SELECT * FROM inventario;";//consultamos los tipos de usuario existentes, se usa para el registro
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

    <title>Inventario</title>
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
    <table border="1">
      <h1>Inventario actual</h1><br><br>
      <thead>
        <th>Id de inventario</th>
        <th>Producto</th>
        <th>Fecha_Entrada</th>
        <th>Cantidad</th>
        <th>Unidad de medida</th>
        <th>Ubicación física</th>
      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
          $idP = $row['Id_Producto'];
          $nombre = $mysqli->query("SELECT Nombre FROM producto where Id_Producto='$idP'");
          $nombre = $nombre->fetch_assoc();
        ?>
        <tr>
          <td><?php echo $row['Id_Inventario']; ?></td>
          <td><?php echo $nombre['Nombre']; ?></td>
          <td><?php echo $row['Fecha_Entrada']; ?></td>
          <td><?php echo $row['Cantidad']; ?></td>
          <td><?php echo $row['U_Medida']; ?></td>
          <td><?php echo $row['Ubicacion']; ?></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </table><br><br>

    <a href="../inicio.php" class="btn btn-warning">Regresar</a>
</body>
</html>
