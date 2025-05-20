<?php

/*------------------------------- (Inicio) Funções do Banco de Dados -------------------------------------------*/ 

function MySqlConnection(){
    try{
        $mysql = new mysqli("localhost","root","root","db2ads");        // Função Responsavel pela Conexão com o Banco de Dados
    }
    catch(mysqli_sql_exception $erro){
        echo("USUARIO VOCÊ FOI MUITO BUROOO!!!!!!!: ".$erro);
    }
    return $mysql;
}

function MySqlCommand($comando){                            // Função Responsavel Por Criar uma Entrada de Comandos
    return MySqlConnection()->query($comando);
}

function MySQLDelete($tabela,$coluna,$value){
    MySqlCommand("Delete from $tabela where $coluna='$value'");
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

function RecuperarSenha($nome,$email,$senha){
    if(ValidarRecuperar($nome,$email)){
        AlterarSenha($email,$senha);
    }

}

function ValidarRecuperar($nome,$email){
    try{
        $resultado = MySqlCommand("select * from Tb_usuario where Email='$email';")->fetch_assoc();
        if($resultado){
            if($resultado['Nome'] == $nome){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }catch(mysqli_sql_exception $erro){
        return false;
    }

}

function DbGetAll($tabela){
    if($tabela != null && $tabela != ""){
        $retorno = MySqlCommand("select * from $tabela");   
        return $retorno;
    }else
    {
        echo("os valores de entrada são nulos");
    }
}

function Cadastrar($email,$senha,$nome){
    MySqlCommand("insert into Tb_usuario(Nome, Email, Senha) values('$nome','$email','$senha');");
}

function AlterarSenha($email,$senha){
    try{
        MySqlCommand("update Tb_usuario set Senha='$senha' where Email='$email'");
    }catch(mysqli_sql_exception $erro){
        echo("erro");
    }


}

function DeletarUsuario($email){
    MySQLDelete("tb_usuario","Email",$email);
}


function CadastrarProduto($nomedoproduto,$descricao,$preco,$quantidade,$link,$codigo){
    MySqlCommand("insert into Tb_produto(NomeDoProduto, Descricao, Preco,Quantidade, Img_path, Codigo_prod) values('$nomedoproduto','$descricao','$preco',$quantidade,'$link','$codigo');");
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