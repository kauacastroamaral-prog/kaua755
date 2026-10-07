<?php

//CAMINHO DO ARQUIVO JSON
$arquivo = __DIR__. "dados/kaua.son";

// 1. ler o arquivo json

$conteudo = file_get_contents($arquivo);

// 2. transformar o JSON em ARRAY PHP

$alunos = json_decode($conteudo,  true);

//3. percorrer todos os alunos

foreach ($alunos as $aluno){
// 4. procurar o aluno com o noe; Maria

if($aluno ["nome"]== "Maria"){

//5.Alterar o dado
    $aluno["idade"]=15;
}

}

//6. Transformar ARRAY PHP em JSON
$json = json_encode($alunos, JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE);
 
// 7. sALVAR NO ARQUIVO

file_put_contents($arquivo, $json);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>