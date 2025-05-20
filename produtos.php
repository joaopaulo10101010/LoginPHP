<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/produto.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .displaynone{
            display:none;
        }
    </style>
</head>
<body>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0" id="titulodocampo">Cadastro de Produto</h4>
            </div>
            <div class="card-body">
                <form id="espacoform" method="post" action="processaprodutos.php">

    <!-- ********************************** Troca de Formulario ***********************************************      -->

    <!-- ********************************************************************************************************      -->

                </form>

                <label>
                    <?php
                    if($_SESSION['ProdAuthReturn']){
                        echo($_SESSION['ProdAuthReturn']);
                    }
                    $_SESSION['ProdAuthReturn'] = "";
                    ?>
                </label>
                <div class="row botãomargin p-1">
                    <div class="col-5 w-50"><a href="menu.php" class="btn btn-primary w-100">VOLTAR PARA O MENU</a></div>
                    <div class="col-5 w-50"><button id="botaopesquisa" class="btn btn-primary w-100">PESQUISAR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-3 w-50"><button id="botaoeditar" class="btn btn-primary w-100">EDITAR</button></div>
                    <div class="col-3 w-50"><button id="botaoexcluir" class="btn btn-primary w-100">EXCLUIR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-6 w-100"><button id="botaocadastro" class="btn btn-primary w-100">CADASTRAR</button></div>
                </div>

            </div>
        </div>
    </div>
    <script src="src\js\produto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>