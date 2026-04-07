<?php
include('db.php');

$nome = pg_escape_string($conn, $_POST['nome']);
$cargo = pg_escape_string($conn, $_POST['cargo']);
$email = pg_escape_string($conn, $_POST['email']);
$telefone = pg_escape_string($conn, $_POST['telefone']);
$situacao = $_POST['situacao'];

$sql = "INSERT INTO funcionarios (nome, cargo, email, telefone, situacao) VALUES ('$nome', '$cargo', '$email', '$telefone', '$situacao')";
pg_query($conn, $sql);

header("Location: listagem.php");
?>