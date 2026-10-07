<?php

//CAMINHO DO ARQUIVO JSON
$arquivo = __DIR__. "dados/kaua.son";

// 1. ler o arquivo json

$conteudo = file_get_contents($arquivo);

// 2. transformar o JSON em ARRAY PHP

$alunos = json_decode($conteudo,  true);

//3. percorrer todos os alunos
// Para cada aluno dentro da $alunos, guarda a posição dele em $posicao  e os dados dele em $aluno.
foreach ($alunos as $aluno){
// 4. procurar o aluno com o noe; Maria

if($aluno ["nome"]== "Maria"){

//5.Excluir aluno
unset($alunos[$posicao]);
}

}

// 6. Reorganizar as posição do array
$alunos = array_values($alunos);

// 7 . Transformar ARRAy em JSON novamente
$json = json_encode($alunos, JSON_PRETTY_PRINT| JSON_UNESCAPED_UNICODE);

// 8. Salvar no arquivo
file_put_contents($arquivo, $json);
echo "ALUNO ATUALIZADO"
    

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