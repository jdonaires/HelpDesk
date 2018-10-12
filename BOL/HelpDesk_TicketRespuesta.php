<?php
class HelpDesk_TicketRespuesta
{
	private $Opcion;
    private $IdTicketRespuesta;
    private $HelpDesk_Ticket;
    private $HelpDesk_Problema;
    private $Asunto;
    private $Respuesta;
    private $NivelAtencion;

    function __construct(){
        $this->HelpDesk_Ticket = new HelpDesk_Ticket();
        $this->HelpDesk_Problema = new HelpDesk_Problema();
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