delimiter$$
CREATE DEFINER=`usert_test`@`%` PROCEDURE `spHelpDesk_SET_Ticket`(
    P_Opcion        CHAR(1)
,   P_IdTicket      INT
,   P_IdCliente     INT
,   P_IdProblema    INT
,   P_Asunto        VARCHAR(450)
,	P_Descripcion	TEXT
,   P_IdResponsable INT
,   P_IdSoporte     INT
,   P_IdProblema_R  INT
,   P_Asunto_R      VARCHAR(450)
,   P_Respuesta     TEXT
,   P_NivelAtencion TINYINT
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/

    -- ! DECLARACION DE VARIABLES
    DECLARE V_MensajeError       VARCHAR(50) DEFAULT '';
    DECLARE V_IdTicketDetalle    INT;
    DECLARE V_IdTicketRespuesta  INT;
    DECLARE V_Estado             VARCHAR(50);

    -- ! IDENTIFICA ESTADO SEGUN EL TIPO DE ACCION
    SET V_Estado =  CASE
                        WHEN P_Opcion = 'A' THEN 'ASIGNADO'
                        WHEN P_Opcion = 'P' THEN 'PROCESANDO'
                        WHEN P_Opcion = 'V' THEN 'POR VALIDAR'
                        WHEN P_Opcion = 'C' THEN 'CERRADO'
                        ELSE ''
                    END;

    IF(P_Opcion = 'I') THEN
        BEGIN

            -- ! GENERA CORRELATIVO DE TICKET
            SELECT COALESCE (MAX(IdTicket), 0) + 1 INTO P_IdTicket FROM HelpDesk_Ticket;

            INSERT INTO HelpDesk_Ticket(
                IdTicket, IdCliente, IdProblema, Asunto, Descripcion, FechaCrea, FlgEliminado
            )
            VALUES (
                P_IdTicket, P_IdCliente, P_IdProblema, P_Asunto, P_Descripcion, NOW(), '0'
            );
        END;
    END IF;

    -- ! REGISTRA PROCESO DE TICKET -
    IF(P_Opcion IN('A', 'P', 'V', 'C')) THEN
        BEGIN

            SELECT COALESCE (MAX(IdTicketDetalle), 0) + 1 INTO V_IdTicketDetalle FROM HelpDesk_TicketDetalle;

            -- ! GUARDA REGISTRO DE ADMISTRADOR QUE ASIGNO TICKET
            IF(P_Opcion = 'A') THEN
                BEGIN
                    INSERT INTO HelpDesk_TicketDetalle (
                        IdTicketDetalle, IdTicket, IdResponsable, Estado, FechaCrea
                    )
                    VALUES(
                        V_IdTicketDetalle, P_IdTicket, P_IdResponsable, 'ASIGNACIÓN', NOW()
                    );
                END;
            END IF;

            -- !REGISTRA ASIGNACION DE TICKET PARA TI
            INSERT INTO HelpDesk_TicketDetalle (
                IdTicketDetalle, IdTicket, IdResponsable, Estado, FechaCrea
            )
            VALUES(
                (V_IdTicketDetalle + CASE WHEN P_Opcion  = 'A' THEN  1 ELSE  0 END), P_IdTicket,
                CASE WHEN P_Opcion = 'A' THEN  P_IdSoporte ELSE  P_IdResponsable END , V_Estado , NOW()
            );

            -- ! CUANDO SE CULMINA UN TICKET POR PARTE DE SOPORTE DE TI GUARDA LA RESPUESTA
            IF(P_Opcion = 'V') THEN
                BEGIN

                    SELECT COALESCE (MAX(IdTicketRespuesta), 0) + 1 INTO V_IdTicketRespuesta FROM HelpDesk_TicketRespuesta;

                    INSERT INTO HelpDesk_TicketRespuesta (
                        IdTicketRespuesta, IdTicket, IdProblema, Asunto, Respuesta, NivelAtencion, FechaCrea
                    )
                    VALUES(
                        V_IdTicketRespuesta, P_IdTicket, P_IdProblema_R, P_Asunto_R, P_Respuesta, 0, NOW()
                    );
                END;
            END IF;

            -- ! CUANDO SE CIERRA UN TICKET ACTUALIZA EL NIVEL DE ATENCION
            IF(P_Opcion = 'C') THEN
                BEGIN
                    UPDATE HelpDesk_TicketRespuesta SET
                         NivelAtencion = P_NivelAtencion
                    WHERE IdTicket     = P_IdTicket;
                END;
            END IF;
        END;
    END IF;

    -- SI EN CASO SE GENERA UN ERROR CANCELA TODO EL PROCESO
    IF  V_MensajeError <> '' THEN
			ROLLBACK;
		END IF;
	SELECT  V_MensajeError;

END
