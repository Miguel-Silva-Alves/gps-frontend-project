-- === INSERIR USUÁRIOS PADRÃO COM HASHES REAIS ===

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Administrador do Sistema', '$2y$10$GYPjQx72Gr/L14fF1NJEhOkaruLKWrUvscOO74uwYg9OuF8Yn0qYO', 'admin@exemplo.com', '0000000000', 'outro', '1990-01-01', 'Cidade', 'ST', 'Endereço Admin', 'admin')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Locatário Padrão', '$2y$10$GYPjQx72Gr/L14fF1NJEhOkaruLKWrUvscOO74uwYg9OuF8Yn0qYO', 'locatario@exemplo.com', '1111111111', 'masculino', '1995-05-05', 'Cidade', 'ST', 'Endereço Locatário', 'renter')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Locador Padrão', '$2y$10$GYPjQx72Gr/L14fF1NJEhOkaruLKWrUvscOO74uwYg9OuF8Yn0qYO', 'locador@exemplo.com', '2222222222', 'feminino', '1985-08-08', 'Cidade', 'ST', 'Endereço Locador', 'landlord')
ON DUPLICATE KEY UPDATE email=email;
