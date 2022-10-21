<?php
#Verifica e armazena as variaveis via POST OU GET
$id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
$opcao = isset($_POST['opcao']) ? $_POST['opcao'] : $_GET['opcao'];
$nome_modelo = isset($_POST['nome_modelo']) ? $_POST['nome_modelo'] : '';
$tipo_veiculo = isset($_POST['tipo_veiculo']) ? $_POST['tipo_veiculo'] : '';
$tipo_combustivel = isset($_POST['tipo_combustivel']) ? $_POST['tipo_combustivel'] : '';
$chassi = isset($_POST['chassi']) ? $_POST['chassi'] : '';


$motorizacao = isset($_POST['motorizacao']) ? $_POST['motorizacao'] : '';

$ano_fabricacao = isset($_POST['ano_fabricacao']) ? $_POST['ano_fabricacao'] : '';
$ano = isset($_POST['ano']) ? $_POST['ano'] : '';

#Armazena na variavel conexao a conexão com BD
$conexao = new PDO('mysql:host=localhost;port=3308;dbname=marcacarro;', 'root', '');

#Executa o comando conforme oque estiver na variavel 'op'
if ($opcao == 'inserir') {
    #Faz a validação dos dados
    if ($chassi == '' || is_bool($chassi) || is_null($chassi) || is_float($chassi)) {
        echo 'Erro: O campo chassi é inválido, verifique o valor digitado e tente novamente.';
        exit;
    } else if ($nome_modelo == '' || is_bool($nome_modelo) || is_null($nome_modelo) || is_float($nome_modelo)) {
        echo 'Erro: O campo modelo é inválido.';
        exit;
    } else if ($tipo_veiculo == '' || is_bool($tipo_veiculo) || is_null($tipo_veiculo) || is_float($tipo_veiculo)) {
        echo 'Erro: O campo tipo é inválido.';
        exit;
    } else if ($tipo_combustivel == '' || is_bool($tipo_combustivel) || is_null($tipo_combustivel) || is_float($tipo_combustivel)) {
        echo 'Erro: O campo combustivel é inválido.';
        exit;
    } else if ($ano_fabricacao == '' || is_bool($ano_fabricacao) || is_null($ano_fabricacao) || is_float($ano_fabricacao)) {
        echo 'Erro: O Ano Fabricação é inválido.';
        exit;
    } else if ($ano == '' || is_bool($ano) || is_null($ano) || is_float($ano)) {
        echo 'Erro: O campo Ano Modelo é inválido.';
        exit;
    }
    $sql = "INSERT INTO veiculo VALUES (DEFAULT,{$nome_modelo},{$tipo_veiculo},{$tipo_combustivel},'{$chassi}','{$motorizacao}','{$ano_modelo}','{$ano_fabricacao}');";
    $mensagem = 'Salvo com sucesso.';
} else if ($opcao == 'atualizar') {
    if ($chassi == '') {
        echo 'Erro: O campo chassi é obrigatório';
        exit;
    }
    $sql = "UPDATE veiculo SET modelo = {$nome_modelo}, tipo = {$tipo_veiculo}, tipo = {$tipo_combustivel}, chassi = '{$chassi}',  motorizacao = '{$motorizacao}',ano = {$ano}, ano_fabricacao = {$ano_fabricacao} WHERE id = {$id};";
    $mensagem = 'Atualizado com sucesso.';
} else if ($opcao == 'excluir') {
    $sql = "DELETE FROM veiculo WHERE id = {$id};";
    $mensagem = 'Excluído com sucesso.';
} else {
    echo 'Comando inválido, consulte o administrador do sistema. => <br/>';
    echo $conexao->errorInfo();
}
#Executa o SQL e retorna a mensagem ou erro
if ($conexao->exec($sql)) {
    echo $mensagem;
} else {
    echo 'Erro ao cadastrar => <br/>';
    echo $conexao->errorInfo();
}
