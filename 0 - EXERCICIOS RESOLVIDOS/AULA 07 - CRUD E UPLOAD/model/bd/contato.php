<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD 
     *      (insert, update, select e delete)
     * Autor: Marcel
     * Data: 11/03/2022
     * Versão: 1.0
    ************************************************************************/
    
    // import do arquivo que estavbece a conexão com o BD
    require_once('conexaoMysql.php');

    //Função para realizar o insert no BD
    function insertContato($dadosContato)
    {
        //declaração de variavel para utilizar no return desta função
        $statusResposta = (boolean) false;

        //Abre aconexão com o BD
        $conexao = conexaoMysql();

        //Monta o script para enviar para o BD
        $sql = "insert into tblcontatos 
                    (nome, 
                     telefone, 
                     celular, 
                     email, 
                     obs,
                     foto)
                values 
                    ('".$dadosContato['nome']."', 
                    '".$dadosContato['telefone']."', 
                    '".$dadosContato['celular']."', 
                    '".$dadosContato['email']."', 
                    '".$dadosContato['obs']."',
                    '".$dadosContato['foto']."');";

       
        //Executa o scriipt no BD
            //Validação para veririficar se o script sql esta correto
        if (mysqli_query($conexao, $sql))
        {   
            //Validação para verificar se uma linha foi acrescentada no DB
            if(mysqli_affected_rows($conexao))
                $statusResposta = true;
        }
        
        //Solicita o fechamento da conexão com o BD
        fecharConexaoMysql($conexao);

        return $statusResposta;

    }

    //Função para realizar o update no BD
    function updateContato($dadosContato)
    {
        //declaração de variavel para utilizar no return desta função
        $statusResposta = (boolean) false;

        //Abre aconexão com o BD
        $conexao = conexaoMysql();

        //Monta o script para enviar para o BD
        $sql = "update tblcontatos set 
                        nome        = '".$dadosContato['nome']."', 
                        telefone    = '".$dadosContato['telefone']."', 
                        celular     = '".$dadosContato['celular']."', 
                        email       = '".$dadosContato['email']."', 
                        obs         = '".$dadosContato['obs']."',
                        foto        = '".$dadosContato['foto']."'
                where idcontato =".$dadosContato['id'];

       
        //Executa o scriipt no BD
            //Validação para veririficar se o script sql esta correto
        if (mysqli_query($conexao, $sql))
        {   
            //Validação para verificar se uma linha foi acrescentada no DB
            if(mysqli_affected_rows($conexao))
                $statusResposta = true;
        }
        
        //Solicita o fechamento da conexão com o BD
        fecharConexaoMysql($conexao);

        return $statusResposta;

    }

    //Função para excluir no BD
    function deleteContato($id)
    {
        //declaração de variavel para utilizar no return desta função
        $statusResposta = (boolean) false;

        //Abre a conexão com o BD
        $conexao = conexaoMysql();

        //Script para deletar um registro do BD
        $sql = "delete from tblcontatos where idcontato=".$id;

        //Valida se o script esta correto, sem erro de sintaxe e executa no BD
        if(mysqli_query($conexao, $sql))
        {
            //Valida se o BD teve sucesso na execução do script
            if(mysqli_affected_rows($conexao))
                $statusResposta = true;
        }
        
        //fecha a conexão com o BD mysql
        fecharConexaoMysql($conexao);

        return $statusResposta;
    }

    //Função para listar todos os contatos do BD
    function selectAllContatos()
    {
        //Abre a conexão com o BD
        $conexao = conexaoMysql();

        //script para listar todos os dados do BD
        $sql = "select * from tblcontatos order by idcontato desc";
        
        //Executa o scrip sql no BD e guarda o retorno dos dados, se houver
        $result = mysqli_query($conexao, $sql);

        //Valida se o BD retornou registros
        if($result)
        {
            //mysqli_fetch_assoc() - permite converter os dados do BD 
            //em um array para manipulação no PHP
            //Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
            //o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
            $cont = 0;
            while ($rsDados = mysqli_fetch_assoc($result))
            {
                //Cria um array com os dados do BD
                $arrayDados[$cont] = array (
                    "id"        =>  $rsDados['idcontato'],
                    "nome"      =>  $rsDados['nome'],
                    "telefone"  =>  $rsDados['telefone'],
                    "celular"   =>  $rsDados['celular'],
                    "email"     =>  $rsDados['email'],
                    "obs"       =>  $rsDados['obs'],
                    "foto"       =>  $rsDados['foto']
                );
                $cont++;
            }

            //Solicta o fechamento da conexão com o BD
            fecharConexaoMysql($conexao);

            
            //select id from tblproduto order by id desc limit 1

            return $arrayDados;
        }

    }

    //Função para buscar um contato no BD através do id do registro
    function selectByIdContato($id)
    {
        //Abre a conexão com o BD
        $conexao = conexaoMysql();

        //script para listar todos os dados do BD
        $sql = "select * from tblcontatos where idcontato = ".$id;
        
        //Executa o scrip sql no BD e guarda o retorno dos dados, se houver
        $result = mysqli_query($conexao, $sql);

        //Valida se o BD retornou registros
        if($result)
        {
            //mysqli_fetch_assoc() - permite converter os dados do BD 
            //em um array para manipulação no PHP
            //Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
            //o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
            
            if ($rsDados = mysqli_fetch_assoc($result))
            {
                //Cria um array com os dados do BD
                $arrayDados = array (
                    "id"        =>  $rsDados['idcontato'],
                    "nome"      =>  $rsDados['nome'],
                    "telefone"  =>  $rsDados['telefone'],
                    "celular"   =>  $rsDados['celular'],
                    "email"     =>  $rsDados['email'],
                    "obs"       =>  $rsDados['obs'],
                    "foto"      =>  $rsDados['foto']
                );
            }
        }    
            //Solicta o fechamento da conexão com o BD
            fecharConexaoMysql($conexao);

            return $arrayDados;
    }


?>