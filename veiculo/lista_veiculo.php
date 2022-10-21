<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
   
</head>
<body>
    <h3 class="titulo">Lista de Veículos</h3>
    <hr/>
    <div class="div-button">
        <a href="form_veiculo.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Modelo</th>
                <th class="text-left">Tipo</th>
                <th class="text-left">Combustível</th>
                <th class="text-left">Chassi</th>             
                <th class="text-left">Motorização</th>               
                <th class="text-left">Ano</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new PDO('mysql:host=localhost;port=3308;dbname=marcacarro','root','');
                $sql = " SELECT *,
                (SELECT mc.nome FROM marca mc WHERE m.marca = mc.id) 'mc',
                (SELECT t.modelo FROM tipo_veiculo t WHERE t.id = v.tipo_veiculo) 'tipo',
                m.modelo AS 'mod',
                c.modelo AS 'comb',
                v.id AS 'cod'
                FROM veiculo v
                INNER JOIN tipo_veiculo m ON m.id = v.tipo;
                INNER JOIN tipo_combustivel c ON c.id = v.tipo";
                $dataset = $conexao->query($sql);
                $rs = $dataset->fetchAll($sql);
                foreach($rs as $row){
                    echo '
                        <tr>
                            <td>'.$row['cod'].'</td>
                            <td>'.$row['mod'].'</td>
                            <td>'.$row['tipo'].'</td>
                            <td>'.$row['comb'].'</td>
                            <td>'.$row['chassi'].'</td>
                            <td>'.$row['cor'].'</td>
                            <td>'.$row['potencia'].'</td>
                            <td>'.$row['motorizacao'].'</td>
                            <td>'.$row['ano_fabricacao'].'/'.$row['ano_fabricacao'].'</td>
                            <td class="text-center">
                                <a href="form_veiculo.php?id='.$row['cod'].'">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="salvar_veiculo.php?op=excluir&id='.$row['cod'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>