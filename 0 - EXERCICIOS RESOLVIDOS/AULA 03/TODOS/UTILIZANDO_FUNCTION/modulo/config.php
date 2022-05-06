<?php
    /****************************************************************************************
     * Objetivo: Arquivo responsável por reunir e padronizar todas as variaveis e constantes
     *      que serão utilizadas em todo o projeto
     * Autor: Marcel
     * Data: 04/02/2022
     * Versão: 1.0
     *****************************************************************************************/

    //Constantes do projeto
    
    //Modo 01 de criar uma constante
    define('ERRO_MSG_CAIXA_VAZIA', '<script> alert("Favor preencher todas as caixas!"); </script>');
    
    //Modo 02 de criar uma constante
    const ERRO_MSG_OPERACAO_CALCULO = '<script> alert("Favor escolher uma operação válida"); </script>';
    const ERRO_MSG_CARACTER_INVALIDO_TEXTO = '<script> alert("Não é possível realizar calculos de dados não numericos!"); </script>';
    const ERRO_MSG_DIVISAO_ZERO = '<script> alert("Não é possível realizar divisão, onde o valor 2 é igual a 0!"); </script>';
?>