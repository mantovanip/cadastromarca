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
        text-align: center;
        width: 90%;
        font: bold;
    }

    h1 {
        line-height: 90px;
        text-align: center;
        font-size: 20px;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        padding: 10px;
    }

    #top {
        text-align: right;
        font-size: 25px;
    }

    a {
        float: right;
        background-color: cornsilk;
font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-size: 20px;
        width: 100px;
        height: 50px;
        padding: 5px;
        border-radius: 15px;
        border-color: black;

        border: 3px solid #412b2e;
        text-decoration: none;
        background-color: ghostwhite;
        color: rgb(17, 17, 17);
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