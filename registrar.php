<?php
session_start();//Inicia una nueva sesion o reaunuda la existente
if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
  //header("Location: index.php");
}
  require('php/conexion.php');//para las consultas

  $sql = "SELECT Tipo_Usuario, Descripcion FROM tipo_usuario;";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos
  //var_dump($mysqli);

  $bandera = false;//esta bandera nos servira mas delante

  if (!empty($_POST)) {//checamos que la varialbe post no este vacia, si esta llena...
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);//cada uno a una variable los valores a guardar
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $sha1_pass = sha1($password);//encriptamos la contraseña

    $error = '';//en caso de error, usaremos esta variable, por el momento estara vacia

    $sqlUser = "SELECT Usuario FROM usuarios WHERE Usuario = '$usuario';";//Hacemos una consulta, esto para VErificar que no exista el usuario
    $resultUser = $mysqli->query($sqlUser);//la ejecutamos y almacenamos en una variable
    $rows = $resultUser->num_rows;//sacamos el numero de filas devueltas

    if ($rows > 0) {//si devulve mas de 0, quiere decir que existe ya el usuario
      $error = "El usuario ya existe";//mandamos el mensaje de que ya existe
    }
    else {//si no existe el usuario
      $sqlUsuario = "INSERT INTO usuarios(Usuario, Password, Tipo_Usuario, Bandera) VALUES ('$usuario', '$sha1_pass', '$tipo_usuario', 1);";//construimos la sentencia
      $resultUsuario = $mysqli->query($sqlUsuario);//la Ejecutamos

      if ($resultUsuario > 0) {//si se inserta correctamente, nos devovlera que se afecto 1 fila,
        $bandera = true;//entones, declaramos la bandera en 1
      } else {//sino, entonces mandamos un mensaje de que ocuurrio un error
        $error = "Error al regitrar";
      }

    }
  }
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/estilos.css">
     <script src="js/jquery-3.3.1.min.js"></script>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/bootstrap.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <title>Registro</title>

     <!--Validaciones del script-->
     <script type="text/javascript">

       function validarUsuario() {
         valor = document.getElementById('usuario').value;
         if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
           alert('Falta llenar usuario');
           return false;
         } else {
           return true;
         }
       }

       function validarPassword() {
         valor = document.getElementById('password').value;
         if (valor == null || valor.length == 0 || /^\s+$/.test(valor)) {
           alert('Falta llenar password');
           return false;

         } else {
           valor2 = document.getElementById('con_password').value;
           if (valor == valor2) {
             return true;
           } else {
             alert('Las contraseñas no coinciden');
           }
         }
       }

       function validarTipoUsuario() {
         indice = document.getElementById("tipo_usuario").selectedIndex;
         if (indice == null || indice == 0) {
           alert("Seleccione tipo de usuario");
           return false;
         } else {
           return true;
         }
       }

       function validar() {
         if (validarUsuario() && validarPassword() && validarTipoUsuario()) {
           document.registro.submit();
         }
       }
     </script>

   </head>
   <body>
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="registro" name="registro">

      <div><label>Usuario:</label><input id="usuario" name="usuario" type="email"></div>
			<br />

			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />

			<div><label>Confirmar Password:</label><input id="con_password" name="con_password" type="password"></div>
			<br />


       <div id="ocultar"> <label>Tipo Usuario: </label>
         <select name="tipo_usuario" id="tipo_usuario">
           <option value="0">Selecione tipo de usuario...</option> <!--//Asignamos un valor por default, pemdoemte de modificar-->
           <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
           while ($row = $result->fetch_assoc()) { ?>
             <option value="<?php echo $row['Tipo_Usuario']; ?>"><?php echo $row['Descripcion']; ?></option>
           <?php }; ?>
         </select>
      </div>

      <?php
      if (!isset($_SESSION["Usuario"])) {//si no existe, entonces devolvemos al login
        //header("Location: index.php");
        echo "<script>$('#ocultar').css('display', 'none');</script>";
      }
       ?>
       <script type="text/javascript">
       $(document).ready(function(){
         $("#tipo_usuario > option[value=3]").attr("selected", true);
         $('#tipo_usuario').change();
       });
       </script>



      <br>
      <div>
      <input name="registrar" type="button" value="Registrar" onClick="validar();"/>
      </div>
      <br>
      <!--En este apartado, mandamos llamar la accion de validar, que es la que ejecuta el codigo php-->
     </form>

     <?php if($bandera){ ?><!--Pir ultimo, si la bandera es verdadera, imprimimos que fue exitoso el registro, y activamos la opcion de vovler a la pagina de inicio-->
       <h1>Registro Exitoso</h1>
     <?php header('refresh: 1; inicio.php');}else {?>
       <br><!--En caso de error, imprimimos el Error-->
       <div style="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>

     <?php } ?>
     <br><br>
     <?php if (isset ($_SESSION) ||$_SESSION['Tipo_Usuario']==1) {?>
        <a href="inicio.php" class="btn btn-danger">Regresar</a>
     <?php } else { ?>
       <a href="index.php" class="btn btn-danger">Regresar</a>
  <?php   } ?>

   </body>
 </html>
