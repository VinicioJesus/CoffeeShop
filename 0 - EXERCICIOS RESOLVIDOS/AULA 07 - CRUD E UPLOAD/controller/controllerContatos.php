<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel pela maniupulação de dados de contatos
     *  Obs(Este arquivo fará a ponte entre a View e a Model)
     * Autor: Marcel
     * Data: 04/03/2022
     * Versão: 1.0
    ************************************************************************/

    //Função para receber dados da View e encaminhar para a model (Inserir)
    function inserirContato ($dadosContato, $file)
    {
        $nomeFoto = (string) null;
        
        //Validação para verificar se o objeto esta vazio
        if(!empty($dadosContato))
        {
            //Validação de caixa vazia dos elementos nome, celular e email, 
            //pois são obrigatórios no BD
            if(!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail']))
                {
                    //Validação para identificar se chegou um arquivo para upload
                    if ($file['fleFoto']['name'] != null)
                    {
                        //import da função de upload
                        require_once('modulo/upload.php');
                        
                        //Chama a função de upload
                        $nomeFoto = uploadFile($file['fleFoto']);

                        if(is_array($nomeFoto))
                        {
                            //Caso aconteça algum erro no processo de upload, a função irá retornar
                            //um array com a possivel mensagem de erro. Esse array será retornado para
                            //a router e ela irá exibir a mensagem para o usuário
                            return $nomeFoto;
                        }

                    }

                    //uploadFile($dadosContato['fleFoto']);

                    //Criação do array de dados que será encaminhado a model
                    //para inserir no BD, é importante criar este array conforme
                    //as necessidades de manipulação do BD.
                    //OBS: criar as chaves do array conforme os nomes dos atributos
                        //do BD
                    $arrayDados = array (
                        "nome"      => $dadosContato['txtNome'],
                        "telefone"  => $dadosContato['txtTelefone'],
                        "celular"   => $dadosContato['txtCelular'],
                        "email"     => $dadosContato['txtEmail'],
                        "obs"       => $dadosContato['txtObs'],
                        "foto"      => $nomeFoto
                    );

                    //import do arquivo de modelagem para manipular o BD
                    require_once('model/bd/contato.php');
                    //Chama a função que fará o insert no BD (esta função esta na model)
                    if(insertContato($arrayDados))
                        return true;
                    else
                        return array('idErro'  => 1, 
                                     'message' => 'Não foi possivel inserir os dados no Banco de Dados');
                }
                
            else
                return array('idErro'   => 2,
                             'message'  => 'Existem campos obrigatório que não foram preenchidos.');
        }
    }

    //Função para receber dados da View e encaminhar para a model (Atualizar)
    function atualizarContato ($dadosContato, $arrayDados)
    {
        //Recebe o id enviado pelo arrayDados
        $id = $arrayDados['id'];

        //Recebe a foto enviada pelo arrayDados (Nome da foto que já existe no BD)
        $foto = $arrayDados['foto'];

        //Recebe o objeto de array referente a nova foto que poderá ser enviada ao servidor
        $file = $arrayDados['file'];

        //Validação para verificar se o objeto esta vazio
        if(!empty($dadosContato))
        {
            //Validação de caixa vazia dos elementos nome, celular e email, 
            //pois são obrigatórios no BD
            if(!empty($dadosContato['txtNome']) && !empty($dadosContato['txtCelular']) && !empty($dadosContato['txtEmail']))
                {
                    //Validação para garantir que id seja válido
                    if(!empty($id) && $id != 0 && is_numeric($id))
                    {
                        //Validação para identificar se será enviado ao servidor uma nova foto
                        if($file['fleFoto']['name'] != null)
                        {
                            //import da função de upload
                            require_once('modulo/upload.php');
                        
                            //Chama a função de upload para enviar a nova foto ao servidor
                            $novaFoto = uploadFile($file['fleFoto']);
                        }else
                        {
                            //Permance a mesma foto no BD
                            $novaFoto = $foto;
                        }

                        //Criação do array de dados que será encaminhado a model
                        //para inserir no BD, é importante criar este array conforme
                        //as necessidades de manipulação do BD.
                        //OBS: criar as chaves do array conforme os nomes dos atributos
                            //do BD
                        $arrayDados = array (
                            "id"        => $id,
                            "nome"      => $dadosContato['txtNome'],
                            "telefone"  => $dadosContato['txtTelefone'],
                            "celular"   => $dadosContato['txtCelular'],
                            "email"     => $dadosContato['txtEmail'],
                            "obs"       => $dadosContato['txtObs'],
                            "foto"      => $novaFoto
                        );

                        //import do arquivo de modelagem para manipular o BD
                        require_once('model/bd/contato.php');
                        //Chama a função que fará o insert no BD (esta função esta na model)
                        if(updateContato($arrayDados))
                        {
                            unlink(DIRETORIO_FILE_UPLOAD.$foto);
                            return true;
                        }
                        else
                            return array('idErro'  => 1, 
                                        'message' => 'Não foi possivel atualizar os dados no Banco de Dados');
                    }else
                        return array('idErro'   => 4,
                                     'message'  => 'Não é possível editar um registro sem informar um id válido.'
                                );
                }
                    
            else
                return array('idErro'   => 2,
                             'message'  => 'Existem campos obrigatório que não foram preenchidos.');
        }
    }

    //Função para realizar a exclusão de um contato
    function excluirContato ($arrayDados)
    {
        //Recebe o id do registro que será excluído
        $id = $arrayDados['id'];

        //Recebe o nome da foto que será excluída da pasta do servidor
        $foto = $arrayDados['foto'];

        //Validação para verificar se id contém um numero válido
        if($id != 0 && !empty($id) && is_numeric($id))
        {
            //import do arquivo de contato
            require_once('model/bd/contato.php');
            
            //import do arquivo de configurações do projeto
            require_once('modulo/config.php');
            
            //Chama a função da model e valida se o retorno foi verdadeiro ou false
            if (deleteContato($id))
            {
                //Validação para caso a foto não exista com o registro
                if($foto!=null)
                {
                    //unlink() - função para apagar um arquivo de um diretório
                    //Permite apagar a foto fisicamente do diretório no servidor
                    if(unlink(DIRETORIO_FILE_UPLOAD.$foto))
                        return true;
                    else
                        return array('idErro'   => 5,
                            'message'  => 'O registro do Banco de Dados foi excluído com sucesso, 
                                        porém a imagem não foi excluída do diretório do servidor!'
                            );
                }else
                    return true;  

            }
            else
                return array('idErro'   => 3,
                             'message'  => 'O banco de dados não pode excluir o registro.'
                );
        }else
            return array('idErro'   => 4,
                         'message'  => 'Não é possível excluir um registro sem informar um id válido.'
        );

    }

    //Função para solicitar os dados da model e encaminhar a lista 
    //de contatos para a View
    function listarContato ()
    {
        //import do arquivo que vai buscar os dados no DB
        require_once('model/bd/contato.php');
        
        //chama a função que vai buscar os dados no BD
        $dados = selectAllContatos();

        if(!empty($dados))
            return $dados;
        else
            return false;
    }

    //Função para buscar um contato através do id do registro
    function buscarContato($id)
    {
         //Validação para verificar se id contém um numero válido
         if($id != 0 && !empty($id) && is_numeric($id))
         {
             //import do arquivo de contato
            require_once('model/bd/contato.php');

            //Chama a função na model que vai buscar no BD
            $dados = selectByIdContato($id);

            //Valida se existem dados para serem devolvidos
            if(!empty($dados))
                return $dados;
            else
                return false;

         }else
            return array('idErro'   => 4,
                            'message'  => 'Não é possível buscar um registro sem informar um id válido.'
            );
    }

?>