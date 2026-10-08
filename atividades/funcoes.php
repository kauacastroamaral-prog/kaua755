<?php

$nomeEscola ="SENAI";
//exibir mensagem
function saudacao() {
    return"Bem vindo ao sistema";

}
//receber nome
function cumprimentar($nome){
return" Olá ". $nome . "!";


}
// somar dois numeros
function somar($numero1, $numero2){
$resultado =$numero1 + $numero2;
return $resultado;

}

function calcularmedia($nota1, $nota2){

$media = ($nota1 + $nota2) /2;
return $media;
}

function verificarstatus($media){
//media é 7

if($media >= 7){
    return"APROVADO!!";

}
else{
    return"REPROVADO";
}
}



?>