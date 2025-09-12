-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
create database livraria;
use livraria;
select database();


CREATE TABLE Editoras (
cnpj varchar(14) not null,
nome_editora varchar(100) not null,
endereco varchar(255) not null,
contato varchar(100),
telefone varchar(14),
cidade varchar(100) default "Limeira" not null,
cod_editora int auto_increment not null PRIMARY KEY,
cod_livro int auto_increment not null,
titulo varchar(100)  not null
);

CREATE TABLE Clientes (
nome_cliente varchar(100) not null PRIMARY KEY,
CPF varchar(14) not null,
email varchar(200) not null,
telefone_cliente varchar(14) not null,
data_nascimento_cliente  datetime
);

CREATE TABLE Vendas (
valor_total decimal not null,
codigo_venda int auto_increment not null PRIMARY KEY,
data_venda date not null,
quantidade int not null
);

CREATE TABLE Livros (
cod_livro int auto_increment not null,
titulo varchar(100) primary key not null,
autor varchar(60) not null,
editora varchar(60) not null,
genero varchar(40) not null,
quantidade int not null,
PRIMARY KEY(cod_livro,titulo)
);

CREATE TABLE Autores (
nome varchar(100) not null,
cod_autor int auto_increment not null PRIMARY KEY,
nacionalidade varchar(50) default "Brasileiro",
data_nascimento datetime not null,
cod_livro int auto_increment not null,
titulo varchar(100) primary key not null,
FOREIGN KEY(titulo) REFERENCES Livros (titulo),
FOREIGN KEY(cod_livro) REFERENCES Livros (cod_livro)
);

CREATE TABLE possuem (
codigo_venda int auto_increment not null,
cod_livro int auto_increment not null,
titulo varchar(100) not null,
FOREIGN KEY(codigo_venda) REFERENCES Vendas (codigo_venda),
FOREIGN KEY(titulo) REFERENCES Livros (titulo),
FOREIGN KEY(cod_livro) REFERENCES Livros (cod_livro)
);

CREATE TABLE compram (
nome_cliente varchar(100) not null,
codigo_venda int auto_increment not null,
FOREIGN KEY(nome_cliente) REFERENCES Clientes (nome_cliente)
);
alter table Editoras add foreign key(titulo)references livros (titulo);
ALTER TABLE Editoras ADD FOREIGN KEY(cod_livro) REFERENCES Livros (cod_livro);
