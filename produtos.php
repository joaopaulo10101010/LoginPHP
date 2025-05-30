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
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Menu Principal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar" aria-controls="menuNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuNavbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-primary me-2" href="menu.php">E-commerce</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success me-2" href="produtos.php">Gerenciar Produtos</a>
          </li>
          <?php
          include 'processamenu.php';
          exibirBlack();
          ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0" id="titulodocampo">Gerenciar Produtos</h4>
            </div>
            <div class="card-body">
                

    <!-- ********************************** Troca de Formulario ***********************************************      -->
    
    <?php

    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["botaopesquisa"])){
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
        if(isset($_POST["botaocadastroblack"])){
            echo('<form id="espacoform" method="post" action="processaprodutos.php"><div class="mb-3">
                        <label for="ano" class="form-label">Ano da Black Friday</label>
                        <input type="text" class="form-control" name="ano" id="ano" require>
                    </div>
                    <div class="mb-3">
                        <label for="dtinicio" class="form-label">Data de Inicio</label>
                        <input type="datetime-local" class="form-control" id="dtinicio" name="dtinicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="dtfim" class="form-label">Data de Inicio</label>
                        <input type="datetime-local" class="form-control" id="dtfim" name="dtfim" required>
                    </div>
                    
                    <input type="hidden" name="formulario" value="blackfoi">
                    <input value="Cadastrar Promoção" class="btn btn-success w-100" type="submit"> </form>');
        }
        if(isset($_POST["botaoeditar"])){
            
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
                        <select class="form-control" name="Cod_Prod" id="Cod_Prod" require>
                            ');ExibirCodigo();echo('
                        </select>
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
                    <div class="mb-3">
                        <label for="blackonoof"><input id="checkbux" name="blackonoof" type="checkbox"> Produto Disponivel na Black Friday?</label><br>
                        <label for="desconto" id="labeldesc" class="form-label">Desconto do Produto:</label>
                        <input type="number" min="0" max="100" id="desconto" class="form-control" id="linkimg" name="desconto">
                    </div>
                    
                    <input type="hidden" name="formulario" value="cadastrarproduto">
                    <input value="Cadastrar Produto" class="btn btn-success w-100" type="submit"> </form>');
        }

    }else{
        if($_SESSION["PESQUISANDO"] == true){
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
                    <input value="Pesquisar Produto" class="btn btn-success w-100" type="submit"></form>');
                    $_SESSION["PESQUISANDO"] = false;
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
                    <div class="col-3 w-50"><button type="submit" name="botaocadastro" class="btn btn-primary w-100">CADASTRAR</button></div>
                    <div class="col-3 w-50"><button type="submit" name="botaocadastroblack" class="btn btn-primary w-100">BLACKFRIDAY</button></div>
                </div>
                <form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const inputdesc = document.getElementById("desconto");
    const labeldesc = document.getElementById("labeldesc");
    const checkbox = document.getElementById("checkbux");
    labeldesc.style.display = "none";
    inputdesc.style.display = "none";

    checkbox.addEventListener('change',()=>{
        if(checkbox.checked == false){
            labeldesc.style.display = "none";
            inputdesc.style.display = "none";
        }else{
            labeldesc.style.display = "flex";
            inputdesc.style.display = "flex";
        }
    });
    </script>
</body>

</html>