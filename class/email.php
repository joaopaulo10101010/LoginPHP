<?php

public class Email{

    string $email;


    public function __construct(string $email){
        if(ValidarEmail($email)){
            $this->$email = $email;
        }
    }

    private function ValidarEmail(string $email) : bool
    {
        if($email){
            if(($email != null) && ($email != "")){
                return true;
            }else{
                console.log("Email invalido");
                return false;
            }
        }else{
            console.log("Não existe nenhum valor atribuido a variavel de Email");
            return false;
        }
    }
}



?>