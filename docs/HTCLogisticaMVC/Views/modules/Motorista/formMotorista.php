<?php
require_once "session/sessionAdm.php";
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
                <form class="form" action="/motorista/form/save" method="post">
                    <input type="hidden" name="id" value="<?= $modelMotorista->id ?>">
                    <label class="label-input">
                        <input type="text" id="nome" placeholder="Nome completo" name="nome" value="<?= $modelMotorista->nome ?>" required>
                    </label>
                    <br>
                    <label class="label-input">
                        <input type="number" id="cpf" placeholder="CPF" name="cpf" value="<?= $modelMotorista->cpf ?>" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required>
                    </label>
                    <br>
                    <label class="label-input">
                        <input type="number" id="habilitacao" placeholder="Nº da CNH" name="habilitacao" value="<?= $modelMotorista->habilitacao ?>" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required>
                    </label>
                    <div class="container-button">
                        <button class="frota" id="cadastrar" name="cadastrar">SALVAR</button>
                    </div>
                </form>
                <div class="container-button">
                        <a href="/motorista" class="frota" id="voltar">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
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
<?php
if (isset($_GET['message'])) {
    include 'Views/feedbackMotorista/salvar.php';
}
?>