<?php
/*session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: /../index.php");
}*/

require('../php/conexion.php');//para las consultas


$sql = "SELECT Id_Categoria, Descripcion FROM tipo_categoria;";//consultamos los tipos de usuario existentes, se usa para el registro
$result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

$bandera = false;

if (!empty($_POST)) {
  $nombre = mysqli_real_escape_string($mysqli, $_POST['nom']);//cada uno a una variable los valores a guardar
  $descripcion = mysqli_real_escape_string($mysqli, $_POST['desc']);
  $precioVenta = mysqli_real_escape_string($mysqli, $_POST['precio']);
  $descuento = mysqli_real_escape_string($mysqli, $_POST['descuento']);
  $iva = mysqli_real_escape_string($mysqli, $_POST['iva']);
  $UMedida = mysqli_real_escape_string($mysqli, $_POST['uMed']);
  $tipoCat = mysqli_real_escape_string($mysqli, $_POST['cmbCat']);


  $error = '';//en caso de error, usaremos esta variable, por el momento estara vacia

  /*$sqlDir = "SELECT RFC FROM direcciones WHERE RFC = '$rfc';";//Hacemos una consulta, esto para VErificar que no exista el producto
  $resultDir = $mysqli->query($sqlDir);//la ejecutamos y almacenamos en una variable
  $rows = $resultDir->num_rows;//sacamos el numero de filas devueltas

    if ($rows > 0) {//si devulve mas de 0, quiere decir que existe ya el usuario
      $error = "El Cliente/Proveedor ya existe";//mandamos el mensaje de que ya existe
    }
    else {*/
      $sqlpro = "INSERT INTO producto (Nombre, Descripcion, Precio_Venta, Descuento_Producto, IVA, Unidad_Medida, Id_Categoria, Bandera) VALUES ('$nombre','$descripcion','$precioVenta','$descuento','$iva','$UMedida','$tipoCat', 1)";//construimos la sentencia
      $resultpro = $mysqli->query($sqlpro);//la Ejecutamos

      if ($resultpro > 0) {//si se inserta correctamente, nos devovlera que se afecto 1 fila,
        $bandera = true;//entones, declaramos la bandera en 1
      } else {//sino, entonces mandamos un mensaje de que ocuurrio un error
        $error = "Error al regitrar";
      }
    //}

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
    <title>Productos</title>
</head>
<body>

    <form class="form2" action="" method="post">
        <h2>Productos</h2>
        <!--<p> Id Producto: <input type="text" name="idProd" id="idProd" readonly onmousedown="return false;"></input></p>-->
        <p><input placeholder="Nombre" type="text" name="nom" id="nom" maxlength="50"></input></p>
        <p><input placeholder="Descripción" type="text" name="desc" id="desc" maxlength="100" ></input></p>
        <p><input placeholder="Precio Venta" type="text" name="precio"  id="precio" maxlength="10"></input></p>
        <p><input placeholder="Descuento Producto" type="text" name="descuento" id="descuento" maxlength="10"></input></p>
        <p><input placeholder="IVA" type="text" name="iva" id="iva" maxlength="10"></input></p>
        <p><input placeholder="Unidad de medida" type="text" name="uMed" id="uMed" maxlength="10"></input></p>
        <p>
         Categoria:
          <select name="cmbCat" id="cmbCat">
            <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
            while ($row = $result->fetch_assoc()) { ?>
              <option value="<?php echo $row['Id_Categoria']; ?>"><?php echo $row['Descripcion']; ?></option>
            <?php }; ?>
          </select>
        </p>

        <input name="registrar" type="submit" value="Registrar"/>
      </form>

      <?php if($bandera){ ?><!--Por ultimo, si la bandera es verdadera, imprimimos que fue exitoso el registro, y activamos la opcion de vovler a la pagina de inicio-->
       <h1>Registro Exitoso</h1>
     <?php ;}else {?>
       <br><!--En caso de error, imprimimos el Error-->
       <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

     <?php } ?>
     <a class="btn btn-warning" href="iniciop.php">Regresar</a>
</body>
</html>
