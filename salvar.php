<?php
// declardaçãp de variaveis

$descricao  = $_GET['descricao'];

// testa se o campo esta vazio

if($descricao == ''){
    echo "<script>alert('O campo Descição é obrigatório.');</script>";
    exit;
}

// conexao db 'marcacarro'

$conexao    = new PDO('mysql:host=localhost;port=3306;dbname=marcacarro','root','');

// inserção dentro do db

$sql    = "   INSERT INTO cadastro (descricao)
VALUE   ('{$descricao}')";

// execuçao do insert no db

$result = $conexao->exec($sql);

// testa se foi cadastrado

if($result){
    echo  "<script>alert('Cadastro salvo com Sucesso!');</script>";
    }else{
        echo "<script>alert(' Erro ao cadastrar.');</script>";
        exit;
    }