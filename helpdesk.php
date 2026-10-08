<?php

// Setor do problema
function setor($setor)
{
    switch ($setor) {
        case 1:
            return "Produção";
        case 2:
            return "Administrativo";
        case 3:
            return "Logística";
            case 4:
                return "Financeiro";
                case 5:
                    return "TI";
                   
        default:
            return "Setor inválido!";
    }
}

// Equipamento com defeito
function equipamento($tipo_equipamento)
{
    switch ($tipo_equipamento) {
        case 1:
            return "Computador";
        case 2:
            return "Impressora";
            case 3:
                return "Mouse";
        case 4:
            return "Teclado";
        default:
            return "Equipamento inválido!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Registro de Problemas</title>
</head>

<body>

    <h1>Registro de Problemas</h1>

    <form method="POST">

        <label>Escolha o setor:</label>

        <select name="setor" required>
            <option value="">Selecione</option>
            <option value="1">RH</option>
            <option value="2">Financeiro</option>
            <option value="3">TI</option>
        </select>

        <br><br>

        <label>Equipamento com defeito:</label>

        <select name="equipamento" required>
            <option value="">Selecione</option>
            <option value="1">Computador</option>
            <option value="2">Impressora</option>
            <option value="3">Teclado</option>
        </select>

        <br><br>

        <button type="submit">Registrar problema</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $setor_escolhido = (int) $_POST["setor"];
        $equipamento_escolhido = (int) $_POST["equipamento"];

        echo "<h2>Problema registrado!</h2>";

        echo "Setor: " . setor($setor_escolhido) . "<br>";

        echo "Equipamento: " . equipamento($equipamento_escolhido);
    }

    ?>

</body>

</html>