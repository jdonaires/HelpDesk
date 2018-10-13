<?php
/***********************************************************
 * CREADO POR: GRUPO HELPDESK
 *             Cristian Hernandez Villo
 * FECHA CREA: 11/10/2018
 **********************************************************/
class HelpDesk_Problema
{
	private $Opcion;
    private $IdProblema;
    private $HelpDesk_Categoria;
    private $Descripcion;
    private $Prioridad;

    function __construct(){
        $this->HelpDesk_Categoria = new HelpDesk_Categoria();
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