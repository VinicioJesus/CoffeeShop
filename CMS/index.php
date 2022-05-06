<?php 
    //Valida se a utilização de variaveis de sessão está 
    //ativa no servidor
    if(session_status())
    {

        //Valida se a variavel de sessão dadosContato não está vazia  
        if (!empty($_SESSION['dadosContato']))
        {            
            $id = $_SESSION['dadosContato']['id'];
            $nome = $_SESSION['dadosContato']['nome'];
            $telefone = $_SESSION['dadosContato']['telefone'];
            $celular = $_SESSION['dadosContato']['celular'];
            $email = $_SESSION['dadosContato']['email'];
            $obs = $_SESSION['dadosContato']['obs'];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/secaoIcones.css">
    <title>DashboardContato</title>
</head>
<body>
    <header>
        <div class="titulo-css">
            <div class="titulo-junto">
                <h1>CMS</h1>
                <h2>Nome do Projeto</h2>
            </div>                            
            <div>
                <p>Gerenciamento de conteudo do site</p>           
            </div>                          
        </div>
        <div class="container-imagem">
            <img src="../img/Nespresso/Cappucino de Avelas.jpeg" alt="">
        </div>  
    </header>
    
    <section class="icone-section">

    <div class="icone-container">
        <div class="icone">
        <a href="#"><button>Adm.produtos</button></a>
        </div>
        <div class="icone">
            <a href="./Categoria.php"><button>Adm.Categorias</button></a>
        </div>
        <div class="icone">
            <a href="#"><button>Adm.Contatos</button></a>
        </div>
        <div class="icone">
            <a href="#"><button>Usuários</button></a>
        </div>
        <div class="icone">
            <a href="#"><button>Logout</button></a> 
        </div>
    </div>
        
    </section>

    <main>      

        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Contatos.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Mensagem </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>

                <?php 
                    //import do arquivo do controller para solicitar a listagem dos dados
                    require_once('./controller/controllerContatos.php');
                    //chama a função que vai retornar os dados do contato
                    $listContato = listarContato();

                    // estrutura de repetição para retorar os dados do array
                    // e printar na tela
                    foreach ($listContato as $item)
                    {                  
                    
                ?>        
            
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$item['nome']?></td>
                    <td class="tblColunas registros"><?=$item['email']?></td>
                    <td class="tblColunas registros"><?=$item['mensagem']?></td>
                
                    <td class="tblColunas registros">
                        <a href="router.php?component=contatos&action=deletar&id=<?=$item['id']?>">

                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">

                        </a>
                        
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>

    </main>
    

</body>
<main>

</main>
<footer>

</footer>
</html>