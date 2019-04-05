<?php


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Direcciones</title>
</head>
<body>
    <form class="form" action="" method="">
        <h2>Direcciones</h2>
        <p><input placeholder="RFC" type="text" name="rfc" id="rfc" autofocus="on" maxlength="13"></input></p>
        <p><input placeholder="Nombre Fiscal" type="text" name="nomFiscal" id="nomFiscal" maxlength="50"></input></p>
        <p><input placeholder="Dirección" type="text" name="dir" id="dir" maxlength="100" ></input></p>
        <p><input placeholder="Teléfono" type="text" name="tel" id="tel" maxlength="10"></input></p>
        <p><input placeholder="Email" type="text" name="email" id="email" maxlength="50"></input></p>
        <p><input placeholder="Codigo Postal" type="text" name="cp" id="cp" maxlength="5"></input></p>
        <p>
          Tipo de dirección:
          <select name="cmb" id="cmb">
            <option value="cliente">Cliente</option>
            <option value="proveedor">Proveedor</option>
            <option value="ambos">Ambos</option>
          </select>
        </p>

        <button>Registrar</button>
      </form>
</body>
</html>
