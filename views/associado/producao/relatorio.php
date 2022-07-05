<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2> Produções</h2>
            <ol class="breadcrumb">
                <li><a  href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-list-alt"></i> Relatório de Produções</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <form method="POST" autocomplete="off">
                <section class="panel panel-success">
                    <header class="panel-heading">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                    </header>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <article class="panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for='iTipo'>Categoria: </label>
                                    <select id="iTipo" name="nTipo" class="form-control">
                                        <option checked='checked' value="" >Todos</option>
                                        <option value="Permissionário">Permissionário</option>
                                        <option  value="Participativo">Participativo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="iProducao">Produção de: </label>
                                    <select name="nProducao" id="iProducao" class="form-control select2-js">
                                        <?php
                                        if (isset($producao) && !empty($producao)) {
                                            echo "<option selected='selected' value='' >Todos</option>";
                                            foreach ($producao as $index) {
                                                echo "<option value='" . $index['cod'] . "'>" . $index['producao'] . " - Categoria: " . $index['categoria'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iPor'>Por: </label>
                                    <select id="iPor" name="nPor" class="form-control">
                                        <option value="" checked='checked'>Todos</option>
                                        <option value="matricula" >Nº de Matricula</option>
                                        <option value="Apelido">Apelido</option>
                                        <option value="Nome Completo">Nome Completo</option>
                                        <option value="Ano de Inscrição">Ano de Inscrição</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for='iBuscar'>Buscar: </label>
                                    <input type="text" id="iBuscar" name="nBuscar" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Gerar PDF:</label><br/>
                                    <label><input type="radio" name="nModoPDF" value="1"/> Sim </label>
                                    <label><input type="radio" name="nModoPDF" value="0" checked="checked" /> Não </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-warning"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="row">
        <?php if (isset($cooperados) && !empty($cooperados)) { ?>
            <article class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h4 >
                        <hr/>
                    </div>
                </div>
            </article>
            <?php
            foreach ($cooperados as $cooperado):
                ?>
                <div class="col-md-12">
                    <section class="panel panel-black">
                        <header class="panel-heading">
                            <h4 class="panel-title text-upercase"> <?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : ''; ?>  <?php echo ' -- Nº de Matricula: ' . str_pad($cooperado['cod'], 3, '0', STR_PAD_LEFT); ?> </h4>
                        </header>
                        <article class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <tr>
                                    <th width="50px">#</th>
                                    <th> Produto</th>
                                    <th width="300px">Área em metro quadrado(m²)</th>
                                </tr>
                                <?php
                                if (isset($cooperado['producao']) && !empty($cooperado['producao'])):
                                    $qtd = 1;
                                    foreach ($cooperado['producao'] as $index):
                                        ?>
                                        <tr>
                                            <td><?php echo $qtd ?></td>
                                            <td><?php echo $index['producao'] . " - " . $index['categoria'] ?></td>
                                            <td><?php echo!empty($index['area']) ? $index['area'] . ' m²' : '' ?></td>

                                        </tr>
                                        <?php
                                        ++$qtd;
                                    endforeach;
                                endif;
                                ?>
                            </table>
                        </article>
                    </section>
                </div>
                <?php
            endforeach;
        } else {
            echo '<div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        Desculpe, não foi possível localizar nenhum registro !
                    </div>
                </div>';
        }
        ?>
    </div>
</div>
