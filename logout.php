<?php
  //inicia una nueva sesion o reinicia la existente
  session_start();
  //Destruye toda la informacion registrda de una sesion
  session_destroy();

  //redirecciona a la pagina del login
  header('Location: index.php');
 ?>
