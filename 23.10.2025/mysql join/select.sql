drop database if not exists Oficina;
create database Oficina;
use Oficina;

--TABELA MECANICO 
create table MECANICO(
ID INT primary key,             --IDENTIFICAR O ID DO MECANICO
NOME VARCHAR (100)              -- NOME DO MECANICO
);

--VEICULO
create table VEICULO(           --CRIA A TABELA VEICULO
    ID INT PRIMARY KEY,         --ID DO VEICULO 
    PLACA VARCHAR (50),         --PLACA DO VEICULO
    MODELO VARCHAR (20),        --MODELO DO VEICULO 
    MARCA VARCHAR (50),         --MARCA DO VEICULO
    MECANICO_ID INT NULL,       --FK PARA O MECANICO (PODE SER NULL SE NAO TIVER)
    FOREIGN KEY (MECANICO_ID) REFERENCES MECANICO(ID)
);

--INSERIR DADOS NAS TABELA
INSERT INTO MECANICO VALUES
(1, 'Carlos Silva'),
(2, 'Fernando Souza'),
(3, 'Joao Pereira'),
(4, 'Marcos Lima'),
(5, 'Patricia Alves');

--INSERIR VEICULOS
INSERT INTO VEICULO VALUES
(101, 'ANC-0001', 'Civic', 'Honda', 1),
(102, 'XYZ-9876', 'Corolla', 'Toyota', 2),
(103, 'JKL-5555', 'Onix', 'Chevrolet', 1),
(104, 'MNO-4321', 'Gol', 'Volkswagen', NULL),
(105, 'PQR-2468', 'HB20', 'Hyundai', 3),
(106, 'STU-1357', 'Palio', 'Fiat', NULL);

--trabalhos sendo executados

--apenas veiculos que tem mecanicos, ou seja so mecanicos que estao trabalhando.

select
m.NOME AS "MECANICO",       --nome do mecanico.
v.PLACA as "placa do veiculo",  -- placa do veiculo 
v.MODELO as "Modelo do veiculo" --Modelo do veiculo
from VEICULO as v    -- o v significa o apelido do veiculo 
INNER JOIN MECANICO as m         --juntar apenas os que tem correspondencias
on v.MECANICO_ID = m.ID;        --condicao de juncao: veiculo pertence a mecanico 

--relacao com todos os veiculos 

--mostrar todos os veiculos, e o nome do mecanico se houver
select
v.MODELO as "Modelo",        --Modelo do carro 
v.MARCA AS "Marca",          -- marca do carro 
m.NOME as "Mecanico"         --nome do mecanico pode ser null se nao tiver 
from VEICULO as v            --o v significa Veiculo
left join MECANICO AS m      --O left join mostra todos os veiculos mesmo sem mecanicos
on v.MECANICO_ID = m.ID;

--lista de todos os mecanicos e seus veiculos
--mostrartodos os mecanicos, e o id do veiculo se estiverem trabalhando 
select
m.ID as ID_do_mecanico,       --identifica o macanico com id 
m.NOME as Nome_do_mecanico,   -- Nome do mecanico 
v.ID as ID_do_veiculo         --Identifica o veiculo e pode ser NULL
from VEICULO as v              --mecanico significa m 
right join MECANICO as m          --o right join mostra todos os mecanicos mesmo sem carro
ON m.ID = v.MECANICO_ID;
