<?php

/**
 * A classe 'cadastrarController' é responsável para fazer o gerenciamento no cadastro de cooperados, historico, carteirinha, mensalidade, lucro, despesa, investimento e usuario
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe cadastrarController
 */
class cadastrarController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é chama a função cooperado();
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index() {
        $this->cooperado();
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra uma novo cooperado  e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function cooperado() {
        if ($this->checkUser() >= 2) {
            $viewName = "associado/cadastrar";
            $dados = array();
            $cooperado = array();
            $cooperadoModel = new cooperado();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                if (!isset($cooperado['associado_cod'])) {
                    $ultimo_codigo = $cooperadoModel->read("SELECT MAX(cod) AS qtd FROM associado ORDER BY cod DESC LIMIT 1");
                    if (!empty($ultimo_codigo) && is_array($ultimo_codigo)) {
                        $cooperado['cooperado']['cod'] = ++$ultimo_codigo[0]['qtd'];
                    } else {
                        $cooperado['cooperado']['cod'] = 1;
                    }
                }
                //categoria de cooperado
                $cooperado['cooperado']['tipo'] = addslashes($_POST['nTipo']);
                //status
                $cooperado['cooperado']['status'] = addslashes($_POST['nStatus']);
                //apelido
                if (!empty($_POST['nApelido']) && isset($_POST['nApelido'])) {
                    $cooperado['cooperado']['apelido'] = addslashes($_POST['nApelido']);
                } else {
                    $dados['cooperado_error']['apelido']['msg'] = 'Informe o Apelido';
                    $dados['cooperado_error']['apelido']['class'] = 'has-error';
                }
                //nome completo
                if (!empty($_POST['nNomeCompleto']) && isset($_POST['nNomeCompleto'])) {
                    $cooperado['cooperado']['nome_completo'] = addslashes($_POST['nNomeCompleto']);
                } else {
                    $dados['cooperado_error']['nome_completo']['msg'] = 'Informe o Nome Completo';
                    $dados['cooperado_error']['nome_completo']['class'] = 'has-error';
                }

                //cpf
                $cooperado['cooperado']['cpf'] = addslashes($_POST['nCPF']);
                //rg
                $cooperado['cooperado']['rg'] = addslashes($_POST['nRG']);
                //rg
                $cooperado['cooperado']['car'] = addslashes($_POST['nCAR']);
                //rg
                $cooperado['cooperado']['dap'] = addslashes($_POST['nDAP']);
                //nEstadoCivil
                if (!empty($_POST['nEstadoCivil']) && isset($_POST['nEstadoCivil'])) {
                    $cooperado['cooperado']['estado_civil'] = addslashes($_POST['nEstadoCivil']);
                } else {
                    $dados['cooperado_error']['estado_civil']['msg'] = 'Informe o Estado Cívil';
                    $dados['cooperado_error']['estado_civil']['class'] = 'has-error';
                }
                //nacionalidade
                if (!empty($_POST['nNacionalidade']) && isset($_POST['nNacionalidade'])) {
                    $cooperado['cooperado']['nacionalidade'] = addslashes($_POST['nNacionalidade']);
                } else {
                    $dados['cooperado_error']['nacionalidade']['msg'] = 'Informe a Nacionalidade';
                    $dados['cooperado_error']['nacionalidade']['class'] = 'has-error';
                }
                //genero
                $cooperado['cooperado']['genero'] = addslashes($_POST['nGenero']);
                //daca de nascimento
                if (!empty($_POST['nDataNascimento']) && isset($_POST['nDataNascimento'])) {
                    $cooperado['cooperado']['data_nascimento'] = $this->formatDateBD($_POST['nDataNascimento']);
                } else {
                    $dados['cooperado_error']['data_nascimento']['msg'] = 'Informe a Data de Nascimento';
                    $dados['cooperado_error']['data_nascimento']['class'] = 'has-error';
                }
                //nDataInscricao
                if (!empty($_POST['nDataInscricao']) && isset($_POST['nDataInscricao'])) {
                    $cooperado['cooperado']['data_inscricao'] = $this->formatDateBD(($_POST['nDataInscricao']));
                } else {
                    $dados['cooperado_error']['data_inscricao']['msg'] = 'Informe a Data de Inscrição';
                    $dados['cooperado_error']['data_inscricao']['class'] = 'has-error';
                }
                //familiares
                $cooperado['cooperado']['pai'] = addslashes($_POST['nPai']);
                $cooperado['cooperado']['mae'] = addslashes($_POST['nMae']);
                $cooperado['cooperado']['conjugue'] = addslashes($_POST['nConjuge']);
                $cooperado['cooperado']['filhos'] = $_POST['nFilhos'];

                //imagem
                if ((isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) && (!isset($dados['cooperado_error']))) {
                    $cooperado['cooperado']['imagem'] = $cooperadoModel->save_image($_FILES['tImagem-1']);
                    if (!empty($_POST['nImagemCooperado'])) {
                        $cooperadoModel->delete_image($_POST['nImagemCooperado']);
                    }
                } else {
                    $cooperado['cooperado']['imagem'] = addslashes($_POST['nImagemCooperado']);
                }

                //endereço
                $cooperado['endereco'] = array(
                    'associado_cod' => $cooperado['cooperado']['cod'],
                    'logradouro' => addslashes($_POST['nLogradouro']),
                    'numero' => $_POST['nNumero'],
                    'bairro' => addslashes($_POST['nBairro']),
                    'complemento' => addslashes($_POST['nComplementos']),
                    'cidade' => addslashes($_POST['nCidade']),
                    'estado' => addslashes($_POST['nEstado']),
                    'latitude' => addslashes($_POST['nLatitude']),
                    'longitude' => addslashes($_POST['nLongitude']),
                    'cep' => addslashes($_POST['nCEP'])
                );
                //contato
                $cooperado['contato'] = array(
                    'associado_cod' => $cooperado['cooperado']['cod'],
                    'celular_1' => addslashes($_POST['nTelefone']),
                    'celular_2' => addslashes($_POST['nCelular']),
                    'email' => addslashes($_POST['nEmail'])
                );
                //carteira
                $cooperado['carteira'] = array(
                    'associado_cod' => $cooperado['cooperado']['cod'],
                    'data_inicial' => $this->formatDateBD($_POST['nDataInicial']),
                    'data_validade' => $this->formatDateBD($_POST['nDataValidade'])
                );

                $dados['cooperado'] = $cooperado;
                if (isset($dados['cooperado_error']) && !empty($dados['cooperado_error'])) {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                } else {
                    $_POST = array();
                    $dados['cooperado'] = array();
                    $cadCooperado = $cooperadoModel->create($cooperado);
                    if ($cadCooperado) {
                        $_SESSION['cooperado_categoria'] = array();
                        $_SESSION['cooperado_status'] = array();
                        $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
                    }
                }
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra produção do cooperado e valida os campus preenchidos via formulário.
     * @access public
     * @param int $cod_cooperado - código do cooperado registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function producao($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $viewName = "associado/producao/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            $dados['associado'] = $crudModel->read_specific('SELECT * FROM associado WHERE cod=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['producao'] = $crudModel->read("SELECT * FROM producao");
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {

                $dados['produto'] = array(
                    'associado_cod' => addslashes($_POST['nCodCooperado']),
                    'producao_cod' => addslashes($_POST['nProducao']),
                    'area' => addslashes($_POST['nArea'])
                );
                $resultado = $crudModel->read_specific('SELECT* FROM associado_producao WHERE producao_cod=:producao_cod AND associado_cod=:associado_cod', array('producao_cod' => $dados['produto']['producao_cod'], 'associado_cod' => $dados['produto']['associado_cod']));
                if ($resultado) {
                    $_SESSION['produto_acao'] = false;
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "PRODUÇÃO JÁ CADASTRADA, volte para a página do associado e solicite a edição deste registro se necessário!");
                } else {
                    $cadastro = $crudModel->create("INSERT INTO associado_producao (associado_cod, producao_cod, area) VALUES (:associado_cod, :producao_cod, :area)", $dados['produto']);
                    if ($cadastro) {
                        $_SESSION['produto_acao'] = true;
                        $url = BASE_URL . "/cadastrar/producao/" . $cod_cooperado;
                        header("Location: " . $url);
                    }
                }
            } else if (isset($_SESSION['produto_acao']) && !empty($_SESSION['produto_acao'])) {
                $_SESSION['produto_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra históricos do cooperado e valida os campus preenchidos via formulário.
     * @access public
     * @param int $cod_cooperado - código do cooperado registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function historico($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $viewName = "associado/historico/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            $dados['cooperado']['cooperado'] = $crudModel->read('SELECT * FROM associado WHERE cod=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['cooperado'] = $dados['cooperado']['cooperado'][0];
            $dados['cooperado']['usuario'] = $crudModel->read("SELECT * FROM sig_usuario WHERE cod_usuario=:cod", array('cod' => $_SESSION['usuario_sig_cootax']['cod']));
            $dados['cooperado']['usuario'] = $dados['cooperado']['usuario'][0];
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                $dados['coopeado']['historico'] = array(
                    'associado_cod' => addslashes($_POST['nCodCooperado']),
                    'descricao_historico' => addslashes($_POST['nDescricao'])
                );
                $cadHistorico = $crudModel->create("INSERT INTO associado_historico (associado_cod, descricao_historico, data_historico) VALUES (:associado_cod, :descricao_historico, NOW())", $dados['coopeado']['historico']);
                if ($cadHistorico) {
                    $_SESSION['historico_acao'] = true;
                    $url = BASE_URL . "/cadastrar/historico/" . $cod_cooperado;
                    header("Location: " . $url);
                }
            } else if (isset($_SESSION['historico_acao']) && !empty($_SESSION['historico_acao'])) {
                $_SESSION['historico_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra mensalidade do cooperado e valida os campus preenchidos via formulário.
     * @access public
     * @param int $cod_cooperado - código do cooperado registrada no banco
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function mensalidade($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $viewName = "associado/mensalidade/cadastrar";
            $dados = array();
            $cooperadoModel = new cooperado();
            $dados['cooperado']['cooperado'] = $cooperadoModel->read('SELECT * FROM associado WHERE cod=:cod', array('cod' => addslashes($cod_cooperado)));
            $dados['cooperado']['cooperado'] = $dados['cooperado']['cooperado'][0];
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                if (isset($_POST['nAno']) && !empty($_POST['nAno'])) {
                    $dados['mensalidade'] = array(
                        'associado_cod' => addslashes($_POST['nCodCooperado']),
                        'ano' => addslashes($_POST['nAno']),
                        'janeiro' => !empty($_POST['nJaneiro']) ? $this->formatDinheiroBD($_POST['nJaneiro']) : 0,
                        'fevereiro' => !empty($_POST['nFevereiro']) ? $this->formatDinheiroBD($_POST['nFevereiro']) : 0,
                        'marco' => !empty($_POST['nMarco']) ? $this->formatDinheiroBD($_POST['nMarco']) : 0,
                        'abril' => !empty($_POST['nAbril']) ? $this->formatDinheiroBD($_POST['nAbril']) : 0,
                        'maio' => !empty($_POST['nMaio']) ? $this->formatDinheiroBD($_POST['nMaio']) : 0,
                        'junho' => !empty($_POST['nJunho']) ? $this->formatDinheiroBD($_POST['nJunho']) : 0,
                        'julho' => !empty($_POST['nJulho']) ? $this->formatDinheiroBD($_POST['nJulho']) : 0,
                        'agosto' => !empty($_POST['nAgosto']) ? $this->formatDinheiroBD($_POST['nAgosto']) : 0,
                        'setembro' => !empty($_POST['nSetembro']) ? $this->formatDinheiroBD($_POST['nSetembro']) : 0,
                        'outubro' => !empty($_POST['nOutubro']) ? $this->formatDinheiroBD($_POST['nOutubro']) : 0,
                        'novembro' => !empty($_POST['nNovembro']) ? $this->formatDinheiroBD($_POST['nNovembro']) : 0,
                        'dezembro' => !empty($_POST['nDezembro']) ? $this->formatDinheiroBD($_POST['nDezembro']) : 0,
                    );
                    $crudModel = new crud_db();
                    $cadMensalidade = $crudModel->create("INSERT INTO associado_mensalidade (associado_cod, ano, janeiro, fevereiro, marco, abril, maio, junho, julho, agosto, setembro, outubro, novembro, dezembro) VALUES (:associado_cod, :ano, :janeiro, :fevereiro, :marco, :abril, :maio, :junho, :julho, :agosto, :setembro, :outubro, :novembro, :dezembro)", $dados['mensalidade']);
                    if ($cadMensalidade) {
                        $_SESSION['mensalidade_acao'] = true;
                        $url = BASE_URL . "/cadastrar/mensalidade/" . $cod_cooperado;
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios, ANO não foi informado");
                }
            } else if (isset($_SESSION['mensalidade_acao']) && !empty($_SESSION['mensalidade_acao'])) {
                $_SESSION['mensalidade_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }

            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra um lucro da cooperativa e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function reuniao() {
        if ($this->checkUser() >= 2) {
            $viewName = "reuniao/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData'])
                );
                if (isset($_FILES ['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $chamado['anexo'] = $this->upload_file($_FILES['nFile']);
                    if (!empty($_POST['nFileEnviado'])) {
                        $crudModel->delete_file($_POST['nFileEnviado']);
                    }
                } else {
                    $chamado['anexo'] = addslashes($_POST['nFileEnviado']);
                }
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->create('INSERT INTO sig_lucro (cod_cooperativa, descricao, valor, data, data_cadastro) VALUES (:cod_cooperativa, :descricao, :valor, :data, NOW())', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        $url = BASE_URL . '/cadastrar/lucro';
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra um lucro da cooperativa e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function lucro() {
        if ($this->checkUser() >= 2) {
            $viewName = "financeiro/lucro/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->create('INSERT INTO sig_lucro (cod_cooperativa, descricao, valor, data, data_cadastro) VALUES (:cod_cooperativa, :descricao, :valor, :data, NOW())', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        $url = BASE_URL . '/cadastrar/lucro';
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra uma despesa da cooperativa e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function despesa() {
        if ($this->checkUser() >= 2) {
            $viewName = "financeiro/despesa/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->create('INSERT INTO sig_despesa (cod_cooperativa, descricao, valor, data, data_cadastro) VALUES (:cod_cooperativa, :descricao, :valor, :data, NOW())', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        $url = BASE_URL . '/cadastrar/despesa';
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controlle nas ações de cadastra um investimento da cooperativa e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function investimento() {
        if ($this->checkUser() >= 2) {
            $viewName = "financeiro/investimento/cadastrar";
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nSalvar']) && !empty($_POST['nSalvar'])) {
                /* Adicionando */
                $financa = array(
                    'cod_cooperativa' => $this->getCodCooperativa(),
                    'descricao' => addslashes($_POST['nDescricao']),
                    'valor' => addslashes($_POST['nValor']),
                    'data' => addslashes($_POST['nData'])
                );
                $dados['financa'] = $financa;
                if (!empty($_POST['nDescricao']) && !empty($_POST['nValor']) && !empty($_POST['nData'])) {
                    $financa['data'] = !empty($financa['data']) ? $this->formatDateBD($financa['data']) : null;
                    $financa['valor'] = !empty($financa['valor']) ? $this->formatDinheiroBD($financa['valor']) : 0;
                    $cadFinanca = $crudModel->create('INSERT INTO sig_investimento (cod_cooperativa, descricao, valor, data, data_cadastro) VALUES (:cod_cooperativa, :descricao, :valor, :data, NOW())', $financa);
                    if ($cadFinanca) {
                        $_SESSION['financa_acao'] = true;
                        $_SESSION['financa_atual'] = array();
                        $url = BASE_URL . '/cadastrar/investimento';
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios.");
                }
            } else if (isset($_SESSION['financa_acao']) && !empty($_SESSION['financa_acao'])) {
                $_SESSION['financa_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "Cadastro realizado com sucesso!");
            }
            $this->loadTemplate($viewName, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel pelo controle nas ações de cadastra usuario e valida os campus preenchidos via formulário.
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function usuario() {
        if ($this->checkUser() >= 3) {
            $view = "usuario/cadastrar";
            $dados = array();
            $usuarioModel = new usuario();
            //Array que vai armazena os dados do usuário;
            $usuario = array();
            if (isset($_POST['nSalvar'])) {
                //nome
                if (!empty($_POST['nNome'])) {
                    $usuario['nome'] = addslashes($_POST['nNome']);
                } else {
                    $dados['usuario_erro']['nome']['msg'] = 'Informe o nome';
                    $dados['usuario_erro']['nome']['class'] = 'has-error';
                }
                //sobrenome
                if (!empty($_POST['nSobrenome'])) {
                    $usuario['sobrenome'] = addslashes($_POST['nSobrenome']);
                } else {
                    $dados['usuario_erro']['sobrenome']['msg'] = 'Informe o sobrenome';
                    $dados['usuario_erro']['sobrenome']['class'] = 'has-error';
                }
                //usuario
                if (!empty($_POST['nUsuario'])) {
                    $usuario['usuario'] = addslashes($_POST['nUsuario']);
                    if ($usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE usuario_usuario=:usuario', array('usuario' => $usuario['usuario']))) {
                        $dados['usuario_erro']['usuario']['msg'] = 'usuário já cadastrado';
                        $dados['usuario_erro']['usuario']['class'] = 'has-error';
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um usuario já cadastrado, por favor informe outro nome de usuário';
                        $dados['erro']['class'] = 'alert-danger';
                        $usuario['usuario'] = null;
                    }
                } else {
                    $dados['usuario_erro']['usuario']['msg'] = 'Informe o usuário';
                    $dados['usuario_erro']['usuario']['class'] = 'has-error';
                }
                //email
                if (!empty($_POST['nEmail'])) {
                    $usuario['email'] = addslashes($_POST['nEmail']);
                    if ($usuarioModel->read_specific('SELECT * FROM sig_usuario WHERE email_usuario=:email', array('email' => $usuario['email']))) {
                        $dados['usuario_erro']['email']['msg'] = 'E-mail já cadastrado';
                        $dados['usuario_erro']['email']['class'] = 'has-error';
                        $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Não é possível cadastrar um e-mail já cadastrado, por favor informe outro endereço de e-mail';
                        $dados['erro']['class'] = 'alert-danger';
                        $usuario['email'] = null;
                    }
                } else {
                    $dados['usuario_erro']['email']['msg'] = 'Informe o e-mail';
                    $dados['usuario_erro']['email']['class'] = 'has-error';
                }
                //email
                if (!empty($_POST['nSenha']) && !empty($_POST['nRepetirSenha'])) {
                    //senha
                    if ($_POST['nSenha'] == $_POST['nRepetirSenha']) {
                        $usuario['senha'] = $_POST['nSenha'];
                    } else {
                        $dados['usuario_erro']['senha']['msg'] = "Os campos 'Senha' e 'Repetir Senha' não estão iguais! ";
                        $dados['usuario_erro']['senha']['class'] = 'has-error';
                    }
                } else {
                    $dados['usuario_erro']['senha']['msg'] = "Os campos 'Senha' e 'Repetir Senha' devem ser preenchidos";
                    $dados['usuario_erro']['senha']['class'] = 'has-error';
                }
                //nucleo
                $usuario['cod_cooperativa'] = $this->getCodCooperativa();
                //cargo
                if (!empty($_POST['nCargo'])) {
                    $usuario['cargo'] = addslashes($_POST['nCargo']);
                } else {
                    $dados['usuario_info']['cargo']['msg'] = 'Informe o cargo, senão não será exibido o cargo';
                    $dados['usuario_info']['cargo']['class'] = 'has-warning';
                }
                //sexo
                $usuario['sexo'] = addslashes($_POST['nSexo']);

                //nivel de acesso
                $usuario['nivel'] = addslashes($_POST['tNivelDeAcesso']);

                //imagem
                if (isset($_FILES['tImagem-1']) && $_FILES['tImagem-1']['error'] == 0) {
                    $usuario['imagem'] = $_FILES['tImagem-1'];
                }
                if (isset($dados['usuario_erro']) && !empty($dados['usuario_erro'])) {
                    $dados['erro']['msg'] = '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha todos os campos obrigatórios (*).';
                    $dados['erro']['class'] = 'alert-danger';
                } else {
                    $usuarioModel->create($usuario);
                    $dados['erro']['msg'] = '<i class="fa fa-check" aria-hidden="true"></i> Cadastro realizado com sucesso!';
                    $dados['erro']['class'] = 'alert-success';
                    $_POST = array();
                }
            }
            $dados['usuario'] = $usuario;
            $this->loadTemplate($view, $dados);
        } else {
            $url = BASE_URL . '/home';
            header("Location: " . $url);
        }
    }

}
