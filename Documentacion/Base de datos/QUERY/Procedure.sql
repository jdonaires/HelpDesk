USE HelpDesk_2018;

DROP FUNCTION IF EXISTS fn_Get_EstadoTicket;
DROP FUNCTION IF EXISTS fn_Get_ResponsableTicket;
DROP PROCEDURE IF EXISTS HelpDesk_ActulizarUsuario;
DROP PROCEDURE IF EXISTS sp_Actualizar_Usuario;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ContUsuarios;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ConsultaUsu;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ContPendiente;
DROP PROCEDURE IF EXISTS sp_ticketConsultasa;
DROP PROCEDURE IF EXISTS spHelpDesk_Det_AsigTicket;
DROP PROCEDURE IF EXISTS spHelpDesk_Det_VerTicket;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_BusquedaGeneral;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ConsultaUsu;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ContPendiente;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_ContUsuarios;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_DetTicket;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_Login;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_Ticket;
DROP PROCEDURE IF EXISTS spHelpDesk_GET_TicketEstado;
DROP PROCEDURE IF EXISTS spHelpDesk_SET_Area;
DROP PROCEDURE IF EXISTS spHelpDesk_SET_DetTicket;
DROP PROCEDURE IF EXISTS spHelpDesk_SET_Ticket;
DROP PROCEDURE IF EXISTS spHelpDesk_SET_Usuario;
DROP PROCEDURE IF EXISTS spHelpDesk_UP_DetTicket;
DROP PROCEDURE IF EXISTS spHelpDesk_View_Ticket;
DROP PROCEDURE IF EXISTS spHelpDesk_View_TicUs;

DELIMITER $
CREATE  FUNCTION fn_Get_EstadoTicket(
	P_IdTicket  INT
) 
RETURNS VARCHAR(500) 
BEGIN
	DECLARE V_Estado VARCHAR(40);
	SELECT  
		 COALESCE(Estado, '') INTO V_Estado
	FROM HelpDesk_TicketDetalle 
    WHERE IdTicket = P_IdTicket
	ORDER BY IdTicketDetalle DESC LIMIT 1;

 RETURN  V_Estado;
END$

CREATE  FUNCTION fn_Get_ResponsableTicket(
	P_IdTicket  INT
) 
RETURNS VARCHAR(500) 
BEGIN
	DECLARE I_IdResponsable INT;
	SELECT  
		 COALESCE(IdResponsable, 0) INTO I_IdResponsable
	FROM HelpDesk_TicketDetalle 
    WHERE IdTicket = P_IdTicket
	ORDER BY IdTicketDetalle DESC LIMIT 1;

 RETURN  V_Estado;
END$

CREATE  PROCEDURE HelpDesk_ActulizarUsuario(
   P_IdUsuario      INT
,  P_IdPerfil       INT
,  P_IdArea         INT
,  P_Nombre         VARCHAR(200) 
,  P_Apellidos      VARCHAR(200) 
,  P_Correo         VARCHAR(200) 
,  P_Contrasenia    VARCHAR(300) 
,  P_Estado		    VARCHAR(50) 
,  P_NroCelular     VARCHAR(15)
,  P_Confirmacion   CHAR(1)
,  P_FechaCrea      DATE
,  P_FlgEliminado   CHAR(1)

)
BEGIN
	UPDATE HelpDesk_Usuario SET
	 IdUsuario		= P_IdUsuario,     
	 IdPerfil 		= P_IdPerfil,    
	 IdArea   		= P_IdArea,        
	 Nombre 		= P_Nombre,         
	 Apellidos		= P_Apellidos,     
	 Correo			= P_Correo,         
	 Contrasenia 	= P_Contrasenia, 
	 Estado			= P_Estado,
	 NroCelular		= P_NroCelular,     
	 Confirmacion	= P_Confirmacion, 
	 FechaCrea		= P_FechaCrea,
	 FlgEliminado	= P_flgEliminado
	WHERE IdUsuario	=P_IdUsuario;
END$

CREATE  PROCEDURE sp_Actualizar_Usuario(
  IN P_Opcion         CHAR(1) 
, IN P_IdPerfil       INT
, IN P_IdArea         INT
, IN P_Nombre         VARCHAR(200) 
, IN P_Apellidos      VARCHAR(200) 
, IN P_Correo         VARCHAR(200) 
, IN P_Contrasenia    VARCHAR(300) 
, IN P_NroCelular     VARCHAR(15)
, IN P_Confirmacion   CHAR(1)
, IN P_XML            TEXT
, IN P_ItemXML        INT
)
BEGIN
 UPDATE HelpDesk_Usuario SET
  Opcion		 = P_opcion,
  Perfil		 = P_IdPerfil,
  Area			 = P_IdArea,    
  Nombre		 = P_Nombre,         
  Apellidos		 = P_Apellidos,      
  Correo		 = P_Correo,        
  Contrasenia	 = P_Contrasenia, 
  NroCelular	 = P_NroCelular,    
  Confirmacion	 = P_Confirmacion    
 WHERE IdUsuario = P_IdUsuario;
END$

CREATE PROCEDURE spHelpDesk_GET_ContUsuarios(	
	IN _IdPerfil INT
)
BEGIN
	SELECT 
		  USU.IdUsuario 
		, USU.IdPerfil 
		, PER.Descripcion AS 'Perfil' 
		, USU.IdArea 
		, ARE.Descripcion AS 'Area' 
		, USU.Nombre 
		, USU.Apellidos 
		, USU.Correo 
		, USU.NroCelular 
		, USU.Correo 
		, USU.Contrasenia 
		, USU.Estado
	FROM HelpDesk_Usuario USU 
	  INNER JOIN HelpDesk_Perfil PER ON PER.IdPerfil = USU.IdPerfil
	  INNER JOIN HelpDesk_Area   ARE ON ARE.IdArea   = USU.IdArea 
	WHERE USU.IdPerfil =_IdPerfil;
              
END $



CREATE PROCEDURE spHelpDesk_GET_ConsultaUsu(	
	IN _IdUsuario INT
)
BEGIN
	SELECT 
	   USU.IdUsuario 
	 , USU.IdPerfil 
	 , PER.Descripcion AS 'Perfil' 
	 , USU.IdArea 
     , ARE.Descripcion AS 'Area' 
	 , USU.Nombre 
	 , USU.Apellidos 
	 , USU.Correo 
	 , USU.NroCelular 
	 , USU.Correo 
	 , USU.Contrasenia 
	 , USU.Estado
	FROM HelpDesk_Usuario USU  
		INNER JOIN HelpDesk_Perfil PER  ON PER.IdPerfil = USU.IdPerfil
		INNER JOIN HelpDesk_Area   ARE  ON ARE.IdArea   = USU.IdArea 
	WHERE usu.IdUsuario=_idUsuario;
END $


CREATE PROCEDURE spHelpDesk_GET_ContPendiente()
BEGIN
SELECT
 		 USU.IdUsuario
		, USU.IdPerfil
		, PER.Descripcion AS 'Perfil'
		, USU.IdArea
		, ARE.Descripcion AS 'Area'
		, USU.Nombre
		, USU.Apellidos
		, USU.Correo
		, USU.NroCelular
		, USU.Correo
		, USU.Contrasenia
		, USU.Estado
	FROM HelpDesk_Usuario USU
		INNER JOIN HelpDesk_Perfil PER ON PER.IdPerfil = USU.IdPerfil
		INNER JOIN HelpDesk_Area   ARE ON ARE.IdArea   = USU.IdArea
	WHERE USU.FlgEliminado = '0' AND UPPER(USU.Estado) ='INACTIVO';
END$

CREATE  PROCEDURE `sp_ticketConsultasa`()
BEGIN

	SELECT
	  TID.IdTicketDetalle
	, TIC.IdTicket
	, CONCAT('TK', '-',  LPAD(TIC.IdTicket, 8, '0' )) AS CodTicket
	, COALESCE(CONCAT(USU.Nombre, ' ', USU.Apellidos), '-') AS Responsable
	, COALESCE(ARE.Descripcion, '-') AS Area
	, TIC.FechaCrea
	, COALESCE(fn_Get_EstadoTicket (TIC.IdTicket), 'SIN ASIGNAR') AS Estado
	, PRO.Descripcion
	, PRO.Prioridad
	, PRO.FechaEstimacion
	, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
	FROM HelpDesk_Ticket AS TIC
		LEFT JOIN HelpDesk_TicketDetalle 	AS TID ON TID.IdTicket 		= TIC.IdTicket		
		LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TIC.IdCliente
		LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
		LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
		LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria
    WHERE (fn_Get_EstadoTicket (TIC.IdTicket) = '' OR fn_Get_EstadoTicket (TIC.IdTicket) IS NULL);
END$


CREATE  PROCEDURE `spHelpDesk_Det_AsigTicket`(
	IN _IdTicket INT
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
		CONCAT(CAT.Tipo," ",PRO.Descripcion) AS Asunto
		FROM HelpDesk_Ticket as TIC
			INNER JOIN HelpDesk_Usuario 	AS US  ON US.IdUsuario 		= TIC.IdCliente
			INNER JOIN HelpDesk_Area 		AS ARE ON ARE.IdArea 		= US.IdArea
			INNER JOIN HelpDesk_Problema 	AS PRO ON PRO.IdProblema 	= TIC.IdProblema
			INNER JOIN HelpDesk_Categoria 	AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria
		WHERE TIC.IdTicket=_IdTicket;
END$

CREATE  PROCEDURE `spHelpDesk_Det_VerTicket`(
	IN _IdTicket INT
)
BEGIN
	SELECT
		TIC.IdTicket,
		CAT.Tipo,
		PRO.Descripcion as Problema,
		TIC.Descripcion,
		ARE.Descripcion as Area,
		TIC.FechaCrea,
        USA.Nombre,
		PRO.Prioridad,
		PRO.FechaEstimacion,
		CONCAT(CAT.Tipo," ",PRO.Descripcion) AS Asunto
		FROM HelpDesk_Ticket as TIC
			INNER JOIN HelpDesk_TicketDetalle 	AS TID 	ON TID.IdTicket 	= TIC.IdTicket
			INNER JOIN HelpDesk_Usuario 		AS US 	ON US.IdUsuario 	= TIC.IdCliente
			INNER JOIN HelpDesk_Usuario 		AS USA 	ON USA.IdUsuario 	= TID.IdResponsable
			INNER JOIN HelpDesk_Area 			AS ARE 	ON ARE.IdArea 		= US.IdArea
			INNER JOIN HelpDesk_Problema 		AS PRO 	ON PRO.IdProblema 	= TIC.IdProblema
			INNER JOIN HelpDesk_Categoria 		AS CAT 	ON CAT.IdCategoria 	= PRO.IdCategoria
		WHERE TIC.IdTicket=_IdTicket;
END$

CREATE  PROCEDURE spHelpDesk_GET_BusquedaGeneral(
    P_Opcion         VARCHAR(100)
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
			FROM HelpDesk_Area
			WHERE FlgEliminado = '0';
		END;
	END IF;

    IF(P_Opcion  = 'GET_Perfil') THEN
		BEGIN
			SELECT
				IdPerfil
			  , Descripcion
			FROM HelpDesk_Perfil
			WHERE FlgEliminado = '0';
		END;
	END IF;

    IF(P_Opcion  = 'GET_Categoria') THEN
		BEGIN
			SELECT
				IdCategoria
					, Tipo
					, Descripcion
			FROM HelpDesk_Categoria
			WHERE FlgEliminado = '0';
		END;
	END	IF;

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
			WHERE FlgEliminado = '0' AND PRO.IdCategoria =  P_ParametroId;
		END;
	END IF;
    
    IF(P_Opcion = 'GET_ValidaEmail') THEN
		BEGIN
			
            DECLARE P_ValidaEmail INT;
			SELECT COUNT(*) INTO P_ValidaEmail FROM HelpDesk_Usuario WHERE Correo = P_Filtro;
            
            SELECT 
				CASE WHEN P_ValidaEmail = 0 THEN 'Success'
                ELSE 'El correo ingresado ya se encuentra registrado en el sistema' 
			END AS 'Valida';
            
        END;
	END IF;
    
    -- CONSULTA DE USUARIO PENDIENTE DE ACTIVACION DE CUENTA
	IF(P_Opcion = 'GET_UsuarioPendiente') THEN
		BEGIN
             SELECT 
				  USU.IdUsuario
				, USU.IdPerfil
				, PER.Descripcion AS 'Perfil'
				, USU.IdArea
				, ARE.Descripcion AS 'Area'
				, USU.Nombre
				, USU.Apellidos
				, USU.Correo
				, USU.NroCelular
				, USU.Correo
				, USU.Contrasenia
				, USU.Estado
			FROM HelpDesk_Usuario USU
				INNER JOIN HelpDesk_Perfil PER ON PER.IdPerfil = USU.IdPerfil
				INNER JOIN HelpDesk_Area   ARE ON ARE.IdArea   = USU.IdArea
			WHERE USU.FlgEliminado = '0' AND USU.Estado IS NULL;
        END;
	END IF;
    
    IF(P_Opcion = 'GET_Ticket') THEN
		BEGIN
			SELECT
			  TID.IdTicketDetalle
			, TIC.IdTicket
			, CONCAT('TK', '-',  LPAD(TIC.IdTicket, 8, '0' )) AS CodTicket
			, COALESCE(CONCAT(USU.Nombre, ' ', USU.Apellidos), '-') AS Responsable
			, COALESCE(ARE.Descripcion, '-') AS Area
			, TIC.FechaCrea
			, COALESCE(TID.Estado, 'SIN ASIGNAR') AS Estado
			, PRO.Descripcion
			, PRO.Prioridad
			, PRO.FechaEstimacion
			, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
			FROM HelpDesk_Ticket AS TIC
				LEFT JOIN (
					SELECT  
						IdResponsable, Estado, IdTicketDetalle, IdTicket
					FROM HelpDesk_TicketDetalle 
					ORDER BY IdTicketDetalle DESC LIMIT 1
				) AS TID ON TID.IdTicket = TIC.IdTicket 
				
				LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TID.IdResponsable
				LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
				LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
				LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria
			WHERE TIC.IdCliente = P_ParametroId;
        END;
	END IF;
    
     IF(P_Opcion = 'GET_Privilegio') THEN
		BEGIN
			SELECT * FROM HelpDesk_Privilegio;
        END;
	END IF;
    
END$


/*CREATE  PROCEDURE `spHelpDesk_GET_ConsultaUsu`(	in _IdUsuario INT
)
BEGIN
SELECT USU.IdUsuario ,
	 USU.IdPerfil 
         ,PER.Descripcion AS 'Perfil' 
         , USU.IdArea 
         , ARE.Descripcion AS 'Area' 
         , USU.Nombre 
         , USU.Apellidos 
         ,USU.Correo 
         , USU.NroCelular 
         , USU.Correo 
         , USU.Contrasenia 
         , USU.Estado
         ,USU.FechaCrea
         ,USU.FlgEliminado
         ,USU.Confirmacion
	FROM HelpDesk_Usuario USU 
        INNER JOIN HelpDesk_Perfil PER 
        ON PER.IdPerfil = USU.IdPerfil
	INNER JOIN HelpDesk_Area ARE 
        ON ARE.IdArea = USU.IdArea 
        WHERE USU.IdUsuario=_idUsuario;
        END$
        
CREATE  PROCEDURE `spHelpDesk_GET_ContPendiente`()
BEGIN
SELECT
 		 USU.IdUsuario
                , USU.IdPerfil
                , PER.Descripcion AS 'Perfil'
                , USU.IdArea
                , ARE.Descripcion AS 'Area'
                , USU.Nombre
                , USU.Apellidos
                , USU.Correo
                , USU.NroCelular
                , USU.Correo
                , USU.Contrasenia
                , USU.Estado
            FROM HelpDesk_Usuario USU
                INNER JOIN HelpDesk_Perfil PER ON PER.IdPerfil = USU.IdPerfil
                INNER JOIN HelpDesk_Area   ARE ON ARE.IdArea   = USU.IdArea
            WHERE USU.FlgEliminado = '0' AND USU.Estado ='inactivo';
END$
CREATE  PROCEDURE `spHelpDesk_GET_ContUsuarios`(	in _IdPerfil INT

)
BEGIN
SELECT USU.IdUsuario 
	,USU.IdPerfil 
	,PER.Descripcion AS 'Perfil' 
	,USU.IdArea 
	,ARE.Descripcion AS 'Area' 
	,USU.Nombre 
	,USU.Apellidos 
	,USU.Correo 
	,USU.NroCelular 
	,USU.Correo 
	,USU.Contrasenia 
	,USU.Estado
              FROM HelpDesk_Usuario USU 
              INNER JOIN HelpDesk_Perfil PER
              ON PER.IdPerfil = USU.IdPerfil
              INNER JOIN HelpDesk_Area ARE
              ON ARE.IdArea = USU.IdArea 
              WHERE USU.IdPerfil=_IdPerfil;
              
END$*/

CREATE  PROCEDURE `spHelpDesk_GET_DetTicket`(
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
	where TIC.IdTicket=_IdTicket and TID.Estado='ASIGNADO';
END$

CREATE PROCEDURE `spHelpDesk_GET_Login`(
	P_Correo		VARCHAR(500)
,	P_Contrasenia	TEXT
)
BEGIN

	SELECT 
		USU.IdUsuario
	,	USU.IdPerfil
    ,	PER.Descripcion  AS 'Perfil'
    ,	USU.IdArea
    ,	ARE.Descripcion  AS 'Area'
    ,	USU.Nombre
    ,	USU.Apellidos
    ,	USU.Correo
    ,	USU.Estado
    ,	USU.NroCelular
    ,	USU.Confirmacion
	FROM HelpDesk_Usuario USU
		INNER JOIN HelpDesk_Perfil	PER ON PER.IdPerfil = USU.IdPerfil
		INNER JOIN HelpDesk_Area	ARE ON ARE.IdArea	= USU.IdArea
	WHERE USU.Correo = P_Correo AND USU.Contrasenia = P_Contrasenia;
    
END$

CREATE  PROCEDURE `spHelpDesk_GET_Ticket`(

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
END$


CREATE PROCEDURE `spHelpDesk_GET_TicketEstado`( 
	P_Estado 		VARCHAR(50)
,	P_IdResponzable INT
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/
	DECLARE V_Query1 VARCHAR(1000);
    DECLARE V_Query2 VARCHAR(1000);
	DECLARE V_Query VARCHAR(1000);
    DECLARE V_QueryFinal VARCHAR(1000);
    
    SET V_Query1 = ' 
		SELECT 
			TIC.IdTicket 
		  , CONCAT(''TK'', ''-'',  LPAD(TIC.IdTicket, 8, ''0'' )) AS CodTicket 
          , COALESCE(CONCAT(USU.Nombre, '' '', USU.Apellidos), ''-'') AS Responsable
		  , COALESCE(ARE.Descripcion, ''-'') AS Area
          , DATE_FORMAT(TIC.FechaCrea,''%d/%m/%Y'') AS FechaCrea';
        
        -- NECESARIO PARA LA VISTA DEL ADMINISTRADOR
        IF (P_IdResponzable = 0) THEN
			BEGIN
				SET V_Query2 =  CONCAT( V_Query1 , ', COALESCE(fn_Get_EstadoTicket (TIC.IdTicket), ''SIN ASIGNAR'') AS Estado');
			END;
		ELSE 
		-- NECESARIO PARA LA VISTA DE T. I.
			BEGIN
				SET V_Query2 = CONCAT( V_Query1 , ', CASE WHEN fn_Get_EstadoTicket (TIC.IdTicket) =  ''ASIGNADO'' THEN  ''PENDIENTE'' ELSE fn_Get_EstadoTicket (TIC.IdTicket) END AS Estado');
            END;
		END IF;
		
	SET V_Query = CONCAT(V_Query2, ' 
		, PRO.Descripcion
		, PRO.Prioridad
		, PRO.FechaEstimacion
		, CONCAT(CAT.Descripcion, " ", PRO.Descripcion) AS Asunto
		FROM HelpDesk_Ticket AS TIC			
			LEFT JOIN HelpDesk_Usuario 			AS USU ON USU.IdUsuario 	= TIC.IdCliente
			LEFT JOIN HelpDesk_Area 			AS ARE ON ARE.IdArea 		= USU.IdArea
			LEFT JOIN HelpDesk_Problema 		AS PRO ON PRO.IdProblema 	= TIC.IdProblema
			LEFT JOIN HelpDesk_Categoria 		AS CAT ON CAT.IdCategoria 	= PRO.IdCategoria');
		
        IF (P_IdResponzable = 0) THEN
			BEGIN
				IF(P_Estado IN('SIN ASIGNAR', '')) THEN 
					BEGIN
						SET V_QueryFinal = CONCAT(V_Query, ' WHERE (fn_Get_EstadoTicket (TIC.IdTicket) =  ''', P_Estado ,''' OR fn_Get_EstadoTicket (TIC.IdTicket) IS NULL);');
					END;
				ELSE 
					BEGIN
						SET V_QueryFinal = CONCAT(V_Query, ' WHERE (fn_Get_EstadoTicket (TIC.IdTicket) = ''', P_Estado ,''');');
					END;
				END IF;
			END;
		ELSE 
			BEGIN
				SET V_QueryFinal = CONCAT(V_Query, ' LEFT JOIN HelpDesk_TicketDetalle	AS TID ON TID.IdTicket  = TIC.IdTicket WHERE TID.IdResponsable = ',P_IdResponzable , ' AND TID.Estado =  ''', P_Estado ,''';');
            END;
		END IF;
	
	SET @s := V_QueryFinal;
	PREPARE stmt1 FROM @s; 
	EXECUTE stmt1; 
	DEALLOCATE PREPARE stmt1; 

END$


CREATE  PROCEDURE `spHelpDesk_SET_Area`(
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

END$

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

END$

CREATE  PROCEDURE `spHelpDesk_SET_Ticket`(
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

END$

CREATE PROCEDURE `spHelpDesk_SET_Usuario`(
   P_Opcion         CHAR(1) 
,  P_IdUsuario      INT
,  P_IdPerfil       INT
,  P_IdArea         INT
,  P_Nombre         VARCHAR(200) 
,  P_Apellidos      VARCHAR(200) 
,  P_Correo         VARCHAR(200) 
,  P_Contrasenia    VARCHAR(300) 
,  P_NroCelular     VARCHAR(15)
,  P_Confirmacion   CHAR(1)
,  P_XML            TEXT
,  P_ItemXML        INT
,  P_Estado			VARCHAR(15)
)
BEGIN
/**************************************************************
'* CREADO POR: GRUPO HELPDESK
'*			   Cristian Hernandez Villo
'* FECHA CREA: 23/09/2018
**************************************************************/
    -- ! DECLARACION DE VARIABLES
    DECLARE V_MensajeError          VARCHAR(50) DEFAULT ''; 
    DECLARE I_Item                  INT ;
    DECLARE I_IdPrivilegioDetalle   INT;
	DECLARE V_EstadoActual			VARCHAR(50);
    -- !OPCION DE LA TRANSACCION
    
    -- ! INSERTA NUEVO USUARIO
    IF(P_Opcion = 'I') THEN
        BEGIN
			
            IF(SELECT COUNT(*) FROM HelpDesk_Usuario WHERE Correo = P_Correo) > 0 THEN
				BEGIN
					SET V_MensajeError = 'El correo ingresado ya se encuentra registrado en el sistema';
                END;
			ELSE
				BEGIN
            
					-- ! GENERA CORRELATIVO DE USUARIO
					SELECT COALESCE(MAX(IdUsuario), 0) + 1 INTO P_IdUsuario FROM HelpDesk_Usuario;
					
					INSERT INTO HelpDesk_Usuario (
						IdUsuario, IdPerfil, IdArea, Nombre, Apellidos, Correo, Contrasenia, Estado, NroCelular, Confirmacion, FechaCrea, FlgEliminado 
					)
					VALUES (
						P_IdUsuario, P_IdPerfil, P_IdArea, P_Nombre, P_Apellidos, P_Correo, P_Contrasenia, 'Inactivo', P_NroCelular, '0', NOW(), '0'
					);
				END ;
			END IF;
        END;
    END IF;


	-- ! ACTUALIZA DATOS DE USUARIO
    IF(P_Opcion = 'U') THEN
		BEGIN
			
            UPDATE HelpDesk_Usuario SET
				Nombre		= P_Nombre
            ,	Apellidos	= P_Apellidos
            ,	Contrasenia	= P_Contrasenia
			,	NroCelular	= P_NroCelular
            WHERE IdUsuario = P_IdUsuario;
		END;
	END IF;
    
    -- ! CONFIRMACION DE USUARIO
    IF(P_Opcion = 'C') THEN
		BEGIN
			UPDATE HelpDesk_Usuario SET
				Estado		= 'Activo'
            WHERE IdUsuario = P_IdUsuario;	
		END;
	END IF;
    
    -- ! ASIGNACION DE PRIVILEGIOS POR USUARIO
    IF(P_Opcion = 'A') THEN
        BEGIN	
			
			-- ! OBTIENE ESTADO ACTUAL DEL USUARIO
			SELECT Estado INTO V_EstadoActual FROM HelpDesk_Usuario WHERE IdUsuario = P_IdUsuario;
            
            -- ! ACTUALIZA ESTADO DE USUARIO
            UPDATE HelpDesk_Usuario SET
				Estado		= CASE WHEN P_Estado IS NULL OR P_Estado = '' THEN V_EstadoActual ELSE P_Estado END
            WHERE IdUsuario = P_IdUsuario;
            
            -- ! ELIMINA PRIVILEGIOS ANTERIOR
            DELETE FROM HelpDesk_PrivilegioDetalle WHERE IdUsuario = P_IdUsuario;

            -- ! INSERTA NUEVOS PRIVILEGIOS
            WHILE (I_Item <= P_ItemXML) DO
            
                -- ! GENERA CORRELATIVO DE PRIVILEGIO
                SELECT COALESCE(MAX(IdPrivilegioDetalle), 0) + 1 INTO I_IdPrivilegioDetalle FROM HelpDesk_PrivilegioDetalle;

                -- ! INSERTA PRIVILEGIOS POR USUARIO
                INSERT INTO HelpDesk_PrivilegioDetalle(
                    IdPrivilegioDetalle, IdPrivilegio, IdUsuario, FechaCrea, FlgEliminado
                )
                VALUES (
                    I_IdPrivilegioDetalle, ExtractValue(P_XML, '//IdPrivilegio[$I_Item]'), P_IdUsuario, NOW(), '0'
                );

                SET I_Item  = I_Item + 1;
                
            END WHILE;
        END;
    END IF;
    
     -- SI EN CASO SE GENERA UN ERROR CANCELA TODO EL PROCESO
    IF  V_MensajeError <> '' THEN
		ROLLBACK;
	END IF;	
	SELECT  V_MensajeError ;
END$

CREATE  PROCEDURE `spHelpDesk_UP_DetTicket`(
	in _IdTicketDetalle INT,
    in _Responsable INT
)
BEGIN
UPDATE HelpDesk_TicketDetalle
    SET
    IdResponsable=_Responsable
	WHERE IdTicketDetalle  =  _IdTicketDetalle;
END$

CREATE  PROCEDURE `spHelpDesk_View_Ticket`(
	
)
BEGIN
SELECT
	TIC.IdTicket,
    US.Nombre as Cliente,
    ARE.Descripcion as Area,
	PRO.Descripcion as Problema,
    TIC.Asunto,
    PRO.Prioridad,
    TIC.Descripcion as Descripcion,
	TIC.FechaCrea
	FROM HelpDesk_Ticket as TIC
	INNER JOIN HelpDesk_Usuario as US ON US.IdUsuario = TIC.IdCliente
    INNER JOIN HelpDesk_Area as ARE ON ARE.IdArea = US.IdArea
	INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
	where TIC.IdTicket;
END$

CREATE  PROCEDURE `spHelpDesk_View_TicUs`(
	
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
	where US.IdUsuario;
END
