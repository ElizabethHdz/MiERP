<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: ../login.php");
}
  require('../php/conexion.php');

  $sql = "SELECT ID_TD, Descripcion FROM tipo_direccion;";//consultamos los tipos de usuario existentes, se usa para el registro
  $resultt = $mysqli->query($sql);//ejecutamos la consulta y guardamos

  $RFCG = $_GET['RFC'];

  $sql1 = "SELECT * FROM direcciones WHERE RFC= '$RFCG';";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql1);//ejecutamos la consulta y guardamos

  while ($row = $result->fetch_assoc()) {
    $rfc = $row['RFC'];
    $nfiscal = $row['Nombre_Fiscal'];
    $direccion = $row['Direccion'];
    $cp = $row['CP'];
    $telefono = $row['Telefono'];
    $email = $row['Email'];
    $tipodir = $row['Tipo_Direccion'];
  }

  if (isset($_POST['modificar'])) {
    if (isset($_POST['rfc']) && !empty($_POST['rfc']) && isset($_POST['tipo_direccions']) && !empty($_POST['tipo_direccions'])) {

      $rfc2 = $_POST['rfc'];
      $nfiscal2 = $_POST['nomFiscal'];
      $direccion2 = $_POST['dir'];
      $cp2 = $_POST['cp'];
      $telefono2 = $_POST['tel'];
      $email2 = $_POST['email'];
      $tipodir2 = $_POST['tipo_direccions'];

      $sqlUsuario = "UPDATE direcciones SET RFC='$rfc2', Nombre_Fiscal='$nfiscal2', Direccion='$direccion2',CP='$cp2',Telefono='$telefono2', Email='$email2',Tipo_Direccion='$tipodir2' WHERE RFC = '$RFCG'";//construimos la sentencia
      $resultUsuario = $mysqli->query($sqlUsuario) or die(mysqli_error());//la Ejecutamos

      header('refresh: 2; url=modificar.php');
      echo "<p>      Modificacion exitosa    </p>";
    }
  } else {

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
      $("#cmb > option[value="+ <?php echo $tipodir; ?> +"]").attr("selected", true);
      $('#cmb').change();
    });
    </script>
    <title>Direcciones</title>
</head>
<body>
  <form class="form" action="" method="post">
      <h2>Direcciones</h2>
      <p><input type="text" value="<?php echo $rfc; ?>" name="rfc" id="rfc" autofocus="on" maxlength="13"></input></p>
      <p><input type="text" value="<?php echo $nfiscal; ?>" name="nomFiscal" id="nomFiscal" maxlength="50"></input></p>
      <p><input type="text" value="<?php echo $direccion; ?>" name="dir" id="dir" maxlength="100" ></input></p>
      <p><input type="text" value="<?php echo $telefono; ?>" name="tel" id="tel" maxlength="10"></input></p>
      <p><input type="email" value="<?php echo $email; ?>" name="email" id="email" maxlength="50"></input></p>
      <p><input type="text" value="<?php echo $cp; ?>" name="cp" id="cp" maxlength="5"></input></p>
      <p>
        Tipo de dirección:
        <select name="tipo_direccions" id="cmb">
         <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
         while ($row = $resultt->fetch_assoc()) { ?>
           <option value="<?php echo $row['ID_TD']; ?>"><?php echo $row['Descripcion']; ?></option>
         <?php }; ?>

        </select>
      </p>
      <input name="modificar" type="submit" value="Modificar"/>
      <!--<button>Registrar</button>-->
    </form><br><br>
<a  href="modificar.php" class="btn btn-warning">Regresar</a>
</body>
</html>
