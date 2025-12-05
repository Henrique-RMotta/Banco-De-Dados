-- Selects 
select * from Servico where MEC_ID = 3;
select * from pecas where PE_QTDE < 5; 
select * from servico where SE_STATUS = "AGUARDANDO";
select * from veiculo where VEI_MARCA = "Ford";
select * from Mecanico where MEC_ESPECIALIDADE = "Injeção Eletrônica";
select VEI_ID,COUNT(*) as qtde from Servico group by VEI_ID having COUNT(*) >1  ;
SELECT CLI_ID FROM Servico WHERE SE_DATA_FIM  >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH);
select PE_NOME, PE_VALOR from pecas where PE_valor >= 200; 

-- Update 
update PECAS set PE_VALOR = PE_VALOR * 1.05 where PE_DESCRICAO = "BOSCH";
update Servico set SE_STATUS = "FINALIZADO" where SE_ID = 105; 
update Servico set SE_DATA_FIM = CURDATE() + 1 where SE_STATUS in ("AGUARDANDO","ATIVO") and SE_DATA_FIM >= DATE_SUB(curdate(), interval 30 DAY);
update pecas set PE_QTDE = PE_QTDE *2 where PE_ID = 20; 
-- Alter Table 
alter table cliente add email varchar(100);
alter table mecanico modify MEC_ESPECIALIDADE varchar(150) not null; 
alter table Servico drop column SE_DETALHES; 

-- Join 
SELECT s.SE_NOME, c.CLI_NOME, v.VEI_PLACA, s.SE_DATA_INICIO
FROM Servico s
JOIN Cliente c ON s.CLI_ID = c.CLI_ID
JOIN Veiculo v ON s.VEI_ID = v.VEI_ID;

SELECT p.PE_NOME, COUNT(*)
FROM Pecas op
JOIN Pecas p ON op.PE_ID = p.PE_ID
WHERE op.PE_ID = 50;

SELECT m.MEC_NOME
FROM Servico om 
JOIN Mecanico m ON om.MEC_ID = m.MEC_ID
WHERE om.SE_ID = 75;

-- Inner Join 
select v.VEI_PLACA, v.VEI_MODELO 
from Veiculo v 
inner join Servico s where s.SE_STATUS in ("ATIVO");

SELECT c.CLI_NOME
FROM CLIENTE c
inner JOIN VEICULO v ON c.CLI_ID = v.CLI_ID
WHERE v.VEI_MARCA = 'Volkswagen';

SELECT m.MEC_NOME
FROM MECANICO m
inner JOIN SERVICO s ON m.MEC_ID = s.MEC_ID;

SELECT SE_NOME
FROM SERVICO
WHERE SE_STATUS = 'FINALIZADO';

-- Left Join
select c.CLI_NOME, s.SE_ID
from Cliente c
left join Servico s on c.CLI_ID = s.CLI_ID;

SELECT 
    m.MEC_NOME,
    COUNT(s.SE_ID) AS quantidade_os
FROM MECANICO m
LEFT JOIN SERVICO s ON m.MEC_ID = s.MEC_ID
GROUP BY m.MEC_ID, m.MEC_NOME
ORDER BY quantidade_os DESC;

SELECT 
    p.PE_NOME,
    COALESCE(SUM(s.SE_VALOR), 0) AS quantidade_vendida
FROM PECAS p
LEFT JOIN SERVICO s ON p.PE_ID = s.PE_ID
GROUP BY p.PE_ID, p.PE_NOME
ORDER BY p.PE_NOME;

-- Right Join 
select c.CLI_NOME, s.SE_ID
from Cliente c
right join Servico s on c.CLI_ID = s.CLI_ID;

select * from servicos; -- não é possivel realizar com o banco atual 

select SE_ID, SE_NOME,MEC_NOME
from servico s  
right join mecanico m  on m.MEC_ID = s.MEC_ID;

-- Subconsultas 
SELECT 
    c.cli_id,
    c.cli_nome,
    COUNT(*) AS qtde
FROM 
    servico s
INNER JOIN 
    cliente c 
    ON c.cli_id = s.cli_id
GROUP BY 
    c.cli_id, c.cli_nome
HAVING 
    COUNT(*) >= 3;

SELECT DISTINCT p.PE_NOME
FROM PECAS p
INNER JOIN SERVICO s ON p.PE_ID = s.PE_ID
INNER JOIN MECANICO m ON s.MEC_ID = m.MEC_ID
WHERE m.MEC_NOME = 'Carlos';

SELECT VEI_PLACA, VEI_MODELO
FROM VEICULO
WHERE VEI_ID NOT IN (
    SELECT DISTINCT VEI_ID
    FROM SERVICO
);


-- ex9 
SELECT 
    SE_NOME,
    DATEDIFF(SE_DATA_FIM, SE_DATA_INICIO) AS INTERVALO
FROM SERVICO;

-- Index

create index idx_placa on Veiculo(VEI_PLACA);
-- O index facilita a procura de elementos de uma tabela por meio de um número ou o indice daquele elemento, por exemplo quando se faz um select comum o programa passa por todas as linhas de uma tabela até encontrar o elemento desejado, já com um index ele já escontra o objeto sem ter que passar por todas as linhas.









