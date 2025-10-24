create database joins;
use joins;

create table cliente (
	CODCLI CHAR(3) NOT NULL PRIMARY KEY,
    NOME VARCHAR(40) NOT NULL,
    ENDERECO VARCHAR(50) NOT NULL,
    CIDADE VARCHAR(20) NOT NULL,
    ESTADO CHAR(2) NOT NULL,
    CEP CHAR(9) NOT NULL
);

CREATE TABLE venda (
	DUPLIC CHAR(6) NOT NULL PRIMARY KEY,
    VALOR DECIMAL(10,2) NOT NULL, 
	VENCTO DATE NOT NULL, 
    CODCLI CHAR(3) NOT NULL, 
    foreign key (CODCLI) REFERENCES CLIENTE(CODCLI)
);

-- clientes

INSERT INTO cliente values (
	'250',
    'BANCO BARCA S/A',
    'R. VITO, 34',
    'SAO SEBASTIAO',
    'CE',
    '62380-000'
);

INSERT INTO CLIENTE VALUES (
	'820',
    'MECANICA SAO PAULO',
    'R. DO MACUCO, 95',
    'SANTO ANTONIO',
    'ES',
    '29810-020'
);

INSERT INTO cliente values (
	'170',
    'POSTO BRASIL LTDA.',
    'AV. IMPERIO,85',
    'GUAGIRUS',
    'BA',
    '42837-000'
);

-- VENDAS 

INSERT INTO VENDA VALUES (
	'230001',
    1200.00,
    '2001-06-10',
    '170'
);

INSERT INTO VENDA VALUES (
	'230099',
    1000-00,
    '2002-10-02',
    '250'
);

INSERT INTO venda VALUES (
	'997818',
    3000.00,
    '2001-11-11',
    '170'
);

-- consultas 
-- nome cliente e duplic

SELECT cliente.nome, venda.duplic 
from cliente,venda
where cliente.codcli = venda.codcli;

-- Consulta com inner join
SELECT VENDA.DUPLIC, CLIENTE.NOME, CLIENTE.CIDADE
FROM CLIENTE INNER JOIN VENDA 
ON CLIENTE.CODCLI = VENDA.CODCLI
order by cliente.nome ;

select cliente.nome, count(*) as qtde 
from cliente inner join venda
on cliente.codcli = venda.codcli 
group by cliente.nome;

select cliente.nome, sum(venda.valor) as total
from cliente inner join venda
on cliente.codcli = venda.codcli
group by cliente.nome;

select cliente.nome,venda.duplic, max(venda.valor) as maior_vemda
from cliente inner join venda 
on cliente.codcli = venda.codcli
group by venda.valor; 

select cliente.nome,venda.duplic, min(venda.valor) as menor_vemda
from cliente inner join venda 
on cliente.codcli = venda.codcli
group by venda.valor; 

-- table nova para uso de inner join, left e right 

create table  ex (
	nome varchar(100)
);

create table fx ( 
	nome varchar(100)
);

insert into ex values ('eniq');
insert into ex values ('calvo');
insert into ex values ('morsa');
insert into ex values ('luis');
insert into ex values ('luz'); 

insert into fx values ('eniq');
insert into fx values ('nota'); 
insert into fx values ('fish'); 
insert into fx values ('luz'); 
insert into fx values ('beia');

select ex.nome, fx.nome from ex inner join fx on ex.nome = fx.nome; 

select ex.nome, fx.nome from ex as ex left join fx as fx on ex.nome = fx.nome

union 

select ex.nome, fx.nome from ex as ex right join fx as fx on ex.nome = fx.nome;

select cliente.nome, venda.vencto from cliente inner join venda  on cliente.codcli = venda.codcli
where year(venda.vencto) =  venda.vencto < 2004  and month(venda.vencto) = 11 
order by venda.vencto;