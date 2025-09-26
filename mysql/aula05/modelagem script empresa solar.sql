-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.
create database empresasolar;
use empresasolar;
select database();


CREATE TABLE Clientes (
id_cliente int auto_increment not null PRIMARY KEY,
Nome_cliente varchar(100) not null
);

CREATE TABLE Produtos (
Id_Produto int auto_increment not null PRIMARY KEY,
Nome_produto varchar(100) not null
);

CREATE TABLE Compra (
id_compra int auto_increment primary key not null,
Id_Produto int ,
id_cliente int ,
FOREIGN KEY(Id_Produto) REFERENCES Produtos (Id_Produto),
FOREIGN KEY (id_cliente) REFERENCES Clientes (id_cliente)
);

create table vendedor (
id_vendedor int primary key auto_increment,
nome_vendedor varchar(100),
salario decimal(10,2),
fsalarial char(1)
);

insert into clientes (Nome_cliente) values ('motta');
insert into produtos values (2,'teclado');

update produtos
set Nome_produto = 'mouse'
where id_produto =2;


select * from produtos;
drop table vendedor;
insert into vendedor (nome_vendedor,salario,fsalarial)values ("motta",5000,2);
insert into vendedor (nome_vendedor,salario,fsalarial)values ("morsa",1000,1);
insert into vendedor (nome_vendedor,salario,fsalarial)values ("abacate",5000,3);

select * from vendedor;
update vendedor 
set salario = 3150
where fsalarial = 1;

update vendedor
set salario = salario * 1.10
where fsalarial = 2; 

update vendedor 
set salario = 3500
where fsalarial =3; 

update vendedor 
set salario = 10000
where nome_vendedor = "morsa";


delete from vendedor
where salario < 6000;
-- atualizar update em forma de comando
set sql_safe_updates = 0;

delete from vendedor where id_vendedor = 1; 
delete from vendedor where nome_vendedor = "morsa";

delete from vendedor where id_vendedor <=10 or id_vendedor>=20;

delete from clentes;

truncate table clientes;