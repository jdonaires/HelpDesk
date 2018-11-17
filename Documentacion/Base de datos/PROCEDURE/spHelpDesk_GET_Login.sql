CREATE PROCEDURE `spHelpDesk_GET_Login`(
	P_Correo		VARCHAR(500)
,	P_Contrasenia	TEXT
)
BEGIN

	SELECT 
		USU.IdUsuario
	,	USU.IdPerfil
    ,	PER.Descripcion  AS 'Perfil'
    ,	USU.IdArea
    ,	ARE.Descripcion  AS 'Area'
    ,	USU.Nombre
    ,	USU.Apellidos
    ,	USU.Correo
    ,	USU.Estado
    ,	USU.NroCelular
    ,	USU.Confirmacion
	FROM HelpDesk_Usuario USU
		INNER JOIN HelpDesk_Perfil	PER ON PER.IdPerfil = USU.IdPerfil
		INNER JOIN HelpDesk_Area	ARE ON ARE.IdArea	= USU.IdArea
	WHERE USU.Correo = P_Correo AND USU.Contrasenia = P_Contrasenia;
    
END