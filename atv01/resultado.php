<?php 

$json = "usuarios.json";

$conteudo = file_get_contents($json);
$produtos = json_decode($conteudo, true);

echo"<pre>";
print_r($produtos);
echo"</pre>";

?>