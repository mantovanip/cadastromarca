<?php


// declardaçãp de variaveis

$id          = isset($_POST['id'])   ? $_POST['id'] :  $_GET['id'];
$opcao       = isset($_POST['opcao']) ? $_POST['opcao'] :$_GET['opcao'];
$descricao   = isset($_POST['nome']) ? $_POST['nome'] : '';



// testa se o campo esta vazio ou é para atualizar

if ($opcao == 'inserir' || $opcao == 'atualizar') {
        if ($descricao == '') {
        echo "<script>alert('O campo Descição é obrigatório.');</script>";
        exit;
    }
}
// conexao db 'marcacarro'

$conexao    = new PDO('mysql:host=localhost;port=3308;dbname=marcacarro', 'root', '');

// Instruçao SQL de inserção
if ($opcao == 'inserir') {
    $sql        = "INSERT INTO marca (nome) VALUE ('{$descricao}');";
    $mensagem   = "<script>alert('O campo Descição foi inserido.');</script>";
}
// Instruçao SQL de atualização 
else if ($opcao == 'atualizar') {
    $sql        = "UPDATE marca SET nome ='{$descricao}'WHERE id ={$id};";
    $mensagem   = "<script>alert('O campo Descrição foi atualizado.');</script>";
}
// Instruçao SQL de excluir
else if($opcao == 'excluir'){
    $sql        = "DELETE FROM marca WHERE id ={$id};";
    $mensagem   ="<script>alert('Excluido com Sucesso.');</script>";
}else{
    echo'Nenhuma opção selecionada.<a href="#" onclick="history.back()">Voltar</a>';
    exit;
}    
if ($conexao->query($sql)){
    echo $mensagem;
}else{
    printf('Erro ao cadastrar <a href="#" onclick="history.back()">Voltar</a>');
    print_r($conexao->errorInfo());
}