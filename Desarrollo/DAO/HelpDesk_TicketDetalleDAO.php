<?php
require_once '..\DAL\DBAccess.php';
require_once 'BOL/HelpDesk_TicketDetalle.php';

class HelpDesk_TicketDetalleDAO
{
	private $pdo;

	public function __construct()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_TicketDetalle(HelpDesk_TicketDetalle $HelpDesk_TicketDetalle)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_TicketDetalle(?,?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_TicketDetalle->__GET('Opcion'));
			$statement->bindParam(2, $HelpDesk_TicketDetalle->__GET('IdTicketDetalle'));
			$statement->bindParam(3, $HelpDesk_TicketDetalle->__GET('IdTicket'));
			$statement->bindParam(4, $HelpDesk_TicketDetalle->__GET('IdResponsable'));
			$statement->bindParam(5, $HelpDesk_TicketDetalle->__GET('Estado'));
			$statement->bindParam(6, $HelpDesk_TicketDetalle->__GET('FechaCrea'));
			$statement -> execute();
		} 
		catch (Exception $ex)
		{
			die($ex->getMessage());
		}
	}

	public function GET_TicketDetalle()
	{
		try
		{

		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
}

?>
