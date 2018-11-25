<?php
  $status = session_status();
  if($status == PHP_SESSION_NONE){
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HelpDesk | Bandeja de proceso</title>
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
                    <li><a><i class="fa fa-envelope"></i>Bandeja<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="t-bentrada.php">Entrada</a></li>
                        <li><a href="t-bproceso.php">Proceso</a></li>
                        <li><a href="t-bsalida.php">Salida</a></li>
                      </ul>
                    </li>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-comment"></i>Contacto<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li>  <a href="https://dashboard.smartsupp.com/v2" target="_blank" onclick="window.open(this.href,this.target,"width=400,height=150,top=200,left=200,toolbar=no,location=no,status=no,menubar=no");return false;">Mensajeria<span> </a>
                        </li>
                        </ul>
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
                          <h2>Bandeja de proceso</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                          <form role="form"  action="../pag/ver.php" method="POST">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-left">N# Ticket</th>
                                 <th class="text-left">Cod. Ticket</th>
                                <th class="text-left">Fecha Creación</th>
                                <th class="text-left">Cliente</th>
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
                            
                            $statement = $conn->prepare("call spHelpDesk_GET_TicketEstado('PROCESO',".$_SESSION["UsuarioLogin"][0]["IdUsuario"].");");
                            $statement->execute();
                            $Item = 1;
                            while($row = $statement->fetch(PDO::FETCH_OBJ)){
                            echo'

                                  <tbody>
                                    <tr>
                                      <td>'.$Item ++.'</td>
                                      <td>'.$row->CodTicket.'</td>
                                      <td>'.$row->FechaCrea.'</td>
                                      <td>'.$row->Cliente.'</td>
                                      <td>'.$row->Asunto.'</td>
                                      <td>'.$row->Prioridad.'</td>
                                      <td>'.$row->Area.'</td>
                                      <td>'.$row->Estado.'</td>
                                      <td><a href="#" IdTicketDetalle='.$row->IdTicket.'"><span class="fa fa-eye"> </a></td>
                                    </tr>

                                  </tbody>';
                                  }
                                  ?>
                          </table>
   </form>
                        </div>
                      </div>
                    </div></div>
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