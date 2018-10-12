<?php
class HelpDesk_Usuario
{
	private $Opcion;
    private $IdUsuario;
    private $HelpDesk_Area;
    private $HelpDesk_Perfil;
    private $Nombre;
    private $Apellidos;
    private $Correo;
    private $Contrasenia;
    private $Estado;
    private $NroCelular;
    private $Confirmacion;

    function __construct(){
        $this->HelpDesk_Area = new HelpDesk_Area();
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