<?php
    $id      = isset($_GET['id']) ? $_GET['id']: '';
    $opcao   = 'atualizar';
  if  ($id !=''){

$conexao    = new PDO('mysql:local=localhost;port=3308;dbname=marcacarro', 'root', '');
$sql        = "SELECT * FROM marca WHERE id ={$id};";
$dataset    = $conexao->query($sql);
$resultset  = $dataset->fetch();

$descricao  =$resultset['nome'];
}else{
   
    $opcao  ='inserir';
    $descricao   = '';
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Concessiónaria</title>
</head>

<style>
    *{
        margin: 0;
        padding: 0;
        background-color: azure ;
    }
    .legend {
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 25px;
        text-decoration: none;
        text-shadow: 0.7px 0.7px black;
        color: #35252f;
        background: scroll;
        position: absolute;
        top: 13%;
        left: 50%;
        transform: translate(-50%, -50%);

    }

    form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-decoration: none;
        text-shadow: 0.7px 0.7px black;
        color: #35252f;
        background: scroll;
        height: 110px;
        padding: 85px;
        padding-top: 50px;
        padding-bottom: 30px;
        border-radius: 40px;
        border: 10px solid #412b2e;
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-size: 20px;
    }

    #sub {
        color: #35252f;
        font-size: large;
        border: solid;
        padding: 15px;
        border-radius: 15px;
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: none;
    }

    input {
        text-align: center;
        border: none;
        background: beige;
        padding: auto;
        
        border-radius: 10px;
    }

    a {
        text-decoration: none;
        position: absolute;
        top: 97%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body>


<p id="demo"></p>
    <form method="POST" action="salvar.php">

        <legend class="legend"> Cadastro de Marca</legend>
        <div>
            <label for="nome">Descrição: </label>
            <input type="hidden" name="opcao" id="opcao" value="<?=$opcao?>" />
            <input type="hidden" name="id" id="id" value="<?=$id?>" />

            <input type="text" id="nome" placeholder="Digite a Marca" name="nome" value="<?=$descricao?>"/>
        </div>



        <div>
            <input id="sub" type="submit" value="Salvar">
        </div>
        
    </form>
    <a href="https://github.com/mantovanip">by_mantovani</a>
</body>

<button width="10%" type="button"
onclick="document.getElementById('demo').innerHTML = Date()">
Click para ver Data e Hora.</button>

</html>