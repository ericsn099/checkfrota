<?php
require_once "session/sessionAdm.php";
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
                <form class="form" action="/tipoFrota/form/save" method="post">
                    <input type="hidden" name="id" value="<?= $modelTipoFrota->id ?>">
                    <label class="label-input">
                        <input type="text" id="nome" placeholder="Nome" value="<?= $modelTipoFrota->nome ?>" name="nome" required>
                    </label>
                    <div class="container-button">
                        <button class="frota" id="cadastrar">SALVAR</button>
                    </div>
                </form>
                <div class="container-button">
                    <a href="/tipoFrota" class="frota" id="voltar">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackTipoFrota/salvar.php';
}
?>