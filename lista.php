<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        background-color: cornsilk;
        ;
    }

    table {
        width: 100%;
    }

    h1 {
        text-align: center;
        font-size: 20px;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        padding: 10px;
    }

    #top {
        font-size: 30px;
    }
</style>

<body>
    <table>
        <h1> Lista De Marcas</h1>
        <thead>
            <tr>
                <th id="top">ID</th>
                <th id="top">Descrição</th>
                <th id="top">Editar</th>
                <th id="top">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexao    = new PDO('mysql:local=localhost;port=3306;dbname=marcacarro', 'root', '');
            $sql        = "  SELECT * FROM cadastro;";
            $dataset    = $conexao->query($sql);
            $resultset  = $dataset->fetchAll();

            foreach ($resultset as $row) {
                echo '    <tr>
                    <th >' . $row['id'] . '</th>
                    <th >' . $row['descricao'] . '</th>
                    <td>
                    <a href="form.php?id=' . $row['id'] . '">Editar</a>
                    </td>
                <td>
                    <a href="salvar.php?opcao=excluir&id=' . $row['id'] . '">Excluir</a>
                    </td>
            </tr>   
                
                ';
            }

            ?>
        </tbody>

    </table>
</body>

</html>