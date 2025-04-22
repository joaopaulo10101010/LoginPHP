

function Logar(idusuario,idsenha,idsaida){
    let usuario = document.getElementById(idusuario).value;
    let senha = document.getElementById(idsenha).value;
    let saida = document.getElementById(idsaida);
    document.getElementById(idusuario).value = "";
    document.getElementById(idsenha).value = "";

    if (usuario !== "" && senha !== "") {
        if((usuario == "admin") && (senha == "1234")){
            alert("Bem vindo Admin");
            saida.innerHTML = `<div class="div1"><h1 class="h11">Acesso liberado, bem vindo Admin, usuario:</h1><h1 class="h12">${usuario}</h1></div><a href="pixweb.html"><button class="buton" onclick="fechar('resultado')">Continuar</button></a>`; 
        }
        else
        {
            alert(`Sua tentativa de logar ${usuario} esta incorreta`);
            saida.innerHTML = `<div class="div1"><h1 class="h11">Acesso Negado, usuario:</h1><h1 class="h12">${usuario}</h1></div><button class="buton" onclick="fechar('resultado')">Fechar Mensagem</button>`; 
        }
    }
    else
    {
        alert("Preencha os campos de usuario e senha");
    }
}
function fechar(idsaida){
    let saida = document.getElementById(idsaida);
    saida.innerHTML = "";

}