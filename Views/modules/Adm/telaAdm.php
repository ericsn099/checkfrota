<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTelaAdm.css" />
    <title>ADMINISTRADOR</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-button">
                <button id="exibirSemiReboque" class="frota" onclick="window.location.href = '/semiReboque'">EXIBIR SEMI REBOQUES</button>
                <button id="exibirMotoristas" class="frota" onclick="window.location.href = '/motorista'">EXIBIR MOTORISTAS</button>
                <button id="exibirFrotas" class="frota" onclick="window.location.href = '/frota'">EXIBIR FROTAS</button>
                <button id="exibirTipoFrotas" class="frota" onclick="window.location.href = '/tipoFrota'">EXIBIR TIPO FROTAS</button>
                <button id="exibirTipoSemiReboque" class="frota" onclick="window.location.href = '/tipoSemiReboque'">EXIBIR TIPO SEMI REBOQUE</button>
                <button id="exibirRelatorio" class="frota" onclick="window.location.href = '/checklist'">RELATORIO</button>
                <button id="sair" class="sair" onclick="window.location.href = '../Controller/sair.php'">SAIR</button>
            </div>
        </div>
    </div>
</body>

</html>