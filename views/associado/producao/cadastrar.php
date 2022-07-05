<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cadastrar Produção</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li><a  href="<?php echo BASE_URL ?>/relatorio/cooperados"><i class="fa fa-list-alt"></i> Associados</a></li>
                <li class="text-uppercase"><a href="<?php echo BASE_URL ?>/cooperado/index/<?php echo!empty($associado['cod']) ? $associado['cod'] : '' ?>"><i class="fa fa-user"></i> <?php echo!empty($associado['nome_completo']) ? $associado['nome_completo'] : '' ?></a></li>
                <li class="active"><i class="fa fa-plus-square"></i> Produção</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <button class="close" data-hide="alert">&times;</button>
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
            </div>
        </div>
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off">
                <input type="hidden" name="nCodHistorico" value="<?php echo!empty($produto['cod']) ? $produto['cod'] : '' ?>"/>
                <div class="panel panel-black">
                    <div class="panel-heading">
                        <p class="panel-title">Produção</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="icadUnidade">Associado: </label>
                                <input type="hidden" name="nCodCooperado" value="<?php echo!empty($associado['cod']) ? $associado['cod'] : '' ?>"/>
                                <input type="text" name="ncadUnidade" id="icadUnidade" class=" form-control"  disabled="true" value="<?php echo!empty($associado['nome_completo']) ? $associado['nome_completo'] : '' ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="iProducao">Produção de: </label>
                                <select name="nProducao" id="iProducao" class="form-control select2-js">
                                    <?php
                                    if (isset($producao) && !empty($producao)) {
                                        foreach ($producao as $index) {
                                            if (isset($produto['producao_cod']) && !empty($produto['producao_cod']) && $produto['producao_cod'] == $index['cod']) {
                                                echo "<option value='" . $index['cod'] . "' selected='selected'>" . $index['producao'] . " - Categoria: " . $index['categoria'] . "</option>";
                                            } else {
                                                echo "<option value='" . $index['cod'] . "'>" . $index['producao'] . " - Categoria: " . $index['categoria'] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="iarea">Tamanho da àrea em metro quadrado (m²): </label>
                                <input type="text" name="nArea" id="iarea" class="form-control" value="<?php echo!empty($produto['area']) ? $produto['area'] : '' ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fim .panel--> 
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-success" name="nSalvar" value="Salvar"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo BASE_URL ?>/home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>