CREATE  PROCEDURE HelpDesk_ActulizarUsuario(

   P_IdUsuario      INT
,  P_IdPerfil       INT
,  P_IdArea         INT
,  P_Nombre         VARCHAR(200) 
,  P_Apellidos      VARCHAR(200) 
,  P_Correo         VARCHAR(200) 
,  P_Contrasenia    VARCHAR(300) 
,  P_Estado		    VARCHAR(50) 
,  P_NroCelular     VARCHAR(15)
,  P_Confirmacion   CHAR(1)
,  P_FechaCrea      date
,  P_FlgEliminado   char(1)

)
BEGIN
UPDATE HelpDesk_Usuario SET
 IdUsuario= P_IdUsuario,     
 IdPerfil = P_IdPerfil,    
 IdArea   = P_IdArea,        
 Nombre = P_Nombre,         
 Apellidos= P_Apellidos,     
 Correo= P_Correo,         
 Contrasenia = P_Contrasenia, 
 Estado=P_Estado,
 NroCelular= P_NroCelular,     
 Confirmacion= P_Confirmacion, 
 FechaCrea=P_FechaCrea,
 FlgEliminado=P_flgEliminado
 
   WHERE IdUsuario=P_IdUsuario;
END