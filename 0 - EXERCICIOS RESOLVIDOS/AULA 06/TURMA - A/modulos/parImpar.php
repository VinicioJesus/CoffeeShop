<?php 
/********************************************************************************
 * Objetivo: Arquivo com funções de separação de números pares e impares
 * Autor: Marcel
 * Data:24/02/2022
 * Versão: 1.0
 **********************************************************************************/

$resultado = numerosParesImpares(8,40);
echo('<pre>');
print_r($resultado);
echo('</pre>');


//Função para separa números pares
function numerosPares($numeroInicial, $numeroFinal)
{
    //Recebendo dados de argumentos da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;

    $pares = array();
    $contPar = (int) 0;

    //Repetiçção para separar os numeros pares
    while ($numInicial <= $numFinal)
    {
        //Valida se o numero corrente é par
        if($numInicial%2 == 0)
        {
            $pares[$contPar] = $numInicial;
            $contPar++;
        }
        $numInicial++;
    }

    return $pares;
}

//Função para separa números Impares
function numerosImpares($numeroInicial, $numeroFinal)
{
    //Recebendo dados de argumentos da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;

    $impares = array();
    $contImpar = (int) 0;

    //Repetiçção para separar os numeros pares
    while ($numInicial <= $numFinal)
    {
        //Valida se o numero corrente é impar
        if($numInicial%2 == 1)
        {
            $impares[$contImpar] = $numInicial;
            $contImpar++;
        }
        $numInicial++;
    }
    return $impares;
}

//Função para retornar os numeros pares e impares
function numerosParesImpares ($numeroInicial, $numeroFinal)
{
    //recebe dados dos argumentos da função
    $numInicial = (int) $numeroInicial;
    $numFinal = (int) $numeroFinal;

    //Declaração dos arrays (pares e impares)
    $pares = array();
    $impares = array();

    //chama as funções de pares e impares para separar os numeros
    $pares = numerosPares($numInicial, $numFinal);
    $impares = numerosImpares($numInicial, $numFinal);

    //Criamos um array contendo dois arrays (numeros pares e impares)
    $paresImpares = array(
        "listaPares"    =>  $pares,
        "listaImpares"  =>  $impares
    );

    return $paresImpares;
}

?>