CREATE PROCEDURE `spHelpDesk_SET_Usuario`(
   P_Opcion         CHAR(1) 
,  P_IdUsuario      INT
,  P_IdPerfil       INT
,  P_IdArea         INT
,  P_Nombre         VARCHAR(200) 
,  P_Apellidos      VARCHAR(200) 
,  P_Correo         VARCHAR(200) 
,  P_Contrasenia    VARCHAR(300) 
,  P_NroCelular     VARCHAR(15)
,  P_Confirmacion   CHAR(1)
,  P_XML            TEXT
,  P_ItemXML        INT
,  P_Estado			VARCHAR(15)
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/
    -- ! DECLARACION DE VARIABLES
    DECLARE V_MensajeError          VARCHAR(50) DEFAULT ''; 
    DECLARE I_Item                  INT ;
    DECLARE I_IdPrivilegioDetalle   INT;

    -- !OPCION DE LA TRANSACCION
    
    -- ! INSERTA NUEVO USUARIO
    IF(P_Opcion = 'I') THEN
        BEGIN
			
            IF(SELECT COUNT(*) FROM HelpDesk_Usuario WHERE Correo = P_Correo) > 0 THEN
				BEGIN
					SET V_MensajeError = 'El correo ingresado ya se encuentra registrado en el sistema';
                END;
			ELSE
				BEGIN
            
					-- ! GENERA CORRELATIVO DE USUARIO
					SELECT COALESCE(MAX(IdUsuario), 0) + 1 INTO P_IdUsuario FROM HelpDesk_Usuario;
					
					INSERT INTO HelpDesk_Usuario (
						IdUsuario, IdPerfil, IdArea, Nombre, Apellidos, Correo, Contrasenia, Estado, NroCelular, Confirmacion, FechaCrea, FlgEliminado 
					)
					VALUES (
						P_IdUsuario, P_IdPerfil, P_IdArea, P_Nombre, P_Apellidos, P_Correo, P_Contrasenia, 'Inactivo', P_NroCelular, '0', NOW(), '0'
					);
				END ;
			END IF;
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
    
    -- ! CONFIRMACION DE USUARIO
    IF(P_Opcion = 'C') THEN
		BEGIN
			UPDATE HelpDesk_Usuario SET
				Estado		= 'Activo'
            WHERE IdUsuario = P_IdUsuario;	
		END;
	END IF;
    
    -- ! ASIGNACION DE PRIVILEGIOS POR USUARIO
    IF(P_Opcion = 'A') THEN
        BEGIN
            -- ! ELIMINA PRIVILEGIOS ANTERIOR
            DELETE FROM HelpDesk_PrivilegioDetalle WHERE IdUsuario = P_IdUsuario;

            -- ! INSERTA NUEVOS PRIVILEGIOS
            WHILE (I_Item <= P_ItemXML) DO
            
                -- ! GENERA CORRELATIVO DE PRIVILEGIO
                SELECT COALESCE(MAX(IdPrivilegioDetalle), 0) + 1 INTO I_IdPrivilegioDetalle FROM HelpDesk_PrivilegioDetalle;

                -- ! INSERTA PRIVILEGIOS POR USUARIO
                INSERT INTO HelpDesk_PrivilegioDetalle(
                    IdPrivilegioDetalle, IdPrivilegio, IdUsuario, FechaCrea, FlgEliminado
                )
                VALUES (
                    I_IdPrivilegioDetalle, ExtractValue(P_XML, '//IdPrivilegio[$I_Item]'), P_IdUsuario, NOW(), '0'
                );

                SET I_Item  = I_Item + 1;
                
            END WHILE;
        END;
    END IF;
    
     -- SI EN CASO SE GENERA UN ERROR CANCELA TODO EL PROCESO
    IF  V_MensajeError <> '' THEN
		ROLLBACK;
	END IF;	
	SELECT  V_MensajeError ;
END