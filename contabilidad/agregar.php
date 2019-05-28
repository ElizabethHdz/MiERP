<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
require('../php/conexion.php');//para las consultas


$bandera = false;

if (!empty($_POST)) {
  $CLABE = mysqli_real_escape_string($mysqli, $_POST['CLABE']);//cada uno a una variable los valores a guardar
  $nCuenta = mysqli_real_escape_string($mysqli, $_POST['NoCuenta']);
  $nBanco = mysqli_real_escape_string($mysqli, $_POST['Banco']);
  $tipoCuenta = mysqli_real_escape_string($mysqli, $_POST['tipoCuenta']);
  $Saldo = mysqli_real_escape_string($mysqli, $_POST['Saldo']);
  $Limite = mysqli_real_escape_string($mysqli, $_POST['Limite']);
  $fecha = mysqli_real_escape_string($mysqli, $_POST['Fecha']);

  $usuario = $_SESSION['Usuario'];
  $error = '';//en caso de error, usaremos esta variable, por el momento estara vacia

  $sqlDir = "SELECT RFC, Nombre_Fiscal FROM direcciones WHERE Email = '$usuario';";
  $resultDir = $mysqli->query($sqlDir);//la ejecutamos y almacenamos en una variable
  $datos = $resultDir->fetch_assoc();
  $rfc1 = $datos['RFC'];
  $nombre = $datos['Nombre_Fiscal'];

  $sql = "SELECT No_Cuenta FROM cuentas WHERE No_Cuenta = '$nCuenta';";
  $result = $mysqli->query($sql);//la ejecutamos y almacenamos en una variable
  $rows = $result->num_rows;//sacamos el numero de filas devueltas

    if ($rows > 0) {//si devulve mas de 0, quiere decir que existe ya el usuario
      $error = "La Cuenta con numero de cuenta ".$nCuenta." ya existe";//
    }
    else {
      if ($CLABE != "" || $nCuenta != "" || $tipoCuenta != "") {
        $sqlUsuario = "INSERT INTO cuentas(CLABE, No_Cuenta, RFC_Titular, Nombre_Titular, Banco, Tipo_Cuenta, Saldo, Limite, Fecha_Corte, Bandera) VALUES ('$CLABE','$nCuenta','$rfc1','$nombre','$nBanco','$tipoCuenta','$Saldo','$Limite','$fecha', 1);";//construimos la sentencia
        $resultUsuario = $mysqli->query($sqlUsuario);//la Ejecutamos

        if ($resultUsuario > 0) {//si se inserta correctamente, nos devovlera que se afecto 1 fila,
          $bandera = true;//entones, declaramos la bandera en 1
        } else {//sino, entonces mandamos un mensaje de que ocuurrio un error
          $error = "Error al registrar";
        }
      }else {
        echo "<h1>Faltan datos por registrar</h1>";
      }
    }
}
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

    <title>Cuentas</title>
</head>
<body>
    <form class="form" action="" method="post">
        <h2>Cuentas</h2>
        <p><input placeholder="CLABE" type="text" name="CLABE" id="CLABE" autofocus="on" maxlength="18"></input></p>
        <p><input placeholder="Numero de cuenta" type="text" name="NoCuenta" id="NoCuenta" maxlength="13"></input></p>
        <p><input placeholder="Nombre del banco" type="text" name="Banco" id="Banco" maxlength="30" ></input></p>
        <p>Tipo de cuenta:
        <select class="cmb" name="tipoCuenta">
          <option value="Credito">Credito</option>
          <option value="Debito">Débito</option>
        </select></p>
        <p><input placeholder="Saldo" type="text" name="Saldo" id="Saldo" maxlength="10"></input></p>
        <p><input placeholder="Limite" type="text" name="Limite" id="Limite" maxlength="10"></input></p>
        <p>Fecha de corte<input  type="date" name="Fecha" id="Fecha"></input></p>

        <input name="registrar" type="submit" value="Registrar"/>
      </form>

      <?php if($bandera){ ?><!--Por ultimo, si la bandera es verdadera, imprimimos que fue exitoso el registro, y activamos la opcion de vovler a la pagina de inicio-->
       <h1>Registro Exitoso</h1>
     <?php ;}else {?>
       <br><!--En caso de error, imprimimos el Error-->
       <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
     <?php } ?><br><br>
     <a class="btn btn-warning" href="indexConta.php">Regresar</a>
</body>
</html>
