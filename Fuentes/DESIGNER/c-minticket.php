<?php
	require_once '..\DAO\HelpDesk_CategoriaDAO.php';
	$HelpDesk_CategoriaDAO = new HelpDesk_CategoriaDAO();
	$result = $HelpDesk_CategoriaDAO->GET_Categoria();
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
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<link rel="stylesheet" href="css/form.css" />
		<link rel="shortcut icon" type="image/x-icon" href="images/logop.ico" />
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
							<li><a href="c-mimenu.html">Inicio</a></li>
							<li class="active"><a href="c-minticket.html">Crear ticket</a></li>
							<li><a href="c-miticket.html">Mis tickets</a></li>
							<li><a href="c-miperfil.html">Mi Perfil</a></li>
							<li><a href="login.html">Salir<span class="fa fa-power-off"></a></li>
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
							<h2>Nuevo ticket de ayuda</h2>
						</header>
						<br>
					</section>
				</div>
				<div class="forma"  style="width:90%;">
					<form action="action_page.php">
						<label for="country">Categoria</label>
						<select class="form" id="_categoria" name="_categoria">
							<option value="0">Seleccione..</option>
							<?php
								foreach ($result as $key => $item) {
									echo '<option value="'.$item["IdCategoria"].'">'.$item['Descripcion'].'</option>';
								}
							?>
						</select>
						<label for="country">Problema</label>
						<select class="form" id="country" name="country">
							<option value="a">No enciende</option>
							<option value="a">Rayas en las impresiones</option>
							<option value="a">Cartuchos con tinta Baja</option>
						</select>

						<label for="lname">Asunto</label>
						<input class="form" type="text" id="lname" name="lastname" placeholder="Impresora No enciende"  readonly="readonly">

						<label for="lname">Prioridad</label>
						<input class="form" type="text" id="lname" name="lastname" placeholder="Baja"  readonly="readonly">

						<label for="subject">Detalle del problema</label>
						<textarea class="form" id="subject" name="subject" style="height:200px;" placeholder="Escribe tu mensaje aqui.." >
							Buenos dias, para solicitar ayuda ya que mi impresora dejo de funcionar hace un dia y no puedo imprimir los documentos del trabajo para los reportes diarios que se entregan al jefe.
							Porfavor ayuda lo más antes posible. </textarea>
						<input class="formb" type="submit" value="Enviar">
					</form>
				</div>
			</div>
		</div>
		<div id="copyright">
			<div class="container">
				Todos los derechos reservados 2018 ©
			</div>
		</div>
	</body>
</html>
<script>
	$('#_categoria').change(function(){
		var data = { IdCategoria: $(this).val() };
		$.ajax({
				url: "../Helper/HelpDesk_Usuario.php",
				data: { "Login": JSON.stringify(data)},
				type: "POST",
				async: true,
				datatype: "html",
				success: function (data) {
					if (data == "Soporte") {
						location.href="t-mimenu.php"; 
					}
					else if (data == "Cliente") {
						location.href="c-mimenu.php";
					}
					else if (data == "Administrador") {
						location.href="a-contadmin.php" ;
					}
					else {
						swal('HelpDesk', data, 'info');
					};
				},
		});
	});
</script>