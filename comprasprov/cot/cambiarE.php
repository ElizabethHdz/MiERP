<?php
  session_start();
  require('../../php/conexion.php');

  $estado = $_GET['Estado'];
  $folio = $_SESSION['Folio'];

  $sql = "UPDATE requisicion SET Estado='$estado' WHERE Folio='$folio'";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

  header('refresh: 0; url=consultarCot.php?Folio='.$folio);

 ?>
