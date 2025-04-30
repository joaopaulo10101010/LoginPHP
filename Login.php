<!DOCTYPE html>
    <html lang="en">
    <head>
        <?php session_start(); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/css/estilo.css">

        <title>LOGIN</title>

        <style>
            #cadastrar{
             display: none;
            }
            #recuperar{
                display: none;
            }
        </style>

    </head>
    <body>
        <div id="container">
            <header>
                <h1>Bem-Vindo ao Pet Feliz</h1>
                <p>Logue ou registre-se</p>
            </header>
            <form id="logar" class="formular" action="processalogin.php" method="POST">
                <h1>Faça seu login</h1>
                <label for="usuario">E-mail:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                <input class="botao" type=submit><br><br>
                <input type="hidden" name="formulario" value="logar">
                <a id="recuperarlb" onclick="MostrarRecuperar();">Recuperar senha</a></br>
                <a id="Cadastrarlb" onclick="MostrarCadastro();">Cadastrar</a>
            </form>
           
            
            <form class="formular" id="cadastrar" action="processalogin.php" method="POST">
                <h1>Faça seu Cadastro</h1>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>
                <label for="usuario">E-mail:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                <input value='Cadastrar' class="botao" type=submit><br><br>
                <input type="hidden" name="formulario" value="cadastrar">
                <a id="recuperarlb" onclick="MostrarRecuperar();">Recuperar senha</a></br>
                <a id="Logarlb" onclick="MostrarLogin();">Logar</a>
            </form>

            <form class="formular" id="recuperar" action="processalogin.php" method="POST">
                <h1>Recupere seu cadastro</h1>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>
                <label for="usuario">E-mail:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
                <input value="recuperar" class="botao" type=submit><br><br>
                <input type="hidden" name="formulario" value="recuperar">
                <a id="recuperarlb" onclick="MostrarCadastro();">Cadastrar</a></br>
                <a id="Logarlb" onclick="MostrarLogin();">Logar</a>
            </form>
        
        </br>
            <label>
           <?php
                echo($_SESSION['AuthReturn']);
                $_SESSION['AuthReturn'] = "";
            ?>
            </label>
            
        </div>
    </body>
    <script src="./script.js">
    </script>
</html>