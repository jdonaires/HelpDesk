CREATE  PROCEDURE `spHelpDesk_GET_DetTicket`(
	in _IdTicket INT
)
BEGIN
SELECT
	TIC.IdTicket,
    CAT.Tipo,
    TID.IdTicketDetalle,
	PRO.Descripcion,
    TIC.Descripcion as TDes,
	ARE.Descripcion as Area,
	TID.Estado,
	TIC.FechaCrea,
	PRO.Prioridad,
	PRO.FechaEstimacion,
		concat(CAT.Tipo," ",PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket as TIC
	INNER JOIN HelpDesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
	INNER JOIN HelpDesk_Usuario as US ON US.IdUsuario = TID.IdResponsable
	INNER JOIN HelpDesk_Area as ARE on ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
	where TIC.IdTicket=_IdTicket and TID.Estado='ASIGNADO';
END