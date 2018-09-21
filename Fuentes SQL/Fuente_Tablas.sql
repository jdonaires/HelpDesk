CREATE DATABASE HELPDESK_2018;

CREATE TABLE HelpDesk_Area (
	IdArea			INT PRIMARY KEY
,	Descripcion 	VARCHAR(100)
,	FechaCrea		DATE
,	FlgEliminado 	CHAR(1)

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
, 	FechaCrea		DATE
,	FlgElminado		CHAR(1)
, 	FOREIGN KEY (IdCategoria) REFERENCES HelpDesk_Categoria (IdCategoria)
)ENGINE = InnoDB;


drop table problema
drop table Categoria
drop table Area