<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meuStilo7.css" />
    <title>Seja um agente</title>
</head>

<body>
    <div class="container">
        <div class="conteudo p-conteudo"><!--conteudo-->
            <div class="p-coluna"><!--Primeira Coluna-->
                <h2 class="titulo">Seja bem vindo</h2>
                <p class="descricao">
                   E se a seguran&ccedil;a de que est&aacute; a sua volta dependesse de voc&ecirc;? Ou de mim?
                   Ou de todos n&oacute;s? Seja um agente volunt&aacute;rio e ajude a proteger quem est&aacute; ao seu redor!
                </p>
                <p class="descricao">
                    Fa&ccedil;a seu cadastro aqui.
                </p>
                <button onclick="fazerLogin()" id="signin" class="btn">Criar Conta</button>
            </div><!--Fim Primeira coluna-->
            <div class="s-coluna"> <!--Segunda Coluna-->
                <h2 class="titulo">Sistema de Seguran&ccedil;a comunit&aacute;rio</h2>
                <div class="social-media">
                    <ul class="social-media-icon">
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-facebook-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <p class="descricao">  Accusamus iste dicta quaera</p>
                <form class="form" action="login_vai.php" method="POST"> 
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" placeholder="Usu&aacute;rio" name="login">
                    </label>
                   
                    <label class="label-input">
                        <i class="fa-solid fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha">
                    </label>
                   
                    
                    <button class="btn btn-form">Entrar</button>
                </form>
                
            </div><!-- Fim segunda coluna-->
        </div><!-- Fim conteudo-->
        <div class="conteudo s-conteudo"><!--conteudo-->
            <div class="p-coluna">
                <h2>Criar Conta</h2>
                <p class="descricao">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Accusamus iste dicta quaera
                </p>
                <p class="descricao">
                    Accusamus iste dicta quaera
                </p>
                <button onclick="criarConta()" class="btn">Login</button>
            </div>
            <div class="s-coluna">
                <h2 class="titulo">Crie sua conta </h2>
                <div class="social-media">
                    <ul class="social-media-icon">
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-facebook-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-instagram-square"></i></a></li>
                        <li class="social-icon"><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <p class="descricao">  Accusamus iste dicta quaera</p>
                <form class="form" method="POST" action="cadastro_agente.php">
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" placeholder="Nome" name="nome" required >
                    </label>
                    
                    <label class="label-input">
                        <i class="fa-solid fa-user  icon-modify"></i>
                        <input type="text" placeholder="Login" name="login" required >
                    </label>
                    <label class="label-input">
                        <i class="fa-solid fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha" required >
                    </label>
                   
                    <button  class="btn btn-form">Cadastrar</button>
                </form>
               
            </div>
        </div> <!-- Fim conteudo-->
    </div>
    <script src="js/login.js"></script>
</body>

</html>