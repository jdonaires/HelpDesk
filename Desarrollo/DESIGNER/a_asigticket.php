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
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"></script>
		<link href="css/sweetalert.css" rel="stylesheet" />
    <script src="js/helpdesk_main.js"  ></script>
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
                      <li><a href="a-basignados.php">Asignados</a></li>
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
									<h2>Detalle de Ticket</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
										<form <form action="../BOL/DTicUp.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                      <?php
                        echo('<input class="form" type="hidden" id="IdAdmin" name="IdAdmin" value="'.$_SESSION["UsuarioLogin"][0]["IdUsuario"].'"readonly="readonly">');

                      ?>

											<?php

											require_once '..\DAL\DBAccess.php';
											$idTicket=$_GET['IdTicket'];
											$dba = new DBAccess();
											$conn = $dba->Get_Connection();
                      $stmt = $conn->prepare("call helpdesk_2018.spHelpDesk_Det_AsigTicket($idTicket);");
          						$stmt->execute();
          						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
          						echo
          						'

                      <input class="form" type="hidden" id="IdTicketDetalle" name="IdTicketDetalle" value="'.$row->IdTicket.'" readonly="readonly">

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" readonly="readonly" id="1"  name="Tipo" value="'.$row->Tipo.'" class="form-control col-md-7 col-xs-12">
											</div>
										</div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripcion
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="2" name="subject"  readonly="readonly"  class="form-control col-md-7 col-xs-12">'.$row->Descripcion.'</textarea>
                      </div>
                    </div>

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Asunto
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input type="text" readonly="readonly" id="3" name="Asunto" value="'.$row->Asunto.'" class="form-control col-md-7 col-xs-12">
											</div>
										</div>
										<div class="form-group">
											<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Area</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="4" readonly="readonly" class="form-control col-md-7 col-xs-12"  name="Area" value="'.$row->Area.'" type="text" name="middle-name">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Prioridad
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="5" readonly="readonly" name="Prioridad" value="'.$row->Prioridad.'"   class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

        

                    <div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de creacion
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="6" readonly="readonly" name="FechaCrea" value="'.$row->FechaCrea.'" class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha estimada de resolucion
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<input id="6" readonly="readonly" name="FechaEstimacion" value="'.$row->FechaEstimacion.'" class="date-picker form-control col-md-7 col-xs-12" type="text">
											</div>
										</div>

                    ';}
                    ?>
                    <?php
                    $stmt = $conn->prepare("select * from HelpDesk_Usuario where IdPerfil=2 and UPPER(Estado)='ACTIVO';");
                    $stmt->execute();
                    ?>

                    <div class="form-group">
                  	<label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar Encargado</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <select  class="form-control" id="Asignar" name="Asignar">
                    <?php
                      while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        ?>
                          <option value="<?php echo $row->IdUsuario ?>"><?php echo $row->Nombre ?> </option>


                          <?php
                      }
                        ?>
                    </select>


										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
											<input class="btn btn-primary" type="button" value="Volver" id="_btnVolver">
											<input class="btn btn-success"  type="button" value="Aceptar Ticket" name="Actualizar" id="_Enviar">

											</div>
										</div>

									</form>

								</div>
							</div>
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

	<!-- /Main -->
	</body>
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
</html>
</style>
<script>
$("#_btnVolver").click(function(){
  location.href="a-bentrada.php" ;
});

// GUARDA DATOS DE TICKET
	$("#_Enviar").click(function(){
			var data = {
				Opcion: "A" ,
				IdTicket: $("#IdTicketDetalle").val() ,
				IdCliente:0,
				IdProblema: 0,
				Asunto: "",
				Descripcion: "",
				IdResponsable: $("#IdAdmin").val(),
				IdSoporte: $("#Asignar").val(),
				IdProblema_R: 0,
				Asunto_R:"",
				Respuesta:"",
				NivelAtencion:0
			};
			HelpDeskajaxPostSetProcess({
				url: "../Helper/HelpDesk_Ticket.php",
				data: { "SET_Ticket": JSON.stringify(data)},
				title: "Help Desk",
				invokefunction:navigationPage
			});
  });
  
  function navigationPage(){
    window.location='a-bentrada.php'
  }
</script>
