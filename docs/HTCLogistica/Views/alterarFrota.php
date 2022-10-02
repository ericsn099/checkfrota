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

$id = $_GET['id'];
$sqlAlterar = "SELECT frota.id, frota.placa, tipocaminhao.nome, frota.id_tipocaminhao 
FROM frota, tipocaminhao 
WHERE frota.id_tipocaminhao = tipocaminhao.id and frota.id=$id";

$dados = mysqli_query($conn, $sqlAlterar);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTelaFrota.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <title>CADASTRO DA FROTA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-form">
                <div class="form-img">
                    <div class="img-area">
                        <img src="../css/img/caminhaoadd.png" alt="user">
                    </div>
                </div>
                <form class="form" action="../Controller/alterar_frota.php" method="post">
                    <label class="label-input">
                        <?php
                        $dados1 = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados1)) {
                            echo "<input type='text' style='display:none' name='id' value='" . $linha['id'] . "'>";
                        }
                        ?>
                    </label>

                    <label class="label-input">
                        <?php
                        $dados1 = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados1)) {
                            $placa = $linha['placa'];
                            $tipocaminhao = $linha['nome'];
                            echo "<input type='text' id='placa' placeholder='Placa' name='placa' value='" . $linha['placa'] . "' required>";
                        }
                        ?>
                    </label>
                    <label class="label-input">
                        ESTE CAMINHÃO É: <?php echo $tipocaminhao; ?>
                    </label>
                    <label class="label-input">
                        <select class="ui-select-style" id="sl_tipocarro" name='cmtipocarro' size=1 required>
                        <option> SELECIONE UM TIPO DE FROTA </option>
                            <?php
                            include "conexao.php";
                            $sqlTipo = "SELECT id, nome FROM tipocaminhao";

                            $dados2 = mysqli_query($conn, $sqlTipo);
                            while ($linha1 = mysqli_fetch_assoc($dados2)) {
                                $nome = $linha1['nome'];
                                $dados1 = mysqli_query($conn, $sqlAlterar);
                                while ($linha2 = mysqli_fetch_assoc($dados1)) {
                                    $tipocaminhao = $linha2['nome'];
                                }
                                echo "<option  value='" . $linha1['id'] . "' > $nome </option>";
                            }
                            ?>
                        </select>
                    </label>
                    <div class="container-button">
                        <button class="frota" id="cadastrar">ALTERAR</button>
                    </div>
                </form>
                <div class="container-button">
                    <button class="frota" id="voltar">VOLTAR</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php if (isset($_GET['message'])) echo (printMessage($_GET['message']));
function printMessage($message)
{
    if ($message == 'success-update')
        return "<div class='modal'>
                    <div class='modal-area'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                            ALTERADO COM SUCESSO
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                    let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                    setTimeout(() => {
                    abrirModal();
                    clearTimeout();
                    }, 0)

                    setTimeout(() => {
                    fecharModal();
                    window.location.replace('../Views/exibirFrotas.php');
                    }, 1000)
                </script>
                ";
    if ($message == 'error-update')
        return "<div class='modal'>
                    <div class='modal-area' style='background-color: #9d3535'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                                DADOS J&Aacute; EXISTENTE
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    let abrirModal = () => document.querySelector('.modal').style.display = 'flex';
                    let fecharModal = () => document.querySelector('.modal').style.display = 'none';
                    setTimeout(() => {
                    abrirModal();
                    clearTimeout();
                    }, 0)

                    setTimeout(() => {
                    fecharModal();
                    }, 2000)
                </script>
                ";
}
?>
<script>
    document.getElementById("voltar").addEventListener("click", voltar);

    function voltar(event) {
        if (event.target.id === "voltar") {
            window.location.href = "exibirFrotas.php";
        }
    }
</script>