<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Cadastrar Reunião</h2>
            <ol class="breadcrumb">
                <li><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-plus-square"></i> Reunião</li>
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
            <form autocomplete="off" method="POST" enctype="multipart/form-data" id="myFormFinanca">
                <section class="panel panel-black">
                    <header class="panel-heading">
                        <h4 class="panel-title"><i class="fa fa-plus-square pull-left"></i> Reunião</h4>
                    </header>
                    <article class="panel-body">
                        <div class="row">
                            <input type="hidden" name="nCod" value="<?php echo!empty($reuniao['cod']) ? $reuniao['cod'] : 0; ?>"/>
                            <div class="col-md-9 form-group">
                                <label for='iDescricao'>Titulo da reunião:* </label>
                                <input type="text" id="iDescricao" name="nTitulo" class="form-control" placeholder="Exemplo: Reunião com todos os associados para repasse de informações" value="<?php echo (!empty($reuniao['descricao'])) ? $reuniao['descricao'] : ''; ?>"/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for='iData'>Data:* </label>
                                <input type="text" id="iData" name="nData" class="form-control input-data date_serach" placeholder="Exemplo: 15/05/2020" value="<?php echo (!empty($reuniao['data'])) ? $reuniao['data'] : ''; ?>"/>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for='iTexto'>Descrição da reunião: </label>
                                <textarea class="form-control" name="nTexto" id="iTexto"><?php echo!empty($reuniao['texto']) ? $reuniao['texto'] : '' ?></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor 4
                                    // instance, using default configuration.
                                    CKEDITOR.replace('iTexto');
                                </script>
                            </div>
                            <div class=" col-md-12 form-group">
                                <label for="exampleFormControlFile1">Anexar documento: </label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                <input type="hidden" name="nFileEnviado"  value="<?php echo isset($reuniao['anexo']) ? $reuniao['anexo'] : null; ?>"/>

                            </div>
                        </div>

                    </article>
                </section>
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