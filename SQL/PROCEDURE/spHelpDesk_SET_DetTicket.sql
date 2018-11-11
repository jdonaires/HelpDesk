CREATE  PROCEDURE `spHelpDesk_SET_DetTicket`(
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

END