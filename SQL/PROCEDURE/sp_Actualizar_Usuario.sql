CREATE  PROCEDURE `sp_Actualizar_Usuario`(
  IN P_Opcion         CHAR(1) 
, IN P_IdPerfil       INT
, IN P_IdArea         INT
, IN P_Nombre         VARCHAR(200) 
, IN P_Apellidos      VARCHAR(200) 
, IN P_Correo         VARCHAR(200) 
, IN P_Contrasenia    VARCHAR(300) 
, IN P_NroCelular     VARCHAR(15)
, IN P_Confirmacion   CHAR(1)
, IN P_XML            TEXT
, IN P_ItemXML        INT
)
BEGIN
 UPDATE HelpDesk_Usuario set
  opcion=P_opcion,
  perfil=P_IdPerfil,
  area=P_IdArea,    
  nombre=P_Nombre,         
  Apellidos=P_Apellidos,      
  corre=P_Correo,        
  contrasenia=P_Contrasenia, 
  numcelular=P_NroCelular,    
  confirmacion= P_Confirmacion, 
  txt= P_XML,            
  inten= P_ItemXML     
 WHERE usaurio=P_IdUsuario;
END