<?php
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
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<link rel="stylesheet" href="css/form.css" />
		<link rel="shortcut icon" type="image/x-icon" href="images/logop.ico" />
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
							<h2>Detalle de usuario</h2>

						</header>
						<br>
						</section>
				</div>
				<?php
				require_once '..\DAL\DBAccess.php';
				$idUsuario=$_GET['IdUsuario'];
				$dba = new DBAccess();
				$conn = $dba->Get_Connection();
				$stmt = $conn->prepare("call spHelpDesk_GET_ConsultaUsu('$idUsuario');");
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				echo'
				<div class="forma" style="width:90%;">
				<form action="action_page.php" >

				<label for="lname">Nombres y Apellidos</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->Nombre.' '.$row->Apellidos.'"  readonly="readonly">

				<label for="lname">Correo</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->Correo.'"  readonly="readonly">

				<label for="lname">Celular</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->NroCelular.'"  readonly="readonly">

				<label for="lname">Perfil</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->Perfil.'"  readonly="readonly">

				<label for="lname">Area</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->Area.'"  readonly="readonly">

				<label for="lname">Estado</label>
				<input class="form" type="text" id="lname" name="lastname" value="'.$row->Estado.'"  readonly="readonly">
				';}
				?>

				<h3>Cambiar estado de cuenta</h3>
				<br>

				<select class="form" id="country" name="country">
					<option value="a">Seleccione un estado</option>
					<option value="a">Activo</option>
					<option value="a">Inactivo</option>
					<option value="a">Eliminado</option>
				</select>
					<input class="formb" type="submit" value="Presinar para editar">
					<input class="formb" type="submit" value="Guardar cambios">


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
