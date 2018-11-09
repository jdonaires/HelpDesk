<!DOCTYPE HTML>
<html>
	<head>
		<title>Helpdesk</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<link rel="shortcut icon" type="image/x-icon" href="images/logop.ico" />
		<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '854e8cbddf22d3d004589f79e9765c9e86ddaaaa';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
	</head>
	<body class="homepage">

	<div id="header-wrapper">

		<!-- Header -->
			<div id="header">
				<div class="container">

					<!-- Logo -->
						<div id="logo">
							<h1> <img id="logoback" width="200px" src="images/logo.png"alt=""/><a id="logodesk" href="#"  style="color:#ffff;">Helpdesk</a></h1>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="active"><a href="c-mimenu.php">Inicio</a></li>
								<li><a href="c-minticket.php">Crear ticket</a></li>
								<li><a  href="c-miticket.php">Mis tickets</a></li>
								<li><a href="c-miperfil.php">Mi perfil</a></li>
								<li><a href="login.php">Salir<span class="fa fa-power-off"></a></li>
							</ul>
						</nav>

				</div>
			</div>
		<!-- Header -->

		<!-- Banner -->
			<div id="banner">
				<div class="container">

					<section>
						<span class="fa fa-cubes"></span>
						<header>
							<?php
							 	session_start();
								echo('<h2>Hola '.$_SESSION["UsuarioLogin"][0]["Nombre"].'</h2>');
							?>
							<span class="byline">Para ayudarte crea un ticket</span>
						</header>
						<a href="c-minticket.php" class="button medium">Crear nuevo ticket</a>
					</section>
				</div>
			</div>
		<!-- /Banner -->

	</div>
	<!-- /Extra -->
	<!-- Copyright -->
		<div id="copyright">
			<div class="container">
			Todos los derechos reservados 2018 ©
			</div>
		</div>
	</body>
</html>
