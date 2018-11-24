CREATE  PROCEDURE `spHelpDesk_View_Ticket`(
	
)
BEGIN
SELECT
	TIC.IdTicket,
    US.Nombre as Cliente,
    ARE.Descripcion as Area,
	PRO.Descripcion as Problema,
    TIC.Asunto,
    PRO.Prioridad,
    TIC.Descripcion as Descripcion,
	TIC.FechaCrea
	FROM HelpDesk_Ticket as TIC
	INNER JOIN HelpDesk_Usuario as US ON US.IdUsuario = TIC.IdCliente
    INNER JOIN HelpDesk_Area as ARE ON ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	where TIC.IdTicket;
END