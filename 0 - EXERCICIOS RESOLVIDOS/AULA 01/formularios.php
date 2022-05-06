<?php
    /*
        Comentário em bloco
        shdf
        shf
        sdf
    */

    //Comentário em linha

    //Escreve um conteudo na tela
    //echo('Testando o PHP');

    //Escreve um conteudo na tela
    //print_r('Testando outra forma de escrever');

    //isset() - permite verificar a existencia de uma variavel
        //ou de um objeto

    //Validação para identificar se o botão foi clicado e disponibilizado na ação do GET        
    if(isset($_GET['btnSalvar'])){

        // Recuperando dados via GET do formulário
        $nome = $_GET['txtNome'];
        $cidade = $_GET['sltCidade'];
        $sexo = '<b>Sexo:</b> '. $_GET['rdoSexo'];
        $obs = $_GET['txtObs'];

        //Foi criados essas variaveis para resolver o problema de variavei indefinida na exibição dos dados
        $idiomaPortugues = null;
        $idiomaIngles = null;
        $idiomaEspanhol = null;
        
        //Tratamento para recuperar os checkbox que foram selecionados no formulário
        if(isset($_GET['chkPortugues']))
        {
            $idiomaPortugues = $_GET['chkPortugues'];
        }

        if(isset($_GET['chkIngles']))
        {
            $idiomaIngles = $_GET['chkIngles'];
        }

        if(isset($_GET['chkEspanhol']))
        {
            $idiomaEspanhol = $_GET['chkEspanhol'];
        }


        //Escrevendo o conteudo das variaveis no navegador

        //Concatenação é representado pelo ponto (.)
        echo('<b>Nome:</b> '. $nome . '<br>');
        echo('<b>Cidade: </b>'. $cidade .'<br>');
        echo($sexo . '<br>');
        echo('<b>Obs:</b> '. $obs . '<br>');
        echo('<b>Idiomas:</b> '. $idiomaPortugues . ' ' . $idiomaIngles . ' ' .$idiomaEspanhol );

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Código para desativar o redimensionamento da textarea */
        textarea{
            resize: none;
        }

    </style>
</head>
<body>
    <!--
        GET -> permite retirar os dados dos formulário e 
        disponibilizar na URL da página

        POST -> permite retirar os dados dos formulário e 
        disponibilizar em variáveis locais

        action -> é utilizado para especificar em qual arquivo ou página
            será disponibilizado os dados do FORM

        input type="text" - permite colocar uma caixa de do tipo texto
              size="" - permite especificar o tamanho da caixa
              maxlength - permite configurar a qtde de caracteres que será
                digitado na caixa

        <select> - permite criar uma lista de opções
                <option> - é através dela que podemos criar itens dentro
                    da lista
                <option value=""> - a propriedade value é obrigatória
                    para que o formulário consiga resgatar o valor do
                    item selecionado pelo usuário e disponibilizar 
                    para o back-end

        <input type="radio"> - permite criar opções de escolha.
                    Obs: para configurar o radio fazendo com que permita apenas
                    uma opção de escolha é obrigatório todas as inputs terem 
                    o mesmo nome

    -->
    <form name="frmCadastro" method="GET" action="formularios.php">
        nome: <input type="text" name="txtNome" size="50" maxlength="30"><br>
        cidade: 
        <select name="sltCidade">
            <option value="" selected>selecione um Item</option>
            <option value="jandira">Jandira</option>
            <option value="barueri">Barueri</option>
            <option value="itapevi" >Itapevi</option>
            <option value="carapicuiba">Carapicuiba</option>
            <option value="osasco">Osasco</option>
        </select>
        <br>
        Sexo:
        <input type="radio" name="rdoSexo" value="F" > Feminino
        <input type="radio" name="rdoSexo" value="M" checked> Masculino
        <input type="radio" name="rdoSexo" value="O"> Outro
        <br>

        Idioma:
        <input type="checkbox" name="chkPortugues" value="PT" checked>Português
        <input type="checkbox" name="chkIngles" value="EN">Inglês
        <input type="checkbox" name="chkEspanhol" value="ES">Espanhol
        <br>

        Observação:
        <textarea name="txtObs" cols="30" rows="5"></textarea>

        <!-- <input type="submit"> - permite retirar os dados do formulário
                através do próprio HTML, fazendo um submit nos dados

            <input type="button"> - somente será possivel retirar os dados 
                do formulário através do JavaScript

            <input type="reset"> - permite limpar todos os elementos do
                formulário
        -->
        <br>
        <input type="submit" name="btnSalvar" value="Salvar">
        <input type="reset" name="btnLimpar" value="Limpar">

    </form>
</body>
</html>