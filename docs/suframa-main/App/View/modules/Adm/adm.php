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
                    <img src="" />
                </div>
            </div>

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


            <!-- INFORMAÇÕES DO USUÁRIO -->
            <div class="user-info">
                <span> </span>
                <span> </span>
            </div>


            <div class="arrow">
                Funcionarios.
            </div>
            <form action="" method="">
                <div class="search-func">
                    <input type="text" name="nome" placeholder="Pesquise um usuário." id="nome" />
                    <input type="submit" value="Procurar">
                </div>
            </form>
            <div class="adm">
                <div class="adm-area">

                    <div class="area-user">
                        <div class="acoes-user">
                            <!--Editar USUÁRIO -->
                            <label><a href="/atualizarFuncionario">
                                    <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </a>
                            </label>
                            <!--EXCLUIR USUÁRIO -->
                            <label>
                                <a href="">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </label>
                        </div>

                        <div class="area-user-img">
                            <img src="" alt="img-user" />
                        </div>
                        <div class="area-user-info">
                            <label id="id"></label>
                            <label></label>

                        </div>
                    </div>

                    </a>
                </div>
            </div>



            <div class="modal-add-user">
                <div class="close-modal-user">
                    <i class="fa-sharp fa-solid fa-rectangle-xmark"></i>
                </div>
                <div class="container-area-cad">
                    <form method="POST" action="/adm/save" enctype="multipart/form-data">
                        <div class="input-item upload">

                            <div class="img-perfil">
                                <img src="../image/cam.png">
                            </div>
                            <input type="file" name="avatar" id="avatar" required />
                        </div>
                        <div class="input-item">
                            <div class="icon">
                                <i class="fa-solid fa-file-signature"></i>
                            </div>
                            <input type="text" name="nome" placeholder="Digite seu nome" required id="nome_user" />
                        </div>
                        <div class="input-item">
                            <div class="icon">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <input type="number" id="cpf" name="cpf" placeholder="Digite seu cpf"  required />
                        </div>
                        <div class="input-item">
                            <div class="icon">
                                <i class="fa-sharp fa-solid fa-user"></i>
                            </div>
                            <input type="text" name="login" id="login" placeholder="Digite seu login" required />
                        </div>
                        <div class="input-item">
                            <div class="icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required />
                        </div>

                        <div class="input-item">
                            <select name="area_atuacao_id" id="area_atuacao_id" class="select">
                                <option value="2">Usuário</option>
                                <option value="1">Administrador </option>

                            </select>
                        </div>
                        <div class="input-item">
                            <select name="cargo_id" id="cargo_id" class="select">
                                <option value="">Cargo</option>
                                <option value="2">Usuário</option>
                                <option value="1">Administrador </option>
                            </select>
                        </div>
                        <div class="input-item">
                            <select name="usuario" id="usuario" class="select">
                                <option value="">Tipo de usuário </option>
                                <option value="2">Usuário</option>
                                <option value="1">Administrador </option>
                            </select>
                        </div>

                        <div class=" entrar">
                            <input type="submit" value="salvar" />
                        </div>

                    </form>
                </div>
            </div>

            <div class="button-close">
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>


            <div class="menu-lateral">

                <div class="menu">
                    <div data-key="0" class="menu-option active">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="">Home</a>
                    </div>
                    <div data-key="1" class="menu-option" id="addUsuario">
                        <i class="fa-solid fa-book-medical"></i>
                        <a href="#">Cadastrar Usuário</a>
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

            <script src="../js/upload.js"></script>
            <script src="../js/addUser.js"></script>
            <script src="../js/script.js"></script>
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
                                window.location.replace('../Views/adm.php');
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