
/************************************************
25061077-2 - Kauã Ricardo Gomes Fagundes 
25010975-2 - Bruno Petroli
25004001-3 - Rafael Diesel
25229846-2 - Wendel Souza Cardoso
25228676-2 - Marlon Willian Silva Barros
25357682-2 - Eduardo Rupp da Luz
25165088-2 - Vinicius Bastos Rodrigues
25178065-2 - Marcos Barcelar
22001126-2 - Eric Ruthers
***********************************************/


CREATE DATABASE IF NOT EXISTS `crud_db`;

USE `crud_db`;

CREATE TABLE IF NOT EXISTS `categorias` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `produtos` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `descricao` TEXT,
    `preco` DECIMAL(10, 2) NOT NULL,
    `categoria_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados de exemplo na tabela categorias
INSERT INTO `categorias` (`nome`) VALUES
('Eletrônicos'),
('Livros'),
('Vestuário');

-- Inserir dados de exemplo na tabela produtos
INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `categoria_id`) VALUES
('Smartphone X', 'Um smartphone de última geração com câmera de alta resolução.', 1200.00, 1),
('O Senhor dos Anéis', 'Trilogia épica de fantasia de J.R.R. Tolkien.', 85.50, 2),
('Camiseta Básica', 'Camiseta de algodão 100% na cor preta.', 35.90, 3),
('Notebook Gamer', 'Notebook potente para jogos e tarefas exigentes.', 4500.00, 1),
('A Revolução dos Bichos', 'Uma fábula satírica de George Orwell.', 29.99, 2);
