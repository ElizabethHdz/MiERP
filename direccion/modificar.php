<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
  require('../php/conexion.php');

  $sql = "SELECT * FROM direcciones;";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="../stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <title>Direcciones</title>

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
      <tr>
        <td>RFC</td>
        <td>Nombre Fiscal</td>
        <td>Direccion</td>
        <td>Código postal</td>
        <td>Telefono</td>
        <td>E-mail</td>
        <td>Tipo</td>
        <td>Acción</td>
      </tr>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <td><?php echo $row['RFC']; ?></td>
          <td><?php echo $row['Nombre_Fiscal']; ?></td>
          <td><?php echo $row['Direccion']; ?></td>
          <td><?php echo $row['CP']; ?></td>
          <td><?php echo $row['Telefono']; ?></td>
          <td><?php echo $row['Email']; ?></td>
          <td><?php
            if ($row['Tipo_Direccion'] == 1) {
              echo "Cliente";
            }else {
              if ($row['Tipo_Direccion'] == 2) {
                echo "Proveedor";
              }else {
                echo "Cliente/Proveedor";
              }
            }
          ?></td>
          <td> <a href="modificar_usuario.php?RFC=<?php echo $row['RFC']?>">modificar</a> </td>
        </tr>
      <?php } ?>
    <?php } ?>
  </table><br><br>

    <a style="color:green;" href="indexdirecciones.php" class="btn btn-warning">Regresar</a>
</body>
</html>
