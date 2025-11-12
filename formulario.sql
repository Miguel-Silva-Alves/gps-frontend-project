-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS sistema_cadastro;
USE sistema_cadastro;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(150) UNIQUE NOT NULL,
    sexo ENUM('M', 'F') NOT NULL,
    data_nascimento DATE NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Índices para melhor performance
CREATE INDEX idx_email ON usuarios(email);
CREATE INDEX idx_cidade ON usuarios(cidade);
CREATE INDEX idx_estado ON usuarios(estado);
CREATE INDEX idx_data_nascimento ON usuarios(data_nascimento);



SELECT * FROM usuarios;

