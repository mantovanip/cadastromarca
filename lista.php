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
        margin: auto;
        padding: auto;
        background-color: azure;
        ;
    }

    table {
        text-align:inherit;
        width: 90%;
        font: bold;
        font-size: 20px;
    }

    h1 {
        line-height: 90px;
        text-align: center;
        font-size: 30px;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        padding: 10px;
    }

    #top {
        text-align: right;
        font-size: 20px;
    }

    a {
        float: right;
        background-color: gainsboro;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
        text-decoration: none;
        border-radius: 30px;
        color: rgb(17, 17, 17);
        border-style: solid;
        line-height: 60px;

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
            $conexao    = new PDO('mysql:local=localhost;port=3308;dbname=marcacarro', 'root', '');
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