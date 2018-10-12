<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_TicketRespuesta.php';

class HelpDesk_TicketRespuestaDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_TicketRespuesta(HelpDesk_TicketRespuesta $HelpDesk_TicketRespuesta){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_TicketRespuesta(?,?,?,?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_TicketRespuesta->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_TicketRespuesta->__GET('IdTicketRespuesta'));
      $statement->bindParam(3, $HelpDesk_TicketRespuesta->__GET('IdProblema'));
      $statement->bindParam(4, $HelpDesk_TicketRespuesta->__GET('IdTicket'));
      $statement->bindParam(5, $HelpDesk_TicketRespuesta->__GET('AsuntoRespuesta'));
      $statement->bindParam(6, $HelpDesk_TicketRespuesta->__GET('Respuesta'));
      $statement->bindParam(7, $HelpDesk_TicketRespuesta->__GET('NivelAtencion'));
      $statement->bindParam(8, $HelpDesk_TicketRespuesta->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_TicketRespuesta(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
