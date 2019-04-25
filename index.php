<?php
  require('php/conexion.php');//para las consultas
  $sql = "SELECT Id_Categoria, Descripcion FROM tipo_categoria;";//consultamos los tipos de usuario existentes, se usa para el registro
  $result = $mysqli->query($sql);//ejecutamos la consulta y guardamos

 ?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Principal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/showHide.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/showHide.js" type="text/javascript"></script>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/estilosPrincipal.css">

    </head>
<body >
	<div id="loader-wrapper">
		<div class="logo"></div>
		<div id="loader"> </div>
	</div>

	<header class="main_menu_sec navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<div class="lft_hd">
							<!-- <a href="index.html"><img src="img/logo.png" alt=""/></a> -->
						</div>
					</div>
					  <div>
						<div class="rgt_hd">
							<div class="main_menu">
								<nav id="nav_menu">
									<div id="navbar">
									<ul>
										<li><a  href="inicio.php">Inicio</a></li>
										<li><a>Categorías <i class="fa fa-angle-down"></i></a>
									<ul>
                    <?php //con la consulta previa de los tipos de usuario, aqui los imprimimos en el combo para que se seleccionen por nombre, y los guardamos por numero
                    while ($row = $result->fetch_assoc()) { ?>
                      <li> <a href="productoscat.php?Id_Categoria=<?php echo $row['Id_Categoria']; ?>"><?php echo $row['Descripcion']; ?></a> </li>
                      <!--<option value="<?php echo $row['Id_Categoria']; ?>"><?php echo $row['Descripcion']; ?></option>-->
                    <?php }; ?>
									</ul>
									</li>
									<li><a>Acceder<i class="fa fa-angle-down"></i></a>
									<ul>
										<li><a href="login.php">Iniciar Sesión</a></li>
										<li><a href="registrar.php">Registrarme</a></li>
									</ul>
									</li>
										<li><a href="#">Acerca de nosotros</a></li>
										<li><a href="#">Contáctanos</a></li>
									</ul>
								</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

<!-- start slider Section -->
<section id="slider_sec">
	<div class="container">
		<div class="row">
			<div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1" ></li>
					<li data-target="#carousel-example-generic" data-slide-to="2" ></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1>Vinos y Licores</h1>
							<p>Los mas fregones de la Comarca Lagunera</p>
						  </div>
						</div>
					</div>
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1>Grandes marcas</h1>
							<p>Las mejores marcas en la actualidad</p>
						  </div>
						</div>
					</div>
					<div class="item ">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1>Ofertas bien chidorris</h1>
							<p>Ofertas premium bien chidorris</p>
						  </div>
						</div>
					</div>
				  </div>

				  <!-- Controls -->
				  <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<!-- <span class="sr-only">Previous</span> -->
				  </a>
				  <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<!-- <span class="sr-only">Next</span> -->
				  </a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End slider Section -->

<!-- start Service Section -->
<section id="pr_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<img src="img/chivas.png">
					<h2>Chivas Regal 12</h2>
					<div class="service_hoverly">
						<i class="fa fa-glass"></i>
						<h2>Chivas Regal 12 Años</h2>
						<p>Whisky Chivas Regal 12 Años 750 ml, mezcla de escoceses de malta y grano añejados durante 12 años. </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<h2>Jack Daniel´s</h2>
					<div class="service_hoverly">
						<i class="fa fa-glass"></i>
						<h2> Jack Daniel´s</h2>
						<p>Descripcion del producto</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<h2>Buchanans</h2>
					<div class="service_hoverly">
						<i class="fa fa-glass"></i>
						<h2>Buchanans</h2>
						<p>Descripcion del producto</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">
					<h2>William Lawson</h2>
					<div class="service_hoverly">
						<i class="fa fa-glass"></i>
						<h2>William Lawson</h2>
						<p>Descripcion del producto!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Service Section -->

<!-- start our team Section -->
<section id="tm_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Equipo alfa buena maravilla onda dinamita escuadrón lobo</h1>
					<h2>si señor ejepa</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="all_team">
					<div class="team">
						<h3> El Toñis <span>el mero werever</span></h3>
						<p>el programadorts</p>
					</div>
					<div class="team">
						<h3>La Vanecisha<span> AEB </span></h3>
						<p>la asistente aguadora</p>
					</div>
					<div class="team">
						<h3> La Yatz <span> developer </span></h3>
						<p>La señora del mero werever</p>
					</div>
					<div class="team">
						<h3>Monserrath López<span> Designer </span></h3>
						<p>La que dice que hizo y no hizo ni madres</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End our team Section -->

<!-- start footer Section -->
<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="ft">
					<ul>
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-instagram"></i></a></li>
						<li><a href=""><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
				<ul class="copy_right">
					<li>&copy;Lagartas Wine</li>
					<li>El que al mundo vino y no toma vino, ¿a qué vino?</li>
					<li>Bernardo Piuma </li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- End footer Section -->
 <!-- Chingazo de Scripts -->


<script type="text/javascript">
    $(document).ready(function(){
       $('.show_hide').showHide({
            speed: 1000,  // velocidad que desea que ocurra el cambio
            changeText: 0, // Si no desea que el texto del botón cambie, establezca esto en 0
        });
    });
</script>
<script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
</script>

<script>
        //Hide Overflow of Body on DOM Ready //
      $(document).ready(function(){
          $("body").css("overflow", "hidden");
      });
      // Show Overflow of Body when Everything has Loaded
      $(window).load(function(){
          $("body").css("overflow", "visible");
          var nice=$('html').niceScroll({
          cursorborder:"5",
          cursorcolor:"#00AFF0",
          cursorwidth:"3px",
          boxzoom:true,
          autohidemode:true
          });
      });
</script>
    </body>
</html>
