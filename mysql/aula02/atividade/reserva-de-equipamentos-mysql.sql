create database reserva_equipamentos;
use reserva_equipamentos;

create table if not exists fornecedor (
id_fornecedor int primary key auto_increment not null,
nome_fornecedor varchar(100) not null,
CNPJ varchar(18) not null,
celular varchar(19) not null
);

create table if not exists equipamentos(
id_equipamentos int primary key auto_increment not null,
nome_equipamentos varchar(100) not null,
qtde int(1)  default ('1') not null,
valor decimal (5,2) not null
);

create table if not exists clientes (
id_clientes int primary key auto_increment not null,
nome_cliente varchar(100) not null,
CPF_cliente varchar(14) not null,
celular varchar(20) not null
);

create table if not exists vender (
cod_vender int primary key auto_increment not null,
id_fornecedor int not null,
id_equipamentos int not null,
foreign key (id_fornecedor) references fornecedor(id_fornecedor),
foreign key (id_equipamentos) references equipamentos(id_equipamentos)
);

create table if not exists reserva (
cod_reserva int primary key auto_increment not null,
id_cliente int not null,
id_equipamentos int not null,
foreign key (id_cliente) references clientes(id_clientes),
foreign key (id_equipamentos) references equipamentos(id_equipamentos)
);
