<?php
require_once 'DAL/DBAccess.php';
require_once 'BOL/HelpDesk_Usuario.php';

class HelpDesk_UsuarioDAO
{
	private $pdo;

	public function __CONSTRUCT(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Usuario(HelpDesk_TicketRespuesta $HelpDesk_Usuario){
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Usuario(?,?,?,?,?,?,?,?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Usuario->__GET('Opcion'));
      $statement->bindParam(2, $HelpDesk_Usuario->__GET('IdUsuario'));
      $statement->bindParam(3, $HelpDesk_Usuario->__GET('IdArea'));
      $statement->bindParam(4, $HelpDesk_Usuario->__GET('IdPerfil'));
      $statement->bindParam(5, $HelpDesk_Usuario->__GET('Nombre'));
      $statement->bindParam(6, $HelpDesk_Usuario->__GET('Apellidos'));
      $statement->bindParam(7, $HelpDesk_Usuario->__GET('Correo'));
      $statement->bindParam(8, $HelpDesk_Usuario->__GET('Contrasenia'));
      $statement->bindParam(9, $HelpDesk_Usuario->__GET('Estado'));
      $statement->bindParam(10, $HelpDesk_Usuario->__GET('NroCelular'));
      $statement->bindParam(11, $HelpDesk_Usuario->__GET('Confirmacion'));
      $statement->bindParam(12, $HelpDesk_Usuario->__GET('FechaCrea'));
			$statement -> execute();
		} catch (Exception $ex){
			die($ex->getMessage());
		}
	}

	public function GET_Usuario(){
		try{

		}
		catch(Exception $ex){
			die($ex->getMessage());
		}
	}
}

?>
