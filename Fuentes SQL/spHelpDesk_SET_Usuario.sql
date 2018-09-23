CREATE PROCEDURE spHelpDesk_SET_Usuario(
   P_Opcion         CHAR(1) 
,  P_IdUsuario      INT
,  P_IdPerfil       INT
,  P_IdArea         INT
,  P_Nombre         VARCHAR(200) 
,  P_Apellidos      VARCHAR(200) 
,  P_Correo         VARCHAR(200) 
,  P_Contrasenia    VARCHAR(300) 
,  P_Estado         VARCHAR(300)
,  P_NroCelular     VARCHAR(15)
,  P_Confirmacion   CHAR(1)
,  P_XML            TEXT
,  P_ITEMXML        INT
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/
    DECLARE V_MensajeError VARCHAR(50) DEFAULT '0'; 

    -- !OPCION DE LA TRANSACCION
    
    -- ! INSERTA NUEVO USUARIO
    IF(P_Opcion = 'I') THEN
        BEGIN

            -- ! GENERA CORRELATIVO DE USUARIO
            SELECT COALESCE(MAX(IdUsuario), 0) + 1 INTO P_IdUsuario FROM HelpDesk_Usuario;
            
            INSERT INTO HelpDesk_Usuario (
				IdUsuario, IdPerfil, IdArea, Nombre, Apellidos, Correo, Contrasenia, Estado, NroCelular, Confirmacion, FechaCrea, FlgEliminado 
            )
            VALUES (
				P_IdUsuario, P_IdPerfil, P_IdArea, P_Nombre, P_Apellidos, P_Correo, P_Contrasenia, P_Estado, P_NroCelular, P_Confirmacion, NOW(), '0'
            );

        END;
    END IF;

	-- ! ACTUALIZA DATOS DE USUARIO
    IF(P_Opcion = 'U') THEN
		BEGIN
			
            UPDATE HelpDesk_Usuario SET
				Nombre		= P_Nombre
            ,	Apellidos	= P_Apellidos
            ,	Contrasenia	= P_Contrasenia
			,	NroCelular	= P_NroCelular
            WHERE IdUsuario = P_IdUsuario;
		END;
	END IF;

END
