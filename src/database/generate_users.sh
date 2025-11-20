#!/bin/bash
set -e

# Variáveis de conexão com o container MySQL
MYSQL_HOST="127.0.0.1"
MYSQL_PORT=3307
MYSQL_USER="user"
MYSQL_PASSWORD="senha"
MYSQL_DB="sistema_cadastro"


echo ">>> Criando usuários iniciais..."

# Gerar senhas criptografadas
ADMIN_PASS=$(php -r "echo password_hash('admin123', PASSWORD_DEFAULT);")
LOCATARIO_PASS=$(php -r "echo password_hash('locatario123', PASSWORD_DEFAULT);")
LOCADOR_PASS=$(php -r "echo password_hash('locador123', PASSWORD_DEFAULT);")

mysql -h "$MYSQL_HOST" -P "$MYSQL_PORT" -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DB" <<EOF

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Administrador do Sistema', '$ADMIN_PASS', 'admin@exemplo.com', '0000000000', 'outro', '1990-01-01', 'Cidade', 'ST', 'Endereço Admin', 'admin')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Locatário Padrão', '$LOCATARIO_PASS', 'locatario@exemplo.com', '1111111111', 'masculino', '1995-05-05', 'Cidade', 'ST', 'Endereço Locatário', 'renter')
ON DUPLICATE KEY UPDATE email=email;

INSERT INTO usuarios (nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
VALUES
('Locador Padrão', '$LOCADOR_PASS', 'locador@exemplo.com', '2222222222', 'feminino', '1985-08-08', 'Cidade', 'ST', 'Endereço Locador', 'landlord')
ON DUPLICATE KEY UPDATE email=email;

EOF

echo ">>> Usuários iniciais criados com sucesso!"
