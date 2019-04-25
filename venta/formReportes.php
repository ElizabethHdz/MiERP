<?php
  require('../php/conexion.php');

  $sql = "SELECT Id_Producto, Nombre FROM producto;";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="reportev.php" method="post">
      <h2>Reporte por fechas</h2><br>
      <label>Fecha inicio</label>
      <input type="date" name="fecha1" value="" required>
      <label>Fecha de corte</label>
      <input type="date" name="fecha2" value="" required>
      <input type="submit" name="submit" value="Ver reportes">
    </form>
    <br><br>
    <form class="" action="reporteProductos.php" method="post">
      <h2>Reporte de productos</h2><br>
      <label>Seleccione el producto que desea consultar</label>
      <select class="" name="producto">
        <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
        while ($row = $result->fetch_assoc()) { ?>
          <option value="<?php echo $row['Id_Producto']; ?>"><?php echo $row['Nombre']; ?></option>
        <?php }; ?>
      </select>
      <input type="submit" name="submit" value="Ver reporte de producto">


    </form>

  </body>
</html>
