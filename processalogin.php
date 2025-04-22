<?php
include 'dbConnection.php';



$email = $_POST["usuario"];
$senha = $_POST["senha"];



$email_bd = bdquery("select * from Tb_usuario where Email='$email';",$mysql);
echo($email_bd["Email"]);
$senha_bd = bdquery("select * from Tb_usuario where Senha='$senha';",$mysql);
echo($senha_bd["Senha"]);



?>