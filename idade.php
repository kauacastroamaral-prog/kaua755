
<?php
$nome = $_POST["nome"];
$idade =  $_POST["idade"];
$resultado ="";


    if  ($idade >= 18) {
        echo $resultado ="É de maior";
     }  else{
         $resultado = " É de menor";
     }



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

<body>
<header>
    <nav>
        <a href="idade.php">inicio </a>
        <a hrep=" idade.php">CADASTROS </a>
    </nav>
</header>
</body>
<main>
    
        <h1>cadastro</h1>
     <form method="POST"> 
<label>Nome:</label>
<input type="text"class="nome" id="nome" name="nome">

<label>IDADE:</label>
<input type="number "class="idade" id="idade" name="idade">
<button type="submit"> Cadastrar</button>


     </form>
     <h2> <?= $resultado?> </h2>
    
</main>
</body>
</head>
