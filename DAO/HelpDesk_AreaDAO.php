<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_Area.php';

class HelpDesk_AreaDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Area(HelpDesk_Area $HelpDesk_Area){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Area(?,?,?)");
			$statement->bindParam(1, $HelpDesk_Area->__GET('Opcion'));
			$statement->bindParam(2, $HelpDesk_Area->__GET('IdArea'));
			$statement->bindParam(3, $HelpDesk_Area->__GET('Descripcion'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Area(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
