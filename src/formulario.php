<?php
if(isset($_POST['submit']))
{
    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    $role = $_POST['role'];

    $sql = "INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco, role)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssssss", $nome, $senha, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco, $role);

    if($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        $erro = "Erro ao cadastrar usuário: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Formulário Moderno</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <a href="home.php" class="back-button">← Voltar</a>
    
    <div class="form-container">
        <div class="form-header">
            <h1 class="form-title">Cadastro de Cliente</h1>
            <p class="form-subtitle">Preencha seus dados para criar sua conta</p>
        </div>

        <?php if(isset($erro)): ?>
            <div class="alert alert-error"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="formulario.php" method="POST" id="cadastroForm">
            <div class="form-group">
                <input type="text" name="nome" id="nome" class="form-input" placeholder=" " required>
                <label for="nome" class="form-label">Nome completo</label>
                <div class="error-message">Por favor, insira seu nome completo</div>
            </div>

            <div class="form-group">
                <input type="password" name="senha" id="senha" class="form-input" placeholder=" " required>
                <label for="senha" class="form-label">Senha</label>
                <div class="error-message">A senha deve ter pelo menos 6 caracteres</div>
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" class="form-input" placeholder=" " required>
                <label for="email" class="form-label">Email</label>
                <div class="error-message">Por favor, insira um email válido</div>
            </div>

            <div class="form-group">
                <input type="tel" name="telefone" id="telefone" class="form-input" placeholder=" " required>
                <label for="telefone" class="form-label">Telefone</label>
                <div class="error-message">Por favor, insira um telefone válido</div>
            </div>

            <div class="form-group">
                <label class="section-label">Sexo</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="genero" value="feminino" required>
                        <span class="radio-custom"></span>
                        <span>Feminino</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="genero" value="masculino" required>
                        <span class="radio-custom"></span>
                        <span>Masculino</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="genero" value="outro" required>
                        <span class="radio-custom"></span>
                        <span>Outro</span>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-input date-input" required>
                <label for="data_nascimento" class="form-label active">Data de Nascimento</label>
                <div class="error-message">Por favor, insira sua data de nascimento</div>
            </div>

            <div class="form-group">
                <input type="text" name="cidade" id="cidade" class="form-input" placeholder=" " required>
                <label for="cidade" class="form-label">Cidade</label>
                <div class="error-message">Por favor, insira sua cidade</div>
            </div>

            <div class="form-group">
                <input type="text" name="estado" id="estado" class="form-input" placeholder=" " required>
                <label for="estado" class="form-label">Estado</label>
                <div class="error-message">Por favor, insira seu estado</div>
            </div>

            <div class="form-group">
                <input type="text" name="endereco" id="endereco" class="form-input" placeholder=" " required>
                <label for="endereco" class="form-label">Endereço</label>
                <div class="error-message">Por favor, insira seu endereço</div>
            </div>

            <label for="role">Tipo de conta:</label>
            <select name="role" required>
                <option value="locatario">Locatário</option>
                <option value="locador">Locador</option>
                <option value="admin">Administrador do Sistema</option>
            </select>

            <br><br>


            <button type="submit" name="submit" class="submit-btn">Cadastrar</button>
        </form>

        <div class="form-footer">
            <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>