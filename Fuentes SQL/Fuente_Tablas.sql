CREATE DATABASE HELPDESK_2018;
USE HELPDESK_2018;
CREATE TABLE HelpDesk_Area (
	IdArea			INT PRIMARY KEY
,	Descripcion 	VARCHAR(100)
,	FechaCrea		DATE
,	FlgEliminado 	CHAR(1)

)ENGINE = InnoDB;

CREATE TABLE HelpDesk_Perfil(
	IdPerfil		INT	PRIMARY KEY
,	Descripcion		VARCHAR(150)
,	FechaCrea		DATE
,	FlgEliminado	CHAR(1)
)ENGINE = InnoDB;

CREATE TABLE  HelpDesk_AccionVista(
	IdAccionVista	INT PRIMARY KEY
,	IdPerfil		INT
,	Descripcion		VARCHAR(300)
,	FechaCrea		DATE
,	FlgEliminado	CHAR(1)
,	FOREIGN KEY (IdPerfil) REFERENCES HelpDesk_Perfil (IdPerfil)
)ENGINE = InnoDB;


CREATE TABLE HelpDesk_Usuario(
	IdUsuario		INT PRIMARY KEY
,	IdPerfil		INT
,	IdArea			INT
,	Nombre			VARCHAR(200)
,	Apellidos		VARCHAR(200)
,	Correo			VARCHAR(200)
,	Contrasenia		VARCHAR(300)
,	Estado			VARCHAR(300)
,	NroCelular		VARCHAR(15)
,	Confirmacion	VARCHAR(300)
,	FechaCrea		DATE
,	FlgEliminado	CHAR(1)
,	FOREIGN KEY (IdPerfil) REFERENCES HelpDesk_Perfil(IdPerfil)
,	FOREIGN KEY (IdArea) REFERENCES HelpDesk_Area(IdArea)
)ENGINE = InnoDB;

CREATE TABLE HelpDesk_PrivilegioUsuario(
	IdPriviligeoUsuario	INT PRIMARY KEY
,	IdAccionVista		INT
,	IdUsuario			INT
,	Asignado			CHAR(1)
,	FechaCrea			DATE
,	FlgEliminado		CHAR(1)
,	FOREIGN KEY (IdUsuario) REFERENCES HelpDesk_Usuario(IdUsuario)
,	FOREIGN KEY (IdAccionVista) REFERENCES HelpDesk_AccionVista(IdAccionVista)
)ENGINE = InnoDB;


CREATE TABLE HelpDesk_Categoria(
	IdCategoria		INT PRIMARY KEY
,	Tipo			VARCHAR(50)
,	Descripcion		VARCHAR(150)
,	FechaCrea		DATE
,	FlgEliminado	CHAR(1)
)ENGINE = InnoDB;

CREATE TABLE HelpDesk_Problema (
	IdProblema		INT PRIMARY KEY
,	IdCategoria		INT
,	Descripcion		VARCHAR(150)
,	Prioridad		VARCHAR(150)
,	FechaEstimacion	DATE
, 	FechaCrea		DATE
,	FlgElminado		CHAR(1)
, 	FOREIGN KEY (IdCategoria) REFERENCES HelpDesk_Categoria (IdCategoria)
)ENGINE = InnoDB;

CREATE TABLE HelpDesk_Ticket(
	IdTicket		INT PRIMARY KEY
,	IdCliente		INT
,	IdProblema		INT
,	Asunto			VARCHAR(450)
,	Descripcion		TEXT
,	FechaCrea		DATE
,	FlgEliminado	CHAR(1)
,	FOREIGN KEY (IdCliente) REFERENCES HelpDesk_Usuario(IdUsuario)
,	FOREIGN KEY (IdProblema) REFERENCES HelpDesk_Problema(IdProblema)
) ENGINE= InnoDB;


CREATE TABLE HelpDesk_TicketRespuesta(
	IdTicketRespuesta	INT PRIMARY KEY
,	IdTicket			INT
,	IdProblema			INT
,	Asunto				VARCHAR(450)
,	Respuesta			TEXT
,	NivelAtencion		TINYINT
,	FechaCrea			DATE
,	FlgEliminado		CHAR(1)
,	FOREIGN KEY (IdTicket) REFERENCES HelpDesk_Ticket(IdTicket)
,	FOREIGN KEY (IdProblema) REFERENCES HelpDesk_Problema(IdProblema)
)ENGINE= InnoDB;

CREATE TABLE HelpDesk_TicketDetalle(
	IdTicketDetalle			INT PRIMARY KEY
,	IdTicket				INT
,	IdAdministrador			INT
,	IdSoporte				INT
,	IdAdministradorCierre	INT
,	FechaAsignacion			DATE
,	Estado					VARCHAR(50)
,	FechaCrea				DATE
,	FlgEliminado			CHAR(1)
,	FOREIGN KEY (IdTicket) REFERENCES HelpDesk_Ticket(IdTicket)
,	FOREIGN KEY (IdAdministrador) REFERENCES HelpDesk_Usuario(IdUsuario)
,	FOREIGN KEY (IdSoporte) REFERENCES HelpDesk_Usuario(IdUsuario)
,	FOREIGN KEY (IdAdministradorCierre) REFERENCES HelpDesk_Usuario(IdUsuario)
)ENGINE= InnoDB;


drop table HelpDesk_Problema;
drop table HelpDesk_Categoria;
drop table HelpDesk_Area;