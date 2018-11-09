<?php
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		    <title>HelpDesk | Detalle usuario</title>
	<link rel="stylesheet" href="css/tabla.css">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="t-bentrada.php" class="site_title"><i class="fa fa-paper-plane-o"></i> <span>HelpDesk</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>

								<?php
								session_start();
								echo('<h2>'.$_SESSION["UsuarioLogin"][0]["Nombre"].'</h2>');
  							?>

              </div>
            </div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">
								<h3>General</h3>
								<ul class="nav side-menu">
									<li><a><i class="fa fa-envelope"></i>Bandeja<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="a-bentrada.php">Entrada</a></li>
											<li><a href="a-bproceso.php">Proceso</a></li>
											<li><a href="a-bvalidez.php">Validez</a></li>
											<li><a href="a-bsalida.php">Salida</a></li>
										</ul>
									</li></ul>

								<ul class="nav side-menu">
									<li><a><i class="fa fa-user"></i> Administrar Datos <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="a-contnuevoc.php">Control Nuevos</a></li>
											<li><a href="a-contadmin.php">Control Admistradores</a></li>
											<li><a href="a-contcliente.php">Control Clientes</a></li>
											<li><a href="a-contti.php">Control Soporte TI</a></li>
										</ul>
									</li></ul>

										<ul class="nav side-menu">
											<li><a><i class="fa fa-dashboard"></i>Dashboard<span class="fa fa-chevron-down"></span></a>
												<ul class="nav child_menu">
													<li><a href="#">Abrir</a></li>
												</ul>

											</li>
								</ul>

								<ul class="nav side-menu">
									<li><a><i class="fa fa-comment"></i>Contacto<span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li>  <a href="https://dashboard.smartsupp.com/v2" target="_blank" onclick="window.open(this.href,this.target,"width=400,height=150,top=200,left=200,toolbar=no,location=no,status=no,menubar=no");return false;">Mensajeria<span> </a>
										</li>
										</ul>
									</li>
										</ul>
							</div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<img src="images/user.png" alt="">
										<?php
      								echo($_SESSION["UsuarioLogin"][0]["Nombre"]);
      							?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
	                    <li><a href="t-miperfil.php">Mi perfil</a></li>
	                    <li><a href="#">Cambiar de contraseña</a></li>
	                  <li><a href="salir.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
                  </ul>
                </li>

                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Detalle de usuario</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
										<form role="form"  action="../pag/ver.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
											<?php
											require_once '..\DAL\DBAccess.php';
											$idUsuario=$_GET['IdUsuario'];
											$dba = new DBAccess();
											$conn = $dba->Get_Connection();
											$stmt = $conn->prepare("call spHelpDesk_GET_ConsultaUsu('$idUsuario');");
											$stmt->execute();
											while($row = $stmt->fetch(PDO::FETCH_OBJ)){
											echo'
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombres y Apellidos
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" readonly="readonly" id="first-name" value="'.$row->Nombre.' '.$row->Apellidos.'" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" readonly="readonly" id="last-name" name="last-name" value="'.$row->Correo.'" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="form-group">
											<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="middle-name" readonly="readonly" class="form-control col-md-7 col-xs-12" value="'.$row->NroCelular.'" type="text" name="middle-name">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Perfil
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="birthday" readonly="readonly" value="'.$row->Perfil.'"   class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Área
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="birthday" readonly="readonly" value="'.$row->Area.'" class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Estado
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="birthday" readonly="readonly" value="'.$row->Estado.'" class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

										<div class="x_title">
										<h2>Privilegios</h2>
										<div class="clearfix"></div>
										</div>
										<div class="form-group">
									                         <label class="col-md-3 col-sm-3 col-xs-12 control-label">Privilegios de usuario
									                           <br>
									                           <small class="text-navy">Selecciona vistas</small>
									                         </label>

									                         <div class="col-md-9 col-sm-9 col-xs-12">
									                           <div class="checkbox">
									                             <label>
									                               <input type="checkbox" class="flat" checked="checked">Crear ticket
									                             </label>
									                           </div>
									                           <div class="checkbox">
									                             <label>
									                               <input type="checkbox" class="flat" checked="checked">Mi perfil
									                             </label>
									                           </div>
									                           <div class="checkbox">
									                             <label>
									                               <input type="checkbox" class="flat" checked="checked">Mi ticket
									                             </label>
									                           </div>
									                           <div class="checkbox">
									                             <label>
									                               <input type="checkbox" class="flat" checked="checked">Cambiar contraseña
									                             </label>
									                           </div>
									                         </div>
									                       </div>

										<br>

										<div class="x_title">
											<h2>Cambiar estado de cuenta</h2>
											<div class="clearfix"></div>
										</div>

										<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select class="form-control">
											<option>Activo</option>
											<option>Inactivo</option>
											<option>Eliminado</option>
										</select>
									</div>
								</div>


										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
											<input class="btn btn-primary" type="button" value="Volver" id="_btnVolver">
											<input class="btn btn-success" type="button" value="Guardar cambios" id="_btnVolver">
											</div>
										</div>

									</form>';}
									?>

								</div>
							</div>
						</div>
<<<<<<< HEAD

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
=======
					</div>

              </div>
            </div>
          </div>
        </div>

        <footer>
          <div class="clearfix"></div>
        </footer>

      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
>>>>>>> 0e4db8bddb535d893fa85c2807b922e36f9759b9
</html>
</style>
<script>
$("#_btnVolver").click(function(){
  location.href="a-bentrada.php" ;
});
</script>
