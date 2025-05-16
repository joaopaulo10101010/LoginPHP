const inputId = document.getElementById("Id");
const inputCod_Prod = document.getElementById("Cod_Prod");
const inputnome = document.getElementById("nome");
const inputdescricao = document.getElementById("descricao");
const inputpreco = document.getElementById("preco");
const inputquantidade = document.getElementById("quantidade");
const inputlinkimg = document.getElementById("linkimg");

function habilitarform(formulario){
    switch(formulario){
        case "Cadastro":
            
            inputId.classList.add("displaynone");
            
            break;

        case "Pesquisar":
            break;

        case "Excluir":
            break;
        
        case "Editar":
            break;
        default:
            alert("Opção de formulario não valido");
            break;
    }
}