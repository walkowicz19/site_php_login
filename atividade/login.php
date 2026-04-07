<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login - Cadastro de Funcionários</title>
</head>
<body>
    <div class="login-container">
        <h2 style="color:#3b71ca">👤 Cadastro de Funcionários</h2>
        <?php if(isset($_GET['erro'])) echo "<p style='color:red'>Acesso negado!</p>"; ?>
        <form action="logica_action.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" class="btn-blue" style="width:100%">Entrar</button>
        </form>
        <br><a href="#" style="color:#666; font-size:14px; text-decoration:none">Esqueci minha senha</a>
    </div>
</body>
</html>