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
      $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');
>>>>>>> 88bbafda3d3ead49b9ecdd42b45897d6cf65692e
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
