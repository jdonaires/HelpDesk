CREATE  PROCEDURE `spHelpDesk_GET_Ticket`(

)
BEGIN
SELECT
	TID.IdTicketDetalle,
	TIC.IdTicket,
    TID.Estado,
	US.Nombre,
	ARE.Descripcion as Area,
	TIC.FechaCrea,
	PRO.Descripcion,
	PRO.Prioridad,
	PRO.FechaEstimacion,
		concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket as TIC
	INNER JOIN HelpDesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
	INNER JOIN HelpDesk_Usuario as US ON US.IdUsuario = TID.IdResponsable
	INNER JOIN HelpDesk_Area as ARE on ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
	where TID.IdTicketDetalle;
END