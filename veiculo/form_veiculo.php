<?php
    $id = '';
    $modelo = '';
    $combustivel = '';
    $chassi = '';
    $motorizacao = '';
    $ano = '';
    $ano_fabricacao = '';
    $opcao = 'inserir';
    $conexao = new PDO('mysql:host=localhost;port=3308;dbname=marcacarro','root','');


    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $opcao = 'atualizar';
        $sql = "SELECT * FROM veiculo WHERE id = {$id}";
        $dataset = $conexao->query($sql);
        $rs = $dataset->fetch();
        $modelo = $rs['modelo'];
        $tipo_combustivel = $rs['tipo_combustivel'];
        $chassi = $rs['chassi'];
        $motorizacao = $rs['motorizacao'];
        $ano_fabricacao = $rs['ano_fabricacao'];
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veículo</title>

</head>
<body>
    <form action="salvar_veiculo.php" method="POST">
        <fieldset>
            <legend>Cadastro de Veículo</legend>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>"/>
            <input type="hidden" name="id" id="id" value="<?=$id?>"/>
            <div>
                <br/>
                <label for="modelo">Modelo:</label>
                <select name="modelo">
                    <?php
                        $sql = 'SELECT * FROM modelo;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['nome_modelo'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="tipo_veiculo">Tipo:</label>
                <select name="tipo_veiculo">
                    <?php
                        $sql = 'SELECT * FROM tipo_veiculo;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['tipo'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="tipo_combustivel">Combustivel:</label>
                <select name="tipo_combustivel">
                    <?php
                        $sql = 'SELECT * FROM tipo_combustivel;';
                        $dataset    = $conexao->query($sql);
                        $resultset  = $dataset->fetchAll();
                        foreach($resultset as $row){
                        echo '<option value="'.$row['id'].'">'.$row['tipo'].'</option>';
                        }
                    ?>
                </select><br>
            </div>
            <div>
                <br/>
                <label for="chassi">Chassi</label>
                <br/>
                <input type="text" id="chassi" name="chassi" maxlength="17" value="<?=$chassi?>"/>
            </div>
                 <div>
                <br/>
                <label for="motorizacao">Motorizacao</label>
                <br/>
                <input type="number" id="motorizacao" min="0" max="999" name="motorizacao" value="<?=$motorizacao?>"/>
            </div>
                 <div>
                <br/>
                <label for="ano_fabricacao">Ano Fabricacao</label>
                <br/>
                <input type="number" id="ano_fabricacao" min="1800" max="2050"  name="ano_fabricacao" value="<?=$ano_fabricacao?>"/>
            </div>
            <div>
                <br/>
                <label for="ano">Ano Modelo</label>
                <br/>
                <input type="number" id="ano" min="1800" max="2050" name="ano" value="<?=$ano?>"/>
            </div>
            <div>
                <br/>
                <input type="submit" value="Salvar" />
            </div>
        </fieldset>
    </form> 
</body>
</html>