<?php
require_once '..\DAL\DBAccess.php';
require_once '..\BOL\HelpDesk_Problema.php';

class HelpDesk_ProblemaDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Problema(HelpDesk_Problema $HelpDesk_Problema)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Problema(?,?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Problema->__GET('Opcion'));
			$statement->bindParam(2, $HelpDesk_Problema->__GET('IdProblema'));
			$statement->bindParam(3, $HelpDesk_Problema->__GET('IdCategoria'));
			$statement->bindParam(4, $HelpDesk_Problema->__GET('Descripcion'));
			$statement->bindParam(5, $HelpDesk_Problema->__GET('Prioridad'));
			$statement->bindParam(6, $HelpDesk_Problema->__GET('FechaEstimacion'));
			$statement -> execute();
		}
		catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Problema(){
		try{
			$statement = $this->pdo->prepare("CALL spHelpDesk_GET_BusquedaGeneral(?,?,?,?)");
			$statement->bindValue(1, "GET_Problema", PDO::PARAM_STR);
			$statement->bindValue(2, "%", PDO::PARAM_STR);
			$statement->bindValue(3, 0, PDO::PARAM_INT);
			$statement->bindValue(4, 0, PDO::PARAM_INT);
			$statement->execute();
			$Result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $Result;
		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
