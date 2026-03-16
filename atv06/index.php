<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
$url = 'https://jsonplaceholder.typicode.com/posts';
$resposta = file_get_contents($url);
$dados = json_decode($resposta, true);

$posts = array_slice($dados, 0, 10);

foreach ($posts as $post) {
    echo "<h3>{$post['title']}</h3>";
    echo "<p>User ID: {$post['userId']}</p>";
    echo "<p>{$post['body']}</p>";
    echo "<hr>";
}
?>
</body>

</html>