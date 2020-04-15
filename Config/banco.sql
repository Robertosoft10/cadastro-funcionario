CREATE DATABASE cf;
USE cf;

CREATE TABLE funcionarios(
	idFunc int not null auto_increment primary key,
	nome varchar(255),
	fone varchar(30),
	cargo varchar(255),
	salario varchar(30),
	turno varchar(30)
);
CREATE TABLE usuarios(
	idUser int not null auto_increment primary key,
	nome varchar(255),
	email varchar(255),
	senha varchar(255),
	nivel varchar(30)
);