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
include "conexao.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleRelatorio.css" />
    <title>RELAT&Oacute;RIO</title>
</head>
<body>
    <div class="container">
        <div class="container-area">
            <div class="container-area2">
                <div class="container-pesquisa">
                    <form name="form" id="idform" action="" method="">
                        <?php
                            $datahora = $_GET['datahora'];
                            $sqlChecklist = "SELECT frota.placa, checklist.id, motorista.nome, checklist.datahora, checklist.sig 
                            FROM frota, motorista, checklist 
                            where checklist.id_frota = frota.id 
                            and checklist.id_motorista = motorista.id and datahora like '$datahora%'
                            order by checklist.datahora 
                            DESC;";
                        ?>
                        <label for="">PESQUISAR POR DATA: </label><input type="date" name="datahora" id="datahora">
                        <input id="pesquisar" type="submit" value="PESQUISAR">
                    </form>
                </div>
                <div class="container-dados">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-th">MOTORISTA</th>
                                <th class="tg-th">FROTA</th>
                                <th class="tg-th">SA&Iacute;DA</th>
                                <th class="tg-th">DETALHES</th>
                                <th class="tg-th">ASSINATURA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $dados = mysqli_query($conn, $sqlChecklist);
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $check = $linha['id'];
                                $motorista = $linha['nome'];
                                $placa = $linha['placa'];
                                $saida = $linha['datahora'];
                                $image = $linha['sig'];
                                echo "
                                <tr>
                                    <td class='tg-tr'>$motorista</td>
                                    <td class='tg-tr'>$placa</td>
                                    <td class='tg-tr'>$saida</td>
                                    <td class='tg-tr'><a href='detalhesRelatorio.php?check=$check'>DETALHES</td>
                                    <td class='tg-tr'><img src='$image'/></td>
                                    </form>
                                </tr>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <button id="voltar" class="frota">VOLTAR</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.getElementById("voltar").addEventListener("click", voltar);
    document.getElementById("pesquisar").addEventListener("click", voltar);

    function voltar(event) {
        if (event.target.id === "voltar") {
            window.location.href = "telaAdm.php";
        }
    }
</script>