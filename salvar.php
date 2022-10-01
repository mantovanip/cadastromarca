<?php


// declardaçãp de variaveis

$id          = isset($_POST['id'])   ? $_POST['id'] : $_GET['id'];
$opcao       = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
$descricao   = isset($_POST['descricao']) ? $_POST['descricao'] : '';



// testa se o campo esta vazio ou é para atualizar

if ($opcao == 'inserir' || $opcao == 'atualizar') {
        if ($descricao == '') {
        echo "<script>alert('O campo Descição é obrigatório.');</script>";
        exit;
    }
}
// conexao db 'marcacarro'

$conexao    = new PDO('mysql:host=localhost;port=3306;dbname=marcacarro', 'root', '');

if ($opcao == 'inserir') {
    $sql        = "INSERT INTO cadastro (descricao) VALUE ('{$descricao}');";
    $mensagem   = "<script>alert('O campo Descição foi inserido.');</script>";
} else if ($opcao == 'atualizar') {
    $sql        = "UPDATE cadastro SET descricao ='{$descricao}'WHERE id ={$id};";
    $mensagem   = "<script>alert('O campo Descrição foi atualizado.');</script>";
} else if ($opcao == 'excluir') {
    $sql        = "DELETE FROM cadastro WHERE id ={$id};";
    $mensagem   = "<script>alert('O campo Descição foi excluido.');</script>";
} else {
    echo 'Nenhuma opção selecionada.';
    exit;
}

// execuçao do insert no db
if ($conexao->exec($sql)) {
    echo $mensagem;
    exit;
}
