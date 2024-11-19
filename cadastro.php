<?php
include "funcoes.php";
//processa cadastro usuario

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"]) && isset($_POST["senha"])) {
    $novoUsuario = $_POST["usuario"];
    $novaSenha = $_POST["senha"];
    //var_dump($novoUsuario);
    salvarUsuarios($novoUsuario, $novaSenha);
    echo "Usuario cadastro com sucesso!";
}

if (isset($_GET["excluir"])) {
    $index = $_GET["excluir"];
    excluirUsuario($index);
    header("Location: cadastro.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleCadUsuario.css">
    <title>Cadastro de usuario</title>
</head>

<body>
    <h2>castre um novo usuario</h2>
    <form action="cadastro.php" method="POST">
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        <br>
        <input type="text" name="senha" id="senha" placeholder="senha" required>
        <br>
        <button type="submit"> Cadastrar</button>
    </form>
    <h3>Usuario cadastros</h3>
    <?php listarUsuario();?>
</body>

</html>