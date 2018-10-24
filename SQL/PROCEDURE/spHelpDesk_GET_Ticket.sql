SELECT
				TID.IdTicketDetalle,
                TIC.IdTicket,
				TIC.FechaCrea,
                TID.Estado,
				PRO.Descripcion,
				PRO.Prioridad,
				PRO.FechaEstimacion,
				concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
			FROM HelpDesk_Ticket as TIC
            INNER JOIN helpdesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
            INNER JOIN helpdesk_Usuario as US ON US.IdUsuario = TID=IdResponsable
			INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
			INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
			where TID.IdTicketDetalle=1;