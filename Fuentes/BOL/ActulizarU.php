<?php

require_once '..\DAL\DBAccess.php';

$IdUsuario =$_POST['Usuario'];
$IdPerfil=$_POST['Perfil'];
$IdArea=$_POST['Area'];
$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Correo=$_POST['Correo'];
$Contrasenia=$_POST['Contrasenia'];
$Estado=$_POST['Estado'];
$NroCelular=$_POST['Celular'];
$Confirmacion=$_POST['Confirmacion'];
$FechaCrea=$_POST['Fecha'];
$FlgEliminado=$_POST['FlgEliminado'];


$dba = new DBAccess();
$conn = $dba->Get_Connection();
$stmt = $conn->prepare("CALL HelpDesk_ActulizarUsuario('$IdUsuario','$IdPerfil','$IdArea','$Nombre','$Apellidos','$Correo','$Contrasenia','$Estado','$NroCelular','$Confirmacion','$FechaCrea','$FlgEliminado')");
$stmt->execute();
print "<script>alert(\"Actulizacion Exitosa\");window.location='../Designer/a-contnuevoc.php';</script>";

?>
