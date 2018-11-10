<?php
require_once '..\DAL\DBAccess.php';

$IdTicket =$_POST['IdTicketDetalle'];
$Responsable =$_POST['Asignar'];


$dba = new DBAccess();
$conn = $dba->Get_Connection();

//$stmt = $conn->prepare("CALL spHelpDesk_UP_DetTicket('$IdTicket','$Responsable')");
$stmt = $conn->prepare("Insert into HelpDesk_TicketDetalle(IdTicket,IdResponsable,Estado,FechaCrea) VAlues('$IdTicket','$Responsable','Pendiente',now())");

$stmt->execute();
print "<script>alert(\"TI Asignado\");window.location='../Designer/a-bentrada.php';</script>"
?>
