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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTableFrota.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <title>EXIBIR FROTAS</title>

</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-area2">
                <div class="container-pesquisa">
                    <input type="text" name="placa" id="placa" placeholder="Digite para pesquisar">
                </div>
                <div class="container-dados">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-th">PLACA</th>
                                <th class="tg-th">TIPO CAMINH&Atilde;O</th>
                                <th class="tg-th">ALTERAR</th>
                                <th class="tg-th">EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody id='result'></tbody>
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
<?php if (isset($_GET['message'])) echo (printMessage($_GET['message']));
function printMessage($message)
{
    if ($message == 'success-remove')
        return "<div class='modal'>
                    <div class='modal-area'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                            EXCLUIDO COM SUCESSO
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
    if ($message == 'error-remove')
        return "<div class='modal'>
                    <div class='modal-area' style='background-color: #9d3535'>
                        <div class='modal-info'>
                            <div class='texto-agente'>
                                ERRO AO EXCLUIR
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    document.getElementById("voltar").addEventListener("click", voltar);

    function voltar(event) {
        if (event.target.id === "voltar") {
            window.location.href = "telaAdm.php";
        }
    }

    //requisição ajax
    $(document).ready(function() {
        load_data();

        function load_data(sqlChecklist) {
            $.ajax({
                url: "../ajax/searchfrota.php",
                method: "POST",
                data: {
                    sqlChecklist: sqlChecklist
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
        $('#placa').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>