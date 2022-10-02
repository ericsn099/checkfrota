<?php
session_start() or die('A sessão não pode ser iniciada');
/*esse bloco de código em php verifica se existe a sessão, pois o usuário pode
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador
    o caminho para a página principal do site (sistema), burlando assim a obrigação de
    fazer um login, com isso se ele não estiver feito o login não será criado a session,
    então ao verificar que a session não existe a página redireciona o mesmo
    para a index.php.*/
if ((!isset($_SESSION['login'])) || $_SESSION['tipousuario'] == 1) {
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
    <link rel="stylesheet" href="css/styleTelaFrota.css" />
    <title>CADASTRO DA FROTA</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-form">
                <div class="form-img">
                    <div class="img-area">
                        <img src="css/img/caminhaoadd.png" alt="user">
                    </div>
                </div>
                <form class="form" action="cadastrar_frota.php" method="post">
                    <label class="label-input">
                        <input type="text" id="placa" placeholder="Placa" name="placa" required>
                    </label>
                    SELECIONE UM TIPO DE FROTA
                    <label class="label-input">
                        <select class="ui-select-style1" id="sl_tipocarro" name='cmtipocarro' size=5 required>
                            <?php
                            include "conexao.php";
                            $sqlTipo = "SELECT id, nome FROM tipocaminhao";

                            $dados = mysqli_query($conn, $sqlTipo);
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $nome = $linha['nome'];
                                echo "<option  value='" . $linha['id'] . "'> $nome </option>";
                            }
                            ?>
                        </select>
                    </label>
                    <div class="container-button">
                        <button class="frota" id="cadastrar">CADASTRAR</button>
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
<script>
    document.getElementById("voltar").addEventListener("click", voltar);

    function voltar(event) {
        if (event.target.id === "voltar") {
            window.location.href = "telaAdm.php";
        }
    }
</script>