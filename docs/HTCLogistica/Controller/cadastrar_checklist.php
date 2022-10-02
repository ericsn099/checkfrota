<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 2) {
    header('location: ../index.php');
    session_destroy();
    exit;
}
require_once "../Modelo/Checklist.php";
require_once "../Conn/conexao.php";

date_default_timezone_set("America/Manaus");

$checklist = new Checklist();
$checklist->setDatahora(date("y-m-d H:i:s"));
$checklist->setId_frota($_POST['cmplaca']);
$checklist->setId_motorista($_POST['cmmotorista']);
$checklist->setId_reboque($_POST['cmreboque']);
$checklist->setQuilometragem($_POST['quilometragem']);
$checklist->setExtintor($_POST['extintor']);
$checklist->setLuz_de_freio($_POST['luz_de_freio']);
$checklist->setPiscas_direita($_POST['piscas_direita']);
$checklist->setPiscas_esquerda($_POST['piscas_esquerda']);
$checklist->setGiroflex($_POST['giroflex']);
$checklist->setPiscas_alerta($_POST['piscas_alerta']);
$checklist->setLimpador_de_parabrisas($_POST['limpador_de_parabrisas']);
$checklist->setHigiene_interna($_POST['higiene_interna']);
$checklist->setCalibragem_dos_pneus($_POST['calibragem_dos_pneus']);
$checklist->setCartao_de_pedagio($_POST['cartao_de_pedagio']);
$checklist->setLanternas_dianteiras_da_esquerda($_POST['lanternas_dianteiras_da_esquerda']);
$checklist->setLanternas_dianteiras_da_direita($_POST['lanternas_dianteiras_da_direita']);
$checklist->setLanternas_traseira_da_direita($_POST['lanternas_traseira_da_direita']);
$checklist->setLanternas_traseira_da_esquerda($_POST['lanternas_traseira_da_esquerda']);
$checklist->setHabilitacao($_POST['habilitacao']);
$checklist->setEstado_dos_pneus($_POST['estado_dos_pneus']);
$checklist->setBatida_lateral_direita($_POST['batida_lateral_direita']);
$checklist->setBatida_lateral_esquerda($_POST['batida_lateral_esquerda']);
$checklist->setBatido_dianteiro($_POST['batido_dianteiro']);
$checklist->setBatido_traseiro($_POST['batido_traseiro']);
$checklist->setBoleto($_POST['boleto']);
$checklist->setCracha($_POST['cracha']);
$checklist->setCapacete($_POST['capacete']);
$checklist->setBota($_POST['bota']);
$checklist->setColete($_POST['colete']);
$checklist->setBicos($_POST['bicos']);
$checklist->setObs($_POST['obs']);
$checklist->setImage($_POST['sig']);
$checklist->setFoto($_POST['fotoV']);

$agora = $checklist->getDatahora();
$placa = $checklist->getId_frota();
$motorista = $checklist->getId_motorista();
$reboque = $checklist->getId_reboque();
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
$lanternas_dianteiras_da_esquerda = $checklist->getLanternas_dianteiras_da_direita();
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

$sql = "INSERT INTO checklist(id_frota, id_motorista, id_reboque, datahora, quilometragem, extintor, luz_de_freio, piscas_direita, piscas_esquerda, giroflex, piscas_alerta, limpador_de_parabrisas, higiene_interna, calibragem_dos_pneus, cartao_de_pedagio, lanternas_dianteiras_da_esquerda, lanternas_dianteiras_da_direita, lanternas_traseira_da_direita, lanternas_traseira_da_esquerda, habilitacao, estado_dos_pneus,batida_lateral_direita, batida_lateral_esquerda, batido_dianteiro, batido_traseiro, boleto, cracha, capacete, bota, colete, bicos, obs, sig, foto)
                        VALUES ('$placa','$motorista','$reboque','$agora','$quilometragem','$extintor','$luz_de_freio','$piscas_direita','$piscas_esquerda','$giroflex','$piscas_alerta','$limpador_de_parabrisas','$higiene_interna','$calibragem_dos_pneus','$cartao_de_pedagio','$lanternas_dianteiras_da_esquerda','$lanternas_dianteiras_da_direita','$lanternas_traseira_da_direita','$lanternas_traseira_da_esquerda','$habilitacao','$estado_dos_pneus','$batida_lateral_direita','$batida_lateral_esquerda','$batido_dianteiro','$batido_traseiro','$boleto','$cracha','$capacete','$bota','$colete','$bicos','$obs','$image','$foto')";
try {
    if (mysqli_query($conn, $sql)) {
        $message = 'success-create';
        return header("Location: ../Views/telaAgp.php?message=$message");
    } else {
        $message = 'error-create';
        return header("Location: ../Views/telaAgp.php?message=$message");
    }
} catch (Exception $e) {
    $message = 'error-create';
    return header("Location: ../Views/telaAgp.php?message=$message");
}
mysqli_close($conn);
