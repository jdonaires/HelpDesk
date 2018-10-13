<?php
require_once 'DAL/DBAccess.php';

/***********************************************************
 * CREADO POR: GRUPO HELPDESK
 *             Cristian Hernandez Villo
 * FECHA CREA: 11/10/2018
 **********************************************************/
class HelpDesk_PerfilDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function GET_Perfil(){
		try{
            $statement = $this->pdo->prepare("CALL spHelpDesk_GET_BusquedaGeneral(?,?,?,?)");
			$statement->bindValue(1, "GET_Perfil", PDO::PARAM_STR);
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
