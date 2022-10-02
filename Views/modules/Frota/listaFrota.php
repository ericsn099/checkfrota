<?php
require_once "session/sessionAdm.php";
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
                <form action="?placa=" method="GET">
                        <input type="text" name="placa" id="placa" placeholder="Pesquisar">
                        <input type="submit" value="PESQUISAR">
                    </form>
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
                        <tbody>
                            <?php foreach ($model->rows as $item) : ?>
                                <tr>
                                    <th class="tg-th"><?= $item->placa ?></th>
                                    <th class="tg-th"><?= $item->nome ?></th>
                                    <th class="tg-th"><a href="/frota/form?id=<?= $item->id ?>">ALTERAR</a></th>
                                    <th class="tg-th"><a href="/frota/delete?id=<?= $item->id ?>">EXCLUIR</a></th>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <a href="/frota/form" id="cadastrar" class="frota">CADASTRO</a>
                    <a href="/adm" id="voltar" class="frota">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackFrota/excluir.php';
}
?>