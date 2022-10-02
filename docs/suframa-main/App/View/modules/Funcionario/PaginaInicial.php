<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIndex.css" />
    <title>Principal</title>
</head>

<body>
    <div class="container">
        <div class="container-area">
            <div class="capa">

            </div>
            <div class="user">
                <div class="user-avatar">
                    <img src="" alt="img-user" />
                </div>
            </div>
            <?= $model->id ?>
            <?= $model->avatar ?>
            <?= $model->path ?>
            <?= $model->nome ?>
            <?= $model->cpf ?>
            <?= $model->login ?>
            <div class="modal-big-foto">
                <div class="modal-big-foto-area">
                    <div class="close-big-foto-modal">
                        <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <div class="big-foto">
                        <img src="" alt="" />
                    </div>
                </div>
            </div>

            <!--Adiconar DEMANDA -->
            <div class="modal-demanda">
                <div class="modal-demanda-area">
                    <div class="close-modal-demanda">

                        <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                    </div>
                    <div class="area-cad-demanda">
                        <form method="POST" action="paginaInicial/save">
                            <input type="text" name="funcionario_id" value="<?= $model->id ?>">
                            <div class="nome-funcionario">
                                <div class="img-func">
                                    <img src="" />
                                </div>
                                <span></span>
                            </div>

                            <div class="observacao-option">
                                <span>Demanda:</span>
                                <!--
                                        <input type="text" name="descricao"> -->

                                <textarea name="descricao" placeholder="Digite a demanda aqui."></textarea>
                            </div>

                            <div class="demanda-option">
                                <span>Tipo de Demanda:</span>
                                <select name="tipo_demanda_id">
                                    <option>Tipo de Demanda</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="demanda-option">
                                <span>Início:</span>
                                <input type="date" name="data_inicio">
                            </div>

                            <div class="demanda-option">
                                <span>Terminio:</span>
                                <input type="date" name="data_termino">
                            </div>

                            <div class="demanda-option">
                                <span>Prioridade:</span>
                                <select name="prioridade_id">
                                    <option>Prioridade</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="demanda-option">
                                <span>Andamento:</span>
                                <select name="andamento_id">
                                    <option>Adamento</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="observacao-option">
                                <span>Observações:</span>
                                <textarea name="observacao" placeholder="Escreva a observação da demanda aqui."></textarea>
                            </div>
                            <div class="modal-demanda-button">
                                <input type="submit" value="salvar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- INFORMAÇÕES DO USUÁRIO -->
            <div class="user-info">
                <span></span>
                <span></span>
            </div>

            <div class="arrow">
                <<>>
            </div>


            <div class="grid">

                <div class="grid-area">

                    <div class="demanda-item">
                        <div class="d-num">
                            <!--  
                                            <?php echo $id = $id + 1; ?>
                                            -->
                            1

                        </div>
                        <div class="d-item">
                            <span>Demanda:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Tipo de Demanda:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Inicio:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Previsão de termino:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Prioridade:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Andamento:</span>
                            <span></span>
                        </div>
                        <div class="d-item">
                            <span>Observações:</span>
                            <span></span>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <div class="menu-lateral">

            <div class="menu">
                <div data-key="0" class="menu-option active">
                    <i class="fa-solid fa-house-user"></i>
                    <a href="">Home</a>
                </div>
                <div data-key="1" class="menu-option" id="addDemanda">
                    <i class="fa-solid fa-book-medical"></i>
                    <a href="#">Add demandas</a>
                </div>
                <div data-key="2" class="menu-option">
                    <i class="fa-solid fa-address-book"></i>
                    <a href="#">Ver todos</a>
                </div>
                <div data-key="0" class="menu-option ">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <a href="../Controller/sair.php">Sair</a>
                </div>
            </div>
        </div>

        <div class="button-close">
            <div class="icon">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>



        <script src="../js/script.js"></script>
        <script src="../js/modals.js"></script>
</body>
<?php if (isset($_GET['message'])) echo (printMessage($_GET['message']));
function printMessage($message)
{
    if ($message == 'success-create')
        return "<div class='modal2'>
                            <div class='modal-area2'>
                                <div class='modal-info2'>
                                    <div class='texto-agente'>
                                    CADASTRADO COM SUCESSO
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let abrirModal = () => document.querySelector('.modal2').style.display = 'flex';
                            let fecharModal = () => document.querySelector('.modal2').style.display = 'none';
                            setTimeout(() => {
                                abrirModal();
                                clearTimeout();
                            }, 0)

                            setTimeout(() => {
                                fecharModal();
                                window.location.replace('../Views/paginainicial.php');
                            }, 1000)
                        </script>
                        ";
    if ($message == 'error-create')
        return "<div class='modal2'>
                            <div class='modal-area2' style='background-color: #9d3535'>
                                <div class='modal-info2'>
                                    <div class='texto-agente'>
                                    DADOS J&Aacute; EXISTENTE
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let abrirModal = () => document.querySelector('.modal2').style.display = 'flex';
                            let fecharModal = () => document.querySelector('.modal2').style.display = 'none';
                            setTimeout(() => {
                                abrirModal();
                                clearTimeout();
                            }, 0)

                            setTimeout(() => {
                                fecharModal();
                                window.location.replace('../Views/adm.php');
                            }, 1000)
                        </script>
                        ";
}
?>

</html>