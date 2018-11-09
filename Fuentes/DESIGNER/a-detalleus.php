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
							<br>
							<h3><a href="a-bentrada.php">Volver</a></h3>
						</header>
					</section>

		  	<?php
				require_once '..\DAL\DBAccess.php';
				$idUsuario=$_GET['IdUsuario'];
				$dba = new DBAccess();
				$conn = $dba->Get_Connection();
				$stmt = $conn->prepare("call spHelpDesk_GET_ConsultaUsu('$idUsuario');");
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
				echo'
				</div>
				<div class="forma" style="width:90%;">
				<form action="action_page.php" >

				<label for="lname">Nombres y Apellidos</label>
				<input class="form" type="text" id="lname" name="Nombre" value="'.$row->Nombre.' '.$row->Apellidos.'"  readonly="readonly">

				<label for="lname">Correo</label>
				<input class="form" type="text" id="lname" name="Correo" value="'.$row->Correo.'"  readonly="readonly">

				<label for="lname">Celular</label>
				<input class="form" type="text" id="lname" name="Nuemro de celular" value="'.$row->NroCelular.'"  readonly="readonly">

				<label for="lname">Perfil</label>
				<input class="form" type="text" id="lname" name="Perfil" value="'.$row->Perfil.'"  readonly="readonly">

				<label for="lname">Area</label>
				<input class="form" type="text" id="lname" name="Area" value="'.$row->Area.'"  readonly="readonly">

				<label for="lname">Estado</label>
				<input class="form" type="text" id="lname" name="Estado" value="'.$row->Estado.'"  readonly="readonly">
				';}
				?>

				<h3>Cambiar estado de cuenta a:</h3>
				<select class="form" id="Estado" name="NuevoEstado">

					<option value="Activo">Activo</option>
					<option value="Inactivo">Inactivo</option>
					<option value="Eliminado">Eliminado</option>
				</select>

				<h3>Privilegios</h3>
				<!-- Extra<label>

<input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">Este es mi segundo checkbox</label> -->

					<table class="table-fill" >
						<div class="alert alert-info">
				</div>
				<thead>
						<tr>
							<th class="text-left">Cliente</th>
							<th class="text-left">Administrador</th>
							<th class="text-left">Soporte TI</th>
						</tr>
							</thead>
							<tbody class="table-hover">
								<tr>
									<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox">Crear Tickets</label></th>
									<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox">Asignar Tickets</label></th>
									<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox">Validar tickets</label></th>
							</tr>
							<tr>
								<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox"> Mi perfil</label></th>
								<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox"> Aceptar Usuarios</label></th>
								<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox"> Tickets cerrados</label></th>

						</tr>
						<tr>
							<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox">Mi ticket</label></th>
							<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox"> dashboard</label></th>
							<th class="text-left"><input type="checkbox" id="cbox1" value="first_checkbox"> Ver tickets</label></th>

					</tr>
							</tbody>
						</table>
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
