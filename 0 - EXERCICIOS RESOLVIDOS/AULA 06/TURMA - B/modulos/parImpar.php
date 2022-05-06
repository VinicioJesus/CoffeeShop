<?php 
/******************************************************************
 * Objetivo: arquivo para criar funções de separação de par e impar
 * Data: 22/02/2022
 * Autor: Marcel
 * Versão: 1.0
 ******************************************************************/

$resultado = numerosPareImpares(5, 13);
echo("<pre>");
print_r($resultado);
echo("</pre>");

//Função para separar um sequencia de numeros Pares
function numerosPares ($numeroInicial, $numeroFinal)
{
    //Recebe os dados de argumento da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;
    $pares = array();
    $cont = (int) 0;

    while ($numInicial <= $numFinal)
    {
        if($numInicial%2 == 0)
        {
            $pares[$cont] = $numInicial;
            $cont++;
        }
        $numInicial++;
    }
    return $pares;
}

//Função para separar um sequencia de numeros Impares
function numerosImpares ($numeroInicial, $numeroFinal)
{
    //Recebe os dados de argumento da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;
    $impares = array();
    $cont = (int) 0;

    while ($numInicial <= $numFinal)
    {
        if($numInicial%2 == 1)
        {
            $impares[$cont] = $numInicial;
            $cont++;
        }
        $numInicial++;
    }
    return $impares;
}


function numerosPareImpares ($numeroInicial, $numeroFinal)
{
    //Recebe os dados dos argumentos da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;

    //Variaveis para criar os arrays individuais (pares e impares)
    $pares = array();
    $impares = array();
    
    //chama as funções que separam numeros pares e impares
    $pares = numerosPares($numInicial, $numFinal);
    $impares = numerosImpares($numInicial, $numFinal);

    //Criamos um array para armazenar os dois arrays individuais (pares e impares).
    //Criamos um chave dentro do array chamada "Pares" para identificar a lista dos pares
        // e "Impares" para identificar a lista do impares             
    $paresImpares = array(
        "Pares"     =>  $pares,
        "Impares"   =>  $impares
    );

    return $paresImpares;
}

?>