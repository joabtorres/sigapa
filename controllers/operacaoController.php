<?php

/**
 * A classe 'operacaoController' é responsável para fazer o carregamento das views relacionado a operaçoes como gera carteira, recibo_taxi, carne da mensalidade, e cartao de vista.
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe operacaoController
 */
class operacaoController extends controller {

    public function index($cod_cooperado) {
        $this->carteira($cod_cooperado);
    }

    public function carteira($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'associado/operacoes/carteira_pdf';
            $crudModel = new crud_db();
            $dados['cidade'] = $crudModel->read_specific("SELECT * FROM sig_cooperativa WHERE cod=:cod", array('cod' => $this->getCodCooperativa()));
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.*, cart.data_inicial, cart.data_validade FROM associado AS coop INNER JOIN associado_carteira AS cart WHERE coop.cod=cart.associado_cod AND coop.cod=:cod', array('cod' => addslashes($cod_cooperado)));
            if (!empty($dados['cidade']) && !empty($dados['cooperado'])) {
                $this->loadView($viewName, $dados);
            } else {
                header("Location: /home");
            }
        }else{
            header("Location: /home");
        }
    }

    public function recibo($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'associado/operacoes/recibo_taxi_pdf';
            $crudModel = new crud_db();
            $dados['cidade'] = $crudModel->read_specific("SELECT * FROM sig_cooperativa WHERE cod=:cod", array('cod' => $this->getCodCooperativa()));
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.nome_completo, coop.cod, coop.cpf, con.celular_1 FROM associado AS coop INNER JOIN associado_contato AS con WHERE coop.cod=con.associado_cod AND coop.cod=:cod', array('cod' => addslashes($cod_cooperado)));
            if (!empty($dados['cidade']) && !empty($dados['cooperado'])) {
                $this->loadView($viewName, $dados);
            } else {
                header("Location: /home");
            }
        }else{
            header("Location: /home");
        }
    }

    public function recibo_mensalidade($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'associado/operacoes/mensalidade/recibo';
            $crudModel = new crud_db();
            $dados['cooperado'] = $crudModel->read('SELECT coop.cod, coop.nome_completo FROM associado as coop WHERE coop.cod=:cod', array('cod' => $cod_cooperado));
            $dados['cooperado']['cooperado'] = $dados['cooperado'][0];

            //buscar
            if (isset($_POST['nSalvar'])) {
                if (!empty($_POST['nValor']) && !empty($_POST['nAno'])) {
                    $recibo = array(
                        'cooperado' => $dados['cooperado']['cooperado']['nome_completo'],
                        'cod' => str_pad($dados['cooperado']['cooperado']['cod'], 3, '0', STR_PAD_LEFT),
                        'ano' => $_POST['nAno'],
                        'valor' => $_POST['nValor'],
                        'mes_inicial' => $_POST['nDe'],
                        'mes_final' => $_POST['nAte'],
                    );
                    $viewNamePDF = 'associado/operacoes/mensalidade/recibo_pdf';
                    $dadosPDF = array('recibo' => $recibo);
                    $this->loadView($viewNamePDF, $dadosPDF);
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "Preenchar os campos obrigatórios!");
                }
            }

            $this->loadTemplate($viewName, $dados);
        }else{
            header("Location: /home");
        }
    }

    public function cartao_visita($cod_cooperado) {
        if ($this->checkUser() >= 2 && intval($cod_cooperado) > 0) {
            $dados = array();
            $viewName = 'associado/operacoes/cartao_visita';
            $crudModel = new crud_db();
            $dados['cooperado'] = $crudModel->read_specific('SELECT coop.apelido, con.celular_1, con.celular_2 FROM associado AS coop INNER JOIN associado_contato as con WHERE coop.cod=con.associado_cod AND coop.cod=:cod', array('cod' => $cod_cooperado));
            $this->loadView($viewName, $dados);
        }else{
            header("Location: /home");
        }
    }
}
