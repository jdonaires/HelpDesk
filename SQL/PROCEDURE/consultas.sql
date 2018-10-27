use helpdesk_2018;

INSERT INTO HelpDesk_Categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('3', 'IMPRESORA', 'IMPRESORAS CON MAL FUNCIONAMIENTO', '2018-10-19', '1');
INSERT INTO HelpDesk_Categoria (IdCategoria, Tipo, Descripcion, FechaCrea, FlgEliminado) VALUES ('2', 'LAPTOP', 'LAPTOP NO PRENDE', '2018-10-19', '1');

INSERT INTO HelpDesk_Problema (IdProblema, IdCategoria, Descripcion, Prioridad, FechaEstimacion, FechaCrea, FlgElminado) VALUES ('1', '1', 'IMPRESORA NO PRENDE', 'ALTA', '2018-10-30', '2018-10-22', 1 );
INSERT INTO HelpDesk_Problema (IdProblema, IdCategoria, Descripcion, Prioridad, FechaEstimacion, FechaCrea, FlgElminado) VALUES ('2', '2', 'LAPTOP SIN WIFI', 'MEDIA', '2018-10-30', '2018-10-22', 0 );


INSERT INTO HelpDesk_Usuario (IdUsuario, IdPerfil, IdArea, Nombre, Apellidos, Correo, Contrasenia, Estado, NroCelular, Confirmacion, Fechacrea, FlgElIminado) VALUES ('1', '1', '1', 'Anders', 'Romero Quispe', 'lien2902@gmail.com', '123456', 'ACTIVO', '922178381',0, '2018-10-23', 0 );

INSERT INTO HelpDesk_Usuario (IdUsuario, IdPerfil, IdArea, Nombre, Apellidos, Correo, Contrasenia, Estado, NroCelular, Confirmacion, Fechacrea, FlgElIminado) VALUES ('2', '2', '2', 'Luis', 'Navarro Saravia', 'lsnavarro@gmail.com', '123456', 'ACTIVO', '934238740',0, '2018-10-26', 0 );


/*insert into HelpDesk_Area (IdArea, Descripcion, FechaCrea, FlgEliminado) values ('1', 'TI', '2018-10-23', 0);*/

/*insert into Helpdesk_Perfil (IdPerfil, Descripcion, FechaCrea, FlgEliminado) values ('1', 'Cliente', '2018-10-23', 0);*/

INSERT INTO HelpDesk_Ticket (IdTicket, IdCliente, IdProblema, Asunto, Descripcion, FechaCrea, FlgEliminado) VALUES ('1', '1', '1', 'IMPRESORA', 'NO PRENDE', '2018-10-22', 0 );
insert into HelpDesk_TicketDetalle (IdTicketDetalle, IdTicket, IdResponsable, Estado, FechaCrea) values ('1', '1', '1', 'Pendiente', '2018-10-23');

UPDATE helpdesk_problema set
FlgElminado = '0'
where IdProblema = 1;

update helpdesk_categoria set
FlgEliminado = '0'
where IdCategoria = 2;

UPDATE HelpDesk_Perfil SET
	Descripcion = 'Cliente'
WHERE IdPerfil  = 1;

select * from HelpDesk_Pategoria;
select * from HelpDesk_Problema;
select * from HelpDesk_Ticket;
select * from HelpDesk_Usuario;
select * from HelpDesk_Perfil;
select * from HelpDesk_Area;
select * from HelpDesk_TicketDetalle;

delete from helpdesk_area where IdArea = '1';


CALL spHelpDesk_GET_BusquedaGeneral('GET_Categoria', '', 0, 0);

SELECT
	IdCategoria,
    Tipo,
    Descripcion
FROM HelpDesk_Categoria
	WHERE FlgEliminado = '0';


SELECT 
	PRO.IdProblema,
    PRO.IdCategoria,
    PRO.Descripcion,
    PRO.Prioridad,
    PRO.FechaEstimacion,
    concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
			FROM HelpDesk_Problema PRO
				INNER JOIN HelpDesk_Categoria CAT ON CAT.IdCategoria = PRO.IdCategoria
			WHERE FlgEliminado = '0';
            
            
            
DELIMITER $$
create procedure spHelpDesk_GET_DetTicket(
	in _IdTicket INT,
    )
    BEGIN
    SELECT
    PRO.IdTicket,
    PRO.IdProblema,
    PRO.IdCategoria,
    PRO.Descripcion,
    PRO.Prioridad,
    PRO.FechaEstimacion,
    concat(CAT.Descripcion," ",PRO.Descripcion) AS Asunto
			FROM HelpDesk_Ticket as TIC
			INNER JOIN HelpDesk_Problema as PRO ON PRO.IdProblema = TIC.IdProblema
			INNER JOIN HelpDesk_Categoria as CAT ON CAT.IdCategoria = PRO.IdCategoria
			where TIC.IdTicket=1;
END
DELIMITER ;


select * from HelpDesk_Usuario;
delete from HelpDesk_Usuario where IdUsuario=25;

update HelpDesk_Usuario set
FlgEliminado=0
where IdUsuario = 4;
