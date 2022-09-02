<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 2) {
    header('location:index.php');
    session_destroy();
    exit;
}
$logado = $_SESSION['login'];
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleTelaAgp.css" />
    <title>AGENTE DE PORTARIA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <form class="form" action="cadastrar_checklist.php" method="post">
                <div class="container-form">
                    <div class="container-placa">
                        <label class="label-input">
                            <select class="ui-select-style" id="sl_placa" name='cmplaca' required>
                                <option value=''>PLACA</option>
                                <?php
                                include "conexao.php";
                                $sqlTipo = "SELECT * FROM frota ORDER BY placa ASC";

                                $dados = mysqli_query($conn, $sqlTipo);
                                while ($linha = mysqli_fetch_assoc($dados)) {
                                    $placa = $linha['placa'];
                                    echo "<option  value='" . $linha['id'] . "'> $placa </option>";
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                    <div class="container-reboque">
                        <label class="label-input">
                            <select class="ui-select-style" id="sl_reboque" name='cmreboque'>
                                <option value='1'>SEMI REBOQUE</option>
                                <?php
                                include "conexao.php";
                                $sqlTipo = "SELECT * FROM reboque WHERE id > 1 ORDER BY placar ASC";

                                $dados = mysqli_query($conn, $sqlTipo);
                                while ($linha = mysqli_fetch_assoc($dados)) {
                                    $placa = $linha['placar'];
                                    echo "<option  value='" . $linha['id'] . "'> $placa </option>";
                                }
                                ?>
                            </select>
                        </label>
                    </div>
                    <div class="container-motorista">
                        <label class="label-input">
                            <select class="ui-select-style" id="sl_motorista" name='cmmotorista' required>
                                <option value=''>MOTORISTA</option>
                                <?php
                                include "conexao.php";
                                $sqlTipo = "SELECT * FROM motorista ORDER BY nome ASC";

                                $dados = mysqli_query($conn, $sqlTipo);
                                while ($linha = mysqli_fetch_assoc($dados)) {
                                    $nome = $linha['nome'];
                                    echo "<option  value='" . $linha['id'] . "'> $nome </option>";
                                }
                                ?>
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
                <div class="container-rodape">
                    <div class="container-text-area">
                        <textarea name="obs" id="obs" placeholder="OBSERVA&Ccedil;&Atilde;O"></textarea>
                    </div>
                    <div class="container-pai-button">
                        <div class="container-button">
                            <button class="frota" id="cadastrar">CADASTRAR</button>
                            <button id="sair" class="frota" name="sair">SAIR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>
    document.getElementById("sair").addEventListener("click", clique);
    document.getElementById("relatorio").addEventListener("click", clique);

    function clique(event) {
        if (event.target.id === "sair") {
            window.location.href = "sair.php";
        }
    }

    function FilterInput(event) {
        var keyCode = ('which' in event) ? event.which : event.keyCode;

        isNotWanted = (keyCode == 69 || keyCode == 101 || keyCode == 107 || keyCode == 109 || keyCode == 187 || keyCode == 189 || keyCode == 38 || keyCode == 40);
        return !isNotWanted;
    };

    function handlePaste(e) {
        var clipboardData, pastedData;

        // Get pasted data via clipboard API
        clipboardData = e.clipboardData || window.clipboardData;
        pastedData = clipboardData.getData('Text').toUpperCase();

        if (pastedData.indexOf('E') > -1) {
            //alert('found an E');
            e.stopPropagation();
            e.preventDefault();
        }
    };
</script>