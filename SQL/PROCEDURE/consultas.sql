INSERT INTO helpdesk_categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('1', 'IMPRESORA', 'IMPRESORAS CON MAL FUNCIONAMIENTO', '2018-10-19', '1');

INSERT INTO helpdesk_categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('2', 'LAPTOP', 'LAPTOP NO PRENDE', '2018-10-19', '1');

update helpdesk_categoria set
FlgEliminado = '0'
where IdCategoria = 2;

UPDATE HelpDesk_Perfil SET
	Descripcion = 'Cliente'
WHERE IdPerfil  = 1;

select * from helpdesk_categoria;

CALL spHelpDesk_GET_BusquedaGeneral('GET_Categoria', '', 0, 0);