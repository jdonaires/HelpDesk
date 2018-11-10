CREATE  PROCEDURE spHelpDesk_GET_TicketEstado( 
	P_Estado VARCHAR(50)
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/

	DECLARE V_Query VARCHAR(1000);
    DECLARE V_QueryFinal VARCHAR(1000);
    
    SET V_Query = '
		SELECT
		 TIC.IdTicket
		, CONCAT(''TK'', ''-'',  LPAD(TIC.IdTicket, 8, ''0'' )) AS CodTicket
		, COALESCE(CONCAT(USU.Nombre, '' '', USU.Apellidos), ''-'') AS Responsable
		, COALESCE(ARE.Descripcion, ''-'') AS Area
		, TIC.FechaCrea
		, COALESCE(fn_Get_EstadoTicket (TIC.IdTicket), ''SIN ASIGNAR'') AS Estado
		, PRO.Descripcion
		, PRO.Prioridad
		, PRO.FechaEstimacion
		, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
		FROM HelpDesk_Ticket AS TIC			
			LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TIC.IdCliente
			LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
			LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
			LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria';
            
		IF(P_Estado IN('SIN ASIGNAR', '')) THEN 
			BEGIN
				SET V_QueryFinal = CONCAT(V_Query, ' WHERE (fn_Get_EstadoTicket (TIC.IdTicket) =  ''', P_Estado ,''' OR fn_Get_EstadoTicket (TIC.IdTicket) IS NULL);');
			END;
		ELSE 
			BEGIN
				SET V_QueryFinal = CONCAT(V_Query, ' WHERE (fn_Get_EstadoTicket (TIC.IdTicket) = ''', P_Estado ,''');');
            END;
		END IF;

	SET @s := V_QueryFinal;
	PREPARE stmt1 FROM @s; 
	EXECUTE stmt1; 
	DEALLOCATE PREPARE stmt1; 

END