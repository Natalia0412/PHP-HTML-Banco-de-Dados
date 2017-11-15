-- /////////////////////////////////////////////////////
-- bd: BANCO
-- tabela: PESSOA
-- ID			int				not null	auto_increment	primary_key
-- NOME			varchar(150)	not null	
-- IDADE		int				not null
-- IDADE_DIAS	int				not null
-- /////////////////////////////////////////////////////

create database BANCO;
use banco;

create table PESSOA(
    ID			int				not null auto_increment primary key,
	NOME		varchar(150) 	not null,
	IDADE		int 			not null,
	IDADE_DIAS	int 			not null 	
);


-- describe PESSOA; // lista a estrutura da tabela