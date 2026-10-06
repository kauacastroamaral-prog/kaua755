<?php



//VERIFICA SE O FORMULÁRIO FOI ENVIADO USANDO O MÉTODO POST



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_produto = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preço = $_POST["preço"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $pais = $_POST["país"];
    $nome_fabricante = $_POST["fabricante"];


    //ORGANIZA OS DADOS EM UM ARRAY


    $novo_produto = [

        "nome" => $nome_produto,
        "país" =>  $pais,
        "fabricante" => $nome_fabricante,

        "Estoque" => [
            "produtos" => [
                "quantidade" =>  $quantidade,
                "preço" =>  $preço,
                "marca" =>  $marca,
                "categoria" =>  $categoria,

            ],

        ]


    ];

    // SERVE PARA LER/ABRIR ARQUIVOS JSON

    $conteudoJson = file_get_contents(__DIR__ . "/dados/produtos.json");
    // SERVE PARA CONVERTER JSON PARA ARRAY PHP
    // O TRUE SERVE PARA CONVERTER JSON EM UM ARRAY ASSOCIATIVO PARA O PHP LER

    $produto = json_decode($conteudoJson, true);

    // ADICIONAR O NOVO ALUNO AO ARMAZENAMENTO

    $produto[] = $novo_produto;

    // CONVERTER ARRAY PHP PARA JSON

    $jsonAtualizado = json_encode(
        $produto,

        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE

    );

    // SALVAR NO ARQUIVO JSON

    file_put_contents(__DIR__ . "/dados/produtos.json", $jsonAtualizado);
}
// LÊ OS ARQUICOS JSON PARA EXIBIÇÃO

$conteudoJson = file_get_contents(__DIR__ . "/dados/produtos.json");

// CONVERTE O JSON PARA ARRAY PHP

$produto = json_decode($conteudoJson, true);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CADASTRO DE PRODUTO</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        <label>País:</label>
        <input type="text" name="país" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Nome do fabricante</label>
        <input type="text" name="fabricante" min="0" max="10" step="0.1" required>
        <br><br>
        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="0" max="50000" step="0.1" required>
        <br><br>
        <label>Preço:</label>
        <input type="number" name="preço" min="0" max="500" step="0.1" required>
        <br><br>
        <label>Marca:</label>
        <input type="text" name="marca" min="0" max="50" step="0.1" required>
        <br><br>
        <label>Categoria:</label>
        <input type="text" name="categoria" min="0" max="10" step="0.1" required>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <h1>PRODUTO CADASTRADOS</h1>

    <?php foreach ($produto as $novo_produto) { ?>
        <h2> <?= $nome_produto["nome"]  ?> </h2>
        <p>  fabricante: <?= $fabriacante["fabriccante"] ?></p>

                                                        <!-- PRODUTO -->

        <h2>PRODUTOS</h2>
        <p>QUANTIDADE: <?= $quantidade["Estoques"]["produtos"]["quantidade"] ?></p>
        <p>PREÇO: <?= $preço["Estoque"]["produtos"]["preço"] ?></p>
        <p>MARCA : <?= $marca["Estoque"]["produtos"]["marca"] ?></p>
        <p>CATEGORIA : <?= $categoria["Estoque"]["produtos"]["categoria"] ?></p>


    <?php } ?>



    
</body>
</html>