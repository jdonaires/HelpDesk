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
    // $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', '');

      //$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

<<<<<<< HEAD
     $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');

=======

  /*   $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');
*/
>>>>>>> e47da9bbc129f1258f6bd6b5f0f128e52ff1d2f5
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
