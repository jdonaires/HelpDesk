  <?php
	include_once "..\DAO\HelpDesk_PerfilDAO.php";
	include_once "..\DAO\HelpDesk_AreaDAO.php";
	include_once "..\DAO\HelpDesk_UsuarioDAO.php";
	include_once "..\BOL\HelpDesk_Usuario.php";

	$HelpDesk_PerfilDAO = new HelpDesk_PerfilDAO();
	$HelpDesk_AreaDAO = new HelpDesk_AreaDAO();
	$ResultArea= $HelpDesk_AreaDAO->GET_Area();
	$Result= $HelpDesk_PerfilDAO->GET_Perfil();
?>
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
		<script src="js/helpdesk_main.js"></script>
		<script src="js/sweetalert.min.js"></script>
		<link href="css/sweetalert.css" rel="stylesheet" />
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
							<li><a href="index.php">Inicio</a></li>
							<li  class="active"><a href="registro.php">Registrarme</a></li>
							<li><a href="login.php">Iniciar sesion</a></li>
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
					<form action="?action=registrar" method="post" id="_frm_action">
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

						<input class="formb" type="button" value="Validar datos" id="_validar" >
						<input class="formb" type="button" value="Registrarme" id="_registrar" >
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

<script>
	// REGISTRO DE USUARIO
	$("#_registrar").click(function(){
		if( fn_ValidaDatos() == false){
			var data = {
				Opcion: "I" ,
				IdUsuario: 0,
				IdPerfil: $("#_perfil").val(),
				IdArea: $("#_area").val(),
				Nombre: $("#_nombre").val(),
				Apellidos: $("#_apellidos").val(),
				Correo: $("#_correo").val(),
				Contrasenia: $("#_contrasenia").val(),
				NroCelular:$("#_celular").val(),
				XML : "",
				ItemXML: 0,
				Estado = ""
			};
			HelpDeskajaxPostSetProcess({
				url: "../Helper/HelpDesk_Usuario.php",
				data: { "SET_Usuario": JSON.stringify(data)},
				title: "Registro de Usuario",
				isWarning:true,
				invokefunction:NavigationView
			});
		};
	});

	// NAVEGACION ENTRE PAGINAS
	function NavigationView(){
		location.href="login.php";
	}

	// VALIDA CORREO
	$("#_validar").click(function(){

		// VALIDA QUE EL CORREO SEA INGRESADO
		if($("#_correo").val() == null ||  $("#_correo").val().length == 0){
			ShowMessage("Ingrese su correo electrónico.", "Registro de Usuario", "info");
			return;
		}
		var data = {
			Correo: $("#_correo").val(),
		};
		$.ajax({
			url: "../Helper/HelpDesk_Usuario.php",
			data: { "Valida_Email": JSON.stringify(data)},
			type: "POST",
			async: true,
			datatype: "html",
			success: function (data) {
				if(data == "Success"){
					ShowMessage("Correo electrónico valido para el registro", "Registro de Usuario", "info");
				}
				else{
					ShowMessage(data, "Registro de usuario", "warning");
				}
			},
		});
	});

	function fn_ValidaDatos(validafull){
		var Valida = false;
		if($("#_nombre").val() == null ||  $("#_nombre").val().length == 0){
			Valida = true;
			ShowMessage("Ingrese su nombre.", "Registro de Usuario", "info");
		}
		else if($("#_apellidos").val() == null ||  $("#_apellidos").val().length == 0){
			Valida = true;
			ShowMessage("Ingrese su apellido.", "Registro de Usuario", "info");
		}
		else if($("#_celular").val() == null ||  $("#_celular").val().length == 0){
			Valida = true;
			ShowMessage("Ingrese su nro. de celular.", "Registro de Usuario", "info");
		}
		else if($("#_area").val() == null ||  $("#_area").val().length == 0){
			Valida = true;
			ShowMessage("Seleccione su area de trabajo.", "Registro de Usuario", "info");
		}
		else if($("#_perfil").val() == null ||  $("#_perfil").val() == "0"){
			Valida = true;
			ShowMessage("Seleccione un perfil.", "Registro de Usuario", "info");
		}
		else if($("#_correo").val() == null ||  $("#_correo").val().length == 0){
			Valida = true;
			ShowMessage("Ingrese su correo electrónico.", "Registro de Usuario", "info");
		}
		else if($("#_contrasenia").val() == null ||  $("#_contrasenia").val().length == 0){
			Valida = true;
			ShowMessage("Ingrese su contraseña.", "Registro de Usuario", "info");
		}
		else if($("#_rcontrasenia").val() == null ||  $("#_rcontrasenia").val().length == 0){
			Valida = true;
			ShowMessage("Vuelva ingresar su contraseña.", "Registro de Usuario", "info");
		}
		return Valida;
	}


</script>
