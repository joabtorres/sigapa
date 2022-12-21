<?php

/**
 * A classe 'unidadeController' é responsável para fazer o carregamento da unidade de forma detalhada
 * 
 * @author Joab Torres <joabtorres1508@gmail.com>
 * @version 1.0
 * @copyright  (c) 2017, Joab Torres Alencar - Analista de Sistemas 
 * @access public
 * @package controllers
 * @example classe unidadeController
 */
class cooperadoController extends controller {

    /**
     * Está função pertence a uma action do controle MVC, ela é responśavel por carrega a view  presente no diretorio views/cooperado_detalhe.php com seus respectivos dados;
     * @param int $cod_unidade - código da unidade
     * @access public
     * @author Joab Torres <joabtorres1508@gmail.com>
     */
    public function index($associado_cod) {
        if ($this->checkUser() >= 2 && intval($associado_cod) > 0) {
            $view = "associado/perfil";
            $dados = array();
            $cooperadoModel = new cooperado();
            $dados['cooperado']['cooperado'] = $cooperadoModel->read('SELECT * FROM associado WHERE cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['cooperado'] = $dados['cooperado']['cooperado'][0];
            $dados['cooperado']['endereco'] = $cooperadoModel->read('SELECT * FROM associado_endereco WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['endereco'] = $dados['cooperado']['endereco'][0];
            $dados['cooperado']['contato'] = $cooperadoModel->read('SELECT * FROM associado_contato WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['contato'] = $dados['cooperado']['contato'][0];
            $dados['cooperado']['carteira'] = $cooperadoModel->read('SELECT * FROM associado_carteira WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['carteira'] = $dados['cooperado']['carteira'][0];
            $dados['cooperado']['producao'] = $cooperadoModel->read('SELECT ap.*, p.categoria, p.producao FROM associado_producao as ap INNER JOIN producao as p WHERE ap.producao_cod=p.cod AND associado_cod=:associado_cod ORDER BY p.producao ASC', array('associado_cod' => addslashes($associado_cod)));
            $dados['cooperado']['mensalidades'] = $cooperadoModel->read('SELECT * FROM associado_mensalidade WHERE associado_cod=:cod ORDER BY ano ASC', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['historicos'] = $cooperadoModel->read('SELECT * FROM associado_historico as historico WHERE historico.associado_cod=:cod ORDER BY historico.cod_historico ASC', array('cod' => addslashes($associado_cod)));
            $this->loadTemplate($view, $dados);
        } else {
            header('Location: /home');
        }
    }

    public function pdf($associado_cod) {
        if ($this->checkUser() && !empty($associado_cod)) {
            $viewName = "associado/perfil_pdf";
            $dados = array();
            $cooperadoModel = new cooperado();
            $crudModel = new crud_db();
            $dados['cidade'] = $crudModel->read_specific('SELECT * FROM sig_cooperativa WHERE cod=:cod', array('cod' => $this->getCodCooperativa()));
            $dados['cooperado']['cooperado'] = $cooperadoModel->read('SELECT * FROM associado WHERE cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['cooperado'] = $dados['cooperado']['cooperado'][0];
            $dados['cooperado']['endereco'] = $cooperadoModel->read('SELECT * FROM associado_endereco WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['endereco'] = $dados['cooperado']['endereco'][0];
            $dados['cooperado']['contato'] = $cooperadoModel->read('SELECT * FROM associado_contato WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['contato'] = $dados['cooperado']['contato'][0];
            $dados['cooperado']['carteira'] = $cooperadoModel->read('SELECT * FROM associado_carteira WHERE associado_cod=:cod', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['carteira'] = $dados['cooperado']['carteira'][0];
            $dados['cooperado']['producao'] = $cooperadoModel->read('SELECT ap.*, p.categoria, p.producao FROM associado_producao as ap INNER JOIN producao as p WHERE ap.producao_cod=p.cod AND associado_cod=:associado_cod ORDER BY p.producao ASC', array('associado_cod' => addslashes($associado_cod)));
            $dados['cooperado']['mensalidades'] = $cooperadoModel->read('SELECT * FROM associado_mensalidade WHERE associado_cod=:cod ORDER BY ano ASC', array('cod' => addslashes($associado_cod)));
            $dados['cooperado']['historicos'] = $cooperadoModel->read('SELECT * FROM associado_historico as historico WHERE historico.associado_cod=:cod ORDER BY historico.cod_historico ASC', array('cod' => addslashes($associado_cod)));
            $this->loadView($viewName, $dados);
        } else {
            $url = "location: " . BASE_URL . "/home";
            header($url);
        }
    }

}
