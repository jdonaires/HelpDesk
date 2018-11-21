
-- INSERTA DATOS DE AREA
INSERT INTO HelpDesk_Area VALUES ( 1, 'Administración',	'2018-10-11', '0');
INSERT INTO HelpDesk_Area VALUES ( 2, 'RR.HH.', '2018-10-11', '0');
INSERT INTO HelpDesk_Area VALUES ( 3, 'Operaciones', '2018-10-11', '0');

-- INSERTA DATOS DE PERFIL
INSERT INTO HelpDesk_Perfil VALUES ( 1, 'HelpDesk_Perfil', '2018-10-11', '0');
INSERT INTO HelpDesk_Perfil VALUES ( 2, 'Soporte',	'2018-10-11', '0');
INSERT INTO HelpDesk_Perfil VALUES ( 3, 'Administrador', '2018-10-11', '0');

-- SELECT DE TABLAS MAESTRAS
SELECT * FROM HelpDesk_Area;
SELECT * FROM HelpDesk_Perfil;
SELECT * FROM HelpDesk_Usuario;

-- EJECUTA PROCEDIMIENTO ALMACENADO DE CONSULTA
CALL spHelpDesk_GET_BusquedaGeneral('GET_Area', '', 0, 0);
CALL spHelpDesk_GET_BusquedaGeneral('GET_Perfil', '', 0, 0);
CALL spHelpDesk_GET_BusquedaGeneral('GET_Categoria', '', 0, 0);
CALL spHelpDesk_GET_BusquedaGeneral('GET_ValidaEmail', 'cahv_14_1997@hotmail.com', 0, 0);

-- ACTUALIZA DATO DE TABLAS
UPDATE HelpDesk_Perfil SET
	Descripcion = 'Cliente'
WHERE IdPerfil  = 1;


SELECT @password:='my password';
 SELECT MD5(@password);