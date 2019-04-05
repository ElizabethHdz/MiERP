<?php
  //declaramos todos los valores de la conexion
  //el orden es: servidor, usuario de la BD, contraseña del usuario, nombre BD
  $mysqli = new mysqli("localhost", "antonio", "antonio", "erp");

  if (mysqli_connect_errno()) {
    echo "Conexión fallida: " , mysqli_connect_error();
    exit();
  }
 ?>
