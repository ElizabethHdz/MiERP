<?php
  /*session_start();//Inicia una nueva sesion o reaunuda la existente
  if (!isset($_SESSION["Usuario"]) || $_SESSION['Tipo_Usuario'] != 1) {//si no existe, entonces devolvemos al login
    header("Location: ../index.php");
  }*/
  require('php/conexion.php');
  $CGet = $_GET['Id_Categoria'];
  $sql = "SELECT * FROM producto where Id_Categoria = '$CGet'";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

  if ($result->num_rows < 1) {
    echo "<h1>No se encontraron productos de esta categoría</h1>";

  }
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/estilosPrincipal.css">
    <title>Productos</title>

    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
      </style>
</head>
<body>
  <br> <br>
  <div class="pantallaproductos">
    <?php  while ($row = $result->fetch_assoc()) {
      if ($row['Bandera']  == 1) {
      ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="service">
       <img src="img/chivas.png">
       <h2><?php echo $row['Nombre']; ?></h2>
       <div class="service_hoverly">
         <i class="fa fa-glass"></i>
         <h2><?php echo $row['Precio_Venta']; ?></h2>
         <p><?php echo $row['Descripcion']; ?> </p>
         <button type="button" name="button"> <a href="inicio.php?Id_Producto=<?php echo $row['Id_Producto']?>">Agregar al carrito</a> </button>
       </div>
     </div>
   </div>
   <?php } ?>
 <?php } ?>
</div>
    <br><br>
    <a class="btn btn-warning" href="inicio.php">Regresar</a>

</body>
</html>
