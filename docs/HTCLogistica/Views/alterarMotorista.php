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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTelaMotorista.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <title>CADASTRO DO MOTORISTA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-form">
                <div class="form-img">
                    <div class="img-area">
                        <img src="../css/img/user.png" alt="user">
                    </div>
                </div>
                <form class="form" action="../Controller/alterar_motorista.php" method="post">
                    <label class="label-input">
                        <?php
                        $sqlAlterar = "SELECT *
                        FROM motorista WHERE id=$id";
                        $dados = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            echo "<input type='text' style='display:none' name='id' value='" . $linha['id'] . "'>
                                ";
                        }
                        ?>
                    </label>
                    <label class="label-input">
                        <?php
                        $sqlAlterar = "SELECT *
                        FROM motorista WHERE id=$id";
                        $dados = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            echo "<input type='text' id='nome' placeholder='Nome completo' name='nome' value='" . $linha['nome'] . "' required>
                                ";
                        }
                        ?>
                    </label>
                    <br>
                    <label class="label-input">
                        <?php
                        $sqlAlterar = "SELECT *
                        FROM motorista WHERE id=$id";
                        $dados = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            echo "<input type='number' id='cpf' placeholder='CPF (apenas numeros)' name='cpf' onkeydown='return FilterInput(event)' onpaste='handlePaste(event)'  value='" . $linha['cpf'] . "' required>
                                ";
                        }
                        ?>

                    </label>
                    <br>
                    <label class="label-input">
                        <?php
                        $sqlAlterar = "SELECT *
                        FROM motorista WHERE id=$id";
                        $dados = mysqli_query($conn, $sqlAlterar);
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            echo "<input type='number' id='habilitacao' placeholder='Nº da CNH' name='habilitacao' onkeydown='return FilterInput(event)' onpaste='handlePaste(event)' value='" . $linha['habilitacao'] . "' required>
                                ";
                        }
                        ?>

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
                    window.location.replace('../Views/exibirMotoristas.php');
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
            window.location.href = "exibirMotoristas.php";
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