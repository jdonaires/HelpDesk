CREATE  PROCEDURE spHelpDesk_GET_BusquedaGeneral(
    P_Opcion         VARCHAR(100)
,   P_Filtro         TEXT
,   P_ParametroId    INT
,   P_ParametroIdAux INT
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/

    IF(P_Opcion  = 'GET_Area') THEN
		BEGIN
			SELECT
				IdArea
				, Descripcion
			FROM HelpDesk_Area
			WHERE FlgEliminado = '0';
		END;
	END IF;

    IF(P_Opcion  = 'GET_Perfil') THEN
		BEGIN
			SELECT
				IdPerfil
			  , Descripcion
			FROM HelpDesk_Perfil
			WHERE FlgEliminado = '0';
		END;
	END IF;

    IF(P_Opcion  = 'GET_Categoria') THEN
		BEGIN
			SELECT
				IdCategoria
					, Tipo
					, Descripcion
			FROM HelpDesk_Categoria
			WHERE FlgEliminado = '0';
		END;
	END	IF;

    IF(P_Opcion  = 'GET_Problema') THEN
		BEGIN
			SELECT
				PRO.IdProblema
					, PRO.IdCategoria
					, PRO.Descripcion 
					, PRO.Prioridad
					, PRO.FechaEstimacion
					, CAT.Descripcion  + ' ' + PRO.Descripcion AS 'Asunto'
			FROM HelpDesk_Problema PRO
				INNER JOIN HelpDesk_Categoria CAT ON CAT.IdCategoria = PRO.IdCategoria
			WHERE FlgEliminado = '0' AND PRO.IdCategoria =  P_ParametroId;
		END;
	END IF;
    
    IF(P_Opcion = 'GET_ValidaEmail') THEN
		BEGIN
			
            DECLARE P_ValidaEmail INT;
			SELECT COUNT(*) INTO P_ValidaEmail FROM HelpDesk_Usuario WHERE Correo = P_Filtro;
            
            SELECT 
				CASE WHEN P_ValidaEmail = 0 THEN 'Success'
                ELSE 'El correo ingresado ya se encuentra registrado en el sistema' 
			END AS 'Valida';
            
        END;
	END IF;
    
    -- CONSULTA DE USUARIO PENDIENTE DE ACTIVACION DE CUENTA
	IF(P_Opcion = 'GET_UsuarioPendiente') THEN
		BEGIN
             SELECT 
				  USU.IdUsuario
				, USU.IdPerfil
				, PER.Descripcion AS 'Perfil'
				, USU.IdArea
				, ARE.Descripcion AS 'Area'
				, USU.Nombre
				, USU.Apellidos
				, USU.Correo
				, USU.NroCelular
				, USU.Correo
				, USU.Contrasenia
				, USU.Estado
			FROM HelpDesk_Usuario USU
				INNER JOIN HelpDesk_Perfil PER ON PER.IdPerfil = USU.IdPerfil
				INNER JOIN HelpDesk_Area   ARE ON ARE.IdArea   = USU.IdArea
			WHERE USU.FlgEliminado = '0' AND USU.Estado IS NULL;
        END;
	END IF;
    
    IF(P_Opcion = 'GET_Ticket') THEN
		BEGIN
			SELECT
			  TID.IdTicketDetalle
			, TIC.IdTicket
			, CONCAT('TK', '-',  LPAD(TIC.IdTicket, 8, '0' )) AS CodTicket
			, COALESCE(CONCAT(USU.Nombre, ' ', USU.Apellidos), '-') AS Responsable
			, COALESCE(ARE.Descripcion, '-') AS Area
			, TIC.FechaCrea
			, COALESCE(TID.Estado, 'SIN ASIGNAR') AS Estado
			, PRO.Descripcion
			, PRO.Prioridad
			, PRO.FechaEstimacion
			, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
			FROM HelpDesk_Ticket AS TIC
				LEFT JOIN (
					SELECT  
						IdResponsable, Estado, IdTicketDetalle, IdTicket
					FROM HelpDesk_TicketDetalle 
					ORDER BY IdTicketDetalle DESC LIMIT 1
				) AS TID ON TID.IdTicket = TIC.IdTicket 
				
				LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TID.IdResponsable
				LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
				LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
				LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria
			WHERE TIC.IdCliente = P_ParametroId;
        END;
	END IF;
    
     IF(P_Opcion = 'GET_Privilegio') THEN
		BEGIN
			SELECT * FROM HelpDesk_Privilegio;
        END;
	END IF;
    
END