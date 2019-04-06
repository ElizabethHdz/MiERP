<?php
  require('php/conexion.php');
  session_start();

  //En este caso, si la sesion esta iniciada, checo que tenga el nombre del usuario, y abro la pagina de inicio
  if (isset($_SESSION["Usuario"])) {
    header("Location: inicio.php");
//Prueba
  }
  //Ahora checo que la variable POST tenga datos
  if (!empty($_POST)) {//si es diferente de vacio, entocnes
    $usuario = mysqli_real_escape_string($mysqli, $_POST['Usuario']);//saco el nombre de usuario en string
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);//saco la contraseña
    $error = '';//en caso de error, aqui lo guardo y muestro, pero solo la declaro vacia

    $sha1_pass = sha1($password);//con esto, encriptamos la contraseña, para poderla comparar con la de la BD

    $sql = "SELECT Usuario, Tipo_Usuario FROM usuarios WHERE Usuario = '$usuario' AND Password = '$sha1_pass';";//lanzo la consulta con la que obtengo el tipo de usuario
    $result = $mysqli->query($sql);//le paso la consulta sql, la ejecuto y el resultado lo guardo en una variable, todo esto ya esta configurado previamente
    $rows = $result->num_rows;//finalmente, saco el numero de filas devueltas

    if ($rows > 0) {//si tengo mas de una fila(osea que exite el usuario y la contraseña)
      $row = $result->fetch_assoc();//saco los datos de la consuilta
      $_SESSION['Usuario'] = $row['Usuario'];//ahora los alamceno por separado,en este caso solo me interesa el usuario y su tipo
      $_SESSION['Tipo_Usuario'] = $row['Tipo_Usuario'];


      header("Location: inicio.php");//Finalmente, lo mando a la pagina de inicio

    }else {
      $error = "El nombre o contraseña son incorrectos";//En caso de ser erroneos los datos, mando un mensaje
    }
  }
 ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>ERP</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/main.css">
        <link rel="icon" type="imagen/png" href="img/Logo.png"/>

    </head>
    <body>
        <h1>Iniciar Sesi&oacuten</h1>

        <div id="div_formulario">
            <form name="myform" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"><!--El formulario se manda llamar a si mismo para checar lo que declaramos primero-->
                <img src="img/1492304768_free-17.ico" >
            <label>Usuario <input id="Usuario" type="email" name="Usuario" autofocus required placeholder="Ingrese su email" /></label><br><br>
            <label>Contraseña <input id="password" type="password" name="password" required placeholder="Ingrese Contraseña"/></label><br><br>
            <input type="submit" class="boton" id="login" name="login"value="Iniciar Sesi&oacute;n"/>
        </form>

        <a href="index.php"> <input type="submit" name="volver" value="Regresar"></a>
        </div>

        <br>
        <!--en caso de error, lo imprimimos-->
        <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ?  utf8_decode($error) : ''; ?>     </div>
    </body>
</html>
