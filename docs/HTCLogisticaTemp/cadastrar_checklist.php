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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styleTelaAgp.css">
    <title></title>
</head>

<body>
    <div class="container">
        <?php
        include "conexao.php";
        date_default_timezone_set("America/Manaus");
        $agora = date("y-m-d H:i:s");
        $placa = $_POST['cmplaca'];
        $motorista = $_POST['cmmotorista'];
        $reboque = $_POST['cmreboque'];
        $quilometragem = $_POST['quilometragem'];
        $extintor = $_POST['extintor'];
        $luz_de_freio = $_POST['luz_de_freio'];
        $piscas_direita = $_POST['piscas_direita'];
        $piscas_esquerda = $_POST['piscas_esquerda'];
        $giroflex = $_POST['giroflex'];
        $piscas_alerta = $_POST['piscas_alerta'];
        $limpador_de_parabrisas = $_POST['limpador_de_parabrisas'];
        $higiene_interna = $_POST['higiene_interna'];
        $calibragem_dos_pneus = $_POST['calibragem_dos_pneus'];
        $cartao_de_pedagio = $_POST['cartao_de_pedagio'];
        $lanternas_dianteiras_da_esquerda = $_POST['lanternas_dianteiras_da_esquerda'];
        $lanternas_dianteiras_da_direita = $_POST['lanternas_dianteiras_da_direita'];
        $lanternas_traseira_da_direita = $_POST['lanternas_traseira_da_direita'];
        $lanternas_traseira_da_esquerda = $_POST['lanternas_traseira_da_esquerda'];
        $habilitacao = $_POST['habilitacao'];
        $estado_dos_pneus = $_POST['estado_dos_pneus'];
        $batida_lateral_direita = $_POST['batida_lateral_direita'];
        $batida_lateral_esquerda = $_POST['batida_lateral_esquerda'];
        $batido_dianteiro = $_POST['batido_dianteiro'];
        $batido_traseiro = $_POST['batido_traseiro'];
        $boleto = $_POST['boleto'];
        $cracha = $_POST['cracha'];
        $capacete = $_POST['capacete'];
        $bota = $_POST['bota'];
        $colete = $_POST['colete'];
        $bicos = $_POST['bicos'];
        $obs = $_POST['obs'];

        $sql = "INSERT INTO checklist(id_frota, id_motorista, id_reboque, datahora, quilometragem, extintor, luz_de_freio, piscas_direita, piscas_esquerda, giroflex, piscas_alerta, limpador_de_parabrisas, higiene_interna, calibragem_dos_pneus, cartao_de_pedagio, lanternas_dianteiras_da_esquerda, lanternas_dianteiras_da_direita, lanternas_traseira_da_direita, lanternas_traseira_da_esquerda, habilitacao, estado_dos_pneus,batida_lateral_direita, batida_lateral_esquerda, batido_dianteiro, batido_traseiro, boleto, cracha, capacete, bota, colete, bicos, obs)
                        VALUES ('$placa','$motorista','$reboque','$agora','$quilometragem','$extintor','$luz_de_freio','$piscas_direita','$piscas_esquerda','$giroflex','$piscas_alerta','$limpador_de_parabrisas','$higiene_interna','$calibragem_dos_pneus','$cartao_de_pedagio','$lanternas_dianteiras_da_esquerda','$lanternas_dianteiras_da_direita','$lanternas_traseira_da_direita','$lanternas_traseira_da_esquerda','$habilitacao','$estado_dos_pneus','$batida_lateral_direita','$batida_lateral_esquerda','$batido_dianteiro','$batido_traseiro','$boleto','$cracha','$capacete','$bota','$colete','$bicos','$obs')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='modal'>
                    <div class='modal-area'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                                CADASTRADO COM SUCESSO
                            </div>
                        </div>
                    </div>
                </div>";
        }
        mysqli_close($conn);
        ?>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="css/js/checklist.js"></script>

</body>

</html>