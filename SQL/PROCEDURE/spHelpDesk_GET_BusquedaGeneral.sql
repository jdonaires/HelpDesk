DELIMITER $
CREATE PROCEDURE spHelpDesk_GET_BusquedaGeneral(
    P_Opcion         CHAR(1)
,   P_Filtro         TEXT
,   P_ParametroId    INT
,   P_ParametroIdAux INT
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/

    IF(P_Opcion  = 'GET_Area') THEN
        BEGIN   
            SELECT 
              IdArea
            , Descripcion 
            FROM HelpDesk_Area WHERE FlgEliminado = '0'
        END;
    END IF;

    IF(P_Opcion  = 'GET_Perfil') THEN
        BEGIN   
            SELECT 
              IdPerfil
            , Descripcion 
            FROM HelpDesk_Perfil WHERE FlgEliminado = '0'
        END;
    END IF;

    IF(P_Opcion  = 'GET_Categoria') THEN
        BEGIN   
            SELECT 
              IdCategoria
            , Tipo
            , Descripcion 
            FROM HelpDesk_Categoria WHERE FlgEliminado = '0'
        END;
    END IF;

    IF(P_Opcion  = 'GET_Problema') THEN
        BEGIN   
            SELECT 
              PRO.IdProblema
            , PRO.IdCategoria
            , PRO.Descripcion 
            , PRO.Prioridad
            , PRO.FechaEstimacion
            , CAT.Descripcion  + ' ' + PRO.Descripcion AS 'Asunto'
            FROM HelpDesk_Problema PRO
                INNER JOIN HelpDesk_Categoria CAT ON CAT.IdCategoria = PRO.IdCategoria
            WHERE FlgEliminado = '0' AND PRO.IdCategoria =  P_ParametroId
        END;
    END IF;

END;