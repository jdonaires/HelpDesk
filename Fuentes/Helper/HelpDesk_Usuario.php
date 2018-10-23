<?php
    include_once "..\DAO\HelpDesk_UsuarioDAO.php";
    include_once "..\BOL\HelpDesk_Usuario.php";

    if(isset( $_POST['SET_Usuario'] )) {
        $vrHelpDesk_Usuario = json_decode($_POST['SET_Usuario']);
        $HelpDesk_Usuario = new HelpDesk_Usuario();
        $HelpDesk_UsuarioDAO = new HelpDesk_UsuarioDAO();
        $HelpDesk_Usuario->__SET('Opcion', $vrHelpDesk_Usuario->Opcion);
        $HelpDesk_Usuario->__SET('IdUsuario',$vrHelpDesk_Usuario->IdUsuario);
        $HelpDesk_Usuario->__SET('IdPerfil', $vrHelpDesk_Usuario->IdPerfil);
        $HelpDesk_Usuario->__SET('IdArea', $vrHelpDesk_Usuario->IdArea);
        $HelpDesk_Usuario->__SET('Nombre', $vrHelpDesk_Usuario->Nombre);
        $HelpDesk_Usuario->__SET('Apellidos', $vrHelpDesk_Usuario->Apellidos);
        $HelpDesk_Usuario->__SET('Correo', $vrHelpDesk_Usuario->Correo);
        $HelpDesk_Usuario->__SET('Contrasenia', $vrHelpDesk_Usuario->Contrasenia);
        $HelpDesk_Usuario->__SET('NroCelular', $vrHelpDesk_Usuario->NroCelular);
        $result = $HelpDesk_UsuarioDAO->SET_Usuario($HelpDesk_Usuario);
        echo ($result);
    }

    if(isset( $_POST['Valida_Email'] )) {
        $vrHelpDesk_Usuario = json_decode($_POST['Valida_Email']);
        $HelpDesk_UsuarioDAO = new HelpDesk_UsuarioDAO();
        $result = $HelpDesk_UsuarioDAO->GET_ValidaEmail($vrHelpDesk_Usuario->Correo);
        echo ($result[0]["Valida"]);
        
    }
?>