
// Variaveis
const botao = document.getElementById("enviar");


const inp_name = document.getElementById("Nome");
const inp_pix = document.getElementById("Pix");
const inp_data = document.getElementById("Data");



// Eventos

document.getElementById("formulario").addEventListener('submit', Enviar_Api)

// Funções





// ----------------------------- Função de Enviar Objeto para API --------------------------------------------

function Enviar_Api(event){

    event.preventDefault();

    const objeto = MkObjetoPix(inp_name.value, inp_data.value, inp_pix.value, Rs_radios("tipo"),Rs_radios("banco"));

    /* Enviando para a API, fetch("link ou nome de destino da API", Configurações do envio) 

        Configurações do envio = {method: X, headers: {Y}, body: Z(W)}

        X = O Metodo que sera enviado o arquivo, que no caso sera o POST
        Y = O Arquivo erdar as caracteristicas da classe Json, "Content-Type" a classe do arquivo ":" erdando "application/json", dessa forma ele possui uma erança.
        Z = Uma função para converter o objeto dentro do parenteses de JavaScript, para um Json Script
        W = Objeto a ser transformado pela função acima
    
    */
    fetch("https://jsonplaceholder.typicode.com/posts",{method:"POST",headers:{"Content-Type" : "application/json"},body: JSON.stringify(objeto)})
    /*  O Fetch, then, catch estão ligados, como se fosse um objeto, ou seja, quando temos um '.catch' seria a mesma coisa que 'fetch.catch'

        Nessa linha seguinte, a API ele te devolve uma resposta nesses astributos do fetch, porem eles chegam com um formato diferente do que você mandou.
        Por conta desse problema nós temos que converte-lo para o script do java, para isso usamos o seguinte esquema:
        
        .then(X => X.Z)

        O X no esquema representa o atributo onde esta os dados, enquanto '=>' representa a função, que esta recebendo X como valor de entrada, e logo em seguida executar sua instrução
        O X e o Z estão dentro da função para serem trabalhados, o X vai ser convertido em Script pela função Json, ou seja X.Json().
    */
    .then((response) => response.json())

    /* 
        O Atributo data esta guardado o objeto com os dados, por conta disso que apos ser convertido pelo .then é possivel exibilo no console
    */ 
    .then((data) => {console.log(data);document.getElementById("resposta").innerHTML = `A resposta da API foi: ${JSON.stringify(data)}`})
    /*
        O catch é a parte do fetch que ele vai executar caso aconteça algum erro. Quando o erro acontece ele fica armazenado no atributo erro.
    */
    .catch((erro) => {console.error("O Seguinte erro apareceu no processo", erro)});

    
}

//-----------------------------------------------------------------------------------------------------

//----------------------- Retorna o Valor que esta em uma Radio ---------------------------------------

function Rs_radios(name){
    let entrada = document.getElementsByName(name);                         
    for(let i = 0;i < entrada.length;i++){
        if(entrada[i].checked){
            return entrada[i].value;
        }   
    }
    return console.log("Não foi selecionado nenhuma opção");
}

//------------------------------------------------------------------------------------

//-----------------------Cria e retorna um Objeto(PIX)--------------------------------

function MkObjetoPix(nome_entrada, data_entrada, pix_entrada, tipo_entrada, banco_entrada){
    
    if(pix_entrada === ""){return console.log("A Função não MkObjetoPix não pode proceguir. O Valor de Pix é invalido");}
    
    pix_entrada = parseFloat(pix_entrada);
    if(typeof nome_entrada === "string" && typeof data_entrada === "string" && typeof pix_entrada === "number" && typeof tipo_entrada === "string" && typeof banco_entrada === "string"){

        let tipopix = {tipo : tipo_entrada,
                       banco : banco_entrada,
                       nome : nome_entrada,
                       data_da_trasacao : data_entrada,
                       valor_pix: pix_entrada}; 
        return tipopix;
    }
}

//------------------------------------------------------------------------------------

//***************************************************************************** */


// Class

class pix{

    constructor(tipo, banco, nome, valor, data){
        this.tipo = tipo;
        this.banco = banco;
        this.nome = nome;
        this.data = data;
        this.valor = valor;
    }
    

    MostrarDados(){
        return (`Tipo: ${this.tipo} | Banco: ${this.banco} | Nome: ${this.nome} | Data: ${this.data} | Valor: ${this.valor}`);
    }
}