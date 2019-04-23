<?php
session_start();
  require('../php/conexion.php');

  //Datos del cliente
  $compania = $_SESSION['Proveedor'];
  $usuario = $_SESSION['Usuario'];
  $sql = "SELECT RFC, Direccion FROM direcciones where Email = '$usuario';";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
  $result = $result->fetch_assoc();
  $usuario = $result['RFC'];
  $dire = $result['Direccion'];

  //Asiganoms los valores para las fechas y horas
  $fecha = date("Y-m-d");
  $fecha1 = date("Y-m-d", strtotime($fecha."+ 3 days"));
  $hora = date("H:i:s");

  //Asiganoms la cantidad de articulos
  $cantA = 0;
  foreach ($_SESSION['Productos2'] as $valo) {
    $cantA = $cantA + $valo;
  }
  //Valores totales
  $subtotal = $_SESSION['Subtotal'];
  $totall = ((16 * $subtotal) / 100) + $subtotal ;


  //Registrar la venta primero
  $sqlv = "INSERT INTO compra(RFC_Compania, RFC_Direcciones, Fecha_Entrega, Fecha, Hora, Cantidad_Articulos, Subtotal, IVA, Total, Bandera) VALUES ('$compania', '$usuario', '$fecha1', '$fecha', '$hora', '$cantA', '$subtotal', 16, $totall, 1);";
  $resultv = $mysqli->query($sqlv);//ejecutamos la consulta y guardamos

  //sacamos el folio de la venta que acabamos de hacer
  $sql = "SELECT MAX(Folio) FROM compra;";
  $result = $mysqli->query($sql);
  $result = $result->fetch_assoc();
  $folio = $result['MAX(Folio)'];

  //Registramos todos los articulos comprados
  foreach ($_SESSION['Productos2'] as $key => $value) {
    $sqlpf = "SELECT Precio_Venta, IVA, Unidad_Medida FROM producto where Id_Producto = '$key'";//consultamos los tipos de usuario existentes, se usa para el registro
    $resultpf = $mysqli->query($sqlpf);//ejecutamos la consulta y guardamos
    $resultpf = $resultpf->fetch_assoc();

    $totalp = $resultpf['Precio_Venta'] * $value;
    $ivap = ($resultpf['IVA'] * $totalp) / 100 ;
    $totalp = $totalp + $ivap;
    $can = $value;

    $sql = "INSERT INTO detalle_compra(Id_Producto, Folio_Compra, Cantidad_Articulos, Importe, Aplica_IVA, Bandera) VALUES ('$key', '$folio', '$can', '$totalp', 0, 1);";
    $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos


    $sql1 = "SELECT Cantidad from inventario WHERE Id_Producto='$key'";//Aqui debe de checarse ademas el lote del producto porque podemos tener un producto con varios lotes, en este caso solo vamos a checar primero el producto
    $resultado = $mysqli->query($sql1);
    $resultado1 = $resultado->fetch_assoc();
    $n_columnas = $resultado->num_rows;
    if ($n_columnas > 0) {
      $nueva_cantidad = $resultado1['Cantidad'] + $value;
      $consulta = "UPDATE inventario Set Cantidad='$nueva_cantidad', Fecha_Entrada='$fecha' WHERE Id_Producto='$key';";
      $result = $mysqli->query($consulta);
    } else {
      $UMedida = $resultpf['Unidad_Medida'];
      $sql = "INSERT INTO inventario(Id_Producto, Lote, Fecha_Entrada, Cantidad, U_Medida, Ubicacion, Bandera) VALUES ('$key', 1, '$fecha1', '$value', '$UMedida', 'Predeterminada', 1)";
      $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
    }

  }
  //header('refresh: 4; url=../inicio.php');
  var_dump($_SESSION['Productos2']);
  echo "<h1>      Compra realizada exitosamente, sus productos se entregaran el $fecha1 en la dirección $dire :3    </h1>";
  $_SESSION['Productos'] = array();
  $_SESSION['Productos2'] = array();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Compra</title>
  </head>
  <body>
    <a href="miscompras.php" class="btn btn-success">Ir a mis compras</a>
  </body>
</html>
