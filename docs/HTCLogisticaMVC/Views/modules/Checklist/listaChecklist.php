<?php
require_once "session/sessionAdm.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleRelatorio.css" />
    <title>RELAT&Oacute;RIO</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="container-area2">
                <div class="container-pesquisa">
                    <form action="?datahora=" method="GET">
                        <label for="">PESQUISAR POR DATA: </label><input type="date" name="datahora" id="datahora">
                        <input id="pesquisar" type="submit" value="PESQUISAR">
                    </form>
                </div>
                <div class="container-dados">
                    <table class="tg">
                        <thead>
                            <tr>
                                <th class="tg-th">MOTORISTA</th>
                                <th class="tg-th" id="frotaTd">FROTA</th>
                                <th class="tg-th" id="saidaTd">SA&Iacute;DA</th>
                                <th class="tg-th" id="detalhesTd">DETALHES</th>
                                <th class="tg-th" id="assinaturaTd">ASSINATURA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($model->rows as $item) : ?>
                                <tr>
                                    <td class="tg-tr"><?= $item->nome ?></td>
                                    <td class="tg-tr" id="frotaTd"><?= $item->placa ?></td>
                                    <td class="tg-tr" id="saidaTd"><?= $item->datahora ?></td>
                                    <td class="tg-tr" id="detalhesTd"><a href="/checklist/detalhes?id=<?= $item->id ?>">DETALHES</td>
                                    <td class="tg-tr" id="assinaturaTd"><img src="<?= $item->sig ?>" /></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="container-button">
                    <a href="/adm" id="voltar" class="frota">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        load_data();

        function load_data(datahora) {
            $.ajax({
                url: "../ajax/searchrelatorio.php",
                method: "POST",
                data: {
                    datahora: datahora
                },
                success: function(data) {
                    $(' #result').html(data);
                }
            });
        }
        $('#pesquisar').click(function() {
            var search = $('#datahora').val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>