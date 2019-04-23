<?php
  session_start();
    require('../../php/conexion.php');
//variables para los totales
    $total = 0;
    $totalp = 0;
    $cantidades = 0;


    //Datos del cliente
    $compania = $_SESSION['Proveedor'];
    $sql = "SELECT RFC, Direccion FROM direcciones where Tipo_Direccion=4;";//consultamos los datos del cliente, en este caso nosotrsos
    $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
    $result = $result->fetch_assoc();
    $usuario = $result['RFC'];
    $dire = $result['Direccion'];

    //Asiganoms los valores para las fechas y horas
    $fecha = date("Y-m-d");
    $fecha1 = date("Y-m-d", strtotime($fecha."+ 1 month"));

    $cantA = 0;
    foreach ($_SESSION['Productos2'] as $valo) {
      $cantA = $cantA + $valo;
    }

    foreach ($_SESSION['Productos2'] as $key => $value) {
      $sqlpf = "SELECT Precio_Compra FROM producto_proveedor where Id_Producto = '$key' AND RFC_Direcciones='$compania'";//consultamos los tipos de usuario existentes, se usa para el registro
      $resultpf = $mysqli->query($sqlpf);//ejecutamos la consulta y guardamos
      $row = $resultpf->fetch_assoc();
      //calculalmos el total cn los valores de proveedor
        $totalp = $row['Precio_Compra'] * $value;
        $total = $total + $totalp;
    }
    //total de la cotizacion
    $subtotal = $total;
    $totall = ((16 * $total) / 100) + $total ;

    //Registramos la cotizacion
    $sqlv = "INSERT INTO cotizacion(RFC_Proveedor, RFC_Compania, Fecha_R, Cantidad_Articulos, Subtotal, IVA, Total, Estado, Vigencia, Bandera) VALUES ('$compania', '$usuario', '$fecha', '$cantA', '$subtotal', 16, '$totall', 'En revision', '$fecha1', 1);";
    $resultv = $mysqli->query($sqlv);//ejecutamos la consulta y guardamos

    //sacamos el folio de la venta que acabamos de hacer
    $sql = "SELECT MAX(Folio) FROM cotizacion;";
    $result = $mysqli->query($sql);
    $result = $result->fetch_assoc();
    $folio = $result['MAX(Folio)'];

    //Registramos todos los articulos cotizados
    foreach ($_SESSION['Productos2'] as $key => $value) {
      $sqlpf = "SELECT Precio_Compra FROM producto_proveedor where Id_Producto = '$key'";//checamos el precio del proveedor
      $resultpf = $mysqli->query($sqlpf);//ejecutamos la consulta y guardamos
      $resultpf = $resultpf->fetch_assoc();

      $totalp = $resultpf['Precio_Compra'] * $value;
      $can = $value;

      $sql = "INSERT INTO detalle_cotizacion(Id_Producto, Folio_Cotizacion, Cantidad_Articulos, Importe, Aplica_IVA, Bandera) VALUES ('$key', '$folio', '$can', '$totalp', 0, 1);";
      $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

    }

    echo "<h1>      La requisición fue enviada al proveedor exitosamente, comuniquese con el gerente para conocer su estado </h1>";
    $_SESSION['Productos'] = array();
    $_SESSION['Productos2'] = array();

    echo "<a href='cotizacion.php'>Regresar</a>";
 ?>
