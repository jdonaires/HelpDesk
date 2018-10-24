
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/mainu.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" href="css/form.css" />
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Datos del Usuarios
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Nombres y apellidos *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name" readonly="readonly">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email " readonly="readonly">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Celular</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone" readonly="readonly">
				</div>


				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Perfil</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email " readonly="readonly">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Area</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone" readonly="readonly">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Estado</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone" readonly="readonly">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<select class="form" id="country" name="country">

						<option value="a">Activo</option>
						<option value="a">Inactivo</option>
						<option value="a">Eliminado</option>
					</select>
				</div>

</br>



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







</body>
</html>
