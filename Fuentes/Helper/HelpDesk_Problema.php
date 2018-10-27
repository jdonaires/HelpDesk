<?php
 include_once "..\DAO\HelpDesk_ProblemaDAO.php";
 include_once "..\BOL\HelpDesk_Problema.php";
 
 if(isset( $_POST['GET_Problema'] )) {
    $vrHelpDesk_Problema = json_decode($_POST['GET_Problema']);
    $HelpDesk_ProblemaDAO = new HelpDesk_ProblemaDAO();
    $result = $HelpDesk_ProblemaDAO->GET_Problema($vrHelpDesk_Problema->IdCategoria);
    echo(serialize($result));
 }

?>