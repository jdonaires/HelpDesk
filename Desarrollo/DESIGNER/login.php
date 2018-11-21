<html lang="en" >
	<head>
		<title>Helpdesk</title>
		<meta name="google" content="notranslate" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/helpdesk_main.js"></script>
		<script src="js/sweetalert.min.js"></script>
		<link href="css/sweetalert.css" rel="stylesheet" />
		<link rel="shortcut icon" type="image/x-icon" href="images/logop.ico" />
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/stylelog.css">
	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<a href="index.html" rel="nofollow"><img id="logoback" width="400px" src="images/logo.png"alt=""/></a>
				<h1>Iniciar sesion</h1>
				<form role="form" method="post" action="c-mimenu.html">
					<input type="text" placeholder="Email" id="Email" name="Email">
					<input type="password" placeholder="Contraseña" id="password" name="password">
					<button type="button" id="login-button" value="Login" >Ingresar</button></br>
					<br>
				</form>
			</div>
		</div>
	</body>
</html>
<script>

$("#login-button").click(function(){
	if( fn_ValidaDatos() == false){
		var data = {
					Correo: $("#Email").val(),
					Contrasenia: $("#password").val(),
				};
		$.ajax({
				url: "../Helper/HelpDesk_Usuario.php",
				data: { "Login": JSON.stringify(data)},
				type: "POST",
				async: true,
				datatype: "html",
				success: function (data) {
					if (data == "Soporte") {
						location.href="t-bentrada.php";
					}
					else if (data == "Cliente") {
						location.href="c-mimenu.php";
					}
					else if (data == "Administrador") {
						location.href="a-contnuevoc.php" ;
					}
					else {
						swal('HelpDesk', data, 'info');
					};
				},
		});
	}
});

function fn_ValidaDatos(){
		var Valida = false;
		if($("#Email").val() == null ||  $("#Email").val().length == 0){
			Valida = true;
			swal('HelpDesk', "Ingrese su correo", 'info');
		}
		else if($("#password").val() == null ||  $("#password").val().length == 0){
			Valida = true;
		  swal('HelpDesk', "Ingrese su contraseña", 'info');
		}
		return Valida;
	}

</script>
