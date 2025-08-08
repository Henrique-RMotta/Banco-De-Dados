create database loja_produtos_limpeza;

use loja_produtos_limpeza;

create table cliente (
cod_cli int,
nome_cli varchar(100),
CPF varchar(14),
data_nasc date,
observacao varchar(255)
);

create table produtos (
validade date,
cod_prod int,
tipo_prod varchar(50),
preco_prod decimal,
descricao varchar(255)
);

create table servicos (
data_agendamento datetime,
cod_servicos int,
qtde_produtos int,
numero_func int,
tipo_servico varchar(100),
observacao varchar(255),
preco_serv decimal
);

create table estoque (
quantidade_entrando int,
fornecedor varchar(100),
quantidade_saindo int,
cod_estoque int,
local_produto varchar(50)
);

create table funcionarios (
nome_func varchar(100),
salario decimal,
CPF varchar(14),
cod_func int,
servicos varchar(150)
);
