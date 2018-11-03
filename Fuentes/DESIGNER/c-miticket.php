<?php
 	session_start();
	require_once '..\DAO\HelpDesk_TicketDAO.php';
	$HelpDesk_TicketDAO = new HelpDesk_TicketDAO();
	$result = $HelpDesk_TicketDAO->GET_Ticket($_SESSION["UsuarioLogin"][0]["IdUsuario"]);
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
			<div id="header">
				<div class="container">
						<div id="logo">
							<h1> <img id="logoback" width="200px" src="images/logo.png"alt=""/><a id="logodesk" href="#"  style="color:#ffff;">Helpdesk</a></h1>
						</div>
						<nav id="nav">
							<ul>
								<li><a href="c-mimenu.php">Inicio</a></li>
								<li ><a href="c-minticket.php">Crear ticket</a></li>
								<li class="active"><a href="c-miticket.php">Mis tickets</a></li>
								<li><a href="c-miperfil.php">Mi Perfil</a></li>
								<li><a href="login.php">Salir<span class="fa fa-power-off"></a></li>
							</ul>
						</nav>
				</div>
			</div>
			<div id="banner">
				<div class="container">
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row">
					<section>
						<header>
							<h2>Mis tickets</h2>
						</header>
						</section>
				</div>
				<form role="form"  action="../pag/ver.php" method="POST">
					<table class="table-fill" >
						<div class="alert alert-info">
						</div>
					</br>
					</br>
					<thead>
						<tr>
							<th class="text-left"># </th>
							<th class="text-left">N# Ticket</th>
							<th class="text-left">Fecha Creado</th>
							<th class="text-left">Asunto</th>
							<th class="text-left">Prioridad</th>
							<th class="text-left">Asignado a</th>
							<th class="text-left">Fecha Estimada</th>
							<th class="text-left">Estado</th>
						</tr>
					</thead>
					<tbody class="table-hover">
						<?php 
							$items = 1;
							foreach ($result as $key => $item) {
								echo('
								<tr>
								<td>'.$items.'</td>
								<td>'.$item["CodTicket"].'</td>
								<td>'.$item["FechaCrea"].'</td>
								<td>'.$item["Asunto"].'</td>
								<td>'.$item["Prioridad"].'</td>
								<td>'.$item["Responsable"].'</td>
								<td>'.$item["FechaEstimacion"].'</td>
								<td>'.$item["Estado"].'</td>
								</tr>
								');
								$items = $items + 1;
							}
						?>
					</tbody>
				</table>
			</form>

		</div>
	</div>
	<div id="copyright">
		<div class="container">
			Todos los derechos reservados 2018 ©
		</div>
	</div>
	</body>
</html>
