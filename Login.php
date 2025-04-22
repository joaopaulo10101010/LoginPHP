<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/css/estilo.css">
        <title>LOGIN</title>
    </head>
    <body>
        <div id="container">
            <header>
                <h1>Bem-Vindo ao Pet Feliz</h1>
                <p>Logue ou registre-se</p>
            </header>
            <form class="formular" action="processalogin.php" method="POST">
                
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br><br>
            
            
                <button class="botao" onclick="Logar('usuario','senha','resultado')">Entrar</button><br><br>
            </form>
        </div>
        
        
       
    </body>
</html>