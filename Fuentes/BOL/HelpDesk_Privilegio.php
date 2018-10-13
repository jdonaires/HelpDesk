<?php
/***********************************************************
 * CREADO POR: GRUPO HELPDESK
 *             Cristian Hernandez Villo
 * FECHA CREA: 11/10/2018
 **********************************************************/
class HelpDesk_Privilegio
{
    private $Opcion;
    private $IdPrivilegio;
    private $HelpDesk_Perfil;
    private $Descripcion;
    
    function __construct() {
        $this->HelpDesk_Perfil = new HelpDesk_Perfil();
    }

	public function __GET($x)
	{ 
		return $this->$x; 
	}
	public function __SET($x, $y)
	{ 
		return $this->$x = $y; 
	}
}
?>