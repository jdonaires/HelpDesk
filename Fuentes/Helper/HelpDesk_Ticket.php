<?php
 include_once "..\DAO\HelpDesk_TicketDAO.php";
 include_once "..\BOL\HelpDesk_Ticket.php";
 
 if(isset( $_POST['SET_Ticket'] )) {
    session_start();
    $vrHelpDesk_Ticket = json_decode($_POST['SET_Ticket']);
    $HelpDesk_Ticket = new HelpDesk_Ticket();
    $HelpDesk_TicketDAO = new HelpDesk_TicketDAO();
    $HelpDesk_Ticket->__SET('Opcion', $vrHelpDesk_Ticket->Opcion);
    $HelpDesk_Ticket->__SET('IdTicket', $vrHelpDesk_Ticket->IdTicket);
    $HelpDesk_Ticket->__SET('Asunto', $vrHelpDesk_Ticket->Asunto);
    $HelpDesk_Ticket->__SET('Descripcion', $vrHelpDesk_Ticket->Descripcion);
    $HelpDesk_Ticket->__SET('IdProblema', $vrHelpDesk_Ticket->IdProblema);
    $HelpDesk_Ticket->__SET('IdCliente', $_SESSION["UsuarioLogin"][0]["IdUsuario"]);
    $result = $HelpDesk_TicketDAO->SET_Ticket($HelpDesk_Ticket);
    echo(json_encode($result));
 }

?>