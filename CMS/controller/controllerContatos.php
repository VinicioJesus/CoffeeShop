<?php

    /**************************************************
     * Objetivo: Arquivo responsável pela manipulação de dados de contatos
     * Obs( Este arquivo fará a ponte entre a View e a Model)
     * Autor: Vinicio
     * Data: 04/03/2022
     * Versão: 1.0 
     *************************************************/
    
     //função para receber dados da View e encaminhar para a model (inserir)
    function inserirContato($dadosContato)
    
    {   
        //Validação para verificar se o objeto está vazio
        if(!empty($dadosContato))
        {
            //Validação de caixa vazia dos elementos nome, celular e email, pois são campos de preenchimento 
            //Obrigatórios no Banco de Dados 
            //Se o nome não estiver vazio
            if(!empty($dadosContato['txtNome']) && !empty($dadosContato['txtMensagem']) && !empty($dadosContato['txtEmail']))
            {
                //Criação de um array de dados que será encaminhado a model
                    // para inserir no BD, é importante criar este array conforme
                    // as necessidades de manipulação do BD.
                // OBS: criar as chaves do aray conforme os nomes dos atributos
                // do BD
                $arrayDados = array (
                    "nome"      => $dadosContato['txtNome'],
                    "email"     => $dadosContato['txtEmail'],
                    "mensagem"  => $dadosContato['txtMensagem']
                );
                
                //import do arquivo de modelagem para manipular o BD
                require_once('model/bd/contato.php');
                //Chama a função que executará o insert no BD 
                if(insertContato($arrayDados)){
                    return true;
                
                }else{
                    return array('idErro' => 1,
                                 'message' => 'não foi possivel inserir os dados no Banco de Dados' );
                }

            }else {
                echo('Dados incompletos');
                return array('idErro'   => 2,
                             'message' => 'Existem campos obrigatórios que não foram preenchidos'  );
            }   
        }
    }

    //função para receber dados da View e encaminhar para a model (atualizar)
    function atualizarContato()
    {

    }

    //função para realizar a exclusão de um contato
    function excluirContato($id)
    {   
        //validação para verificar se o id contem um numero valido
        if($id != 0 && !empty($id) && is_numeric($id))
        {   
            //import do arquivo de contato
            require_once("model/bd/contato.php");
            //chama a função da model e valida se o retorno foi verdadeiro ou false
            if(deleteContato($id))
            {   
                return true;
            }
            else
            {
                return array('idErro'   => 3,
                             'message'   => 'não foi possivel excluir o registro' );
                
            }
        }
        else
        {
            return array('idErro'   => 4,
                        'message'   => 'não é possivel excluir um registro sem informar um id valido' );
        }
    }
    //Bucar um contato através de um contato por ID
    function buscarContato($id)
    {
        //validação para verificar se o id contem um numero valido
        if($id != 0 && !empty($id) && is_numeric($id))
        {
            //import do arquivo de contato
            require_once("model/bd/contato.php");
            //Chama a função na model que vai buscar no BD
            $dados = selectByIdContato($id);
            //Valida se existem dados para serem deovolvidos 
            if(!empty($dados))
            {
                return $dados;
            }else
            {
                return array('idErro'   => 4,
                             'message'  => 'não é possivel excluir um registro sem informar um id valido' );
                
            }
        }
    }

    //função para solicitar os dados da model e encaminhar a lista 
    //de contatos para a View
    function listarContato()
    {   
        //importa do arquivo que vai buscar os dados no BD
        require_once('model/bd/contato.php');
        //Chama a função que vai buscar os dados no BD
        $dados = selectAllContatos();

        

        if (!empty($dados)) {
            return $dados;
            
        }else{
            return false;
        }
    }


?>