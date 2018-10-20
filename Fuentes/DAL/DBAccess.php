<?php
class DBAccess
{
  private $conn;
  public function __construct()
  {
    try {
<<<<<<< HEAD
    /*Conexion a bd actual*/
    /*$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');*/

    /* Conexion a bd LSNS*/
     $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', '');

=======
      $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');
>>>>>>> 5fd039ae219feaaee2bba5fa365de284788fc948
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex ) {
      echo "error:" .$ex->getMessage();
    }
 }

  public function Get_Connection()
  {
    return $this->conn;
  }
}
 ?>
