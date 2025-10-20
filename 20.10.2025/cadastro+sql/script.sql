CREATE DATABASE meubanco CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE meubanco;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
select * from usuario;