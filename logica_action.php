<?php
include('db.php');
$usuario = pg_escape_string($conn, $_POST['usuario']);
$senha = $_POST['senha'];

$res = pg_query($conn, "SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senha'");

if (pg_num_rows($res) > 0) {
    $_SESSION['logado'] = true;
    $_SESSION['admin'] = $usuario;
    header("Location: listagem.php");
} else {
    header("Location: login.php?erro=1");
}
?>