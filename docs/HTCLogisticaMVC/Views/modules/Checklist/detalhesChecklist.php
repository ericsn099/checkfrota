<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleDetalhesRelatorio.css" />
    <title>RELAT&Oacute;RIO</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-area2">
                <div class="container-cabecalho">
                    <div class="form-img">
                        <div class="img-area">
                            <img src="../css/img/logoHTC.png" alt="user">
                        </div>
                    </div>

                    <div class='form-imgP'>
                        <div class='img-areaP'>
                            <img src=' <?= $model->foto ?>' id='fotoP'>
                        </div>
                    </div>
                    <div class='cabecalho'>
                        <label for=''>
                            MOTORISTA: <?= $model->nome ?>
                        </label>
                        <label for=''>
                            FROTA: <?= $model->placa ?>
                        </label>
                        <label for=''>
                            SEMI REBOQUE: <?= $model->placar ?>
                        </label>
                        <label for=''>
                            SAIDA: <?= $model->datahora ?>
                        </label>
                    </div>
                </div>
                <div class='container-dados'>
                    <table class='tg'>
                        <thead>
                            <tr>
                                <th>ITEM</th>
                                <th>SITUA&Ccedil;&Atilde;O</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='tg-baqh'>QUILOMETRAGEM</td>
                                <td class='tg-0lax'><?= $model->quilometragem ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>EXTINTOR</td>
                                <td class='tg-0lax'><?= $model->extintor ?></td>
                            </tr>
                            <tr>
                                <td class='tg-02ax'>LUZ DE FREIO</td>
                                <td class='tg-0lax'><?= $model->luz_de_freio ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>PISCAS DIREITA</td>
                                <td class='tg-0lax'><?= $model->piscas_direita ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>PISCAS ESQUERDA</td>
                                <td class='tg-0lax'><?= $model->piscas_esquerda ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>GIROFLEX</td>
                                <td class='tg-0lax'><?= $model->giroflex ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>PISCAS ALERTA</td>
                                <td class='tg-0lax'><?= $model->piscas_alerta ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>LIMPADOR DE PARABRISA</td>
                                <td class='tg-0lax'><?= $model->limpador_de_parabrisas ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>HIGIENE INTERNA</td>
                                <td class='tg-0lax'><?= $model->higiene_interna ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>CALIBRAGEM DOS PNEUS</td>
                                <td class='tg-0lax'><?= $model->calibragem_dos_pneus ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>CART&Atilde;O DE PED&Aacute;GIO</td>
                                <td class='tg-0lax'><?= $model->cartao_de_pedagio ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>LANTERNAS DIANTEIRAS DA ESQUERDA</td>
                                <td class='tg-0lax'><?= $model->lanternas_dianteiras_da_esquerda ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>LANTERNAS DIANTEIRAS DA DIREITA</td>
                                <td class='tg-0lax'><?= $model->lanternas_dianteiras_da_direita ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>LANTERNAS TRASEIRA DA DIREITA</td>
                                <td class='tg-0lax'><?= $model->lanternas_traseira_da_direita ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>LANTERNAS TRASEIRA DA ESQUERDA</td>
                                <td class='tg-0lax'><?= $model->lanternas_traseira_da_esquerda ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>HABILITA&Ccedil;&Atilde;O</td>
                                <td class='tg-0lax'><?= $model->habilitacao ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>ESTADO DOS PNEUS</td>
                                <td class='tg-0lax'><?= $model->estado_dos_pneus ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BATIDA LATERAL DIREITA</td>
                                <td class='tg-0lax'><?= $model->batida_lateral_direita ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BATIDA LATERAL ESQUERDA</td>
                                <td class='tg-0lax'><?= $model->batida_lateral_esquerda ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BATIDO DIANTEIRO</td>
                                <td class='tg-0lax'><?= $model->batido_dianteiro ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BATIDO TRASEIRO</td>
                                <td class='tg-0lax'><?= $model->batido_traseiro ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BOLETO</td>
                                <td class='tg-0lax'><?= $model->boleto ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>CRACH&Aacute;</td>
                                <td class='tg-0lax'><?= $model->cracha ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>CAPACETE</td>
                                <td class='tg-0lax'><?= $model->capacete ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BOTA</td>
                                <td class='tg-0lax'><?= $model->bota ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>COLETE</td>
                                <td class='tg-0lax'><?= $model->colete ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>BICOS</td>
                                <td class='tg-0lax'><?= $model->bicos ?></td>
                            </tr>
                            <tr>
                                <td class='tg-0lax'>OBSERVA&Ccedil;&Atilde;O</td>
                                <td class='tg-0lax'><?= $model->obs ?></td>
                            </tr>
                            <tr id='sig'>
                                <td class='tg-0lax'>ASSINATURA</td>
                                <td class='tg-0lax'><img src='<?= $model->sig ?>' id='image' /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <button id="voltar" class="frota" onclick="window.location.href = '/checklist'">VOLTAR</button>
                    <button id="imprimir" class="frota" onclick="window.print()">IMPRIMIR</button>
                </div>
                <div class="container-sig">
                    ASSINATURA: <img src='<?= $model->sig ?>' />";
                </div>
            </div>
        </div>
    </div>
</body>

</html>