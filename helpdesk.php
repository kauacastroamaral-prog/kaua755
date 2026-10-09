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
            <option value="1">Produção</option>
            <option value="2">Administrativo</option>
            <option value="3">Financeiro</option>
            <option value="4">TI</option>
        </select>

        <br><br>

        <label>Equipamento com defeito:</label>

        <select name="equipamento" required>
            <option value="">Selecione</option>
            <option value="1">Computador</option>
            <option value="2">Teclado</option>
            <option value="3">Mouse</option>
            <option value="4">Impressora</option>
        </select>

        <br><br>

        <button type="submit">Registrar problema</button>

         <label>Descrição do problema:</label>
         <br>
         <textarea name= "problema" required></textarea>
         <br><br>



    </form>

    

</body>

</html>