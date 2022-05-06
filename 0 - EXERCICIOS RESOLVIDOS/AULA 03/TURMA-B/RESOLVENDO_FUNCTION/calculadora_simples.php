<?php 
	//Declaração de variáveis
	$valor1 = (double) 0;
	$valor2 = (double) 0;
	$resultado = (double) 0;
	$opcao = (string) null;


	function operacaoMatematica ($numero1, $numero2, $operacao)
	{
		//Declaração de variaveis locais da função (todas as variaveis recebem os 
			//dados do parametro da function)
		$num1 = (double) $numero1;
		$num2 = (double) $numero2;
		$tipoCalculo = (string) $operacao;
		$result = (double) 0;

		//Processamento do ccalculo das operações
		switch ($tipoCalculo)
		{
			case ("SOMAR"):
				$result = $num1 + $num2;
				break;
			case ("SUBTRAIR"):
				$result = $num1 - $num2;
				break;
			case ("MULTIPLICAR"):
				$result = $num1 * $num2;
				break;
			case ("DIVIDIR"):
				if($num2 == 0)
					echo('<script> alert("Não é possível realizar uma divisão onde o valor 2 seja igual a 0"); </script>');
				else
					$result =  $num1 / $num2;
				
				break;
			
		}

			//round() - permite ajustar a quantidade de casas decimais realizando o arredondamento
			//number_format - permite ajustar a quantidade de casas decimais realizando o arredondamento
			$result = round($result, 2);

		return $result;
	}

	/*
		gettype() - permite verificar qual o tipo de dados de uma variavel
		settype() - permite modificar o tipo de dados de uma variavel
	*/
	/*	Exemplo de uma variavel que nasce do tipo inteiro e depois é 
				convertida para string

		$nome = 10;
		echo(gettype($nome));

		settype($nome, "string");

		echo(gettype($nome));

		strtoupper() - permite converter um texto para MAIUSCULO
		strtolower() - permite converter um texto para minusculo
		
	*/

	//Validação para verificar se o botão foi clicado
	if(isset($_POST['btncalc']))
	{
		//Recebe os dados do formulário
		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST['txtn2'];
		
		//Validação de tratamento de erro para caixa vazia
		if($_POST['txtn1'] == "" || $_POST['txtn2'] == "" )
			echo('<script> alert("Favor preencher todas as caixas!"); </script>');
		else
		{
			//Validação de tratamento de erro para rdo sem escolha
			if(!isset($_POST['rdocalc']))
				echo('<script> alert("Favor escolher uma operação válida"); </script>');
			else
			{
				//Validação de tratamento para a entrada de string ao invés de números
				if (!is_numeric($valor1) || !is_numeric($valor2))
					echo('<script> alert("Não é possível realizar calculos com dados não numéricos!"); </script>');
				else
				{
					//apenas podemos receber o valor do rdo quando ele existir
					$opcao = strtoupper($_POST['rdocalc']);

					//chamada da função de calculos matemáticos, passamos os valores e o 
					//tipo da operação recebemos o valor de resultado
					$resultado =  operacaoMatematica($valor1, $valor2, $opcao);

					
				}
			}
		}
	}


?>
<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>" > <br>
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opcao == 'SOMAR' ? 'checked' : null; ?>>Somar <br>
							<input type="radio" name="rdocalc" value="subtrair"  <?=$opcao == 'SUBTRAIR' ? 'checked' : null; ?>>Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opcao == 'MULTIPLICAR' ? 'checked' : null; ?> >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opcao == 'DIVIDIR' ? 'checked' : null; ?>>Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
						<?=$resultado;?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

