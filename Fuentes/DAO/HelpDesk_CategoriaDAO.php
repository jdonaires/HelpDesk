<?php
require_once '..\DAL\DBAccess.php';
require_once '..\BOL\HelpDesk_Categoria.php';

class HelpDesk_CategoriaDAO
{
	private $pdo;

	public function __construct()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->Get_Connection();
	}

	public function SET_Categoria(HelpDesk_Categoria $HelpDesk_Categoria)
	{
		try
		{
			$statement = $this->pdo->prepare("CALL spHelpDesk_SET_Categoria(?,?,?,?,?)");
			$statement->bindParam(1, $HelpDesk_Categoria->__GET('Opcion'));
      		$statement->bindParam(2, $HelpDesk_Categoria->__GET('IdCategoria'));
			$statement->bindParam(3, $HelpDesk_Categoria->__GET('Tipo'));
			$statement->bindParam(4, $HelpDesk_Categoria->__GET('Descripcion'));
      		$statement->bindParam(5, $HelpDesk_Categoria->__GET('FechaCrea'));
			$statement -> execute();
		} 
		catch (Exception $ex)
		{
			die($ex->getMessage());
		}
	}

	public function GET_Categoria()
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
