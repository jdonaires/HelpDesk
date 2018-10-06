<?php
require_once 'DAL/DBAccess.php';

class PersonaDAO
{
	private $pdo;

	public function __CONSTRUCT()
	{
			$dba = new DBAccess();
			$this->pdo = $dba->get_connection();
	}

	public function Registrar(Persona $persona)
	{
		try
		{
		$statement = $this->pdo->prepare("CALL up_insertar_persona(?,?,?)");
    $statement->bindParam(1,$persona->__GET('nombres'));
		$statement->bindParam(2,$persona->__GET('apellidos'));
		$statement->bindParam(3,$persona->__GET('dni'));
    $statement -> execute();

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}

?>
