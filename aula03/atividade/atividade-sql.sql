create database atividade;
use atividade;

create table if not exists fornecedor (
Fcodigo int primary key auto_increment not null,
Fnome varchar(60) not null,
Stats varchar(10) default('Ativo') not null,
Cidade varchar(30) not null,
primary key (Fcodigo)
);

create table if not exists peca (
Pcodigo int primary key auto_increment not null,
Pnome varchar(60),
Cor varchar(30),
Peso varchar(3),
Cidade varchar(30),
primary key (Pcodigo)
);

create table if not exists instituicao (
Icodigo int primary key auto_increment not null,
nome varchar(60),
primary key(Icodigo)
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
foreign key (Pcod) references produto(Pcod), 
foreign key (Fcod) references fornecedor(Fcodigo),
foreign key (PRcod) references produto(PRcod)
);


create table if not exists produz (
Fcodigo int not null,
foreign key (Fcodigo) references fornecedor(Fcodigo)
);


