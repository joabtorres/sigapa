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
                    <h4>Relatório de Mensalidades</h2>
                </td>
            </tr>
        </table>
        <div align="right">Este documento foi gerado em <?php echo $this->formatDateView(date("Y-m-d")) . ' as ' . date("H:i:s", (time() - $this->ajustaHorario())) ?>.</div>
        <div id="conteudo">
            <div id="section">                
                <table class="table">
                    <tr>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Por</th>
                        <th>Busca</th>
                    </tr>
                    <tr>
                        <td><?php echo $busca['tipo'] ?></td>
                        <td><?php echo $busca['status'] ?></td>
                        <td><?php echo $busca['por'] ?></td>
                        <td><?php echo $busca['campo'] ?></td>
                    </tr>
                </table>
                <hr>


                <?php if (!empty($cooperados)) : ?>
                    <h4 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h4>
                    <?php foreach ($cooperados as $cooperado): ?>
                        <table class="table">
                            <tr> <th colspan="14"><h4 style="margin-bottom: 0"> <?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : ''; ?>  <?php echo ' -- Nº de Matricula: ' . str_pad($cooperado['cod'], 3, '0', STR_PAD_LEFT); ?> </h4></th></tr>
                            <tr>
                                <th class="font-small">Ano</th>
                                <th class="font-small">Janeiro</th>
                                <th class="font-small">Fevereiro</th>
                                <th class="font-small">Março</th>
                                <th class="font-small">Abril</th>
                                <th class="font-small">Maio</th>
                                <th class="font-small">Junho</th>
                                <th class="font-small">Julho</th>
                                <th class="font-small">Agosto</th>
                                <th class="font-small">Setembro</th>
                                <th class="font-small">Outubro</th>
                                <th class="font-small">Novembro</th>
                                <th class="font-small">Dezembro</th>
                                <th class="font-small">Total</th>
                            </tr>

                            <?php
                            if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])):
                                $total = 0;
                                foreach ($cooperado['mensalidades'] as $mensalidade):
                                    $total = $mensalidade['janeiro'] + $mensalidade['fevereiro'] + $mensalidade['marco'] + $mensalidade['abril'] + $mensalidade['maio'] + $mensalidade['junho'] + $mensalidade['julho'] + $mensalidade['agosto'] + $mensalidade['setembro'] + $mensalidade['outubro'] + $mensalidade['novembro'] + $mensalidade['dezembro'];
                                    ?>
                                    <tr>
                                        <td  class="font-small"><?php echo!empty($mensalidade['ano']) ? $mensalidade['ano'] : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['janeiro']) ? $this->formatDinheiroView($mensalidade['janeiro']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['fevereiro']) ? $this->formatDinheiroView($mensalidade['fevereiro']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['marco']) ? $this->formatDinheiroView($mensalidade['marco']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['abril']) ? $this->formatDinheiroView($mensalidade['abril']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['maio']) ? $this->formatDinheiroView($mensalidade['maio']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['junho']) ? $this->formatDinheiroView($mensalidade['junho']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['julho']) ? $this->formatDinheiroView($mensalidade['julho']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['agosto']) ? $this->formatDinheiroView($mensalidade['agosto']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['setembro']) ? $this->formatDinheiroView($mensalidade['setembro']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['outubro']) ? $this->formatDinheiroView($mensalidade['outubro']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['novembro']) ? $this->formatDinheiroView($mensalidade['novembro']) : '' ?></td>
                                        <td class="font-small"><?php echo!empty($mensalidade['dezembro']) ? $this->formatDinheiroView($mensalidade['dezembro']) : '' ?></td>
                                        <td class="font-small">
                                            <?php echo!empty($total) ? $this->formatDinheiroView($total) : '' ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </table>

                        <?php
                    endforeach;
                endif;
                ?>
            </div>

        </div>
    </body>
</html>