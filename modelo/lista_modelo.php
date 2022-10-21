<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Modelos</title>
   
</head>
<body>
    <h3>Lista de Modelos</h3>
    <hr/>
    <div >
        <a href="form_modelo.php"><button>Novo</button></a>
    </div>
    <table cellspacing="0">
        <thead>
            <tr>
                <th class="text-left">ID</th>
                <th class="text-left">Marca</th>
                <th class="text-left">Modelo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new PDO('mysql:host=localhost;port=3308;dbname=marcacarro','root','');
                $sql = "SELECT * FROM modelo m INNER JOIN marca mc ON mc.id = m.marca;";
                $dataset = $conexao->query($sql);
                $rs = $dataset->fetchAll();
                foreach($rs as $row){
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['nome'].'</td>
                            <td>'.$row['descricao'].'</td>
                            <td class="text-center">
                                <a href="form_modelo.php?id='.$row['id'].'">Editar</a>
                            </td>
                            <td class="text-center">
                                <a href="salvar_modelo.php?op=excluir&id='.$row['id'].'">Excluir</a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</body>
</html>