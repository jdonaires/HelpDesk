<?php
class HelpDesk_Area
{
	private $Opcion;
	private $IdArea ;
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