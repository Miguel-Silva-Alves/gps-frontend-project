CREATE DATABASE IF NOT EXISTS sistema_cadastro;
USE sistema_cadastro;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    sexo ENUM('feminino','masculino','outro') NOT NULL,
    data_nasc DATE NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE usuarios
ADD COLUMN role ENUM('renter','landlord', 'admin') DEFAULT 'renter';

CREATE TABLE IF NOT EXISTS quadras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    url VARCHAR(255),
    valor DECIMAL(10,2) NOT NULL,
    horario_inicio TIME NOT NULL,
    horario_fim TIME NOT NULL
);
