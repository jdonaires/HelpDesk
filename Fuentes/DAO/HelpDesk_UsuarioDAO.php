<?php
require_once '..\DAL\DBAccess.php';
require_once '..\BOL\HelpDesk_Usuario.php';

class HelpDesk_UsuarioDAO
{
	private $pdo;

	public function __construct(){
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Usuario(HelpDesk_Usuario $HelpDesk_Usuario)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Usuario(?,?,?,?,?,?,?,?,?,?,?,?)");
			$statement->bindValue(1, $HelpDesk_Usuario->__GET('Opcion'));
			$statement->bindValue(2, $HelpDesk_Usuario->__GET('IdUsuario'));
			$statement->bindValue(3, $HelpDesk_Usuario->__GET('IdPerfil'));
			$statement->bindValue(4, $HelpDesk_Usuario->__GET('IdArea'));
			$statement->bindValue(5, $HelpDesk_Usuario->__GET('Nombre'));
			$statement->bindValue(6, $HelpDesk_Usuario->__GET('Apellidos'));
			$statement->bindValue(7, $HelpDesk_Usuario->__GET('Correo'));
			$statement->bindValue(8, $HelpDesk_Usuario->__GET('Contrasenia'));
			$statement->bindValue(9, $HelpDesk_Usuario->__GET('NroCelular'));
			$statement->bindValue(10,$HelpDesk_Usuario->__GET('Confirmacion'));
			$statement->bindValue(11, "");
			$statement->bindValue(12,0);
			$result = $statement -> execute();
			if($result != null || !empty($result)){
			echo($statement->fetchAll(PDO::FETCH_ASSOC)[0]['V_MensajeError']);
			}
			else {
				echo("Success");
			}
		}
		catch (Exception $ex)
		{
			die($ex->getMessage());
		}
	}

	public function GET_ValidaEmail($ValueEmail)
	{
		try
		{
      $statement = $this->pdo->prepare("CALL spHelpDesk_GET_BusquedaGeneral(?,?,?,?)");
			$statement->bindValue(1, "GET_ValidaEmail", PDO::PARAM_STR);
			$statement->bindValue(2, $ValueEmail, PDO::PARAM_STR);
      		$statement->bindValue(3, 0, PDO::PARAM_INT);
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

	public function GET_UsuarioLogin($Correo, $Contrasenia)
	{
		try
		{
      		$statement = $this->pdo->prepare("CALL spHelpDesk_GET_Login(?,?)");
			$statement->bindValue(1, $Correo, PDO::PARAM_STR);
			$statement->bindValue(2, $Contrasenia, PDO::PARAM_STR);
      		$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		catch(Exception $ex)
		{
			die($ex->getMessage());
		}
	}




}

?>
