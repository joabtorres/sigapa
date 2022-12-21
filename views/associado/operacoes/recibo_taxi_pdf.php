<?php

function create_image($user) {
    $fontname = array('ubuntu_regular' => getcwd().'\\assets\\fonts\\ubuntu-regular.ttf');
    $i = 30;
    $quality = 100;
    $largura = 2000;
    $altura = 1132;
    $height = 0;
    $file = "uploads/operacao/recibo_taxi_temp.jpg";
    $imagemOriginal = 'assets/imagens/recibo_taxi.jpg';

    // if the file already exists dont create it again just serve up the original	
    if (file_exists($file)) {
        unlink($file);
    }
    // define the base image that we lay our text on

    list($larguraOriginal, $alturaOriginal) = getimagesize($imagemOriginal);
    $ratio = $larguraOriginal / $alturaOriginal;

    if ($largura / $altura > $ratio) {
        $largura = $altura * $ratio;
    } else {
        $altura = $largura / $ratio;
    }
    $imagemFinal = imagecreatetruecolor($largura, $altura);
    $im = imagecreatefromjpeg($imagemOriginal);

    // setup the text colours
    $color['black'] = imagecolorallocate($im, 0, 0, 0);

    // this defines the starting height for the text block
    $y = imagesy($im) - $height - 1100;

    foreach ($user as $value) {
        imagettftext($im, $value['font-size'], 0, $value['x'], $y + $i, $color[$value['color']], $fontname[$value['font-family']], $value['name']);
        if (isset($value['margin-bottom'])) {
            $i = $i + intval($value['margin-bottom']);
        } else {
            $i = $i + 50;
        }
    }
    // create the image
    imagecopyresampled($imagemFinal, $im, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    imagejpeg($imagemFinal, $file, $quality);

    return $file;
}

$user = array(
    array(
        'name' => $cidade['nome_siglas'] . ' - ' . $cidade['nome_completo'],
        'font-size' => '31',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 280,
        'margin-bottom' => 40
    ),
    array(
        'name' => $cidade['endereco'] . ' - CEP: ' . $cidade['cep'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 280,
        'margin-bottom' => 40
    ),
    array(
        'name' => $cidade['url_site'] . ' | ' . $cidade['email'] . ' | CNPJ ' . $cidade['cnpj'],
        'font-size' => '18',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
       'x' => 280,
        'margin-bottom' => 610
    ),
    array(
        'name' => $cooperado['nome_completo'],
        'font-size' => '30',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 85,
        'x' => 500
    ),
    array(
        'name' => str_pad($cooperado['cod'], 3, '0', STR_PAD_LEFT),
        'font-size' => '30',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'x' => 410,
        'margin-bottom' => 0
    ),
    array(
        'name' => $cooperado['cpf'],
        'font-size' => '30',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 0,
        'x' => 870
    ), array(
        'name' => $cooperado['celular_1'],
        'font-size' => '30',
        'color' => 'black',
        'font-family' => 'ubuntu_regular',
        'margin-bottom' => 42,
        'x' => 1500
    )
);
// run the script to create the image

$filename = create_image($user);
ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Recibo de Táxi</title>
    </head>
    <body>
        <img src="<?= BASE_URL . '/' . $filename; ?>" style="border: 2px solid #ccc; display:  block; margin: 3px auto; width: 620px;"/>
        <img src="<?= BASE_URL . '/' . $filename; ?>" style="border: 2px solid #ccc; display:  block; margin: 3px auto; width: 620px;"/>
        <img src="<?= BASE_URL . '/' . $filename; ?>" style="border: 2px solid #ccc; display:  block; margin: 3px auto; width: 620px;"/>
    </body>
</html>


<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'margin_left' => 5,'margin_right' => 2,'margin_top' => 5,'margin_bottom' => 2,'margin_header' => 2,'margin_footer' => 2]);
$mpdf->WriteHTML($html);
$arquivo = 'recibo_de_taxi_' . date('d_m_Y.') . 'pdf';
$mpdf->Output($arquivo, 'I');
?>
