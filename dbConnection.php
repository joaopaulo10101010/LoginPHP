<?php


try{


    $mysql = new mysqli("localhost","root","12345678","db2ads");

}
catch(mysqli_sql_exception $erro){
    echo("USUARIO VOCÊ FOI MUITO BUROOO!!!!!!!: ".$erro);
}

function bdquery($comando,$banco){
    $a = $banco->query($comando);
    $b = $a->fetch_assoc();
    return $b;
}


/*
$lista = bdquery('select * from Tb_usuario where Id=0;',$mysql);
echo($lista['Senha']);
*/
?>