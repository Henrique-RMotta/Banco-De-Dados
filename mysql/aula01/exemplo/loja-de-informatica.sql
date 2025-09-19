-- Criar Banco de Dados 
create database loja_informatica;

-- Ativar BD
use loja_informatica;

create table produtos (
cod_produto int,
descricao varchar(255),
nome_produto varchar(100),
preco_produto decimal,
imagem varchar(255)
);

create table estoque (
cod_produto int,
observacao varchar(255),
nome_produto varchar(100),
lugar varchar(200),
quantidade int
);

create table funcionarios (
salario decimal,
CPF varchar(14),
data_nascimento date,
nome_funcionario varchar(100),
cod_funcionario int
);

create table servicos (
observacao varchar(255),
preco_servico decimal,
agendamento datetime,
tipo_servico varchar(50),
cod_servicos int
);

create table clientes (
data_nascimento date,
endereco varchar(200),
CPF varchar(14),
nome_cliente varchar(100),
cod_cliente int
);