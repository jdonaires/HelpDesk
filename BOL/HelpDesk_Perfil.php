<?php
class HelpDesk_Perfil
{
	private $Opcion;
	private $IdPerfil ;
	private $Descripcion;

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