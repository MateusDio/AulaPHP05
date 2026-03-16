<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="cep" placeholder="Digite seu CEP">

        <input type="submit" name="enviar" value="Enviar">

    </form>

<?php

if(isset($_POST["enviar"])){

    $cep = trim($_POST["cep"]);

    if(empty($cep)){
        echo "Digite um CEP.";
    } 
    else{

        $url = "https://viacep.com.br/ws/$cep/json/";

        $resposta = file_get_contents($url);

        $dados = json_decode($resposta, true);

        if(isset($dados["erro"])){
            echo "CEP não encontrado.";
        }
        else{

            echo "<h3>Endereço:</h3>";

            echo "Logradouro: " . htmlspecialchars($dados["logradouro"]) . "<br>";
            echo "Bairro: " . htmlspecialchars($dados["bairro"]) . "<br>";
            echo "Cidade: " . htmlspecialchars($dados["localidade"]) . "<br>";
            echo "Estado: " . htmlspecialchars($dados["uf"]) . "<br>";

        }
    }
    

}

?>

</body>

</html>