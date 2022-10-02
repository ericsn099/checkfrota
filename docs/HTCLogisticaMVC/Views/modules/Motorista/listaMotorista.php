<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleTableMotorista.css" />
    <link rel="stylesheet" href="../css/modal.css" />
    <title>EXIBIR MOTORISTAS</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-area2">
                <div class="container-pesquisa">
                    <form action="?checar=" method="GET">
                        <input type="text" name="checar" id="placa" placeholder="Pesquisar">
                        <input type="submit" value="PESQUISAR">
                    </form>
                </div>
                <div class="container-dados">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-th">MOTORISTA</th>
                                <th class="tg-th">CPF</th>
                                <th class="tg-th">HABILITA&Ccedil;&Atilde;O</th>
                                <th class="tg-th">ALTERAR</th>
                                <th class="tg-th">EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modelMotorista->rows as $itemMotorista) : ?>
                                <tr>
                                    <th class="tg-th"><?= $itemMotorista->nome ?></th>
                                    <th class="tg-th"><?= $itemMotorista->cpf ?></th>
                                    <th class="tg-th"><?= $itemMotorista->habilitacao ?></th>
                                    <th class="tg-th"><a href="/motorista/form?id=<?= $itemMotorista->id ?>">ALTERAR</a></th>
                                    <th class="tg-th"><a href="/motorista/delete?id=<?= $itemMotorista->id ?>">EXCLUIR</a></th>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <a href="/motorista/form" id="cadastrar" class="frota">CADASTRO</a>
                    <a href="/adm" id="voltar" class="frota">VOLTAR</a href="/adm">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackMotorista/excluir.php';
}
?>