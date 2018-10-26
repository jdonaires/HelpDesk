drop procedure spHelpDesk_GET_TicDet;
drop procedure spHelpDesk_GET_DetTicket;
drop procedure HelpDesk_UP_DetTicket;


DELIMITER //
CREATE PROCEDURE spHelpDesk_SET_DetTicket(
IN _IdTicketDetalle INT,
IN _IdTicket INT,
IN _IdResponsable INT,
IN _Estado INT,
IN _FechaCrea INT
)
BEGIN
insert into helpdesk_ticketdetalle(
	IdTicketDetalle,
    IdTicket,
    IdResponsable,
    Estado,
    FechaCrea
)
values(_IdTicketDetalle, _IdTicket, _IdResponsable, _Estado, _FechaCrea);

END //

delimiter //
CREATE PROCEDURE spHelpDesk_GET_Ticket(

)
BEGIN
SELECT
	TID.IdTicketDetalle,
	TIC.IdTicket,
	US.Nombre,
	ARE.Descripcion as Area,
	TIC.FechaCrea,
	TID.Estado,
	PRO.Descripcion,
	PRO.Prioridad,
	PRO.FechaEstimacion,
		concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket as TIC
	INNER JOIN helpdesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
	INNER JOIN helpdesk_Usuario as US ON US.IdUsuario = TID.IdResponsable
	INNER JOIN helpdesk_Area as ARE on ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
	where TID.IdTicketDetalle;
END //

delimiter //
CREATE PROCEDURE spHelpDesk_GET_DetTicket(
	in _IdTicketDetalle INT
)
BEGIN
SELECT
	TIC.IdTicket,
    CAT.Tipo,
	PRO.Descripcion,
	ARE.Descripcion as Area,
	TIC.FechaCrea,
	PRO.Prioridad,	
	PRO.FechaEstimacion,
		concat(CAT.Tipo," ",PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket as TIC
	INNER JOIN helpdesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
	INNER JOIN helpdesk_Usuario as US ON US.IdUsuario = TID.IdResponsable
	INNER JOIN helpdesk_Area as ARE on ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
	where TID.IdTicketDetalle=_IdTicketDetalle;
END //

DELIMITER //
CREATE PROCEDURE HelpDesk_UP_DetTicket(
	in _IdTicketDetalle INT
)
BEGIN
UPDATE HelpDesk_Ticket as TIC
	INNER JOIN helpdesk_TicketDetalle as TID ON TID.IdTicket= TIC.IdTicket
	INNER JOIN helpdesk_Usuario as US ON US.IdUsuario = TID.IdResponsable
	INNER JOIN helpdesk_Area as ARE on ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
    SET
    CAT.Tipo=_Tipo,
	PRO.Descripcion=_Descripcion,
	ARE.Descripcion=_Area,
	TIC.FechaCrea=_FechaCrea,
	PRO.Prioridad=_Prioridad,	
	PRO.FechaEstimacion=FechaEstimacion
WHERE IdTicketDetalle  =  _IdTicketDetalle;
END //