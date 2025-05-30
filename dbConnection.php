<?php

/*------------------------------- (Inicio) Funções do Banco de Dados -------------------------------------------*/ 

function MySqlConnection(){
    try{
        $mysql = new mysqli("localhost","root","12345678","db2ads");        // Função Responsavel pela Conexão com o Banco de Dados
    }
    catch(mysqli_sql_exception $erro){
        echo("Não foi possivel conectar ao banco de dados MySQL: ".$erro);
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

function confirmarPromo(){
    $resultado = MySqlCommand("select * from Tb_blackfriday t1 where sysdate() between t1.inicio and t1.fim;")->fetch_assoc();
    if($resultado){
        if($resultado['Id_promo'] != null){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function getPromo(){
    $resultado = MySqlCommand("select * from Tb_blackfriday;")->fetch_assoc();
    if($resultado){
        return $resultado;
    }
}

function getDateTime(){
    $resultado = MySqlCommand("select sysdate() as 'datatime' from dual;")->fetch_assoc();
    $retorno = $resultado['datatime'];
    return $retorno;
}

function PesquisarProduto($codigo){
    $resultado = MySqlCommand("Select * from Tb_produto where Codigo_prod=$codigo")->fetch_assoc();
    if($resultado){
        return $resultado;
    }else{
        return 'falha na pesquisa';
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

function DeletarProduto($codigo){
    MySqlCommand("delete from Tb_produto where Codigo_prod=$codigo;");
}

function CadastrarPromocao($anoblack,$dtinicio,$dtfim){
    MySqlCommand("insert into Tb_blackfriday(ano, inicio, fim) VALUES ('$anoblack', '$dtinicio', '$dtfim';");
}

function CadastrarProduto($nomedoproduto,$descricao,$preco,$quantidade,$link,$codigo,$desconto){
    if($desconto != null && $desconto != "0"){
        MySqlCommand("insert into Tb_produto(NomeDoProduto, Descricao, Preco,Quantidade, Img_path, Codigo_prod, Desconto, BlackFriday) values('$nomedoproduto','$descricao','$preco',$quantidade,'$link','$codigo',$desconto,1);");
    }else{
        MySqlCommand("insert into Tb_produto(NomeDoProduto, Descricao, Preco,Quantidade, Img_path, Codigo_prod) values('$nomedoproduto','$descricao','$preco',$quantidade,'$link','$codigo');");
    }
    
}
function AlterarProduto($codigo,$nome,$descricao,$preco,$quantidade,$link){
    MySqlCommand("SET SQL_SAFE_UPDATES = 0;");
    MySqlCommand("update Tb_produto set NomeDoProduto='$nome' ,Descricao='$descricao' ,Preco='$preco' ,Quantidade=$quantidade ,Img_path='$link' where Codigo_prod=$codigo;");
    MySqlCommand("SET SQL_SAFE_UPDATES = 1;");
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