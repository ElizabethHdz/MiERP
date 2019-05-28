<?php
  /*session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
    header("Location: index.php");
  }*/

  require('../php/conexion.php');

  $sql = "SELECT * FROM cuentas";//consultamos los tipos de usuario existentes, se usa para el registro
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
  <h1>Modificar</h1><br>
  <table>
    <thead>
      <th>ID de la cuenta</th>
      <th>CLABE</th>
      <th>Numero de cuenta</th>
      <th>RFC del Titular</th>
      <th>Nombre del titular</th>
      <th>Banco</th>
      <th>Tipo de cuenta</th>
      <th>Saldo</th>
      <th>Limite</th>
      <th>Fecha de corte</th>
    </thead>

      <?php  while ($row = $result->fetch_assoc()) {
        if ($row['Bandera']  == 1) {
        ?>
        <tr>
          <td><?php echo $row['Id_Cuenta']; ?></td>
          <td><?php echo $row['CLABE']; ?></td>
          <td><?php echo $row['No_Cuenta']; ?></td>
          <td><?php echo $row['RFC_Titular']; ?></td>
          <td><?php echo $row['Nombre_Titular']; ?></td>
          <td><?php echo $row['Banco']; ?></td>
          <td><?php echo $row['Tipo_Cuenta']; ?></td>
          <td><?php echo $row['Saldo']; ?></td>
          <td><?php echo $row['Limite']; ?></td>
          <td><?php echo $row['Fecha_Corte']; ?></td>
          <td> <a href="modificar_cuenta.php?Id_Cuenta=<?php echo $row['Id_Cuenta']?>">Modificar cuenta</a> </td>
        </tr>
      <?php } ?>
    <?php } ?>
    </table>
    <br><br>
    <a class="btn btn-warning" href="indexCuentas.php">Regresar</a>

</body>
</html>
