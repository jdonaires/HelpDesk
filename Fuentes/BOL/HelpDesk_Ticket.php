<?php
class HelpDesk_Ticket
{
	private $Opcion;
    private $IdTicket;
    private $HelpDesk_Problema;
    private $HelpDesk_Cliente;
    private $Descripcion;
    private $IdProblema;
    private $IdCliente;
    private $IdResponsable;
    private $IdSoporte;
    private $IdProblema_R;
    private $Asunto_R;
    private $Respuesta;
    private $NivelAtencion;
    private $Asunto;
    
    function __construct()
    {
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