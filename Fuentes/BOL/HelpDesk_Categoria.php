<?php
class HelpDesk_Categoria
{
	private $Opcion;
    private $IdCategoria;
    private $Tipo;
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