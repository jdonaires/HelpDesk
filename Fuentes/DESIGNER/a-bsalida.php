<?php
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | HelpDesk</title>
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
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>HelpDesk!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <?php
  							 	session_start();
  								echo('<h2>'.$_SESSION["UsuarioLogin"][0]["Nombre"].'</h2>');
  							?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i> Administrar Datos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="a-contnuevoc.php">Control Nuevos</a></li>
                      <li><a href="a-contadmin.php">Control Admistradores</a></li>
                      <li><a href="a-contcliente.php">Control Clientes</a></li>
                      <li><a href="a-contti.php">Control Soporte TI</a></li>
                    </ul>
                  </li>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-inbox"></i>Bandeja<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="a-bentrada.php">Entrada</a></li>
                        <li><a href="a-bproceso.php">Proceso</a></li>
                        <li><a href="a-bvalidez.php">Validez</a></li>
                        <li><a href="a-bsalida.php">Salida</a></li>
                      </ul>
                    </li>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-home"></i>Dashboard<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="a-bentrada.php">Entrada</a></li>
                        </ul>
                        <a href="https://dashboard.smartsupp.com/v2" target="_blank" onclick="window.open(this.href,this.target,"width=400,height=150,top=200,left=200,toolbar=no,location=no,status=no,menubar=no");return false;">Mensajeria<span> </a>
                      </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
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
                    <img src="images/img.jpg" alt="">
                    <?php
      								echo($_SESSION["UsuarioLogin"][0]["Nombre"]);
      							?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuracion</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda
                    </a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesion</a></li>
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
          <!-- top tiles -->
          <form role="form"  action="../pag/ver.php" method="POST">
            <table class="table-fill" >
              <div class="alert alert-info">
          </div>
            <h2>Bandeja Salida</h2>
          </br>
          </br>
          <thead>
              <tr>

                <th class="text-left">N# Ticket</th>
  							<th class="text-left">FechaCrea</th>
  							<th class="text-left">Asunto</th>
  							<th class="text-left">Prioridad</th>
  							<th class="text-left">Area</th>
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


                  <td><a href="a-detalleuser.html?IdUsuario='.$row->IdUsuario.'"><span class="fa fa-eye"> </a></td>
                </tr>

                </tbody>';
                }
                ?>
              </table>
                   </form>

              </div>
            </div>
          </div>
        </div>

        <footer>
          <div class="pull-right">
            HelpDesk - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
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
