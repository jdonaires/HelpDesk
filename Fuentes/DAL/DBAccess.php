<?php
class DBAccess
{
  private $conn;
  public function __construct()
  {
    try {
    /*Conexion a bd actual*/
    $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

    /* Conexion a bd LSNS*/
     /*$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', '');*/

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
