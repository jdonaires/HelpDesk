<?php
class DBAccess
{
  private $conn;
  public function __construct()
  {
    try {


<<<<<<< HEAD
    /*Conexion a bd actual*/

  //  $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

    //$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

=======
    /*Conexion a bd kflores*/
    //$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

    //$this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', 'root');

>>>>>>> 0e4db8bddb535d893fa85c2807b922e36f9759b9

    /* Conexion a bd LSNS*/
    // $this->conn = new PDO('mysql:host=localhost:3306;dbname=helpdesk_2018', 'root', '');

    //  $this->conn = new PDO('mysql:host=localhost:3306;dbname=id2781795_helpdesk_2018', 'id2781795_helpdesk_2018', '12345');


  //  $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');

<<<<<<< HEAD


  /*   $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');
*/


  //   $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');

    $this->conn = new PDO('mysql:host=db4free.net:3306;dbname=helpdesk_2018', 'usert_test', '');


=======

>>>>>>> 0e4db8bddb535d893fa85c2807b922e36f9759b9
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
