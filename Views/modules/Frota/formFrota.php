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
                <form class="form" action="/frota/form/save" method="post">
                    <input type="hidden" name="id" value="<?= $model->id ?>">
                    <label class="label-input">
                        <input type="text" id="placa" placeholder="Placa" value="<?= $model->placa ?>" name="placa" required>
                    </label>
                    <?php if(isset($model->id))
                    {
                        echo "TIPO DO CAMINHÃO: $model->nome";
                    }
                    ?>
                    <label class="label-input">
                        <select class="ui-select-style" id="cmtipocarro" name='cmtipocarro' size=1 required>
                            <?php foreach ($modelTipoFrota->rows as $item) : ?>
                                <option value="<?= $item->id?>" > <?= $item->nome?></option>
                            <?php endforeach ?>
                        </select>
                    </label>
                    <div class="container-button">
                        <button href="" class="frota" id="cadastrar">SALVAR</button>
                    </div>
                </form>
                <div class="container-button">
                    <a href="/frota" class="frota" id="voltar">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackFrota/salvar.php';
}
?>