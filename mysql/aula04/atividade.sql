create database REMOTERC;
use REMOTERC;

create table if not exists PRODUTOS (
CProd int primary key auto_increment not null,
Descricao varchar(255) not null,
Peso varchar(2),
ValorUnit decimal
);

insert into PRODUTOS (CProd,Descricao,Peso,ValorUnit) values (1,'teclado','KG',35.00);
insert into PRODUTOS (CProd,Descricao,Peso,ValorUnit) values (2,'Mouse','KG',25.00);
insert into PRODUTOS (CProd,Descricao,Peso,ValorUnit) values (3,'HD','KG',350.00);
select * from PRODUTOS;

create table VENDEDOR (
CVend int primary key auto_increment not null,
Nome varchar(60),
Salario decimal,
FSalario decimal
);

insert into VENDEDOR (CVend,Nome,Salario,FSalario) values(1,'Ronaldo',3512,1);
insert into VENDEDOR (CVend,Nome,Salario,FSalario) values(2,'Roberson',3225,2);
insert into VENDEDOR (CVend,Nome,Salario,FSalario) values(3,'Clodoaldo',4350,3);
select * from VENDEDOR;

create table if not exists CLIENTE (
CCli int primary key auto_increment not null,
Nome_cli varchar(60),
Endereco varchar(255),
Cidade varchar(30),
UF varchar(2)
);

insert into CLIENTE(CCli,Nome_cli,Endereco,Cidade,UF) values (11,'Bruno','Rua 1 456', 'Rio Claro','SP');
insert into CLIENTE(CCli,Nome_cli,Endereco,Cidade,UF) values (12,'Claúdio','Rua Quadrada 234', 'Campinas','SP');
insert into CLIENTE(CCli,Nome_cli,Endereco,Cidade,UF) values (13,'Cremilda','Rua das Flores 666', 'São Paulo','SP');
select * from CLIENTE;

-- Update -- Exemplos
update produtos
set ValorUnit = 32
where Descricao = 'Teclado';

update vendedor
set Salario = (Salario * 1.25);

update produtos
set ValorUnit = 28,
Descricao = 'Mouse Branco'
where CProd = 2;

-- Update Deasafio 

update Vendedor
set Salario = 3150
where Fsalario=1;

update Vendedor
set Salario = (Salario * 1.10)
where Fsalario = 2;

update Vendedor 
set Salario = 3500
where Fsalario = 3;

-- Delete Exemplo

delete from Vendedor 
where Salario < 2500;

delete from Cliente;

truncate table produtos;