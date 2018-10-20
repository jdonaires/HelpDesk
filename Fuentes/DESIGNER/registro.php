<?php
	include_once "..\DAO\HelpDesk_PerfilDAO.php";
	include_once "..\DAO\HelpDesk_AreaDAO.php";

	$HelpDesk_PerfilDAO = new HelpDesk_PerfilDAO();
	$HelpDesk_AreaDAO = new HelpDesk_AreaDAO();

	$Result = $HelpDesk_PerfilDAO->GET_Perfil();
	$ResultArea = $HelpDesk_AreaDAO->GET_Area();

	if(isset($_POST['_frm_action']))
	{
				echo("hola");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Helpdesk</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script> 
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/helpdesk_main.js"  rel></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<link rel="stylesheet" href="css/form.css" />
		<link rel="shortcut icon" type="image/x-icon" href="images/logop.ico" />
		<!-- Smartsupp Live Chat script -->
		<script type="text/javascript">
		var _smartsupp = _smartsupp || {};
		_smartsupp.key = '10e046a39fea2ca7b4867a0023f300d0f5dde264';
		window.smartsupp||(function(d) {
			var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
			s=d.getElementsByTagName('script')[0];c=d.createElement('script');
			c.type='text/javascript';c.charset='utf-8';c.async=true;
			c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
		})(document);
		</script>
	</head>
	<body>
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
							<li><a href="index.html">Inicio</a></li>
							<li  class="active"><a href="registro.html">Registrarme</a></li>
							<li><a href="login.html">Iniciar sesion</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- Header -->

			<!-- Banner -->
			<div id="banner">
				<div class="container">
				</div>
			</div>
			<!-- /Banner -->
		</div>

		<!-- Main -->
		<div id="main">
			<div class="container">
				<div class="row">
					<section>
						<header>
							<h2>Registro</h2>
						</header>
						<br>
					</section>
				</div>
				<div class="forma" style="width:90%;">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="_frm_action" name="_frm_action">
						<h3>Datos personales</h3><br>
						<label for="lname">Nombres</label>
						<input class="form" type="text" id="_nombre" name="_nombre" autocomplete="off">

						<label for="lname">Apellidos</label>
						<input class="form" type="text" id="_apellidos" name="_apellidos" autocomplete="off">

						<label for="lname">Celular</label>
						<input class="form" type="text" id="_celular" name="_celular" autocomplete="off">

						<label for="country">Area</label>
						<select class="form" id="_area" name="_area">
							<option value="0">Seleccione..</option>
							<?php
								foreach ($ResultArea as $key => $item) {
									echo '<option value="'.$item["IdArea"].'">'.$item['Descripcion'].'</option>';
								}
							?>
						</select>

						<h3>Datos de cuenta</h3><br>
						<label for="country">Perfil</label>
						<select class="form" id="_perfil" name="_perfil">
							<option value="0">Seleccione..</option>
							<?php
								foreach ($Result as $key => $item) {
									echo '<option value="'.$item["IdPerfil"].'">'.$item['Descripcion'].'</option>';
								}
							?>
						</select>
						<label>Correo</label>
						<input class="form" type="text" id="_correo" name="_correo" autocomplete="off">

						<label>Contraseña</label>
						<input class="form" type="password" id="_contrasenia" name="_contrasenia" autocomplete="off">

						<label>Confirmar contraseña</label>
						<input class="form" type="password" id="_rcontrasenia" name="_rcontrasenia" autocomplete="off">

						<input class="formb" type="button" value="Validar datos" id="_validad">
						<input class="formb" type="button" value="Registrarme" id="_registrar">
					</form>
				</div>
			</div>
		</div>
		<!-- /Main -->

		<!-- Copyright -->
		<div id="copyright">
			<div class="container">
				Todos los derechos reservados 2018 ©
			</div>
		</div>
	</body>
</html>

	

	function fn_ValidaDatos(){
		if($("#_nombre").val() == null ||  $("#_nombre").val().length == 0){
			ShowMessage("Ingrese su nombre.");
		}
		else if($("#_apellidos").val() == null ||  $("#_apellidos").val().length == 0){
			ShowMessage("Ingrese su apellido.");
		}
		else if($("#_celular").val() == null ||  $("#_celular").val().length == 0){
			ShowMessage("Ingrese su nro. de celular.");
		}
		else if($("#_area").val() == null ||  $("#_area").val().length == 0){
			ShowMessage("Seleccione su area de trabajo.");
		}
		else if($("#_perfil").val() == null ||  $("#_perfil").val() == "0"){
			ShowMessage("Seleccione un perfil.");
		}
		else if($("#_correo").val() == null ||  $("#_correo").val().length == 0){
			ShowMessage("Ingrese su correo electronico.");
		}
		else if($("#_contrasenia").val() == null ||  $("#_contrasenia").val().length == 0){
			ShowMessage("Ingrese su contraseña.");
		}
		else if($("#_rcontrasenia").val() == null ||  $("#_rcontrasenia").val().length == 0){
			ShowMessage("Ingrese su apellido.");
		}
	}

	function ShowMessage(Message){
		swal("Registro de Usuario", Message, "info");
	}

</script>

	<?php echo "<script> swal({
   title: '¡ERROR!',
   text: 'Esto es un mensaje de error',
   type: 'error',
 });</script>";
?>