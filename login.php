<?php session_start()?>

<html lang="en" >

<head>

<meta charset="UTF-8">



      <link rel="stylesheet" href="../Helpdesk/css/stylelog.css">


</head>

<body>

  <div class="wrapper">
	<div class="container">
		<h1>Iniciar sesion</h1>

		  <form role="form" name="login" action="../cod/Iniciar.php" method="Post"  >
			<input type="text" placeholder="Username" id="Email" name="Email">
			<input type="password" placeholder="Password" id="password" name="password">
			<button type="submit"  id="login-button" value="Login">Login</button></br>

		 <a >
          <span>No eres miembro?</span>
          </a>

           <a  href="RegistroU.php">
           <span>Registrate</span>
           </a>


		</form>
	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='../Helpdesk/js/o.js'></script>
  <script  src="../Helpdesk/js/index.js"></script>
  <script  src="../Helpdesk/js/login.js"></script>




</body>

</html>
