
document.getElementById("titulodocampo")

const botaocadastro = document.getElementById("botaocadastro");
const botaopesquisa = document.getElementById("botaopesquisa");
const botaoexcluir = document.getElementById("botaoexcluir");
const botaoeditar = document.getElementById("botaoeditar");



botaocadastro.addEventListener('click',() => habilitarform('Cadastro'));
botaopesquisa.addEventListener('click',() => habilitarform('pesquisar'));
botaoexcluir.addEventListener('click',() => habilitarform('Excluir'));
botaoeditar.addEventListener('click',() => habilitarform('Editar'));


function habilitarform(formulario){
    switch(formulario){
        case "Cadastro":
            document.getElementById("espacoform").innerHTML = `
                <div class="mb-3">
                    <label for="Cod_Prod" class="form-label">Código do Produto</label>
                    <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                </div>
                <div class="mb-3">
                    <label for="nomeproduto" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome" name="nomeproduto" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
                <div class="mb-3">
                    <label for="linkimg" class="form-label">Link da imagem:</label>
                    <input type="text" class="form-control" id="linkimg" name="linkimg" required>
                </div>
                <input type="hidden" name="formulario" value="cadastrarproduto">
                <input value="Cadastrar Produto" class="btn btn-success w-100" type="submit">
            `;
            document.getElementById("titulodocampo").innerHTML = "Cadastre o Produto";
            break;

        case "pesquisar":
            document.getElementById("espacoform").innerHTML = `
                <div class="mb-3">
                    <label for="Cod_Prod" class="form-label">Código do Produto</label>
                    <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                </div>
                <div class="mb-3">
                    <label for="nomeproduto" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome" name="nomeproduto" readonly>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" readonly></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" readonly>
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" readonly>
                </div>
                <div class="mb-3">
                    <label for="linkimg" class="form-label">Link da imagem:</label>
                    <input type="text" class="form-control" id="linkimg" name="linkimg" readonly>
                </div>
                <input type="hidden" name="formulario" value="pesquisar">
                <input value="Pesquisar Produto" class="btn btn-success w-100" type="submit">
                </form>
            `;
            document.getElementById("titulodocampo").innerHTML = "Pesquise o Produto";
            break;

        case "Excluir":
            document.getElementById("espacoform").innerHTML = `
                <div class="mb-3">
                    <label for="Cod_Prod" class="form-label">Código do Produto</label>
                    <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                </div>
                <div class="mb-3">
                    <label for="nomeproduto" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome" name="nomeproduto" readonly>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" readonly></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" readonly>
                </div>

                <input type="hidden" name="formulario" value="excluir">
                <input value="Excluir" class="btn btn-success w-100" type="submit">

            `;
            document.getElementById("titulodocampo").innerHTML = "Excluir Produto";

            break;
        
        case "Editar":
            document.getElementById("espacoform").innerHTML = `
                <div class="mb-3">
                    <label for="Cod_Prod" class="form-label">Código do Produto</label>
                    <input type="text" class="form-control" id="Cod_Prod" name="Cod_Prod" required>
                </div>
                <div class="mb-3">
                    <label for="nomeproduto" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nome" name="nomeproduto" required>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
                <div class="mb-3">
                    <label for="linkimg" class="form-label">Link da imagem:</label>
                    <input type="text" class="form-control" id="linkimg" name="linkimg" required>
                </div>
                <input type="hidden" name="formulario" value="editar">
                <input value="Editar Produto" class="btn btn-success w-100" type="submit">

            `;
            document.getElementById("titulodocampo").innerHTML = "Editar Produto";
            break;
        default:
            alert("Opção de formulario não valido");
            break;
    }
}