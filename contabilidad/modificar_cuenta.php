<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
require('../php/conexion.php');//para las consultas

$idC = $_GET['Id_Cuenta'];

$sql = "SELECT * FROM cuentas Where Id_Cuenta= '$idC';";//consultamos los tipos de usuario existentes, se usa para el registro
$result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

var_dump($_POST);
while ($row = $result->fetch_assoc()) {
  $CLABE = $row['CLABE'];
  $nCuenta = $row['No_Cuenta'];
  $nBanco = $row['Banco'];
  $tipoCuenta = $row['Tipo_Cuenta'];
  $Saldo = $row['Saldo'];
  $Limite = $row['Limite'];
  $fecha = $row['Fecha_Corte'];
}

if (isset($_POST['modificar'])) {
  if (isset($_POST['CLABE']) && isset($_POST['NoCuenta'])) {
    $CLABE1 = $_POST['CLABE'];
    $nCuenta1 = $_POST['NoCuenta'];
    $nBanco1 = $_POST['Banco'];
    $tipoCuenta1 = $_POST['tipoCuenta'];
    $Saldo1 = $_POST['Saldo'];
    $Limite1 = $_POST['Limite'];
    $fecha1 = $_POST['Fecha'];

    $sql = "UPDATE cuentas SET CLABE='$CLABE1', No_Cuenta='$nCuenta1',Banco='$nBanco', Tipo_Cuenta='$tipoCuenta1',Saldo='$Saldo1',Limite='$Limite1',Fecha_Corte='$fecha1' WHERE Id_Cuenta= '$idC'";
    $result = $mysqli->query($sql) or die(mysqli_error());

    //header('refresh: 2; url=modificar.php');
    echo "<p>      Modificacion exitosa    </p>";
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

    <script type="text/javascript">
    $(document).ready(function(){
      $("#tipoCuenta > option[value="+ <?php echo $tipoCuenta; ?> +"]").attr("selected", true);
      $('#tipoCuenta').change();
    });
    </script>
    <title>Cuntas</title>
</head>
<body>
    <form class="form" action="" method="post">
        <h2>Cuentas</h2>
        <p><input placeholder="CLABE" value="<?php echo $CLABE; ?>" type="text" name="CLABE" id="CLABE" autofocus="on" maxlength="18"></input></p>
        <p><input placeholder="Numero de cuenta" value="<?php echo $nCuenta; ?>" type="text" name="NoCuenta" id="NoCuenta" maxlength="13"></input></p>
        <p><input placeholder="Nombre del banco" value="<?php echo $nBanco; ?>" type="text" name="Banco" id="Banco" maxlength="30" ></input></p>
        <p>Tipo de cuenta:
        <select class="cmb" name="tipoCuenta" id="tipoCuenta">
          <option value="Credito">Credito</option>
          <option value="Debito">Debito</option>
        </select></p>
        <p><input placeholder="Saldo" value="<?php echo $Saldo; ?>" type="text" name="Saldo" id="Saldo" maxlength="10" contenteditable="false"></input></p>
        <p><input placeholder="Limite" value="<?php echo $Limite; ?>" type="text" name="Limite" id="Limite" maxlength="10"></input></p>
        <p>Fecha de corte<input value="<?php echo $fecha; ?>" type="date" name="Fecha" id="Fecha"></input></p>

        <input name="modificar" type="submit" value="Modificar"/>
      </form>

     <a class="btn btn-warning" href="indexConta.php">Regresar</a>
</body>
</html>
