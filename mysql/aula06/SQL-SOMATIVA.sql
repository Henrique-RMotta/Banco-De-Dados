-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
-- Criando O Banco De Dados
create database Plataforma_de_Cursos_Online_Somativa;
use Plataforma_de_Cursos_Online_Somativa;
select database();
-- Criando as Tabelas
CREATE TABLE if not exists Cursos (
id_cursos int primary key auto_increment not null ,
Titulo varchar(60) not null,
Descricao varchar(255) not null,
Carga_horaria int not null,
Stats varchar(7) default "inativo" not null 
);

CREATE TABLE if not exists Inscricoes (
id_inscricoes int primary key auto_increment not null ,
data_inscricao date not null,
id_alunos int not null,
id_cursos int not null,
FOREIGN KEY(id_cursos) REFERENCES Cursos (id_cursos)
);

CREATE TABLE if not exists Avaliacoes (
id_avaliacoes int primary key auto_increment not null ,
nota decimal not null,
comentario varchar(255) ,
id_inscricoes int not null,
FOREIGN KEY(id_inscricoes) REFERENCES Inscricoes (id_inscricoes)
);

CREATE TABLE if not exists Alunos (
id_alunos int primary key auto_increment not null ,
email varchar(255),
nome_aluno varchar(60) not null,
data_nascimento date not null
);

ALTER TABLE Inscricoes ADD FOREIGN KEY(id_alunos) REFERENCES Alunos (id_alunos);

-- Inserindo Dados
INSERT into Alunos(id_alunos,email,nome_aluno,data_nascimento) values(1,'renan@email.com', 'Renan', '2000-02-20');
INSERT into Alunos(id_alunos,email,nome_aluno,data_nascimento) values(2,'henrique@email.com', 'Henrique', '2010-02-26');
INSERT into Alunos(id_alunos,email,nome_aluno,data_nascimento) values(3,'reinaldo@email.com', 'Reinaldo', '1985-05-16');
INSERT into Alunos(id_alunos,email,nome_aluno,data_nascimento) values(4,'marcia@email.com', 'Marcia', '2005-09-29');
INSERT into Alunos(id_alunos,email,nome_aluno,data_nascimento) values(5,'julia@email.com', 'Julia', '2007-10-12');

INSERT into Cursos values(1,'Java-Fundamentals', 'Java Básico', 40,"Ativo");
INSERT into Cursos values(2,'Java-Foundations', 'Java Avançado', 80,"Inativo");
INSERT into Cursos values(3,'Python-Fundamentals', 'Python Básico', 40,"Inativo");
INSERT into Cursos values(4,'Python-Fondations', 'Python Avançado', 45,"Ativo");
INSERT into Cursos values(5,'C++', 'C++ - Básico', 20,"Ativo");

insert into Inscricoes values(1,'2023-07-30',1,3);
insert into Inscricoes values(2,'2020-02-03',4,3);
insert into Inscricoes values(3,'2024-09-22',5,5);

insert into Avaliacoes values (1,10,'Mto Boa',1);
insert into Avaliacoes value (2,6,'Maio meno',2);
insert into Avaliacoes value (3,8,'legal',3);

-- Updates 
update Alunos 
set email = "renan123@email.com"
where nome_aluno = "Renan";

update Cursos
set Carga_horaria = "50"
where titulo = "Java-Foundations";

update Alunos 
set nome_aluno = "Motta"
where nome_aluno = "Henrique";

update Cursos 
set stats = "Ativo"
where titulo = "Python-Fundamentals";

update Avaliacoes
set nota = 3
where id_avaliacoes = 2; 

-- Deletes 
delete from Inscricoes 
where id_inscricoes = 3; 

delete from Cursos 
where id_cursos = 4;

delete from Avaliacoes 
where id_avaliacoes = 2; 

delete from Alunos
where id_alunos = 5; 

delete from inscricoes
where id_cursos = 4; 

-- Consultas
select * from Alunos; 

select email from Alunos;

select * from Cursos where Carga_horaria > 30; 

select * from Cursos where Stats = "Inativo";

select * from Alunos where alunos.data_nascimento > '1995-01-01';

select * from avaliacoes where nota > 9; 

select count(*) from cursos;

select * from Cursos order by Carga_horaria desc limit 3;

-- Criando Index
create index idx_email_cod on Alunos(email);
