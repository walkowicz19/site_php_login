<?php 
include('db.php');
if(!isset($_SESSION['logado'])) header("Location: login.php");

$busca = isset($_GET['busca']) ? pg_escape_string($conn, $_GET['busca']) : '';
$query = "SELECT * FROM funcionarios WHERE nome ILIKE '%$busca%' OR cargo ILIKE '%$busca%' ORDER BY id ASC";
$result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Listagem de Funcionários</title>
</head>
<body>
    <div class="header-blue">
        <div>🌐 Cadastro de Funcionários</div>
        <div class="nav-links">
            <a href="listagem.php">Início</a> | <a href="listagem.php" style="text-decoration: underline;">Listagem</a>
            <span style="margin-left:20px">Olá, <?php echo $_SESSION['admin']; ?> ▼</span>
        </div>
    </div>

    <div class="container">
        <h2>Cadastro de Funcionários</h2>
        <form action="cadastro_action.php" method="POST" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="cargo" placeholder="Cargo">
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="telefone" placeholder="Telefone">
            <div style="grid-column: span 2;">
                Situação: 
                <input type="radio" name="situacao" value="Ativo" checked style="width:auto"> Ativo
                <input type="radio" name="situacao" value="Inativo" style="width:auto"> Inativo
            </div>
            <button type="submit" class="btn-blue">Salvar</button>
        </form>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h3>Listagem de Funcionários</h3>
        <form method="GET" style="display:flex; gap:10px">
            <input type="text" name="busca" placeholder="Buscar funcionário..." value="<?php echo $busca; ?>">
            <button type="submit" class="btn-blue">Pesquisar</button>
            <a href="listagem.php" class="btn-blue" style="text-decoration:none; line-height:20px">Novo Funcionário</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>E-mail</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($f = pg_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $f['id']; ?>.</td>
                    <td><?php echo $f['nome']; ?></td>
                    <td><?php echo $f['cargo']; ?></td>
                    <td><i><?php echo $f['email']; ?></i></td>
                    <td><span class="badge <?php echo $f['situacao']; ?>"><?php echo $f['situacao']; ?></span></td>
                    <td class="actions">
                        <a href="#"><img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" title="Editar"></a>
                        <a href="excluir.php?id=<?php echo $f['id']; ?>"><img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" title="Excluir"></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>