<?php
require_once '..\DAL\DBAccess.php';
$IdUsuario =$_POST['IdAdmin'];
$IdTicket =$_POST['IdTicketDetalle'];
$Responsable =$_POST['Asignar'];


$dba = new DBAccess();
$conn = $dba->Get_Connection();

//$stmt = $conn->prepare("CALL spHelpDesk_UP_DetTicket('$IdTicket','$Responsable')");
$stmt = $conn->prepare("call spHelpDesk_SET_Ticket('A','$IdTicket', NULL, NULL, NUll, NULL, '$IdUsuario', '$Responsable', NULL, NULL, NULL, 0);");

$stmt->execute();
print "<script>alert(\"TI Asignado\");window.location='../Designer/a-bentrada.php';</script>"
?>
