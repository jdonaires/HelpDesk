DELIMITER $$
create procedure spHelpDesk_GET_DetTicket(
	in _IdTicket INT,
    )
    BEGIN
    SELECT
    PRO.IdTicket,
    PRO.IdProblema,
    PRO.IdCategoria,
    PRO.Descripcion,
    PRO.Prioridad,
    PRO.FechaEstimacion,
    concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
			FROM HelpDesk_Ticket as TIC
			INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
			INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
			where TIC.IdTicket=1;
END
DELIMITER ;
