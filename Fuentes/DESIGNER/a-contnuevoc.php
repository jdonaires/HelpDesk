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

  <title>HelpDesk | Nuevos ingresos</title>
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
              <a href="a-bentrada.php" class="site_title"><i class="fa fa-paper-plane-o"></i> <span>HelpDesk</span></a>
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
  								echo('<h2>Hola '.$_SESSION["UsuarioLogin"][0]["Nombre"].'</h2>');
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
                    <li><a href="a-miperfil.php">Mi perfil</a></li>
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
                          <h2>Control Nuevos Usuarios</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                          <form role="form"  action="../pag/ver.php" method="POST">
                          <table class="table">
                            <thead>
                              <tr>
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
                            $stmt = $conn->prepare("call spHelpDesk_GET_ContPendiente();");
                            $stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                            echo'
                                  <tbody class="table-hover">
                                    <tr>
                                    <td>'.$row->Nombre.' '.$row->Apellidos.'</td>
                                    <td>'.$row->Area.'</td>
                                    <td>'.$row->Perfil.'</td>
                                    <td>'.$row->NroCelular.'</td>
                                    <td>'.$row->Correo.'</td>
                                    <td>'.$row->Estado.'</td>
                                    <td><a href="a-detalleus.php?IdUsuario='.$row->IdUsuario.'"><span class="fa fa-eye"> </a></td>
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
