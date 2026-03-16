<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $url = 'https://restcountries.com/v3.1/name/brazil';

    $resposta = file_get_contents($url);
    $dados = json_decode($resposta, true);
    $brasil = $dados[0];
    $nomeOficial = $brasil['name']['official'];
    $capital = $brasil['capital'][0];
    $regiao = $brasil['region'];
    $populacao = $brasil['population'];
    $bandeira = $brasil['flags']['png'];

    echo "<h2>$nomeOficial</h2>";
    echo "<p><strong>Capital:</strong> $capital</p>";
    echo "<p><strong>Região:</strong> $regiao</p>";
    echo "<p><strong>População:</strong> $populacao</p>";
    echo "<p><strong>Bandeira:</strong> <br><img src='$bandeira' alt='Bandeira do Brasil' width='150'></p>";

    ?>
</body>

</html>