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
                    <form action="?nome=" method="GET">
                        <input type="text" name="nome" id="nome" placeholder="Pesquisar">
                        <input type="submit" value="PESQUISAR">
                    </form>
                </div>
                <div class="container-dados">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-th">NOME</th>
                                <th class="tg-th">ALTERAR</th>
                                <th class="tg-th">EXCLUIR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modelTipoSemiReboque->rows as $itemTipoSemiReboque) : ?>
                                <tr>
                                    <th class="tg-th"><?= $itemTipoSemiReboque->nome ?></th>
                                    <th class="tg-th"><a href="/tipoSemiReboque/form?id=<?= $itemTipoSemiReboque->id ?>">ALTERAR</a></th>
                                    <th class="tg-th"><a href="/tipoSemiReboque/delete?id=<?= $itemTipoSemiReboque->id ?>">EXCLUIR</a></th>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <a href="/tipoSemiReboque/form" id="cadastrar" class="frota">CADASTRO</a>
                    <a href="/adm" id="voltar" class="frota">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackTipoSemiReboque/excluir.php';
}
?>