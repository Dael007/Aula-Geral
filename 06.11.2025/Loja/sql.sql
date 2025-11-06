--criar banco de dados
drop database if exists Loja;
create database Loja;
use Loja;


--Tabela do caixa ( um registro com saldo atual)
create table caixa(
    ID tinyint not null primary key, --esse tinyint e basicamente é o tipo de dado numérico inteiro pequeno.
    SALDO decimal(12,2) not null default 0.00 --esse decimal e basicamente é o tipo de dado numérico real.
); 

    --vamos iniciar a caixa com o saldo zero
    insert into caixa (ID, SALDO) values (1, 0.00);

    --tabela de produtos com cada funcao dele 

create table produtos(
    ID int auto_increment primary key,
    NOME varchar (100) not null,
    preco decimal (12,2) not null,
    estoque int not null default 0 
);


--forma de buscar por nome 
create index IDX_PRODUTO_NOME on produtos (NOME);
--esse IDX e basicamente o nome do index
--e esse on produtos (NOME) e basicamente o nome da coluna que vai ser usada para buscar

--agora vamos bota os produtos na tabela 
use Loja;
insert into produtos (NOME, preco, estoque) values
('teclado', 250.00,10),
('Mouse Gamer', 150.00,20),
('Monitor', 300.00,15),
('Gabinete', 200.00,15),
('Headset', 100.00,15),
('Webcam', 50.00,15);

