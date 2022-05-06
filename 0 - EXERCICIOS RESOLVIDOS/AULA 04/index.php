<?php 

    $valor = (int) 0;
    $cont = (int) 0;
    $resultado = (string) null;

    if(isset($_POST['btnCalc']))
    {
        $valor = $_POST['txtNumero'];
        //Exemplo utilizando WHILE
        // while($cont <= $valor)
        // {
        //     echo($cont.'<br>');
        //     // $cont = $cont + 1;
        //     // $cont++;
        //     $cont+=1;
        // }

        for($cont=0;$cont<=$valor;$cont++)
        {
            //echo($cont.'<br>');
            // $resultado = $resultado . $cont.'<br>';
            $resultado.= $cont.'<br>';
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 100px;
            height: 500px;
            border: solid 1px #000000;
        }
    </style>
</head>
<body>
    <form name="frmRepeticao" method="post" action="index.php">
        Digite um número: <input type="text" name="txtNumero">
        <input type="submit" name="btnCalc" value="Calcular">
    </form>

    <div>
        <?=$resultado;?>
    </div>
</body>
</html>