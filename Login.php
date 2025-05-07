<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/estilo.css">
    <title>LOGIN</title>

    <style>
        #cadastrar {
            display: none;
        }
        #recuperar {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="display-4 text-white">Bem-Vindo ao E-commerce</h1>
            <p class="lead text-white">Logue ou registre-se</p>
        </div>
        
        <!-- Formulário de Login -->
        <div class="form-container" id="logar">
            <h1 class="form-title">Faça seu login</h1>
            <form class="formular" action="processalogin.php" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">E-mail:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-action">Entrar</button>
                <input type="hidden" name="formulario" value="logar">
                
                <div class="form-switch">
                    <a href="#" class="btn btn-link" onclick="MostrarRecuperar();">Recuperar senha</a> | 
                    <a href="#" class="btn btn-link" onclick="MostrarCadastro();">Cadastrar</a>
                </div>
            </form>
        </div>
        
        <!-- Formulário de Cadastro -->
        <div class="form-container" id="cadastrar">
            <h1 class="form-title">Faça seu Cadastro</h1>
            <form class="formular" action="processalogin.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">E-mail:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <button type="submit" class="btn btn-primary btn-action">Cadastrar</button>
                <input type="hidden" name="formulario" value="cadastrar">
                
                <div class="form-switch">
                    <a href="#" class="btn btn-link" onclick="MostrarRecuperar();">Recuperar senha</a> | 
                    <a href="#" class="btn btn-link" onclick="MostrarLogin();">Já tenho conta</a>
                </div>
            </form>
        </div>

        <!-- Formulário de Recuperação -->
        <div class="form-container" id="recuperar">
            <h1 class="form-title">Recupere seu cadastro</h1>
            <form class="formular" action="processalogin.php" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">E-mail:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <button type="submit" class="btn btn-primary btn-action">Recuperar</button>
                <input type="hidden" name="formulario" value="recuperar">
                
                <div class="form-switch">
                    <a href="#" class="btn btn-link" onclick="MostrarCadastro();">Cadastrar</a> | 
                    <a href="#" class="btn btn-link" onclick="MostrarLogin();">Já tenho conta</a>
                </div>
            </form>
        </div>
        
        <div class="auth-message">
            <?php
                echo($_SESSION['AuthReturn']);
                $_SESSION['AuthReturn'] = "";
            ?>
        </div>
    </div>
    
    <script src="./script.js"></script>
</body>
</html>