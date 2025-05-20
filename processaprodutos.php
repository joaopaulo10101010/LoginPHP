<?php
include 'dbConnection.php';
session_start();

$nome = $_POST["nomeproduto"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$quantidade = (int) $_POST["quantidade"];
$link = $_POST["linkimg"];
$codigo = $_POST["Cod_Prod"];


$formulario = $_POST['formulario'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    switch($formulario){

        case 'cadastrarproduto':
            CadastrarProduto($nome,$descricao,$preco,$quantidade,$link,$codigo);
            $_SESSION["ProdAuthReturn"] = "Cadastro Concluido";
            header("Location: produtos.php");
        break;

        case 'pesquisar':
        
        break;

        default:
            $_SESSION["ProdAuthReturn"] = "Cadastro Negado ao enviar formulario";
            header("Location: produtos.php");
            break;
    }
}

?>