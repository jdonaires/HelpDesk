<?php
include_once "..\DAO\HelpDesk_PrivilegioDAO.php";


if(isset( $_POST['GET_Privilegios'] )) {
    $vrHelpDesk_Usuario = json_decode($_POST['GET_Privilegios']);
    $HelpDesk_PrivilegioDAO = new HelpDesk_PrivilegioDAO();
    $result = $HelpDesk_PrivilegioDAO->GET_Privilegio($vrHelpDesk_Usuario->IdUsuario);
    echo(json_encode($result));
    //echo(json_encode($vrHelpDesk_Usuario->IdUsuario));
    
}
?>