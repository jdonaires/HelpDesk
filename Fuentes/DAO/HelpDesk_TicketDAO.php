<?php
require_once '..\DAL\DBAccess.php';
require_once '..\BOL\HelpDesk_Ticket.php';

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
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Ticket(?,?,?,?,?,?,?,?,?,?,?,?)");
			$statement->bindValue(1, $HelpDesk_Ticket->__GET('Opcion'));
			$statement->bindValue(2, $HelpDesk_Ticket->__GET('IdTicket'));
			$statement->bindValue(3, $HelpDesk_Ticket->__GET('IdCliente'));
			$statement->bindValue(4, $HelpDesk_Ticket->__GET('IdProblema'));
			$statement->bindValue(5, $HelpDesk_Ticket->__GET('Asunto'));
			$statement->bindValue(6, $HelpDesk_Ticket->__GET('Descripcion'));
			$statement->bindValue(7, $HelpDesk_Ticket->__GET('IdResponsable'));
			$statement->bindValue(8, $HelpDesk_Ticket->__GET('IdSoporte'));
			$statement->bindValue(9, $HelpDesk_Ticket->__GET('IdProblema_R'));
			$statement->bindValue(10, $HelpDesk_Ticket->__GET('Asunto_R'));
			$statement->bindValue(11, $HelpDesk_Ticket->__GET('Respuesta'));
      		$statement->bindValue(12, $HelpDesk_Ticket->__GET('NivelAtencion'));
			$result = $statement -> execute();
			$resultFinal = $statement->fetchAll(PDO::FETCH_ASSOC)[0]['V_MensajeError'];
			if($resultFinal != null || !empty($resultFinal)){
				 echo(resultFinal);
			}
			else {
				echo("Success");
			}
		} catch (Exception $ex)
		{
			die($ex->getMessage());
		}
	}

	public function GET_Ticket()
	{
		try
		{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
