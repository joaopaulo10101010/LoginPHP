<?php
include 'dbConnection.php';
session_start();

$nome = $_POST["nomeproduto"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$quantidade = (int) $_POST["quantidade"];
$link = $_POST["linkimg"];
$codigo = $_POST["Cod_Prod"];
$descontoinput = $_POST["desconto"];


$anoblack = $_POST["ano"];
$dtinicio = $_POST["dtinicio"];
$dtfim = $_POST["dtfim"];


$formulario = $_POST['formulario'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    switch($formulario){

        case 'blackfoi':
            CadastrarPromocao($anoblack,$dtinicio,$dtfim);
            $_SESSION["ProdAuthReturn"] = "Cadastro da Black Friday Concluido";
            header("Location: produtos.php");
        break;

        case 'cadastrarproduto':
            CadastrarProduto($nome,$descricao,$preco,$quantidade,$link,$codigo,$descontoinput);
            $_SESSION["ProdAuthReturn"] = "Cadastro Concluido";
            header("Location: produtos.php");
        break;

        case 'pesquisar':
            $campo = PesquisarProduto($codigo);
            $_SESSION['nomepr'] = $campo["NomeDoProduto"];
            $_SESSION['descpr'] = $campo["Descricao"];
            $_SESSION['precopr'] = $campo["Preco"];
            $_SESSION['quantpr'] = $campo["Quantidade"];
            $_SESSION['linkpr'] = $campo["Img_path"];
            $_SESSION["ProdAuthReturn"] = "Pesquisa Realizada";
            $_SESSION["PESQUISANDO"] = true;
            header("Location: produtos.php");
        break;

        case 'editar':
            AlterarProduto($codigo,$nome,$descricao,$preco,$quantidade,$link);
            $_SESSION["ProdAuthReturn"] = "Produto Editado com Sucesso";
            header("Location: produtos.php");
            break;

        case 'excluir':
            DeletarProduto($codigo);
            $_SESSION["ProdAuthReturn"] = "Produto Excluido com Sucesso";
            header("Location: produtos.php");
            break;

        default:
            $_SESSION["ProdAuthReturn"] = "Cadastro Negado ao enviar formulario";
            header("Location: produtos.php");
            break;
    }
}

?>