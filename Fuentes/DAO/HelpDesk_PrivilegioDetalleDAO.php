<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_PrivilegioDetalle.php';

class HelpDesk_PrivilegioDetalleDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_PrivilegioDetalle(HelpDesk_PrivilegioDetalle $HelpDesk_PrivilegioDetalle){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_PrivilegioDetalle(?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Usuario->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_Usuario->__GET('IdPrivilegioDetalle'));
      $statement->bindParam(3, $HelpDesk_Usuario->__GET('IdPrivilegio'));
      $statement->bindParam(4, $HelpDesk_Usuario->__GET('IdUsuario'));
      $statement->bindParam(5, $HelpDesk_Usuario->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_PrivilegioDetalle(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
