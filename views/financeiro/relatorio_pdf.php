

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>/assets/imagens/icon.png" sizes="32x32" />
        <meta property="ogg:title" content="<?php echo NAME_PROJECT; ?>">
        <meta property="ogg:description" content="<?php echo NAME_PROJECT; ?>">
        <title> <?php echo NAME_PROJECT; ?> </title>
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/relatorio_1.css" media=”print” >
        <style>
            .table td{
                border: 1px solid black;    
                border-collapse: collapse;
            }
            .text-center{text-align: center;}
            .text-left{text-align: left;}
            .text-right{text-align: right;}
            .clear{clear: both;}
            .text-uppercase{text-transform: uppercase;}
            body{font-family: "Arial", sans-serif;}
            #container{ margin: 0 auto; padding: 10px;}
            .header{ border-bottom: 1px solid #cecece; padding-bottom: 5px;}
            .header *{margin:0;}
            .header table{	width: 100%;}
            .img-center{display: block; margin:  0 auto;}

            .section{padding: 10px 0;}
            .section table {width: 100%; margin-bottom: 10px; margin-top: 5px; }
            .section table, .section th, .section td {border: 1px solid black; border-collapse: collapse;}
            .section th, .section td {padding: 5px;text-align: left;}
            .section table.table tr:nth-child(even) {background-color: #eee;}
            .section table.table tr:nth-child(odd) {background-color:#fff;}
            .section table.table th {background-color: black;color: white;}
            .section table.table tr.footer th {background-color: #eee;color: black;}
            .section .title-table{margin: 0; padding:0; font-weight: normal}
        </style>
    </head>
    <body>
        <table style="width:100%; ">	    
            <tr>
                <td align="left">
                    <img src="<?php echo BASE_URL . '/assets/imagens/logo-aparaa.png'; ?>" alt="Logo" style="width: 80px;"/>

                </td>
                <td align="left">
                    <h4 class="text-center text-upercase" style="margin: 0;"> <?php echo $cidade['nome_siglas'] ?> <?php echo $cidade['nome_completo'] ?> </h4>
                    <p class="text-center">                    
                        <small>
                            <?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?><br/>
                            <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?><br/>
                            CNPJ <?php echo $cidade['cnpj'] ?>
                        </small>
                    </p>
                </td>
                <td align="right">
                    <img src="<?php echo BASE_URL . '/assets/imagens/ifpa_sigapa.png'; ?>" alt="Logo" style="width: 140px;"/>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3">
                    <p><?php echo NAME_PROJECT ?></p><br/>
                    <h4>Relatório Financeiro</h4>
                </td>
            </tr>
        </table>
        <div align="right">Este documento foi gerado em <?php echo $this->formatDateView(date("Y-m-d")) . ' as ' . date("H:i:s", (time() - $this->ajustaHorario())) ?>.</div>
        <div id="conteudo">
            <div id="section">
                <?php if (isset($busca) && !empty($busca)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>De</th>
                                <th>Até</th>
                                <th>Modo de Exibição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $busca['data_inicial'] ?></td>
                                <td><?php echo $busca['data_final'] ?></td>
                                <td><?php echo $busca['modo_exibicao'] == 1 ? 'Resumido' : 'Estendido' ?></td>
                            </tr>

                        </tbody>
                    </table>
                <?php endif; ?>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gráfico</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo BASE_URL . '/uploads/financeiro/imagem.png' ?>" alt="grágico" class="img-center"></td>
                            <td>
                                <p>Entradas: <?php echo $this->formatDinheiroView($lucro['valor']); ?> </p>
                                <p>Saídas: <?php echo $this->formatDinheiroView($despesa['valor']); ?> </p>
                                <p>Investimentos: <?php echo $this->formatDinheiroView($investimento['valor']); ?></p>
                                <hr/>
                                <p>Saldo Final: <?php echo $this->formatDinheiroView($valor_total); ?> </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                if ($modo_exibicao == 2) :
                    if (!empty($financas['lucro'])):
                        ?>

                <h4 class="title-table">Entradas</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['lucro'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($lucro['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (!empty($financas['despesa'])): ?>

                        <h4 class="title-table">Saídas</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['despesa'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($despesa['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (!empty($financas['investimento'])): ?>

                        <h4 class="title-table">Investimento</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descrição</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['investimento'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($investimento['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    endif;
                endif;
                ?>

                <!-- fim section -->
            </div>
            <!-- fim container -->
    </body>
</html>