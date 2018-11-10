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
 								<li><a href="t-mimenu.html">Inicio</a></li>
 								<li  class="active"><a  href="t-todobandeja.html">Bandeja</a></li>
 								<li ><a href="t-miperfil.html">Mi perfil</a></li>
 								<li><a href="login.html">Salir<span class="fa fa-power-off"></a></li>
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
 							<h2>Detalle de ticket</h2>
 							<br><h3><a href="t-bentrada.html">Volver</a></h3>
 						</header>
 						<br>
 						</section>

 				</div>
 				<!--CONTAINER -->
 				<div class="forma"  style="width:90%;">
 <form action="action_page.php">

   <?php

    require_once '..\DAL\DBAccess.php';
    $idTicket=$_GET['IdTicket'];
    $dba = new DBAccess();
    $conn = $dba->Get_Connection();
    $stmt = $conn->prepare("call helpdesk_2018.spHelpDesk_Det_Ticket($idTicket)");
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo
    '

 		<h3>Descripcion de problema</h3>
 	<label for="lname">N° Ticket</label>
 	<input class="form" type="text" id="lname" name="lastname" value="'.$row->IdTicket.'" readonly="readonly">

 <label for="lname">Categoria</label>
 <input class="form" type="text" id="lname" name="lastname" placeholder="'.$row->Tipo.'"  readonly="readonly">

 <label for="lname">Problema</label>
 <input class="form" type="text" id="lname" name="lastname" placeholder="'.$row->Problema.'"  readonly="readonly">

 <label for="lname">Asunto</label>
 <input class="form" type="text" id="lname" name="lastname" placeholder="'.$row->Asunto.'"  readonly="readonly">

 <label for="lname">Prioridad</label>
 <input class="form" type="text" id="lname" name="lastname" placeholder="'.$row->Prioridad.'"  readonly="readonly">

 <label for="subject">Detalle del problema</label>
 <textarea class="form" id="subject" name="subject" style="height:200px;" placeholder="Escribe tu mensaje aqui.." readonly="readonly">'.$row->Descripcion.'</textarea>

 <label for="lname">Fecha creado</label>
 <input class="form" type="text" id="lname" name="lastname" placeholder="20/09/2018" value="'.$row->FechaCrea.'"  readonly="readonly">

 <h3>Asignacion personal</h3>
 <label for="lname">Fecha estimada de resolucion</label>
 <input class="form" type="text" id="lname" name="lastname" value="'.$row->FechaEstimacion.'" readonly="readonly">

 <label for="lname">Asignado a</label>
 <input class="form" type="text" id="lname" name="lastname" value="'.$row->Nombre.'" readonly="readonly">

 <input class="formb" type="submit" value="Iniciar proceso">

 ';}
 ?>
 </form>

 </div>

 	<!--/CONTAINER -->
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
