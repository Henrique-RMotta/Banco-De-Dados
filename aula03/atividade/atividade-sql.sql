create database atividade22_08;
use atividade22_08;
-- select database(); --> novo comando
create table if not exists fornecedor (
Fcodigo int primary key auto_increment not null,
Fnome varchar(60) not null,
Stats varchar(10) default('Ativo') not null,
Cidade varchar(30) not null
);

create table if not exists peca (
Pcodigo int primary key auto_increment not null,
Pnome varchar(60) , -- not null
Cor varchar(30) , -- not null
Peso varchar(3) , -- not null
Cidade varchar(30) -- not null
);

create table if not exists instituicao (
Icodigo int primary key auto_increment not null,
nome varchar(60)
);

create table if not exists Projeto (
PRcod int primary key auto_increment not null,
PRnome varchar(60),
Cidade varchar(30),
Icod int not null,
foreign key (Icod) references instituicao(Icodigo)
);

create table if not exists fornecimento (
quantidade int not null,
Pcod int not null,
Fcod int not null,
PRcod int not null,
foreign key (Pcod) references peca(Pcodigo), 
foreign key (Fcod) references fornecedor(Fcodigo),
foreign key (PRcod) references projeto(PRcod)
);


create table if not exists produz (
Fcodigo int not null,
foreign key (Fcodigo) references fornecedor(Fcodigo)
);

create table if not exists quantifica (
Pcodigo int not null,
foreign key (Pcodigo) references peca(Pcodigo)
);

create table if not exists orienta (
PRCod int not null,
foreign key (PRCod) references projeto(PRcod)
);

create table if not exists fornece (
PRCod int not null,
foreign key (PRCod) references projeto(PRcod)
);

-- alterações 
alter table fornecedor drop column Cidade;
alter table fornecedor add fone varchar(11);

create table if not exists cidade (
Ccod int primary key auto_increment not null,
Cnome varchar(60),
UF varchar(2)
);
-- correcao
-- alter table TBL_fornecedor
	-- add column ccod int not null
    
-- alter table tbl_fornecedor
	-- add constraint fk_ccod_fornecedor
    -- foreign key (ccod) references tbl_cidade (ccod);
alter table fornecedor add Ccod int not null;
alter table fornecedor add foreign key (Ccod) references cidade(Ccod);

alter table peca drop column Cidade;
alter table peca add Ccod int not null;
alter table peca add foreign key (Ccod) references cidade(Ccod);

show tables;

SHOW CREATE TABLE Projeto;
-- apaga chave estrangeira
ALTER TABLE Projeto DROP FOREIGN KEY Projeto_ibfk_1;
-- apaga a coluna
ALTER TABLE Projeto DROP COLUMN Icod;
-- apaga  a tabela
DROP TABLE instituicao;
-- cria a chave estrangeira
alter table Projeto add Ccod int not null;
alter table Projeto add foreign key (Ccod) references cidade(Ccod);

-- criando index
create index idx_fornecedor on fornecedor(Fnome);
create index idx_Cidade on Cidade(Cnome);
create index idx_projeto on projeto(PRnome);
create index idx_peca on peca(Pnome);

-- correcao
-- create index idx_ICODIGO on tbl_projeto(icodigo);
-- create index idx_FCODIGO on tbl_fornecimento(fcodigo);
-- create index idx_PCODIGO on tbl_projeto(Pcodigo);
-- create index idx_PRCODIGO on tbl_projeto(PRcodigo);

-- consulta de tabelas 
select * from cidade;
show tables;
insert into cidade values(11,'Limeira','SP');
insert into cidade values(12,'Campinas','SP');
insert into cidade values(13,'Cosmópolis','SP');

-- verficar último valor inserido de id
select last_insert_id();


insert into fornecedor values(1,'motta','Ativo','11111',12);

insert into peca values(11,'peca1','vermelho',10,12);