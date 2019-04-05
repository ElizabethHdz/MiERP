<?php

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>Productos</title>
</head>
<body>

    <form class="form2" action="" method="">
        <h2>Productos</h2>
        <p> Id Producto: <input type="text" name="idProd" id="idProd" readonly onmousedown="return false;"></input></p>
        <p><input placeholder="Nombre" type="text" name="nom" id="nom" maxlength="50"></input></p>
        <p><input placeholder="Descripción" type="text" name="desc" id="desc" maxlength="100" ></input></p>
        <p><input placeholder="Precio Venta" type="text" name="precio"  id="precio" maxlength="10"></input></p>
        <p><input placeholder="Descuento Producto" type="text" name="descuento" id="descuento" maxlength="10"></input></p>
        <p><input placeholder="IVA" type="text" name="iva" id="iva" maxlength="10"></input></p>
        <p><input placeholder="Unidad de medida" type="text" name="uMed" id="uMed" maxlength="10"></input></p>
        <p>
         Categoria:
          <select name="cmbCat" id="cmbCat">
         <option value="1">01</option>
          </select>
        </p>

        <input name="registrar" type="submit" value="Registrar"/>
      </form>

</body>
</html>
