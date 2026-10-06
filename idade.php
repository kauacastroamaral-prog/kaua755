<!--?php
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
<link rel="stylesheet" href="verificador.css">
<body>
<header>
    <nav>
        <a href="index.php">inicio </a>
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
     <h2> <,?= $resultado?> </h2>
    
</main>
</body>
</head>
-->
<?php
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

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro - Verificador de Idade</title>

    <style>

        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }


        /* =========================
           BODY
        ========================= */

        body {

            font-family: 'Segoe UI', Roboto, Arial, sans-serif;

            background: linear-gradient(
                135deg,
                #080808,
                #151515,
                #250000
            );

            color: #ffffff;

            line-height: 1.6;

            min-height: 100vh;

            display: flex;

            justify-content: center;

            align-items: center;

            position: relative;

            padding: 20px;
        }


        /* =========================
           BOTÃO INÍCIO
        ========================= */

        .btn-inicio {

            position: fixed;

            top: 25px;
            left: 25px;

            text-decoration: none;

            color: #ffffff;

            font-weight: 700;

            font-size: 0.9rem;

            text-transform: uppercase;

            letter-spacing: 0.5px;

            padding: 10px 18px;

            background-color: #111111;

            border: 1px solid #ff1e1e;

            border-radius: 8px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);

            transition: 0.3s;
        }

        .btn-inicio:hover {

            background-color: #e50909;

            border-color: #ff3333;

            color: #ffffff;

            transform: translateY(-2px);

            box-shadow: 0 6px 15px rgba(255, 0, 0, 0.3);
        }


        /* =========================
           CARD
        ========================= */

        .card-container {

            background: #111111;

            padding: 2.5rem;

            border-radius: 15px;

            border: 1px solid #2b2b2b;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.7),
                0 0 25px rgba(180, 0, 0, 0.08);

            width: 100%;

            max-width: 380px;
        }


        /* =========================
           TÍTULO
        ========================= */

        .card-container h1 {

            font-size: 1.8rem;

            margin-bottom: 1.5rem;

            color: #ffffff;

            text-align: center;

            text-transform: uppercase;

            letter-spacing: 1px;
        }

        .card-container h1::after {

            content: "";

            display: block;

            width: 60px;

            height: 3px;

            background: #e50909;

            margin: 8px auto 0;

            border-radius: 5px;
        }


        /* =========================
           CAMPOS
        ========================= */

        .form-group {

            display: flex;

            flex-direction: column;

            margin-bottom: 1.2rem;
        }


        .form-group label {

            font-weight: 600;

            margin-bottom: 0.4rem;

            font-size: 0.85rem;

            color: #dddddd;

            text-transform: uppercase;
        }


        .form-group input {

            width: 100%;

            padding: 0.75rem;

            background-color: #1c1c1c;

            color: #ffffff;

            border: 1px solid #3a3a3a;

            border-radius: 8px;

            font-size: 1rem;

            outline: none;

            transition: 0.3s;
        }


        .form-group input::placeholder {

            color: #777777;
        }


        .form-group input:focus {

            border-color: #e50909;

            box-shadow: 0 0 0 3px rgba(229, 9, 9, 0.15);

            background-color: #202020;
        }


        /* =========================
           BOTÃO CADASTRAR
        ========================= */

        .btn-submit {

            width: 100%;

            padding: 0.85rem;

            background: #e50909;

            color: #ffffff;

            border: none;

            border-radius: 8px;

            font-size: 1rem;

            font-weight: 700;

            cursor: pointer;

            transition: 0.3s;

            margin-top: 0.5rem;
        }


        .btn-submit:hover {

            background: #ff1f1f;

            transform: translateY(-2px);

            box-shadow: 0 6px 15px rgba(229, 9, 9, 0.35);
        }


        /* =========================
           RESULTADO
        ========================= */

        .resultado {

            margin-top: 1.5rem;

            padding: 0.9rem;

            border-radius: 8px;

            background-color: #1c1c1c;

            border-left: 4px solid #e50909;

            text-align: center;

            font-size: 1.1rem;

            font-weight: 700;

            color: #ffffff;
        }


        /* =========================
           RESPONSIVIDADE
        ========================= */

        @media (max-width: 500px) {

            body {
                padding: 20px;
            }

            .card-container {
                padding: 2rem 1.5rem;
            }

            .btn-inicio {
                top: 15px;
                left: 15px;
            }
        }

    </style>

</head>


<body>

    <!-- Botão para voltar ao início -->
    <a href="./index.php" class="btn-inicio">
        ← Início
    </a>


    <!-- Card de cadastro -->

    <div class="card-container">

        <h1>Cadastro</h1>


        <form action="idade.php" method="POST">

            <div class="form-group">

                <label for="nome">
                    Nome
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu nome"
                    required
                >

            </div>


            <div class="form-group">

                <label for="idade">
                    Idade
                </label>

                <input
                    type="number"
                    id="idade"
                    name="idade"
                    placeholder="Digite sua idade"
                    min="1"
                    required
                >

            </div>


            <button type="submit" class="btn-submit">
                Cadastrar
            </button>

        </form>


        <?php if (!empty($mensagem)): ?>

            <div class="resultado">

                <?php echo $mensagem; ?>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>
