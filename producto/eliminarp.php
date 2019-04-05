<?php
  /*session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: index.php");
  }*/

  require('../php/conexion.php');

  $sql = "SELECT * FROM producto";//consultamos los tipos de usuario existentes, se usa para el registro
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
    <title>Productos</title>

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
    <table>
      <thead>
        <th>ID_Producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio de Venta</th>
        <th>Descuento del producto</th>
        <th>IVA</th>
        <th>Unidad de medida</th>
        <th>Categoria</th>
      </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <td><?php echo $row['Id_Producto']; ?></td>
          <td><?php echo $row['Nombre']; ?></td>
          <td><?php echo $row['Descripcion']; ?></td>
          <td><?php echo $row['Precio_Venta']; ?></td>
          <td><?php echo $row['Descuento_Producto']; ?></td>
          <td><?php echo $row['IVA']; ?></td>
          <td><?php echo $row['Unidad_Medida']; ?></td>
          <td><?php echo $row['Id_Categoria']; ?></td>
          <td> <a href="eliminarp.php?Id_Producto=<?php echo $row['Id_Producto']?>">Eliminar</a> </td>
        </tr>
      <?php } ?>
    <?php } ?>

    <?php

      if (isset($_GET['Id_Producto'])) {
        $variable = $_GET['Id_Producto'];
        $sql1 = "UPDATE producto SET Bandera = 0 WHERE Id_Producto='$variable'";//consultamos los tipos de usuario existentes, se usa para el registro
        $result = $mysqli->query($sql1);//ejecutamos la consulta y guardamos

        header('refresh: 2; url=eliminarp.php');
        echo "<p>      Eliminación exitosa    </p>";

      }
     ?>
    </table>
    <br><br>
    <a class="btn btn-warning" href="iniciop.php">Regresar</a>

</body>
</html>
