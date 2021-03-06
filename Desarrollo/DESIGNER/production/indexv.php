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
		<link rel="stylesheet" href="css/tabla.css">
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
								<li><a href="a-mimenu.html">Inicio</a></li>
								<li><a href="production/index.html">Dashboard</a></li>
								<li><a  href="a-todobandeja.html">Bandejas</a></li>
								<li  class="active"><a  href="a-controlus.html">Control</a></li>
								<li><a href="https://dashboard.smartsupp.com/v2" target="_blank">Smartsupp</a></li>
								<li><a href="a-miperfil.html">Mi perfil</span></a></li>
								<li><a href="login.html">Salir <span class="fa fa-power-off"></span></a></li>
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
							<h2>Control de Administradores</h2>
							<br>

							<h3><a href="a-controlcliente.html">Cliente</a> / <a href="a-controlti.html">Soporte TI</a> / <a href="a-controladmin.html">Administrador</a> / <a href="a-controlnuevo.html">Nuevos</a></h3>

						</header>
						<br>
						</section>

				</div>
				<!-- Extra -->
				<form role="form"  action="../pag/ver.php" method="POST">
					<table class="table-fill" >
						<div class="alert alert-info">
				</div>
				</br>
				</br>
				<thead>
						<tr>


							<th class="text-left">ID Cliente</th>
							<th class="text-left">Nombre completo</th>
							<th class="text-left">Area</th>
							<th class="text-left">Perfil</th>
							<th class="text-left">Celular</th>
							<th class="text-left">Email</th>
							<th class="text-left">Estado</th>
							<th class="text-left">Revisar</th>
						</tr>
							</thead>
<?php
require_once '..\DAL\DBAccess.php';
$dba = new DBAccess();
$conn = $dba->Get_Connection();

$stmt = $conn->prepare("SELECT * FROM helpdesk_usuario");

$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo'

							<tbody class="table-hover">
								<tr>
								<td>'.$row->IdUsuario.'</td>
								<td>'.$row->Nombre.'</td>
								<td>'.$row->Nombre.'</td>
								<td>'.$row->Nombre.'</td>
								<td>'.$row->Nombre.'</td>
								<td>'.$row->Nombre.'</td>
								<td>'.$row->Nombre.'</td>
								<td><a href="a-detalleuser.html?IdUsuario='.$row->IdUsuario.'"><span class="fa fa-eye"> </a></td>
							</tr>

							</tbody>';
							}
							?>
						</table>
								 </form>

		<!-- /Extra -->
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
