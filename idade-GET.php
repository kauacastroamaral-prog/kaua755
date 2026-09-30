?php
// Lógica de verificação em PHP
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
$idade = isset($_POST['idade']) ? intval($_POST['idade']) : 0;

if ($idade > 0) {
if ($idade >= 18) {
$mensagem = "É de maior";
} else {
$mensagem = "É de menor";
}
} else {
$mensagem = "Por favor, insira uma idade válida.";
}
}
?>
<!--DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro - Verificador de Idade</title>
<style>
/* Reset de margens e padding */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

html {
scroll-behavior: smooth;
}

/* Estilização do Body com Flexbox para centralizar tudo */
body {
font-family: 'Segoe UI', Roboto, Arial, sans-serif;
background-color: #e7e7ec;
color: #0e0606;
line-height: 1.6;
min-height: 100vh;
display: flex;
justify-content: center;
align-items: center;
position: relative;
}

/* Botão INÍCIO descolado no topo da página */
.btn-inicio {
position: absolute;
top: 24px;
left: 24px;
text-decoration: none;
color: #4f46e5;
font-weight: 700;
font-size: 0.9rem;
text-transform: uppercase;
letter-spacing: 0.5px;
padding: 8px 16px;
background-color: #ffffff;
border-radius: 8px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
transition: all 0.2s ease;
}

.btn-inicio:hover {
background-color: #4f46e5;
color: #ffffff;
}

/* Card centralizado */
.card-container {
background-color: #ffffff;
padding: 2.5rem;
border-radius: 12px;
box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
width: 100%;
max-width: 380px;
}

.card-container h1 {
font-size: 1.8rem;
margin-bottom: 1.5rem;
color: #111827;
text-align: center;
text-transform: lowercase;
}

/* Campos do Formulário */
.form-group {
display: flex;
flex-direction: column;
margin-bottom: 1.2rem;
}

.form-group label {
font-weight: 600;
margin-bottom: 0.4rem;
font-size: 0.85rem;
color: #374151;
text-transform: uppercase;
}

.form-group input {
width: 100%;
padding: 0.75rem;
border: 1px solid #d1d5db;
border-radius: 8px;
font-size: 1rem;
outline: none;
transition: border-color 0.2s, box-shadow 0.2s;
}

.form-group input:focus {
border-color: #4f46e5;
box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
}

/* Botão de Envio */
.btn-submit {
width: 100%;
padding: 0.85rem;
background-color: #4f46e5;
color: #ffffff;
border: none;
border-radius: 8px;
font-size: 1rem;
font-weight: 600;
cursor: pointer;
transition: background-color 0.2s;
margin-top: 0.5rem;
}

.btn-submit:hover {
background-color: #4338ca;
}

/* Resultado da Verificação */
.resultado {
margin-top: 1.5rem;
padding: 0.8rem;
border-radius: 8px;
background-color: #f3f4f6;
text-align: center;
font-size: 1.1rem;
font-weight: 700;
color: #1f2937;
}
</style>
</head>
<body>

 Link Início fixo no canto superior esquerdo -->
<!--a href="index.php" class="btn-inicio">← Início</a>

Card de Cadastro Centralizado -->
<!--div class="card-container">
<h1>cadastro</h1>

<form action="idade.php" method="POST">
    <form action="idade-GET.php" method="GET">
<div class="form-group">
<label for="nome">Nome</label>
<input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
</div>

<div class="form-group">
<label for="idade">Idade</label>
<input type="number" id="idade" name="idade" placeholder="Digite sua idade" required>
</div>

<button type="submit" class="btn-submit">Cadastrar</button>
</form>

<!?php if (!empty($mensagem)): ?>
<div class="resultado">
<!?php echo $mensagem; ?>
</div>
<!?php endif; ?>
</div>

</body>
</html-->

<?php 
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $resultado = "";

    if($idade >= 18) {
        $resultado = "Você é maior de idade";
    } else { 
        $resultado = "Você é menor de idade";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de idade</title>
    <link rel="stylesheet" href="verificador.css">
</head>
<body>
    <!--MENU-->
    <div class="logo">
        <h2>Verificação de idade</h2>
    <nav>
        <a href="index.php">Início</a>
    </nav>
    </div>

    <div class="mensagem">
    <form method="GET">
        <label>Nome:</label>
        <input type="text" class="nome" id="nome" name="nome">
        <input type="numero" class="idade" id="idade" name="idade">

        <button type="submit">Enviar</button>
    </div>
    </form>
    <h2> <?= $resultado ?> </h2>
</body>