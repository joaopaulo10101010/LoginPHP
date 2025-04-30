const Cadastrarlb = document.getElementById("Cadastrarlb");
const formcadastro = document.getElementById("cadastrar");
const formlogar = document.getElementById("logar");
const formrecuperar = document.getElementById("recuperar");



function MostrarCadastro(){
    formrecuperar.style.display = 'none';
    formlogar.style.display = 'none';
    formcadastro.style.display = 'inline-block';
}
function MostrarLogin(){
    formrecuperar.style.display = 'none';
    formlogar.style.display = 'inline-block';
    formcadastro.style.display = 'none';
}
function MostrarRecuperar(){
    formrecuperar.style.display = 'inline-block';
    formlogar.style.display = 'none';
    formcadastro.style.display = 'none';
}
