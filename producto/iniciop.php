<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Productos</title>
  </head>
  <body>
    <br>
    <h1>Productos</h1><br>
    <a href="consultarp.php" class="btn btn-primary">Consultar</a><br><br>
    <a href="agregarp.php" class="btn btn-primary">Agregar</a><br><br>
    <a href="modificarp.php" class="btn btn-primary">Modificar</a><br><br>
    <a href="eliminarp.php" class="btn btn-primary">Eliminar</a><br><br>

    <a href="../inicio.php" class="btn btn-warning">Regresar</a>

  </body>
</html>
