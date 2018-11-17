CREATE  PROCEDURE `sp_ticketConsultasa`()
begin

	SELECT
	  TID.IdTicketDetalle
	, TIC.IdTicket
	, CONCAT('TK', '-',  LPAD(TIC.IdTicket, 8, '0' )) AS CodTicket
	, COALESCE(CONCAT(USU.Nombre, ' ', USU.Apellidos), '-') AS Responsable
	, COALESCE(ARE.Descripcion, '-') AS Area
	, TIC.FechaCrea
	, COALESCE(fn_Get_EstadoTicket (TIC.IdTicket), 'SIN ASIGNAR') AS Estado
	, PRO.Descripcion
	, PRO.Prioridad
	, PRO.FechaEstimacion
	, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket AS TIC
		LEFT JOIN HelpDesk_TicketDetalle 	AS TID ON TID.IdTicket 		= TIC.IdTicket		
		LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TIC.IdCliente
		LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
		LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
		LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria
    WHERE (fn_Get_EstadoTicket (TIC.IdTicket) = '' OR fn_Get_EstadoTicket (TIC.IdTicket) IS NULL);
end