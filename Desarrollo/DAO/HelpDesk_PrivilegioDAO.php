<?php
require_once '..\DAL\DBAccess.php';
require_once '..\BOL\HelpDesk_Privilegio.php';

class HelpDesk_PrivilegioDAO
{
	private $pdo;

	public function __construct()
	{
		$dba = new DBAccess();
		$this->pdo = $dba->Get_Connection();
	}

	public function SET_Privilegio(HelpDesk_Privilegio $HelpDesk_Privilegio)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Privilegio(?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Privilegio->__GET('Opcion'));
      		$statement->bindParam(2, $HelpDesk_Privilegio->__GET('IdPrivilegio'));
      		$statement->bindParam(3, $HelpDesk_Privilegio->__GET('IdPerfil'));
			$statement->bindParam(4, $HelpDesk_Privilegio->__GET('Descripcion'));
      		$statement->bindParam(5, $HelpDesk_Privilegio->__GET('FechaCrea'));
			$statement -> execute();
		} 
		catch (Exception $ex)
		{
			die($ex->getMessage());
		}
	}

	public function GET_Privilegio($IdUsuario)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_GET_BusquedaGeneral(?,?,?,?)");
			$statement->bindValue(1, "GET_Privilegio", PDO::PARAM_STR);
			$statement->bindValue(2, "", PDO::PARAM_STR);
      		$statement->bindValue(3, $IdUsuario, PDO::PARAM_INT);
      		$statement->bindValue(4, 0, PDO::PARAM_INT);
      		$statement->execute();
			$Result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $Result;
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}
}

?>
