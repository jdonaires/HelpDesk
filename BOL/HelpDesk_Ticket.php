<?php
class HelpDesk_Ticket
{
	private $Opcion;
    private $IdTicket;
    private $HelpDesk_Problema;
    private $HelpDesk_Cliente;
    private $Asunto;
    private $Descripcion;

    function __construct(){
        $this->HelpDesk_Problema = new HelpDesk_Problema();
        $this->HelpDesk_Cliente = new HelpDesk_Usuario();
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