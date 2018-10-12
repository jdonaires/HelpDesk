<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_Perfil.php';

class HelpDesk_PerfilDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Perfil(HelpDesk_Perfil $HelpDesk_Perfil){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Perfil(?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Perfil->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_Perfil->__GET('IdPerfil'));
			$statement->bindParam(3, $HelpDesk_Perfil->__GET('Descripcion'));
      $statement->bindParam(4, $HelpDesk_Perfil->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Perfil(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
