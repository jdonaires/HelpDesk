<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_Ticket.php';

class HelpDesk_TicketDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Ticket(HelpDesk_Ticket $HelpDesk_Ticket){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Ticket(?,?,?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Ticket->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_Ticket->__GET('IdTicket'));
      $statement->bindParam(3, $HelpDesk_Ticket->__GET('IdCliente'));
      $statement->bindParam(4, $HelpDesk_Ticket->__GET('IdProblema'));
      $statement->bindParam(5, $HelpDesk_Ticket->__GET('Asunto'));
			$statement->bindParam(6, $HelpDesk_Ticket->__GET('Descripcion'));
      $statement->bindParam(7, $HelpDesk_Ticket->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Ticket(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
