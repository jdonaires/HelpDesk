CREATE  PROCEDURE `spHelpDesk_UP_DetTicket`(
	in _IdTicketDetalle INT,
    in _Responsable INT
)
BEGIN
UPDATE HelpDesk_TicketDetalle
    SET
    IdResponsable=_Responsable
	WHERE IdTicketDetalle  =  _IdTicketDetalle;
END