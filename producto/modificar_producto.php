<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  header("Location: /../index.php");
}
require('../php/conexion.php');//para las consultas

$sql = "SELECT Id_Categoria, Descripcion FROM tipo_categoria;";//consultamos los tipos de usuario existentes, se usa para el registro
$result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

$IDPG = $_GET['Id_Producto'];

$sql1 = "SELECT * FROM producto WHERE Id_Producto= '$IDPG';";//consultamos los tipos de usuario existentes, se usa para el registro
$result1 = $mysqli->query($sql1);//ejecutamos la consulta y guardamos

while ($row = $result1->fetch_assoc()) {
  $nombre = $row['Nombre'];
  $descripcion = $row['Descripcion'];
  $precioVenta = $row['Precio_Venta'];
  $descuento = $row['Descuento_Producto'];
  $iva = $row['IVA'];
  $UMedida = $row['Unidad_Medida'];
  $tipoCat = $row['Id_Categoria'];
}
if (isset($_POST['modificar'])) {
  if (isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['descuento']) && !empty($_POST['descuento'])) {
    $nombre1 = $_POST['nom'];
    $descripcion1 = $_POST['desc'];
    $precioVenta1 = $_POST['precio'];
    $descuento1 = $_POST['descuento'];
    $iva1 = $_POST['iva'];
    $UMedida1 = $_POST['uMed'];
    $tipoCat1 = $_POST['cmbCat'];

    $sqlproduc = "UPDATE producto SET Nombre='$nombre1', Descripcion = '$descripcion1', Precio_Venta= '$precioVenta1', Descuento_Producto = '$descuento1', IVA = '$iva1', Unidad_Medida = '$UMedida1', Id_Categoria = '$tipoCat1' WHERE Id_Producto = '$IDPG'";

    $resultprod = $mysqli->query($sqlproduc) or die(mysqli_error());

    header('refresh: 2; url=modificarp.php');
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
      $("#cmbCat > option[value="+ <?php echo $tipoCat; ?> +"]").attr("selected", true);
      $('#cmb').change();
    });
    </script>

    <title>Productos</title>
</head>
<body>

    <form class="form2" action="" method="post">
        <h2>Productos</h2>
        <!--<p> Id Producto: <input type="text" name="idProd" id="idProd" readonly onmousedown="return false;"></input></p>-->
        <p><input type="text" value="<?php echo $nombre; ?>" name="nom" id="nom" maxlength="50"></input></p>
        <p><input type="text" value="<?php echo $descripcion; ?>" name="desc" id="desc" maxlength="100" ></input></p>
        <p><input type="text" value="<?php echo $precioVenta; ?>" name="precio"  id="precio" maxlength="10"></input></p>
        <p><input type="text" value="<?php echo $descuento; ?>" name="descuento" id="descuento" maxlength="10"></input></p>
        <p><input type="text" value="<?php echo $iva; ?>" name="iva" id="iva" maxlength="10"></input></p>
        <p><input type="text" value="<?php echo $UMedida; ?>" name="uMed" id="uMed" maxlength="10"></input></p>
        <p>
         Categoria:
          <select name="cmbCat" id="cmbCat">
            <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
            while ($row = $result->fetch_assoc()) { ?>
              <option value="<?php echo $row['Id_Categoria']; ?>"><?php echo $row['Descripcion']; ?></option>
            <?php }; ?>
          </select>
        </p>

        <input name="modificar" type="submit" value="Modificar"/>
      </form>
     <a class="btn btn-warning" href="modificarp.php">Regresar</a>
</body>
</html>
