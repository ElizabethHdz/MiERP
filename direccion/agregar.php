<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
require('../php/conexion.php');//para las consultas


$sql = "SELECT ID_TD, Descripcion FROM tipo_direccion;";//consultamos los tipos de usuario existentes, se usa para el registro
$result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

$bandera = false;

if (!empty($_POST)) {
  $rfc = mysqli_real_escape_string($mysqli, $_POST['rfc']);//cada uno a una variable los valores a guardar
  $nfiscal = mysqli_real_escape_string($mysqli, $_POST['nomFiscal']);
  $direccion = mysqli_real_escape_string($mysqli, $_POST['dir']);
  $cp = mysqli_real_escape_string($mysqli, $_POST['cp']);
  $telefono = mysqli_real_escape_string($mysqli, $_POST['tel']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);
  $tipodir = mysqli_real_escape_string($mysqli, $_POST['cmb']);


  $error = '';//en caso de error, usaremos esta variable, por el momento estara vacia

  $sqlDir = "SELECT RFC FROM direcciones WHERE RFC = '$rfc';";//Hacemos una consulta, esto para VErificar que no exista el usuario
  $resultDir = $mysqli->query($sqlDir);//la ejecutamos y almacenamos en una variable
  $rows = $resultDir->num_rows;//sacamos el numero de filas devueltas

    if ($rows > 0) {//si devulve mas de 0, quiere decir que existe ya el usuario
      $error = "El Cliente/Proveedor ya existe";//mandamos el mensaje de que ya existe
    }
    else {
      if ($rfc != "" || $nfiscal != "" || $direccion != "") {
        $sqlUsuario = "INSERT INTO direcciones(RFC, Nombre_Fiscal, Direccion, CP, Telefono, Email, Tipo_Direccion, Bandera) VALUES ('$rfc', '$nfiscal', '$direccion', '$cp', '$telefono', '$email', '$tipodir', 1);";//construimos la sentencia
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

    <title>Direcciones</title>
</head>
<body>
    <form class="form" action="" method="post">
        <h2>Direcciones</h2>
        <p><input placeholder="RFC" type="text" name="rfc" id="rfc" autofocus="on" maxlength="13"></input></p>
        <p><input placeholder="Nombre Fiscal" type="text" name="nomFiscal" id="nomFiscal" maxlength="50"></input></p>
        <p><input placeholder="Dirección" type="text" name="dir" id="dir" maxlength="100" ></input></p>
        <p><input placeholder="Teléfono" type="text" name="tel" id="tel" maxlength="10"></input></p>
        <p><input placeholder="Email" type="email" name="email" id="email" maxlength="50"></input></p>
        <p><input placeholder="Codigo Postal" type="text" name="cp" id="cp" maxlength="5"></input></p>
        <p>
          Tipo de dirección:
          <select name="cmb" id="cmb">
           <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
           while ($row = $result->fetch_assoc()) { ?>
             <option value="<?php echo $row['ID_TD']; ?>"><?php echo $row['Descripcion']; ?></option>
           <?php }; ?>
          </select>
        </p>

        <input name="registrar" type="submit" value="Registrar"/>
        <!--<button>Registrar</button>-->
      </form>

      <?php if($bandera){ ?><!--Por ultimo, si la bandera es verdadera, imprimimos que fue exitoso el registro, y activamos la opcion de vovler a la pagina de inicio-->
       <h1>Registro Exitoso</h1>
     <?php ;}else {?>
       <br><!--En caso de error, imprimimos el Error-->
       <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

     <?php } ?><br><br>
     <a class="btn btn-warning" href="indexdirecciones.php">Regresar</a>
</body>
</html>
