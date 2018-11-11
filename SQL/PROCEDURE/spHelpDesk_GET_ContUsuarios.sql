CREATE  PROCEDURE `spHelpDesk_GET_ContUsuarios`(	in _IdPerfil INT

)
BEGIN
SELECT USU.IdUsuario 
	,USU.IdPerfil 
	,PER.Descripcion AS 'Perfil' 
	,USU.IdArea 
	,ARE.Descripcion AS 'Area' 
	,USU.Nombre 
	,USU.Apellidos 
	,USU.Correo 
	,USU.NroCelular 
	,USU.Correo 
	,USU.Contrasenia 
	,USU.Estado
              FROM HelpDesk_Usuario USU 
              INNER JOIN HelpDesk_Perfil PER
              ON PER.IdPerfil = USU.IdPerfil
              INNER JOIN HelpDesk_Area ARE
              ON ARE.IdArea = USU.IdArea 
              WHERE USU.IdPerfil=_IdPerfil;
              
END