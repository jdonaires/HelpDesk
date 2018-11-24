<?php
require_once '..\DAL\DBAccess.php';
$IdUsuario =$_POST['IdAdmin'];
$IdTicket =$_POST['IdTicketDetalle'];



$dba = new DBAccess();
$conn = $dba->Get_Connection();

//$stmt = $conn->prepare("CALL spHelpDesk_UP_DetTicket('$IdTicket','$Responsable')");
$stmt = $conn->prepare("call spHelpDesk_SET_Ticket('P','$IdTicket', NULL, NULL, NUll, NULL, '$IdUsuario', 0, NULL, NULL, NULL, 0);");

$stmt->execute();
print "<script>alert(\"TI Asignado\");window.location='../Designer/t-bentrada.php';</script>"
?>
