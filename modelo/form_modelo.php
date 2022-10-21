<?php
    $id = '';
    $nome_modelo = '';
    $marca = '';
    $ano   ='';
    $opcao = 'inserir';
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $opcao = 'atualizar';
        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=marcacarro','root','');
        $sql = "SELECT * FROM modelo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $rs = $dataset->fetch();
        $nome_modelo = $rs['nome_modelo'];
        $marca = $rs['marca'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Modelo</title>
</head>
<body>
    <form action="salvar_modelo.php" method="POST">
        <fieldset>
            <legend>Cadastro de Modelo</legend>
            <input type="hidden" name="op" id="op" value="<?=$opcao?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
                <label for="descricao">Modelo Veiculo</label>
                <br/>
                <input type="text" id="nome_modelo" name="nome_modelo" value="<?=$nome_modelo?>"/>
            </div>
            <br/>
            <div>
                <label for="ano">Ano</label>
                <br/>
                <input type="text" id="ano" name="ano" value="<?=$ano?>"/>
            <br>
            <br>
                <div>
                <input type="submit" value="Salvar" />
            </div>
            <div>
                <br>
                <br>
                <label for="marca">Marca:</label>
                <select name="marca">
                    <?php
                        $conexao = new PDO('mysql:host=localhost;port=3306;dbname=marcacarro','root','');
                        $sql = 'SELECT * FROM modelo;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
                        }
                    ?>
                </select>
            </div>
         
        </fieldset>
    </form> 
</body>
</html>