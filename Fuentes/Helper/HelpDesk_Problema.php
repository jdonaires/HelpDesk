<?php
 include_once "..\DAO\HelpDesk_ProblemaoDAO.php";
 include_once "..\BOL\HelpDesk_Problema.php";
 
 if(isset( $_POST['GET_Problema'] )) {
    $vrHelpDesk_Usuario = json_decode($_POST['GET_Problema']);
    $HelpDesk_ProblemaoDAO = new HelpDesk_ProblemaoDAO();
    $result = $HelpDesk_ProblemaoDAO->GET_Problema($vrHelpDesk_Usuario->Correo);
    echo ($result[0]["Valida"]);
 }

?>