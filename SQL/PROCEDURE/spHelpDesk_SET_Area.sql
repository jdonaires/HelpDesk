USE helpdesk_2018;
DELIMITER $
CREATE PROCEDURE spHelpDesk_SET_Area (
	P_Opcion 	CHAR(1)
,	P_IdArea	INT
,	P_Descripcion VARCHAR(100)
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/
	
    -- ! DECLARACION DE VARIABLES
    DECLARE V_MensajeError VARCHAR(50) DEFAULT '0';
    
	IF (P_Opcion = 'I') THEN
		BEGIN
        
				-- !GENRERA CORRELATIVO DE AREA
        SELECT COALESCE( MAX(IdArea), 0)  + 1 INTO  P_IdArea FROM HelpDesk_Area;
			
        INSERT INTO HelpDesk_Area(
					IdArea, Descripcion, FechaCrea, FlgEliminado
        )
        VALUES(
					P_IdArea, P_Descripcion, NOW(), '0'
        );
            
			END;
    END IF;
    
		-- ! ACTUALIZA DATOS DE AREA
    IF (P_Opcion = 'U') THEN
			BEGIN
				UPDATE HelpDesk_Area SET
					Descripcion = P_Descripcion
				WHERE IdArea  = P_IdArea;
			END;
    END IF;
    

		-- ! ELIMINACION LOGICA DE AREA
    IF (P_Opcion = 'D') THEN
		BEGIN
        
			UPDATE HelpDesk_Area SET
				FlgEliminado = '1'
			WHERE IdArea     = P_IdArea;
		END;
    END IF;
    
    -- SI EN CASO SE GENERA UN ERROR CANCELA TODO EL PROCESO
    IF  _MessageError <> '0' THEN
			ROLLBACK;
		END IF;	
	SELECT  _MessageError;

END
