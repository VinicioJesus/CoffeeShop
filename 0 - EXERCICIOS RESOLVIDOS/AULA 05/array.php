<?php 
    //Criando um array e atribuindo valores 
    $nomes = array('José da Silva', 'Maria da Silva', 'André Sousa');

    //Exibe um texto ou um conteudo de uma variavel 
        //(que não seja um array)
    // echo($nomes);

    //Exibe um texto ou um conteudo de uma variavel mesmo sendo um 
        //um array, sem detalhes técnicos
    // print_r($nomes);

    //Exibe os dados de um objeto ou array ou variavel trazendo
        //detalhes técnicos (tipo de dados, qtde de caracteres, etc..)
    //var_dump($nomes);

    //Utilizando o echo para escrever o valor de um indice do array
    //echo($nomes[1]);

    $dados = array('José da Silva', 20, 1850.56);
    //var_dump($dados);

    //Declarando um array
    $nomesFuncionarios = array();

    //Atribuindo dados individuais no array
    $nomesFuncionarios[0] = 'Luiz Silva';
    $nomesFuncionarios[1] = null;
    $nomesFuncionarios[2] = 30;

    //var_dump($nomesFuncionarios);

    $nomesClientes = array ('Francisco', 'Luiz', 'Andreia', 'André','José');

    //Forma 1 de extrair dados com repetição
    $cont = 0;

    //count() - permite retornar a qtde de elementos de um array
    $qtde = count($nomesClientes);
   
    echo('***********Exibindo dados pelo While<br>');
    while($cont < $qtde) 
    {
        echo($nomesClientes[$cont].'<br>');
        $cont++;
    }

    echo('***********Exibindo dados pelo For<br>');
    for($cont = 0; $cont<$qtde; $cont++)
    {
        echo($nomesClientes[$cont].'<br>');
    }

    echo('***********Exibindo dados pelo For each <br>');
    //foreach - permite criar uma copia do array fazendo já a contagem
        //de quantos elementos existem no array, e permitindo que 
        //na exibiçao dos valores não seja necessário especificar o
        //indice do array
    foreach ($nomesClientes as $cliente)
    {
        echo($cliente.'<br>');
    }

    //Trabalhando com array (Chave-Valor)
        //quando utilizamos o metodo de chave valor, somente acessamos
        //o valor através da referencia da chave.
        //     chave          valor
        //Ex: "nome"   =>   "Teclado"
        //Para conseguir exibir a palavra teclado, temos que acessa-lá
        //pela chave. Ex:
        //       array    chave
        //echo($produtos["nome"])
    $produtos = array(
            "nome"          => "Teclado",
            "descricao"     => "Teclado da cor preto e cinza.",
            "qtde"          => 50,
            "valorUnitario" => 80.45,
            "cor"           => "Preto"
    );
    echo('<pre>');
    var_dump($produtos);
    echo('</pre>');

    //echo($produtos["nome"]);

    //Trabalhando com array de indice, chave e valor

    //EXEMPLO UTILIZANDO O CHAVE COMO INDICE NO PRIMEIRO ARRAY
    $produtosInformatica = array(
           "listTeclados" => array(  
                                "nome"          => "Teclado",
                                "descrcicao"    => "Teclado RGB",
                                "cor"           => "Preto",
                                "valor"         => 100.50,
                                "qtde"          => 20
                        ),
            "listMouses" => array (
                        "nome"          => "Mouse",
                        "descrcicao"    => "Mouse com 5 botões",
                        "cor"           => "cinza",
                        "valor"         => 70.30,
                        "qtde"          => 100

            )
    );
    echo('<pre>');
        print_r($produtosInformatica);
    echo('</pre>');

    //Para exibir dados de um array (indice, chave e valor) temos que 
    //primeiro espeficiar qual é indice do array principal, depois 
    //colocamos a qual chave iremos extrair o valor
    echo($produtosInformatica["listTeclados"]["nome"]);
    echo($produtosInformatica["listTeclados"]["valor"]);

    foreach($produtosInformatica as $produtos)
    {
        echo('<br>'.$produtos["nome"].'<br>');
        echo('<br>'.$produtos["qtde"].'<br>');
    }



    //EXEMPLO UTILIZANDO O INDICE NO PRIMEIRO ARRAY
    $produtosInformatica = array(
        array(  
                             "nome"          => "Teclado",
                             "descrcicao"    => "Teclado RGB",
                             "cor"           => "Preto",
                             "valor"         => 100.50,
                             "qtde"          => 20
                     ),
         array (
                     "nome"          => "Mouse",
                     "descrcicao"    => "Mouse com 5 botões",
                     "cor"           => "cinza",
                     "valor"         => 70.30,
                     "qtde"          => 100

         )
 );
 echo('<pre>');
     print_r($produtosInformatica);
 echo('</pre>');

 //Para exibir dados de um array (indice, chave e valor) temos que 
 //primeiro espeficiar qual é indice do array principal, depois 
 //colocamos a qual chave iremos extrair o valor
 echo($produtosInformatica[0]["nome"]);
 echo($produtosInformatica[0]["valor"]);









?>