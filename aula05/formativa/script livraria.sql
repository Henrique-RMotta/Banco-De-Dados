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
titulo varchar(100) not null
);
CREATE TABLE Clientes (
nome_cliente varchar(100) not null PRIMARY KEY,
CPF varchar(14) not null,
email varchar(200) not null,
telefone_cliente varchar(14) not null,
data_nascimento_cliente  date
);

CREATE TABLE Vendas (
valor_total decimal not null,
codigo_venda int auto_increment not null PRIMARY KEY,
data_venda date not null,
quantidade int not null
);

CREATE TABLE Livros (
cod_livro int not null,
titulo varchar(100) primary key not null,
autor varchar(60) not null,
editora varchar(60) not null,
genero varchar(40) not null,
quantidade int not null
);

CREATE TABLE Autores (
nome varchar(100) not null,
cod_autor int auto_increment not null PRIMARY KEY,
nacionalidade varchar(50) default "Brasileiro",
data_nascimento date not null,
titulo varchar(100) not null,
FOREIGN KEY(titulo) REFERENCES Livros (titulo)
);

CREATE TABLE possuem (
codigo_venda int auto_increment not null,
titulo varchar(100) not null,
FOREIGN KEY(codigo_venda) REFERENCES Vendas (codigo_venda),
FOREIGN KEY(titulo) REFERENCES Livros (titulo)
);

CREATE TABLE compram (
nome_cliente varchar(100) not null,
codigo_venda int not null,
FOREIGN KEY(nome_cliente) REFERENCES Clientes (nome_cliente),
FOREIGN KEY(codigo_venda) REFERENCES Vendas (codigo_venda)
);
alter table livros add ano int not null;
alter table Editoras add foreign key(titulo)references livros (titulo);

INSERT INTO Editoras (cnpj, nome_editora, endereco, contato, telefone, cidade, titulo)
VALUES 
('12345678000199', 'Editora Alpha', 'Rua das Flores, 100', 'João Silva', '19987654321', 'Limeira', 'O Sol da Meia-Noite'),
('98765432000155', 'Editora Beta', 'Av. Central, 200', 'Maria Oliveira', '19912345678', 'Campinas', 'A Jornada Infinita');

-- Inserindo Clientes
INSERT INTO Clientes (nome_cliente, CPF, email, telefone_cliente, data_nascimento_cliente)
VALUES
('Carlos Souza', '11122233344', 'carlos@email.com', '19988887777', '1990-05-15'),
('Ana Lima', '55566677788', 'ana@email.com', '19999996666', '1985-09-20');

-- Inserindo Vendas
INSERT INTO Vendas (valor_total, data_venda, quantidade)
VALUES
(120.50, '2025-09-01', 2),
(59.90, '2025-09-05', 1);

-- Inserindo Livros
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade,ano)
VALUES
(1, 'O Sol da Meia-Noite', 'José Martins', 'Editora Alpha', 'Romance', 10,2022),
(2, 'A Jornada Infinita', 'Clara Souza', 'Editora Beta', 'Aventura', 5,2010);

-- Inserindo Autores
INSERT INTO Autores (nome, nacionalidade, data_nascimento, titulo)
VALUES
('José Martins', 'Brasileiro', '1975-03-10', 'O Sol da Meia-Noite'),
('Clara Souza', 'Brasileira', '1980-11-25', 'A Jornada Infinita');

INSERT INTO Editoras (cnpj, nome_editora, endereco, contato, telefone, cidade, titulo)
VALUES
('12345678000199', 'Intrínseca', 'Rua das Estrelas, 100', 'Mariana Silva', '21998765432', 'Rio de Janeiro', 'Percy Jackson e o Ladrão de Raios'),
('22345678000188', 'Seguinte', 'Av. Central, 200', 'Paulo Almeida', '1133224455', 'São Paulo', 'O Ceifador'),
('32345678000177', 'Rocco', 'Rua da Magia, 50', 'Fernanda Costa', '2133345566', 'Rio de Janeiro', 'Harry Potter e a Pedra Filosofal');

INSERT INTO Clientes (nome_cliente, CPF, email, telefone_cliente, data_nascimento_cliente)
VALUES
('João Pereira', '22233344455', 'joao@email.com', '11987654321', '1995-08-10'),
('Mariana Alves', '33344455566', 'mariana@email.com', '21988776655', '2000-01-22'),
('Lucas Martins', '44455566677', 'lucas@email.com', '31999887766', '1988-04-05');

INSERT INTO Vendas (valor_total, data_venda, quantidade)
VALUES
(89.90, '2025-09-10', 1),
(179.80, '2025-09-12', 2),
(59.90, '2025-09-15', 1);

-- Mais Percy Jackson
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(8, 'Percy Jackson e a Maldição do Titã', 'Rick Riordan', 'Intrínseca', 'Fantasia', 9, 2007);

-- Mais Harry Potter
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(9, 'Harry Potter e o Prisioneiro de Azkaban', 'J.K. Rowling', 'Rocco', 'Fantasia', 13, 1999);

-- Outro do Ceifador
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(10, 'A Nuvem', 'Neal Shusterman', 'Seguinte', 'Distopia', 7, 2018);

INSERT INTO Autores (nome, nacionalidade, data_nascimento, titulo)
VALUES
('Rick Riordan', 'Americano', '1964-06-05', 'Percy Jackson e o Ladrão de Raios'),
('Neal Shusterman', 'Americano', '1962-11-12', 'O Ceifador'),
('J.K. Rowling', 'Britânica', '1965-07-31', 'Harry Potter e a Pedra Filosofal'),
('Rick Riordan', 'Americano', '1964-06-05', 'Percy Jackson e a Maldição do Titã'),
('J.K. Rowling', 'Britânica', '1965-07-31', 'Harry Potter e o Prisioneiro de Azkaban');

-- Percy Jackson
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(3, 'Percy Jackson e o Ladrão de Raios', 'Rick Riordan', 'Intrínseca', 'Fantasia', 12, 2005),
(4, 'Percy Jackson e o Mar de Monstros', 'Rick Riordan', 'Intrínseca', 'Fantasia', 10, 2006);

-- O Ceifador
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(5, 'O Ceifador', 'Neal Shusterman', 'Seguinte', 'Distopia', 8, 2017);

-- Harry Potter
INSERT INTO Livros (cod_livro, titulo, autor, editora, genero, quantidade, ano)
VALUES
(6, 'Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 'Rocco', 'Fantasia', 15, 1997),
(7, 'Harry Potter e a Câmara Secreta', 'J.K. Rowling', 'Rocco', 'Fantasia', 14, 1998);

-- Consultas 
-- todos os valores

select * from livros;
select titulo,ano from livros;

-- consultas por titulo, ano e publicação > 2015
select titulo,ano
from livros
where ano > 2015;

-- consultas por titulo e ano em ordem decrescente
select titulo,ano
from livros
order by ano desc;

-- limitar consultas por valor de quantidade apresentadas 
select titulo from livros
limit 5;

-- renomear colunas com as
select titulo as nome, ano as ano_publicacao
from livros;

-- consultas agregadas 
SELECT count(*) as total_livros from livros;

-- consultas com joins
select livros.titulo,autores.nome from livros join autores on livros.id_autor = autor.id_autor;

-- consulta por agrupamentos group by
select titulo, count(*) as quantidade
from livros
group by titulo;
