<?php
require_once "session/sessionChecklist.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTelaAgp.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <title>AGENTE DE PORTARIA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <form class="form" action="/checklist/form/save" method="post">
                <div class="container-form">
                    <div class="container-placa">
                        <label class="label-input">
                            <select class="ui-select-style" name='cmplaca' required>
                                <option>FROTA</option>
                                <?php foreach ($modelFrota->rows as $item) : ?>
                                    <option value="<?= $item->id ?>"><?= $item->placa ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    </div>
                    <div class="container-reboque">
                        <label class="label-input">
                            <select class="ui-select-style" name='cmreboque'>
                                <option value="1">SEMI REBOQUE</option>
                                <?php foreach ($modelSemiReboque->rows as $item) : ?>
                                    <option value="<?= $item->id ?>"><?= $item->placar ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    </div>
                    <div class="container-motorista">
                        <label class="label-input">
                            <select class="ui-select-style" name='cmmotorista' required>
                                <option>MOTORISTA</option>
                                <?php foreach ($modelMotorista->rows as $item) : ?>
                                    <option value="<?= $item->id ?>"><?= $item->nome ?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="container-check">
                    <div class="container-radios">
                        <!--INICIA O GRUPO DE DIVS PARA O QUESTIONÁRIO-->
                        <div class="gp1">
                            <div class="input-question">
                                <label for="quilometragem">Quilometragem</label>
                                <div class="container-input-radio-label">
                                    <input type="number" name="quilometragem" id="inputkm" placeholder="Digite aqui" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required />
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="extintor">Extintor</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="extintor" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="extintor" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="cartao_de_pedagio">Cart&atilde;o de ped&aacute;gio</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="cartao_de_pedagio" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="cartao_de_pedagio" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="piscas_direita">Piscas direita</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="piscas_direita" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="piscas_direita" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="piscas_esquerda">Piscas esquerda</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="piscas_esquerda" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="piscas_esquerda" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="gp2">
                            <div class="input-question">
                                <label for="giroflex">Giroflex</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="giroflex" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="giroflex" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="piscas_alerta">Piscas alerta</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="piscas_alerta" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="piscas_alerta" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="limpador_de_parabrisas">Limpador de parabrisas</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="limpador_de_parabrisas" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="limpador_de_parabrisas" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="higiene_interna">Higiene interna</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="higiene_interna" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="higiene_interna" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="calibragem_dos_pneus">Calibragem dos pneus</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="calibragem_dos_pneus" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="calibragem_dos_pneus" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>

                        </div>
                        <div class="gp3">
                            <div class="input-question">
                                <label for="luz_de_freio">Luz de freio</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="luz_de_freio" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="luz_de_freio" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="lanternas_dianteiras_da_esquerda">Lanternas dianteiras da esquerda</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="lanternas_dianteiras_da_esquerda" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="lanternas_dianteiras_da_esquerda" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="lanternas_dianteiras_da_direita">Lanternas dianteiras da direita</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="lanternas_dianteiras_da_direita" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="lanternas_dianteiras_da_direita" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="lanternas_traseira_da_direita">Lanternas traseira da direita</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="lanternas_traseira_da_direita" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="lanternas_traseira_da_direita" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="lanternas_traseira_da_esquerda">Lanternas traseiras da esquerda</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="lanternas_traseira_da_esquerda" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="lanternas_traseira_da_esquerda" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="gp4">
                            <div class="input-question">
                                <label for="boleto">Habilita&ccedil;&atilde;o</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="habilitacao" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="habilitacao" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="estado_dos_pneus">Estado dos pneus</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="estado_dos_pneus" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="estado_dos_pneus" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="batida_lateral_direita">Batida lateral direita</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="batida_lateral_direita" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="batida_lateral_direita" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="batida_lateral_esquerda">Batida lateral esquerda</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="batida_lateral_esquerda" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="batida_lateral_esquerda" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="batido_dianteiro">Batido dianteiro</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="batido_dianteiro" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="batido_dianteiro" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="batido_traseiro">Batido traseiro</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="batido_traseiro" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="batido_traseiro" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="gp5">
                            <div class="input-question">
                                <label for="boleto">Boleto</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="boleto" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="boleto" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="cracha">Crach&aacute;</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="cracha" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="cracha" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="bota">Capacete</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="bota" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="bota" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="capacete">Bota</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="capacete" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="capacete" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="colete">Colete</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="colete" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="colete" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                            <div class="input-question">
                                <label for="bicos">Bicos</label>
                                <div class="container-input-radio-label">
                                    <div class="input-label"><input type="radio" name="bicos" value="SIM" required><label for="">SIM</label></div>
                                    <div class="input-label"><input type="radio" name="bicos" value="N&Atilde;O" required><label for="">N&Atilde;O</label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-camera">
                    <div class="container-video">
                        <video id='video' width="300px" height="350px"></video>
                        <div class="container-canvas">
                            <canvas id='canvas'></canvas>
                        </div>
                    </div>
                    <div class="container-button-camera">
                        <a href="#" id='fecha'>FECHAR CAMERA</a>
                        <a href="#" id='rotate'><img src="../css/img/rotacao.png" style="height: 25px; color:white;"></a>
                        <a href="#" id='capture'>CAPTURAR</a>
                    </div>
                    <textarea name="obs" id="obs" placeholder="OBSERVA&Ccedil;&Atilde;O" style="display:flex"></textarea>
                </div>
                <div class="container-rodape">
                    <div class="container-text-area">
                        <label for="">ASSINATURA</label>
                        <canvas id="signature-pad" class="signature-pad" width="528" height=60px style="border: 1px solid"></canvas>
                        <a href="#" id="clear">LIMPAR CAMPO DE ASSINATURA</a>
                        <textarea name="sig" id="sig" style="display:none" required></textarea>
                        <textarea name="fotoV" id="fotoV" style="display:none" required></textarea>
                    </div>
                    <div class="container-pai-button">
                        <div class="container-button">
                            <button id="cadastrar" class="frota">CADASTRAR</button>
                            <a href="#" id="foto" class="frota">REGISTRAR FOTO</a>
                            <button id="sair" class="frota" name="sair" onclick="window.location.href = '../Controller/sair.php'">SAIR</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container-clear">
            </div>
        </div>
    </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0-beta.3/dist/signature_pad.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/telaAgp.js"></script>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackChecklist/salvar.php';
}
?>