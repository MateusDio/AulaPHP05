<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="alunos.json">
    <input type="text" name="nome" placeholder="Digite seu nome">
    <input type="text" name="idade" placeholder="Digite sua idade">
    <input type="text" name="curso" placeholder="Digite o seu curso">
    <input type="submit" value="Enviar">


    </form>
 

    <?php 
       if(isset($_POST["enviar"])){ 
    $nome = trim($_POST["nome"]);
    $idade = trim($_POST["idade"]);
    $curso = trim($_POST["curso"]);

    if(empty($nome) || empty($idade) || empty($curso)){
        echo "Preencha todos os campos";
    }
    else{
        $arquivo = "alunos.json";

        if(file_exists($arquivo)){
            $dados = file_get_contents($arquivo);
            $alunos = json_decode($dados, true);
        
        if(!is_array($alunos)){
            $alunos = [];        
        
            }
        }else{
            $alunos = [];
        }

        $alunos[]= $nome;

       }

       $novoAluno = [
        'nome' => $nome,
        'idade' => $idade,
        'curso' => $curso
       ];

       $alunos = $novoAluno;

       $jsonFinal = json_encode($alunos, JSON_PRETTY_PRINT
       | JSON_UNESCAPED_UNICODE);

       file_put_contents($arquivo, $jsonFinal);
       
       echo 'Usuario cadastrado com sucesso!<br><br>';
       echo'Dados salvos: <br><br>';
       echo "Nome: $nome<br>";
       echo "Idade: $idade<br>";
       echo "Curso: $curso<br>";
       }
       
    ?>
</body>
</html>