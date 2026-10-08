<?php

require_once "funcoes.php";
if ($_SERVER[ "REQUEST_METHOD"]=="POST"){
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];

    $media = calcularmedia($nota1, $nota2);

    $situacao = verificarstatus($media);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funções no front</title>
</head>
<body>
    <form method="post">
        <label >NOAT 1</label>
        <input type="text" name="nota1" >
        <label >NOAT 2</label>
        <input type="text" name="nota2" >
        <button type ="submit">Enviar</button>
    </form>
    <p><?= $situacao ?></p>

</body>
</html>