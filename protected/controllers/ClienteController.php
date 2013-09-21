<?php

class ClienteController extends GxController {

    public function filters() {
        return array(
            'userGroupsAccessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow guests to perform 'create' actions
                'actions' => array('create'),
                'users' => array('?'),
            ),
            array('allow', // allow pbac 'admin' to perform 'create' actions
                'actions' => array('create'),
                'pbac' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Cliente'),
        ));
    }

    public function actionCreate() {
        $model = new Cliente;
        $model_pf = new PessoaFisica;
        $model_pj = new PessoaJuridica;
        $model_endereco = new Endereco;

        //confere user
        if (isset($_POST['Cliente'])) {
            $model->tipo = $_POST['Cliente']['tipo'];

            if (isset($_POST['Cliente']['username']) && $_POST['Cliente']['username']) {
                $model->username = trim($_POST['Cliente']['username']);
                if (strlen($model->username) < 4 || strlen($model->username) > 10) {
                    $erros[] = "O nome de usuário deve ter de 4 a 10 caracteres, somente letras e números, e iniciar com uma letra.";
                }
            } else {
                $erros[] = "Nome de usuário inválido.";
            }

            if (isset($_POST['Cliente']['email']) && $_POST['Cliente']['email']) {
                $model->email = trim($_POST['Cliente']['email']);
                if (!filter_var($model->email, FILTER_VALIDATE_EMAIL)) {
                    $erros[] = "E-mail inválido.";
                }
            } else {
                $erros[] = "E-mail inválido.";
            }

            if (isset($_POST['Cliente']['senha']) && isset($_POST['Cliente']['confirma_senha']) && $_POST['Cliente']['senha'] && $_POST['Cliente']['confirma_senha']) {
                $model->senha = trim($_POST['Cliente']['senha']);
                $model->confirma_senha = trim($_POST['Cliente']['confirma_senha']);
                if (!preg_match('/^(?=.*[a-zA-Z0-9]).{5,}$/', $model->senha)) {
                    $erros[] = "A senha deve ter de 5 a 8 caracteres, somente letras e números.";
                } else if ($model->senha !== $model->confirma_senha) {
                    $erros[] = "Confirmação de senha não confere.";
                }
            } else {
                $erros[] = "Senha inválida.";
            }

            if (UserGroupsUser::model()->find(array('condition' => 'username LIKE "' . $model->username . '"'))) {
                $erros[] = "Nome de usuário já existe no sistema.";
            }

            if (UserGroupsUser::model()->find(array('condition' => 'email LIKE "' . $model->email . '"'))) {
                $erros[] = "E-mail já existe no sistema.";
            }

            if (!isset($erros)) {

                $model_user = new UserGroupsUser;
                $model_user->setScenario('admin');
                $model_user->group_id = 4; //cliente
                $model_user->status = 4; //ativo
                $model_user->username = $model->username;
                $model_user->email = $model->email;
                $model_user->password = $model->senha;

                //salvando usuário
                if ($model_user->save()) {
                    //pessoa, cliente
                    //pessoa juridica
                    if ($model->tipo && isset($_POST['PessoaJuridica'])) {
                        if (isset($_POST['PessoaJuridica']['razao_social'])) {
                            $model_pj->razao_social = trim($_POST['PessoaJuridica']['razao_social']);
                            if (!strlen($model_pj->razao_social)) {
                                $erros[] = "Razão social inválida.";
                            }
                        } else {
                            $erros[] = "Razão social inválida.";
                        }

                        if (isset($_POST['PessoaJuridica']['cnpj'])) {
                            $model_pj->cnpj = trim($_POST['PessoaJuridica']['cnpj']);
                        } else {
                            $erros[] = "CNPJ inválido.";
                        }
                        if (isset($_POST['PessoaJuridica']['nome_fantasia'])) {
                            $model_pj->nome_fantasia = trim($_POST['PessoaJuridica']['nome_fantasia']);
                        }

                        if (isset($_POST['PessoaJuridica']['insc_estadual'])) {
                            $model_pj->insc_estadual = trim($_POST['PessoaJuridica']['insc_estadual']);
                        }

                        if (!isset($erros)) {
                            $model_pj->email = $model->email;

                            //salvando pessoa juridica
                            if ($model_pj->save()) {
                                $model->id_pessoa_juridica = $model_pj->getPrimaryKey();
                                $model->id_user = $model_user->getPrimaryKey();
                                $model->data_criacao = date('Y-m-d');

                                //salvando cliente
                                if ($model->save()) {
                                    //endereco, telefones
                                    //endereco
                                    if (isset($_POST['Endereco'])) {
                                        if (isset($_POST['Endereco']['nome'])) {
                                            $model_endereco->nome = trim($_POST['Endereco']['nome']);
                                            if (!strlen($model_endereco->nome)) {
                                                $erros[] = "Nome de endereço inválido.";
                                            }
                                        } else {
                                            $erros[] = "Nome de endereço inválido.";
                                        }

                                        if (isset($_POST['Endereco']['cep'])) {
                                            $model_endereco->cep = trim($_POST['Endereco']['cep']);
                                            if (!strlen($model_endereco->cep)) {
                                                $erros[] = "CEP inválido.";
                                            }
                                        } else {
                                            $erros[] = "CEP inválido.";
                                        }

                                        if (isset($_POST['Endereco']['rua'])) {
                                            $model_endereco->rua = trim($_POST['Endereco']['rua']);
                                            if (!strlen($model_endereco->rua)) {
                                                $erros[] = "Rua inválida.";
                                            }
                                        } else {
                                            $erros[] = "Rua inválida.";
                                        }

                                        if (isset($_POST['Endereco']['numero'])) {
                                            $model_endereco->numero = trim($_POST['Endereco']['numero']);
                                            if (!strlen($model_endereco->numero)) {
                                                $erros[] = "Número inválido.";
                                            }
                                        } else {
                                            $erros[] = "Número inválido.";
                                        }

                                        if (isset($_POST['Endereco']['bairro'])) {
                                            $model_endereco->bairro = trim($_POST['Endereco']['bairro']);
                                            if (!strlen($model_endereco->bairro)) {
                                                $erros[] = "Bairro inválido.";
                                            }
                                        } else {
                                            $erros[] = "Bairro inválido.";
                                        }

                                        if (isset($_POST['Endereco']['id_cidade'])) {
                                            $model_endereco->id_cidade = trim($_POST['Endereco']['id_cidade']);
                                            if (!strlen($model_endereco->id_cidade)) {
                                                $erros[] = "Cidade inválida.";
                                            }
                                        } else {
                                            $erros[] = "Cidade inválida.";
                                        }

                                        if (isset($_POST['Endereco']['tipo'])) {
                                            $model_endereco->tipo = trim($_POST['Endereco']['tipo']);
                                        }

                                        if (isset($_POST['Endereco']['complemento'])) {
                                            $model_endereco->complemento = trim($_POST['Endereco']['complemento']);
                                        }

                                        if (isset($_POST['Endereco']['descricao'])) {
                                            $model_endereco->descricao = trim($_POST['Endereco']['descricao']);
                                        }

                                        if (!isset($erros)) {
                                            if ($model_endereco->save()) {
                                                $model_phe = new PessoaHasEndereco;
                                                $model_phe->id_endereco = $model_endereco->getPrimaryKey();
                                                $model_phe->id_pessoa_juridica = $model_pj->getPrimaryKey();
                                                $model_phe->preferencial = 1;

                                                if (!$model_phe->save()) {
                                                    $erros[] = "Erro ao associar Endereço à Pessoa Jurídica.";
                                                }
                                            } else {
                                                $erros[] = "Erro ao criar Endereço.";
                                            }
                                        }
                                    } else {
                                        $erros[] = "Endereço não pode ser inválido.";
                                    }

                                    //telefones
                                    if (!isset($erros) && isset($_POST['Cliente']['telefones'])) {
                                        for ($i = 0; $i < count($_POST['Cliente']['telefones']['numero']); $i++) {
                                            $model_telefone = new Telefone;
                                            $model_telefone->numero = trim($_POST['Cliente']['telefones']['numero'][$i]);
                                            $model_telefone->tipo = trim($_POST['Cliente']['telefones']['tipo'][$i]);
                                            
                                            if ($model_telefone->save()) {
                                                $model_pht = new PessoaHasTelefone;
                                                $model_pht->id_telefone = $model_telefone->getPrimaryKey();
                                                $model_pht->id_pessoa_juridica = $model_pj->getPrimaryKey();
                                                if ($i == 0) {
                                                    $model_pht->preferencial = 1;
                                                } else {
                                                    $model_pht->preferencial = 0;
                                                }
                                                
                                                if (!$model_pht->save()) {
                                                    $erros[] = "Erro ao associar Telefone à Pessoa Jurídica.";
                                                }
                                            } else {
                                                $erros[] = "Erro ao criar Telefone.";
                                            }
                                        }
                                    } else {
                                        $erros[] = "Telefone não pode ser inválido.";
                                    }
                                } else {
                                    $erros[] = "Erro ao criar Cliente.";
                                }
                            } else {
                                $erros[] = "Erro ao criar Pessoa Jurídica.";
                            }
                        }
                    }
                } else {
                    $erros[] = "Erro ao criar Usuário.";
                }
            }
            
            if (!isset($erros)) {
                $model_user->login();
            }
        }

//        if (isset($_POST['Cliente']['telefones'])) {
//            foreach($_POST['Cliente']['telefones']['numero'] as $telefone) {
//                echo $telefone;
//            }
//        }
//        if (isset($_POST['Endereco'])) {
//            echo $_POST['Endereco']['id_cidade'];
//            exit;
//        }
//        if (isset($_POST['Cliente'])) {
//            $model->setAttributes($_POST['Cliente']);
//
//            if ($model->save()) {
//                if (Yii::app()->getRequest()->getIsAjaxRequest())
//                    Yii::app()->end();
//                else
//                    $this->redirect(array('view', 'id' => $model->id_cliente));
//            }
//        }

        if (!isset($erros))
            $erros = array();

        $this->render('create', array('model' => $model, 'model_pf' => $model_pf, 'model_pj' => $model_pj, 'model_endereco' => $model_endereco, 'erros' => $erros));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Cliente');


        if (isset($_POST['Cliente'])) {
            $model->setAttributes($_POST['Cliente']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_cliente));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Cliente')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes();

        if (isset($_GET['Cliente']))
            $model->setAttributes($_GET['Cliente']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}