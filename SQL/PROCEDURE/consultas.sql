use helpdesk_2018;

INSERT INTO helpdesk_categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('1', 'IMPRESORA', 'IMPRESORAS CON MAL FUNCIONAMIENTO', '2018-10-19', '1');
INSERT INTO helpdesk_categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('2', 'LAPTOP', 'LAPTOP NO PRENDE', '2018-10-19', '1');

INSERT INTO helpdesk_problema (IdProblema, IdCategoria, Descripcion, Prioridad, FechaEstimacion, FechaCrea, FlgElminado) VALUES ('1', '1', 'IMPRESORA NO PRENDE', 'ALTA', '2018-10-30', '2018-10-22', 1 );


UPDATE helpdesk_problema set
FlgElminado = '0'
where IdProblema = 1;

update helpdesk_categoria set
FlgEliminado = '0'
where IdCategoria = 2;

UPDATE HelpDesk_Perfil SET
	Descripcion = 'Cliente'
WHERE IdPerfil  = 1;

select * from helpdesk_categoria;
select * from helpdesk_problema;

CALL spHelpDesk_GET_BusquedaGeneral('GET_Categoria', '', 0, 0);

SELECT
	IdCategoria,
    Tipo,
    Descripcion
FROM HelpDesk_Categoria
	WHERE FlgEliminado = '0';


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