-- Cria o banco de dados se não existir, com charset/collation recomendados
CREATE DATABASE IF NOT EXISTS catalogo_filmes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Seleciona o banco de dados para uso nas próximas operações
USE catalogo_filmes;

-- Cria a tabela principal de filmes, caso ainda não exista
CREATE TABLE IF NOT EXISTS filmes (
  -- Identificador único do filme
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  -- Título do filme
  titulo VARCHAR(200) NOT NULL,
  -- Gênero do filme (pode ser nulo)
  genero VARCHAR(100) NULL,
  -- Ano de lançamento (número pequeno, sem sinal)
  ano SMALLINT UNSIGNED NULL,
  -- Nota/avaliação do filme (ex.: 8.5)
  nota DECIMAL(3,1) NULL,
  -- Data/hora de criação do registro
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  -- Chave primária
  PRIMARY KEY (id),
  -- Índice para acelerar buscas por título
  INDEX idx_titulo (titulo),
  -- Índice para acelerar buscas por gênero
  INDEX idx_genero (genero)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insere alguns registros de exemplo
INSERT INTO filmes (titulo, genero, ano, nota) VALUES
('O Poderoso Chefão', 'Crime', 1972, 9.2),
('Cidade de Deus', 'Crime', 2002, 8.6),
('A Viagem de Chihiro', 'Animação', 2001, 8.6),
('Parasita', 'Drama', 2019, 8.6),
('Interestelar', 'Ficção Científica', 2014, 8.5),
('O Senhor dos Anéis: A Sociedade do Anel', 'Fantasia', 2001, 8.8),
('Matrix', 'Ficção Científica', 1999, 8.7);
