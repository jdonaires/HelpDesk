<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_Privilegio.php';

class HelpDesk_PrivilegioDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Privilegio(HelpDesk_Privilegio $HelpDesk_Privilegio){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Privilegio(?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Privilegio->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_Privilegio->__GET('IdPrivilegio'));
      $statement->bindParam(3, $HelpDesk_Privilegio->__GET('IdPerfil'));
			$statement->bindParam(4, $HelpDesk_Privilegio->__GET('Descripcion'));
      $statement->bindParam(5, $HelpDesk_Privilegio->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Privilegio(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
