USE HelpDesk_2018;
DROP FUNCTION IF EXISTS fn_Get_EstadoTicket;

DELIMITER $
CREATE  FUNCTION `fn_Get_EstadoTicket`(P_IdTicket  INT) RETURNS varchar(500) CHARSET utf8mb4
BEGIN
	DECLARE V_Estado VARCHAR(40);
	SELECT  
		 COALESCE(Estado, '') INTO V_Estado
	FROM HelpDesk_TicketDetalle 
    WHERE IdTicket = P_IdTicket
	ORDER BY IdTicketDetalle DESC LIMIT 1;

 RETURN  V_Estado;
END