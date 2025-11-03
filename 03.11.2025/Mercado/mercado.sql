-- Criação da base de dados e tabelas para o projeto Mercado

CREATE DATABASE IF NOT EXISTS Mercado
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE Mercado;

-- Tabela de legumes
CREATE TABLE IF NOT EXISTS legumes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  unidade ENUM('kg','un','maço') NOT NULL DEFAULT 'kg',
  estoque DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO legumes (nome, preco, unidade, estoque) VALUES
  ('Cenoura', 4.50, 'kg', 30.00),
  ('Batata', 3.80, 'kg', 50.00),
  ('Tomate', 7.20, 'kg', 20.00),
  ('Alface', 2.50, 'maço', 15.00);

-- Tabela de produtos de limpeza
CREATE TABLE IF NOT EXISTS limpeza (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  unidade ENUM('un','L','kg') NOT NULL DEFAULT 'un',
  estoque DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO limpeza (nome, preco, unidade, estoque) VALUES
  ('Detergente', 2.99, 'un', 40.00),
  ('Sabão em pó', 18.90, 'kg', 25.00),
  ('Água sanitária', 5.50, 'L', 35.00),
  ('Esponja', 1.80, 'un', 60.00);

	




USE Mercado;

INSERT INTO limpeza (nome, preco, unidade, estoque) VALUES
('Detergente Neutro', 3.49, 'un', 50.00),
('Detergente Limão', 3.69, 'un', 45.00),
('Sabão em Pó 1kg', 19.90, 'kg', 30.00),
('Amaciante 2L', 15.50, 'L', 20.00),
('Água Sanitária 1L', 6.20, 'L', 35.00),
('Desinfetante 2L', 12.90, 'L', 25.00),
('Limpador Multiuso 500ml', 8.50, 'un', 40.00),
('Álcool 70% 1L', 9.90, 'L', 28.00),
('Esponja Abrasiva', 2.20, 'un', 80.00),
('Bombril (Lã de Aço)', 1.90, 'un', 100.00),
('Saco de Lixo 50L', 12.00, 'un', 35.00),
('Saco de Lixo 100L', 18.00, 'un', 25.00),
('Desengordurante 500ml', 10.90, 'un', 22.00),
('Limpador de Vidros 500ml', 9.50, 'un', 26.00),
('Veja Cloro Ativo 500ml', 11.90, 'un', 18.00),
('Lustra Móveis 200ml', 13.50, 'un', 14.00),
('Sabão em Barra (Unidade)', 2.80, 'un', 60.00),
('Desodorizador de Ambiente', 14.90, 'un', 16.00),
('Limpa Pedra 1L', 17.90, 'L', 12.00),
('Limpa Piso 1L', 12.50, 'L', 20.00);

USE Mercado;

INSERT INTO legumes (nome, preco, unidade, estoque) VALUES
('Quiabo', 9.20, 'kg', 12.00),
('Rabanete', 7.10, 'kg', 8.00),
('Nabo', 6.80, 'kg', 9.00),
('Aipo (Salsão)', 5.90, 'un', 14.00),
('Cebolinha', 2.50, 'maço', 22.00),
('Salsa (Salsinha)', 2.80, 'maço', 20.00),
('Couve', 3.50, 'maço', 18.00),
('Repolho', 4.70, 'kg', 25.00),
('Jiló', 8.30, 'kg', 7.00),
('Maxixe', 10.40, 'kg', 6.00),
('Inhame', 9.90, 'kg', 16.00),
('Cará', 8.70, 'kg', 13.00),
('Gengibre', 24.90, 'kg', 5.00),
('Cúrcuma (Açafrão-da-terra)', 21.50, 'kg', 4.00),
('Pimenta Dedo-de-moça', 19.90, 'kg', 6.00),
('Pimenta de Cheiro', 17.50, 'kg', 6.00),
('Cebolinha Francesa (Chives)', 3.20, 'maço', 10.00),
('Alcachofra', 12.90, 'un', 5.00),
('Aspargos', 29.90, 'kg', 3.00),
('Ervilha-torta', 18.90, 'kg', 7.00);