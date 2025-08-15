create database solar;
use solar;
create table cliente (
id_clientes int auto_increment not null,
nome_cliente varchar(100),
CPF varchar(14),
endereco varchar(100),
celular varchar(19),
primary key (id_clientes)
);

create table if not exists produto (
cod_produto int auto_increment not null,
valor decimal(5,2) not null,
qtde int(2) not null,
nome_produto varchar(100) not null,
primary key (cod_produto)
);

create table if not exists fornecedor (
cidade varchar(30),
celular varchar(19) not null,
id_fornecedor int auto_increment not null,
endereco varchar(100),
CNPJ varchar(18) not null,
nome_form varchar(100) not null,
estado varchar(2) default ('SP'),
primary key (id_fornecedor)
);

create table vender (
cod_venda int primary key auto_increment not null,
cod_produto int not null,
id_fornecedor int not null,
foreign key (cod_produto) references produto(cod_produto),
foreign key (id_fornecedor) references fornecedor(id_fornecedor)
);

create table compra (
cod_compra int primary key auto_increment not null,
cod_produto int not null,
id_clientes int not null,
foreign key(id_clientes) references cliente(id_clientes),
foreign key(cod_produto) references produto(cod_produto)
);

create table funcionario (
id_funcionario int primary key auto_increment not null,
nome_funcionario varchar(100) not null,
celular varchar(19) not null,
salario decimal(7,2) not null,
endereco varchar(100) not null,
cargo varchar(50) not null,
data_nascimento datetime not null,
CPF_funcionario varchar(14) not null,
data_admissao datetime not null,
data_recisao datetime not null,
cod_departamento int not null,
foreign key (cod_departamento) references departamento(cod_departamento)
);

create table departamento (
cod_departamento int primary key auto_increment not null,
nome_departamento varchar(20) not null,
responsável varchar(100) not null,
setor varchar(50) not null
);

-- consultar tablela funcionarios
select * from empregado;
-- alterações em tabelas
alter table funcionario add sexo char(1);
-- deletar coluna
alter table funcionario drop column sexo;
-- renomear tabela
alter table funcionario rename to empregado;
-- renomear coluna
alter table empregado change CPF_funcionario CIC_funcionario varchar(15);
-- modificar coluna - tipo de dado
alter table empregado modify column nome_funcionario varchar(200);
alter table fornecedor modify column estado char(2) default 'MG';

-- adicionar chave primaria
alter table empregado add primary key (CIC_funcionario);

