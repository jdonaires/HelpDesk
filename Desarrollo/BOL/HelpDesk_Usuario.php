<?php
    class HelpDesk_Usuario
    {
        private $Opcion;
        private $IdUsuario;
        private $IdPerfil;
        private $IdArea;
        private $Nombre;
        private $Apellidos;
        private $Correo;
        private $Contrasenia;
        private $Estado;
        private $NroCelular;
        private $Confirmacion;
        private $XML;
        private $ItemXML;

        function __construct(){
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