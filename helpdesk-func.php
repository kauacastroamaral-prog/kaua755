<?php

$nome_empresa = "APD";
    //exibir mensagem
function saudacao() {
    return"Bem vindo ao sistema";

}
//receber nome
function cumprimentar($nome){
    return" Olá ". $nome . "!";
    
    
    }

    //setor do problema

    function setor ($setor){

     switch ($setor){
       
            case 1:
                return "produção";

                case 2:
                    return "Administrativo";

                    case 3:
                        return "Logística";
                      

                        case 4:
                            return "Financeiro";

                            case 5:
                            return "TI";


                          default:
                            return "Setor Invalido";
     }
    

    }

    //Equipamento com defeito

    function equipamento($tipo_equipamento){

        switch ($tipo_equipamento){
       
            case 1:
                return "Computador";

                case 2:
                    return "Teclado";

                    case 3:
                        return "Mouse";
                      

                        case 4:
                            return "Impressora";

                            default:
                            return "Equipamento Invalido";
    }
}

echo "Escolha o Setor: <br> ";
echo " 1 Produção ! <br>";
echo " 2 Administrativo ! <br>";
echo " 3 Logística ! <br>";
echo " 4 Financeiro ! <br>";
echo " 5 TI! <br>";


echo "Escolha o Equipamento: <br> ";
echo " 1 Computador ! <br>";
echo " 2 Teclado ! <br>";
echo " 3 Mouse ! <br>";
echo " 4 Impressora ! <br>";

echo "Opção Escolhida: <br>";
echo "Setor" . setor($setor_escolhido) . "<br>";
echo "Equipamento" . equipamento($equipamento_escolhido);
//REceber problema

function problema ($problema){
    return "Analise de problema". $problema. "!";
}


//Prioridade do problema

function prioridade($prioridade) {
    switch ($prioridade) {
        case 1:
            return "Baixa";
        case 2:
            return "Média";
        case 3:
            return "Alta";
        case 4:
            return "Urgente";
        default:
            return "Prioridade inválida!";
    }
}
}

?>