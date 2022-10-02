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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styleTelaFrota.css">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="row-9">
            <?php
            include "conexao.php";
            $id = $_POST['id'];
            $placa = $_POST['placa'];
            $idtipo = $_POST['cmtipocarro'];
            $sql = "UPDATE `frota` SET `placa`='$placa',`id_tipocaminhao`=$idtipo WHERE id =$id";
            try {
                if (mysqli_query($conn, $sql)) {
                    echo "<div class='modal'>
                <div class='modal-area'>
                    <div class='modal-info'>
                        <div class='texto-agente'>
                        ALTERADO COM SUCESSO
                        </div>
                    </div>
                </div>
            </div>";
                } else {
                    echo "<div class='modal'>
                <div class='modal-area' style='background-color: #9d3535'>
                    <div class='modal-info'>
                        <div class='texto-agente'>
                        PLACA J&Aacute EXISTENTE
                        </div>
                    </div>
                </div>
            </div>";
                }
            } catch (Exception $e) {
                echo "<div class='modal'>
                <div class='modal-area' style='background-color: #9d3535'>
                    <div class='modal-info'>
                        <div class='texto-agente'>
                        PLACA J&Aacute EXISTENTE
                        </div>
                    </div>
                </div>
            </div>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="css/js/alterarFrota.js"></script>
</body>

</html>