<?php
include 'dbConnection.php';
session_start();


$email = $_POST["usuario"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    switch($_POST['formulario']){

        case 'logar':

            if(VerificarLogin($email,$senha)){
                $_SESSION["AuthReturn"] = "Acesso Permitido";
                header("Location: login.php");
            }else{
                $_SESSION["AuthReturn"] = "Acesso Negado";
                header("Location: login.php");
            }

        break;

        case 'cadastrar':
            
            try{
                Cadastrar($email,$senha,$nome);
                header("Location: login.php");
                $_SESSION["AuthReturn"] = "Cadastro Realizado com Sucesso";
            }catch(mysqli_sql_exception $erro){
                header("Location: login.php");
                $_SESSION["AuthReturn"] = "Um erro aconteceu no seu cadastro: ".$erro;
            }
            
            break;

        case 'recuperar':
            try{
                RecuperarSenha($nome,$email,$senha);
                header("Location: login.php");
                $_SESSION["AuthReturn"] = "Mudança de Senha realisada com sucesso";
            }
            catch(mysqli_sql_exception $erro){
                header("Location: login.php");
                $_SESSION["AuthReturn"] = "Um erro aconteceu na sua tentativa de recuperar: ".$erro;
            }
            break;

        default:
            $_SESSION["AuthReturn"] = "Acesso Negado ao enviar formulario";
            header("Location: login.php");
            break;

    }




}





?>