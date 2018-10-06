
<?php
require_once 'BOL/persona.php';
require_once 'DAO/personaDAO.php';

// Lógica
$per = new Persona();
$perDAO = new PersonaDAO();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'registrar':
			$per->__SET('nombres', $_POST['nombres']);
            $per->__SET('apellidos', $_POST['apellidos']);
            $per->__SET('dni', $_POST['dni']);

			$perDAO->Registrar($per);
			header('Location: index.php');
			break;

		case 'eliminar':
			$perDAO->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;
	}
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CRUD</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">

                <form action="?action=registrar" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">


                    <table style="width:500px;" border="0">
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombres" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Apellido</th>
                            <td><input type="text" name="apellidos" value="" style="width:100%;" /></td>
                        </tr>

                        <tr>
                            <th style="text-align:left;">DNI</th>
                            <td><input type="text" name="dni" value="" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>


            </div>
        </div>

    </body>
</html>
