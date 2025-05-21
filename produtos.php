<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start();
$nomepr = $_SESSION['nomepr'];
$descpr = $_SESSION['descpr'];
$precopr = $_SESSION['precopr'];
$quantpr = $_SESSION['quantpr'];
$linkpr = $_SESSION['linkpr'];
?>
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
                

    <!-- ********************************** Troca de Formulario ***********************************************      -->
    
    <?php
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["botaopesquisa"]) || $_SESSION["PESQUISANDO"] == true){
            include 'processamenu.php';
            echo('<form id="espacoform" method="post" action="processaprodutos.php">
                    <div class="mb-3">
                        <label for="Cod_Prod" class="form-label">Código do Produto</label>
                        <select class="form-control" name="Cod_Prod" id="Cod_Prod" require>
                        ');ExibirCodigo();echo('
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nomeproduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nomeproduto" readonly value='.$nomepr.'>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" readonly>'.$descpr.'</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" value='.$precopr.' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value='.$quantpr.' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="linkimg" class="form-label">Link da imagem:</label>
                        <input type="text" class="form-control" id="linkimg" name="linkimg" readonly value='.$linkpr.'>
                    </div>
                    <input type="hidden" name="formulario" value="pesquisar">
                    <input value="Pesquisar Produto" class="btn btn-success w-100" type="submit"> </form>');
                    $_SESSION["PESQUISANDO"] = false;
        }
        if(isset($_POST["botaoeditar"])){
            include 'processamenu.php';
            
            echo('<form id="espacoform" method="post" action="processaprodutos.php"><div class="mb-3">
                        <label for="Cod_Prod" class="form-label">Código do Produto</label>
                        <select class="form-control" name="Cod_Prod" id="Cod_Prod" require>
                            ');ExibirCodigo();echo('
                        </select>
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
                    <input type="hidden" name="formulario" value="editar">
                    <input value="Editar Produto" class="btn btn-success w-100" type="submit"> </form>');
        }
        if(isset($_POST["botaoexcluir"])){
            echo('<form id="espacoform" method="post" action="processaprodutos.php"><div class="mb-3">
                        <label for="Cod_Prod" class="form-label">Código do Produto</label>
                        <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomeproduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nomeproduto" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" readonly>
                    </div>

                    <input type="hidden" name="formulario" value="excluir">
                    <input value="Excluir" class="btn btn-success w-100" type="submit"> </form>');
        }
        if(isset($_POST["botaocadastro"])){
            echo('<form id="espacoform" method="post" action="processaprodutos.php">  <div class="mb-3">
                        <label for="Cod_Prod" class="form-label">Código do Produto</label>
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
                    <input value="Cadastrar Produto" class="btn btn-success w-100" type="submit"> </form>');
        }

    }
    ?>
    <!-- ********************************************************************************************************      -->


                <label>
                    <?php
                    if($_SESSION['ProdAuthReturn']){
                        echo($_SESSION['ProdAuthReturn']);
                    }
                    $_SESSION['ProdAuthReturn'] = "";
                    ?>
                </label>
                <form method="POST">
                <div class="row botãomargin p-1">
                    <div class="col-5 w-50"><a href="menu.php" class="btn btn-primary w-100">VOLTAR PARA O MENU</a></div>
                    <div class="col-5 w-50"><button type="submit" name="botaopesquisa" class="btn btn-primary w-100">PESQUISAR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-3 w-50"><button type="submit" name="botaoeditar" class="btn btn-primary w-100">EDITAR</button></div>
                    <div class="col-3 w-50"><button type="submit" name="botaoexcluir" class="btn btn-primary w-100">EXCLUIR</button></div>
                </div>
                <div class="row botãomargin p-1">
                    <div class="col-6 w-100"><button type="submit" name="botaocadastro" class="btn btn-primary w-100">CADASTRAR</button></div>
                </div>
                <form>

            </div>
        </div>
    </div>
    <script src="src\js\produto.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>