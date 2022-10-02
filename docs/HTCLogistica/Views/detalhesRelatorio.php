<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 1) {
    header('location: ../index.php');
    session_destroy();
    exit;
}
require_once "../Conn/conexao.php";
require_once "../Modelo/Checklist.php";
$check = $_GET['check'];
$sqlChecklist = "SELECT *
FROM frota, motorista, checklist, reboque
where checklist.id_frota = frota.id 
and checklist.id_reboque = reboque.id and checklist.id_motorista = motorista.id and checklist.id=$check;";

$dados = mysqli_query($conn, $sqlChecklist);
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
                    <?php
                    $checklist = new Checklist();
                    while ($linha = mysqli_fetch_assoc($dados)) {
                        $checklist->setId_motorista($linha['nome']);
                        $checklist->setId_frota($linha['placa']);
                        $checklist->setDatahora($linha['datahora']);
                        $checklist->setId_reboque($linha['placar']);
                        $checklist->setQuilometragem($linha['quilometragem']);
                        $checklist->setExtintor($linha['extintor']);
                        $checklist->setLuz_de_freio($linha['luz_de_freio']);
                        $checklist->setPiscas_direita($linha['piscas_direita']);
                        $checklist->setPiscas_esquerda($linha['piscas_esquerda']);
                        $checklist->setGiroflex($linha['giroflex']);
                        $checklist->setPiscas_alerta($linha['piscas_alerta']);
                        $checklist->setLimpador_de_parabrisas($linha['limpador_de_parabrisas']);
                        $checklist->setHigiene_interna($linha['higiene_interna']);
                        $checklist->setCalibragem_dos_pneus($linha['calibragem_dos_pneus']);
                        $checklist->setCartao_de_pedagio($linha['cartao_de_pedagio']);
                        $checklist->setLanternas_dianteiras_da_direita($linha['lanternas_dianteiras_da_esquerda']);
                        $checklist->setLanternas_dianteiras_da_esquerda($linha['lanternas_dianteiras_da_direita']);
                        $checklist->setLanternas_traseira_da_direita($linha['lanternas_traseira_da_direita']);
                        $checklist->setLanternas_traseira_da_esquerda($linha['lanternas_traseira_da_esquerda']);
                        $checklist->setHabilitacao($linha['habilitacao']);
                        $checklist->setEstado_dos_pneus($linha['estado_dos_pneus']);
                        $checklist->setBatida_lateral_direita($linha['batida_lateral_direita']);
                        $checklist->setBatida_lateral_esquerda($linha['batida_lateral_esquerda']);
                        $checklist->setBatido_dianteiro($linha['batido_dianteiro']);
                        $checklist->setBatido_traseiro($linha['batido_traseiro']);
                        $checklist->setBoleto($linha['boleto']);
                        $checklist->setCracha($linha['cracha']);
                        $checklist->setCapacete($linha['capacete']);
                        $checklist->setBota($linha['bota']);
                        $checklist->setColete($linha['colete']);
                        $checklist->setBicos($linha['bicos']);
                        $checklist->setObs($linha['obs']);
                        $checklist->setImage($linha['sig']);
                        $checklist->setFoto($linha['foto']);

                        $motorista = $checklist->getId_motorista();
                        $frota = $checklist->getId_frota();
                        $datahora = $checklist->getDatahora();
                        $semireboque = $checklist->getId_reboque();
                        $quilometragem = $checklist->getQuilometragem();
                        $extintor = $checklist->getExtintor();
                        $luz_de_freio = $checklist->getLuz_de_freio();
                        $piscas_direita = $checklist->getPiscas_direita();
                        $piscas_esquerda = $checklist->getPiscas_esquerda();
                        $giroflex = $checklist->getGiroflex();
                        $piscas_alerta = $checklist->getPiscas_alerta();
                        $limpador_de_parabrisas = $checklist->getLimpador_de_parabrisas();
                        $higiene_interna = $checklist->getHigiene_interna();
                        $calibragem_dos_pneus = $checklist->getCalibragem_dos_pneus();
                        $cartao_de_pedagio = $checklist->getCartao_de_pedagio();
                        $lanternas_dianteiras_da_esquerda = $checklist->getLanternas_dianteiras_da_esquerda();
                        $lanternas_dianteiras_da_direita = $checklist->getLanternas_dianteiras_da_direita();
                        $lanternas_traseira_da_direita = $checklist->getLanternas_traseira_da_direita();
                        $lanternas_traseira_da_esquerda = $checklist->getLanternas_traseira_da_esquerda();
                        $habilitacao = $checklist->getHabilitacao();
                        $estado_dos_pneus = $checklist->getEstado_dos_pneus();
                        $batida_lateral_direita = $checklist->getBatida_lateral_direita();
                        $batida_lateral_esquerda = $checklist->getBatida_lateral_esquerda();
                        $batido_dianteiro = $checklist->getBatido_dianteiro();
                        $batido_traseiro = $checklist->getBatido_traseiro();
                        $boleto = $checklist->getBoleto();
                        $cracha = $checklist->getCracha();
                        $capacete = $checklist->getCapacete();
                        $bota = $checklist->getBota();
                        $colete = $checklist->getColete();
                        $bicos = $checklist->getBicos();
                        $obs = $checklist->getObs();
                        $image = $checklist->getImage();
                        $foto = $checklist->getFoto();
                        echo "
                    <div class='form-imgP'>
                        <div class='img-areaP'>
                            <img src='$foto' id='fotoP'>
                        </div>
                    </div>
                    <div class='cabecalho'>

                        <label for=''>
                            MOTORISTA: $motorista
                        </label>
                        <label for=''>
                            FROTA: $frota
                        </label>
                        <label for=''>
                            SEMI REBOQUE: $semireboque
                        </label>
                        <label for=''>
                            SAIDA: $datahora
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
                                    <td class='tg-0lax'>$quilometragem</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>EXTINTOR</td>
                                    <td class='tg-0lax'>$extintor</td>
                                </tr>
                                <tr>
                                    <td class='tg-02ax'>LUZ DE FREIO</td>
                                    <td class='tg-0lax'>$luz_de_freio</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>PISCAS DIREITA</td>
                                    <td class='tg-0lax'>$piscas_direita</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>PISCAS ESQUERDA</td>
                                    <td class='tg-0lax'>$piscas_esquerda</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>GIROFLEX</td>
                                    <td class='tg-0lax'>$giroflex</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>PISCAS ALERTA</td>
                                    <td class='tg-0lax'>$piscas_alerta</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>LIMPADOR DE PARABRISA</td>
                                    <td class='tg-0lax'>$limpador_de_parabrisas</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>HIGIENE INTERNA</td>
                                    <td class='tg-0lax'>$higiene_interna</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>CALIBRAGEM DOS PNEUS</td>
                                    <td class='tg-0lax'>$calibragem_dos_pneus</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>CART&Atilde;O DE PED&Aacute;GIO</td>
                                    <td class='tg-0lax'>$cartao_de_pedagio</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>LANTERNAS DIANTEIRAS DA ESQUERDA</td>
                                    <td class='tg-0lax'>$lanternas_dianteiras_da_esquerda</td>
                                </tr>
                                <tr>
                                <td class='tg-0lax'>LANTERNAS DIANTEIRAS DA DIREITA</td>
                                    <td class='tg-0lax'>$lanternas_dianteiras_da_direita</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>LANTERNAS TRASEIRA DA DIREITA</td>
                                    <td class='tg-0lax'>$lanternas_traseira_da_direita</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>LANTERNAS TRASEIRA DA ESQUERDA</td>
                                    <td class='tg-0lax'>$lanternas_traseira_da_esquerda</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>HABILITA&Ccedil;&Atilde;O</td>
                                    <td class='tg-0lax'>$habilitacao</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>ESTADO DOS PNEUS</td>
                                    <td class='tg-0lax'>$estado_dos_pneus</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BATIDA LATERAL DIREITA</td>
                                    <td class='tg-0lax'>$batida_lateral_direita</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BATIDA LATERAL ESQUERDA</td>
                                    <td class='tg-0lax'>$batida_lateral_esquerda</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BATIDO DIANTEIRO</td>
                                    <td class='tg-0lax'>$batido_dianteiro</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BATIDO TRASEIRO</td>
                                    <td class='tg-0lax'>$batido_traseiro</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BOLETO</td>
                                    <td class='tg-0lax'>$boleto</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>CRACH&Aacute;</td>
                                    <td class='tg-0lax'>$cracha</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>CAPACETE</td>
                                    <td class='tg-0lax'>$capacete</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BOTA</td>
                                    <td class='tg-0lax'>$bota</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>COLETE</td>
                                    <td class='tg-0lax'>$colete</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>BICOS</td>
                                    <td class='tg-0lax'>$bicos</td>
                                </tr>
                                <tr>
                                    <td class='tg-0lax'>OBSERVA&Ccedil;&Atilde;O</td>
                                    <td class='tg-0lax'>$obs</td>
                                </tr>
                                <tr id='sig'>
                                    <td class='tg-0lax'>ASSINATURA</td>
                                    <td class='tg-0lax'><img src='$image' id='image'/></td>
                                </tr>
                        ";
                    ?>
                        </tbody>
                        </table>

                </div>
                <div class="container-button">
                    <button id="voltar" class="frota" onclick="window.location.href = 'relatorio.php'">VOLTAR</button>
                    <button id="imprimir" class="frota" onclick="window.print()">IMPRIMIR</button>
                </div>
                <div class="container-sig">
                    ASSINATURA: <?php echo "<img src='$image'/>";
                            }  ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>