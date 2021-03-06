CREATE  PROCEDURE `spHelpDesk_Det_AsigTicket`(
	in _IdTicket INT
)
BEGIN
	SELECT
		TIC.IdTicket,
		CAT.Tipo,
		PRO.Descripcion as Problema,
		TIC.Descripcion,
		ARE.Descripcion as Area,
		TIC.FechaCrea,
		PRO.Prioridad,
		PRO.FechaEstimacion,
			concat(CAT.Tipo," ",PRO.Descripcion) AS Asunto
		FROM HelpDesk_Ticket as TIC
		INNER JOIN HelpDesk_Usuario as US ON US.IdUsuario = TIC.IdCliente
		INNER JOIN HelpDesk_Area as ARE on ARE.IdArea = US.IdArea
		INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
		INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
		where TIC.IdTicket=_IdTicket;
END