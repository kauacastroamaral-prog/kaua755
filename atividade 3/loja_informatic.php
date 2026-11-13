

<?php

require_once "../conexao.php";

// 1. CRIAR TABELA CATEGORIAS

$sql = "CREATE TABLE IF NOT EXISTS categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
)";

$pdo->exec($sql);


// 2. CRIAR TABELA PRODUTOS

$sql = "CREATE TABLE IF NOT EXISTS produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    categoria_id INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,
    estoque_minimo INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)";

$pdo->exec($sql);


// 3. CRIAR TABELA VENDAS

$sql = "CREATE TABLE IF NOT EXISTS vendas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    data_venda DATETIME NOT NULL,
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
)";

$pdo->exec($sql);


// 4. CADASTRAR PRODUTO

$mensagem = "";

if (isset($_POST["cadastrar"])) {

    $nome = trim($_POST["nome"]);
    $categoria_id = (int) $_POST["categoria_id"];
    $preco = str_replace(",", ".", $_POST["preco"]);
    $quantidade = $_POST["quantidade"];
    $estoque_minimo = $_POST["estoque_minimo"];

    if ($nome == "") {

        $mensagem = "Digite o nome do produto.";

    } elseif (!is_numeric($preco) || $preco <= 0) {

        $mensagem = "O preço deve ser maior que zero.";

    } elseif ($quantidade == "" || !ctype_digit((string)$quantidade) ||
              $estoque_minimo == "" || !ctype_digit((string)$estoque_minimo)) {

        $mensagem = "Informe quantidades válidas.";

    } elseif ($categoria_id <= 0) {

        $mensagem = "Selecione uma categoria.";

    } else {

        $nome = $pdo->quote($nome);

        $sql = "INSERT INTO produtos
        (nome, categoria_id, preco, quantidade, estoque_minimo)
        VALUES
        ($nome, $categoria_id, $preco, $quantidade, $estoque_minimo)";

        $pdo->exec($sql);

        $mensagem = "Produto cadastrado com sucesso!";
    }
}


// 5. ATUALIZAR PRODUTO

if (isset($_POST["atualizar"])) {

    $id = (int) $_POST["id"];
    $nome = trim($_POST["nome"]);
    $categoria_id = (int) $_POST["categoria_id"];
    $preco = str_replace(",", ".", $_POST["preco"]);
    $quantidade = $_POST["quantidade"];
    $estoque_minimo = $_POST["estoque_minimo"];

    if ($nome == "") {

        $mensagem = "Digite o nome do produto.";

    } elseif (!is_numeric($preco) || $preco <= 0) {

        $mensagem = "O preço deve ser maior que zero.";

    } elseif ($quantidade == "" || !ctype_digit((string)$quantidade) ||
              $estoque_minimo == "" || !ctype_digit((string)$estoque_minimo)) {

        $mensagem = "Informe quantidades válidas.";

    } elseif ($id <= 0 || $categoria_id <= 0) {

        $mensagem = "Dados inválidos.";

    } else {

        $nome = $pdo->quote($nome);

        $sql = "UPDATE produtos SET
        nome = $nome,
        categoria_id = $categoria_id,
        preco = $preco,
        quantidade = $quantidade,
        estoque_minimo = $estoque_minimo
        WHERE id = $id";

        $pdo->exec($sql);

        $mensagem = "Produto atualizado com sucesso!";
    }
}


// 6. EXCLUIR PRODUTO

if (isset($_POST["excluir"])) {

    $id = (int) $_POST["id"];

    $sql = "SELECT COUNT(*) AS total
            FROM vendas
            WHERE produto_id = $id";

    $resultado = $pdo->query($sql);

    $vendas = $resultado->fetch(PDO::FETCH_ASSOC);

    if ($vendas["total"] > 0) {

        $mensagem = "Este produto possui vendas e não pode ser excluído.";

    } else {

        $sql = "DELETE FROM produtos WHERE id = $id";

        $pdo->exec($sql);

        $mensagem = "Produto excluído com sucesso!";
    }
}


// 7. BUSCAR PRODUTO PARA EDIÇÃO

$produtoEditar = null;

if (isset($_GET["editar"])) {

    $id = (int) $_GET["editar"];

    $sql = "SELECT * FROM produtos WHERE id = $id";

    $resultado = $pdo->query($sql);

    $produtoEditar = $resultado->fetch(PDO::FETCH_ASSOC);
}


// 8. LISTAR CATEGORIAS

$sql = "SELECT * FROM categorias ORDER BY nome ASC";

$resultado = $pdo->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);


// 9. LISTAR TODOS OS PRODUTOS

$sql = "SELECT produtos.*, categorias.nome AS categoria
        FROM produtos
        INNER JOIN categorias
        ON produtos.categoria_id = categorias.id
        ORDER BY produtos.id ASC";

$resultado = $pdo->query($sql);

$produtos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="../atividades_css/dados.css">
</head>

<body>

    <h1>Controle de Estoque</h1>

    <p><?php echo htmlspecialchars($mensagem); ?></p>


    <!-- FORMULÁRIO DE CADASTRO E EDIÇÃO -->

    <h2>
        <?php
        if ($produtoEditar) {
            echo "Editar Produto";
        } else {
            echo "Cadastrar Produto";
        }
        ?>
    </h2>

    <form method="POST">

        <?php if ($produtoEditar) { ?>

            <input type="hidden" name="id"
            value="<?php echo $produtoEditar['id']; ?>">

        <?php } ?>


        Nome:

        <input type="text" name="nome" required
        value="<?php echo htmlspecialchars($produtoEditar['nome'] ?? ''); ?>">

        <br><br>


        Categoria:

        <select name="categoria_id" required>

            <option value="">Selecione</option>

            <?php foreach ($categorias as $categoria) { ?>

                <option value="<?php echo $categoria['id']; ?>"
                <?php
                if ($produtoEditar &&
                    $produtoEditar['categoria_id'] == $categoria['id']) {
                    echo "selected";
                }
                ?>>

                    <?php echo htmlspecialchars($categoria['nome']); ?>

                </option>

            <?php } ?>

        </select>

        <br><br>


        Preço:

        <input type="number" name="preco" step="0.01" min="0.01"
        required
        value="<?php echo $produtoEditar['preco'] ?? ''; ?>">

        <br><br>


        Quantidade:

        <input type="number" name="quantidade" min="0" required
        value="<?php echo $produtoEditar['quantidade'] ?? ''; ?>">

        <br><br>


        Estoque mínimo:

        <input type="number" name="estoque_minimo" min="0" required
        value="<?php echo $produtoEditar['estoque_minimo'] ?? ''; ?>">

        <br><br>


        <?php if ($produtoEditar) { ?>

            <button type="submit" name="atualizar">
                Atualizar Produto
            </button>

            <a href="loja_informatic.php">Cancelar</a>

        <?php } else { ?>

            <button type="submit" name="cadastrar">
                Cadastrar Produto
            </button>

        <?php } ?>

    </form>


    <hr>


    <!-- LISTAGEM DE PRODUTOS -->

    <h2>Produtos Cadastrados</h2>

    <table border="1" cellpadding="8">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Estoque mínimo</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>


        <?php foreach ($produtos as $produto) { ?>

            <tr>

                <td><?php echo $produto['id']; ?></td>

                <td><?php echo htmlspecialchars($produto['nome']); ?></td>

                <td><?php echo htmlspecialchars($produto['categoria']); ?></td>

                <td>
                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                </td>

                <td><?php echo $produto['quantidade']; ?></td>

                <td><?php echo $produto['estoque_minimo']; ?></td>


                <td>

                    <?php if ($produto['quantidade'] == 0) { ?>

                        ESGOTADO

                    <?php } elseif ($produto['quantidade'] <= $produto['estoque_minimo']) { ?>

                        ESTOQUE BAIXO

                    <?php } else { ?>

                        DISPONÍVEL

                    <?php } ?>

                </td>


                <td>

                    <a href="?editar=<?php echo $produto['id']; ?>">
                        Editar
                    </a>

                    <form method="POST"
                    onsubmit="return confirm('Deseja excluir este produto?');">

                        <input type="hidden" name="id"
                        value="<?php echo $produto['id']; ?>">

                        <button type="submit" name="excluir">
                            Excluir
                        </button>

                    </form>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>
</html>