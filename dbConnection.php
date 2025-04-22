<?php

/*------------------------------- (Inicio) Funções do Banco de Dados -------------------------------------------*/ 

function MySqlConnection(){
    try{
        $mysql = new mysqli("localhost","root","12345678","db2ads");        // Função Responsavel pela Conexão com o Banco de Dados
    }
    catch(mysqli_sql_exception $erro){
        echo("USUARIO VOCÊ FOI MUITO BUROOO!!!!!!!: ".$erro);
    }
    return $mysql;
}

function MySqlCommand($comando){                            // Função Responsavel Por Criar uma Entrada de Comandos
    return MySqlConnection()->query($comando);
}

/*----------------------------------- (Fim) Função Banco de dados -----------------------------------------------*/ 

/*--------------------------------------- Funções Principais ----------------------------------------------------*/

function VerificarLogin($email, $senha){
    if(email($email) && senha($senha)){                     // Função Responsavel por Validar os Dados de Login
        return true;
    }else{
        return false;
    }
}

function Cadastrar($email,$senha){
    MySqlCommand("insert into Tb_usuario(Id, Email, Senha, Ativo) values(0,'$email','$senha',true);");
}

/*--------------------------------------- Funções Secundarias --------------------------------------------------*/

function email($email){
    $resultado = MySqlCommand("select * from Tb_usuario where Email='$email';")->fetch_assoc();                 // Função para Verificar os Dados de Email no Banco de dados
    if($resultado){                                                                                             // É utilizada pela Função Principal VerificarLogin()
        if(($resultado["Email"] == $email) && ($resultado["Email"] != null)){
            return true;
        }
        else{
            return false;
        }
    }
}

function senha($senha){
    $resultado = MySqlCommand("select * from Tb_usuario where Senha='$senha';")->fetch_assoc();                 // Função para Verificar os Dados de Usuario no Banco de dados
    if($resultado){                                                                                             // É utilizada pela Função Principal VerificarLogin()
        if(($resultado["Senha"] == $senha) && ($resultado["Senha"] != null) ){
            return true;
        }
        else{
            return false;
        }
    }
}


?>