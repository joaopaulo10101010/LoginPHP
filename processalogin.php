<?php
include 'dbConnection.php';


$email = $_POST["usuario"];
$senha = $_POST["senha"];


if(VerificarLogin($email,$senha)){
    echo("Acesso permitido");

}else{
    header("Location: login.php");
}



?>