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
                <h4 class="mb-0">Cadastro de Produto</h4>
            </div>
            <div class="card-body">
                <form method="post" action="processaprodutos.php">
                    <div class="mb-3" style="display: none">
                        <label for="Id" class="form-label">Id</label>
                        <input type="text" class="form-control" id="Id" name="Id" required>
                    </div>

                    <div class="mb-3">
                        <label for="Cod_Prod" class="form-label">Codigo do Produto</label>
                        <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomeproduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nomeproduto" required>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                    </div>
                    <div class="mb-3">
                        <label for="linkimg" class="form-label">Link da imagem:</label>
                        <input type="text" class="form-control" id="linkimg" name="linkimg" required>
                    </div>
                    <input type="hidden" name="formulario" value="cadastrarproduto">
                    <input value="Cadastrar Produto" class="btn btn-success w-100" type=submit>
                    </br>
            <label>
                <?php
                if($_SESSION['ProdAuthReturn']){
                    echo($_SESSION['ProdAuthReturn']);
                }
                $_SESSION['ProdAuthReturn'] = "";
                ?>
            </label>
                </form>
                <div class="row botãomargin p-1">
                    <div class="col-5 w-50"><a href="menu.php" class="btn btn-primary w-100">VOLTAR PARA O MENU</a></div>
                    <div class="col-5 w-50"><button class="btn btn-primary w-100">PESQUISAR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-3 w-50"><button class="btn btn-primary w-100">EDITAR</button></div>
                    <div class="col-3 w-50"><button class="btn btn-primary w-100">EXCLUIR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-6 w-100"><button class="btn btn-primary w-100">CADASTRAR</button></div>
                </div>

            </div>
        </div>
    </div>
    <script src="src\js\produto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>