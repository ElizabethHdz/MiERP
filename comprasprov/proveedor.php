<?php
  session_start();
  $_SESSION['Proveedor'] = $_GET['Proveedor'];
  header('refresh: 0; url=realizarcom.php');
 ?>
