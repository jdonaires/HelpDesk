<?php
class HelpDesk_TicketDetalle
{
	private $Opcion;
    private $IdTicketDetalle;
    private $HelpDesk_Ticket;
    private $HelpDesk_Responsable;
    private $Estado;

    function __construct(){
        $this->HelpDesk_Ticket = new HelpDesk_Ticket();
        $this->HelpDesk_Responsable = new HelpDesk_Usuario();
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