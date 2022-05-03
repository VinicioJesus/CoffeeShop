
<?php

/********************************************************************************
* Objetivo: Arquivo responsável por manipular os dados dentro do Banco de Dados
*       (INSERT, UPDATE, DELETE e SELECT)
* Autor: Vinicio
* Data: 11/03/2022
* Versão: 1.0 
*************************************************/

// import do arquivo que estabelece a conexão de dados
require_once('conexaoMysql.php');
// função para realizar o insert no BD 
function insertUsuario($dadosUsuario)
{   

   // declaraçãpo de variavel para utilizar no return
   $statusResposta = (boolean) false;
   //Abre a conexão com o BD
   $conexao = conexaoMysql();
   
   //Monta o Script para enviar para o BD
   $sql = "insert into tblusuario 
                       (nome,                            
                       senha)
         values
               ('".$dadosUsuario['nome']."',
               '".$dadosUsuario['senha']."');";

   //executa um script no BD
   //validação para verifiar se o script está correto
   if (mysqli_query($conexao, $sql))
   {    
       //para verificar se uma linha foi acrescentada no BD
       if(mysqli_affected_rows($conexao)){
           
           $statusResposta = true;
       }

   }
   //solicita o fechamento da conexão do banco
   fecharConexaoMysql($conexao);
   return $statusResposta;
}
// função para realizar o update no BD 
function updateUsuario()
{

}
// função para excluuir no BD 
function deleteUsuario($id)
{   
   //abre a conexão com banco de dados
   $conexao = conexaoMysql();
   //script para deletar regstros do BD
   $sql = "delete from tblusuarios where idusuario=".$id;
   //valida se o script está correto, sem erro de sintaxe e executa no BD
   if(mysqli_query($conexao, $sql))
   {   
      //valida se o BD teve sucesso na execução do script 
      if( mysqli_affected_rows($conexao))
      {
          $statusResposta = true;

      }
      fecharConexaoMysql($conexao);
      return $statusResposta; 
   }

}   
// função para realizar o insert no BD 
function selectAllUsuarios()
{   
   //Abre a conexão com o BD
   $conexao = conexaoMysql();
   //script para listar todos os dados do banco de dados
   $sql = "select * from tblusuarios order by idusuario desc";        
   //executa o script sql no BD e guarda o retorno dos dados, se houver
   $result = mysqli_query($conexao, $sql);
   //Valida se o BD retornou registros
   if($result)
   {   
       // msqli_fetch_assoc() - permite converter os dados do BD
           // em um arrau para manipulação no PHP.
       // Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
       //o if vai garantir que tem dados na condição.
       $cont = 0;
       while ($rsDados = mysqli_fetch_assoc($result))
       {   
           //Cria um array com os dados do BD
           $arrayDados[$cont] = array (
               "id"        => $rsDados['idusuario'],
               "nome"      => $rsDados['nome'],
               "senha"     => $rsDados['senha']
               
           );
           $cont++;
       }
   }

   //solicita o fechamento da conexão com o BD
   fecharConexaoMysql($conexao);

   return $arrayDados;

}
//Função para buscar contato no banco de dados através do registro
function selectByIdUsuario($id)
{
   //Abre a conexão com o BD
   $conexao = conexaoMysql();
   //script para listar todos os dados do banco de dados
   $sql = "select * from tblusuario where idusuario= ".$id;     
   
   //executa o script sql no BD e guarda o retorno dos dados, se houver
   $result = mysqli_query($conexao, $sql);
   //Valida se o BD retornou registros
   if($result)
   {   
       // msqli_fetch_assoc() - permite converter os dados do BD
           // em um array para manipulação no PHP.
       // Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
       //o proprio while consegue gerenciar a qtde e vezes que o deverá ser feita a repetição
       
       if($rsDados = mysqli_fetch_assoc($result))
       {   
           //Cria um array com os dados do BD
           $arrayDados = array (
               "id"        => $rsDados['idusuario'],
               "nome"      => $rsDados['nome'],
               "senha"     => $rsDados['senha']
           );
           
       }
   }

   //solicita o fechamento da conexão com o BD
   fecharConexaoMysql($conexao);
   
   return $arrayDados;

}

?>