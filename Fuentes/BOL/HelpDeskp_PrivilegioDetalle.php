<?php
class HelpDesk_PrivilegioDetalle
{
	private $Opcion;
    private $IdPrivilegioDetalle;
    private $HelpDesk_Usuario;
    private $HelpDesk_Privilegio;
	function __construct()
	{
        $this->HelpDesk_Usuario = new HelpDesk_Usuario();
        $this->HelpDesk_Privilegio = new HelpDesk_Privilegio();
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