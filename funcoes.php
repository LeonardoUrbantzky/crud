<?php
// Carregar usuario do arquivo

function carregarUsuarios()
{
    $usuarios = [];
    if (file_exists("usuarios.txt")) {
        $dados = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($dados as $linha) {
            list($usuario, $senha) = explode(":", $linha);
            $usuarios[] = ["usuario" => $usuario, "senha" => $senha];
        }
    }
    return $usuarios;
}

//Salvar um novo usuario no arquivo
function salvarUsuarios($usuarios, $senha)
{
    $linha = $usuarios . ":" . $senha.PHP_EOL;
    file_put_contents("usuarios.txt", $linha, FILE_APPEND);
}


//Listar usuario

function listarUsuario()
{
    $usuarios = carregarUsuarios();
    echo "<ul>";
    foreach ($usuarios as $index => $user) {
        echo "<li>".
        htmlspecialchars($user["usuario"]) . "<a href =  'cadastro.php?excluir=" . $index . "'> Excluir </a> |".
         "<a href='alterar.php?editar=" . $index . "'> Alterar </a></li>";     
    }
    echo"</ul>";
}

function excluirUsuario($index)
{
    $usuario = carregarUsuarios();
    if (isset($usuario[$index])) {
        unset($usuario[$index]);
        file_put_contents("usuarios.txt", "");
        foreach ($usuario as $user) {
            salvarUsuarios(
                $user["usuario"],
                $user["senha"]
            );
        }
    }
}

function alterarUsuario($index, $novoUsuario, $novaSenha)
{
    $usuario = carregarUsuarios();
    if (isset($usuario[$index])) {
        $usuario[$index] = ["usuario" => $novoUsuario, "senha" => $novaSenha];
        file_put_contents("usuarios.txt", "");
        foreach ($usuario as $user) {
            salvarUsuarios($user["usuario"], $user["senha"]);
        }
    }
}
