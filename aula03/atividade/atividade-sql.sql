create database atividade22_08;
use atividade22_08;

create table if not exists fornecedor (
Fcodigo int primary key auto_increment not null,
Fnome varchar(60) not null,
Stats varchar(10) default('Ativo') not null,
Cidade varchar(30) not null
);

create table if not exists peca (
Pcodigo int primary key auto_increment not null,
Pnome varchar(60),
Cor varchar(30),
Peso varchar(3),
Cidade varchar(30)
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

alter table fornecedor add Ccod int not null;
alter table fornecedor add foreign key (Ccod) references cidade(Ccod);

alter table peca drop column Cidade;
alter table peca add Ccod int not null;
alter table peca add foreign key (Ccod) references cidade(Ccod);


SHOW CREATE TABLE Projeto;
ALTER TABLE Projeto DROP FOREIGN KEY Projeto_ibfk_1;
ALTER TABLE Projeto DROP COLUMN Icod;
DROP TABLE instituicao;
alter table Projeto add Ccod int not null;
alter table Projeto add foreign key (Ccod) references cidade(Ccod);

alter table fornecedor add index (Fcodigo);
alter table Cidade add index(Ccod);
alter table Projeto add index(PRcod);
alter table peca add index (Pcodigo);
