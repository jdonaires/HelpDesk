
drop procedure spHelpDesk_GET_DetTicket;
drop procedure spHelpDesk_UP_DetTicket;
drop procedure spHelpDesk_SET_DetTicket;
drop procedure spHelpDesk_GET_Ticket;


DELIMITER $$
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
END //

delimiter //
CREATE PROCEDURE spHelpDesk_GET_DetTicket(
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
	where TIC.IdTicket=_IdTicket;
END //


DELIMITER //
CREATE PROCEDURE spHelpDesk_UP_DetTicket(
	in _IdTicketDetalle INT,
    in _Responsable INT
)
BEGIN
UPDATE HelpDesk_TicketDetalle
    SET
    IdResponsable=_Responsable
	WHERE IdTicketDetalle  =  _IdTicketDetalle;
END //
