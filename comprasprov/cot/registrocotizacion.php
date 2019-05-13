<?php
  session_start();
    require('../../php/conexion.php');
    $cantidades = 0;


    //Asiganoms los valores para las fechas y horas
    $fecha = date("Y-m-d");
    $vigencia = date("Y-m-d", strtotime($fecha."+ 1 month"));

    $cantA = 0;
    foreach ($_SESSION['Productos2'] as $valo) {
      $cantA = $cantA + $valo;
    }

    //Registramos la requisicion
    $sqlv = "INSERT INTO requisicion(Fecha_E, Cantidad_Articulos, Estado, Vigencia, Bandera) VALUES ('$fecha', '$cantA', 'En revision', '$vigencia', 1);";
    $resultv = $mysqli->query($sqlv);//ejecutamos la consulta y guardamos

    //sacamos el folio de la venta que acabamos de hacer
    $sql = "SELECT MAX(Folio) FROM requisicion;";
    $result = $mysqli->query($sql);
    $result = $result->fetch_assoc();
    $folio = $result['MAX(Folio)'];

    //Registramos todos los articulos
    foreach ($_SESSION['Productos2'] as $key => $value) {
      $sql = "INSERT INTO detalle_requisicion(Folio_Requisicion, Id_Producto, Cantidad_Articulos, Cantidad_Comprados, Bandera) VALUES ('$folio', '$key', '$value', 0, 1);";
      $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

    }

    echo "<h1>      La requisición fue enviada al proveedor exitosamente, comuniquese con el gerente para conocer su estado </h1>";
    $_SESSION['Productos'] = array();
    $_SESSION['Productos2'] = array();
    $_SESSION['Proveedor'] = "";

    echo "<a href='cotizacion.php'>Regresar</a>";
 ?>
