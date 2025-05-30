<?php 
include 'dbConnection.php';



function exibirBlack(){
    $ativablack = confirmarPromo();
    if($ativablack){
        echo('<li class="nav-item">
            <a class="btn btn-secondary" href="blackfriday.php">BlackFriday</a>
          </li>');
    }

}


function ExibirCodigo(){
    $tabela = "Tb_produto";
    $itensdatabela = DbGetAll($tabela);
    $retorno = "";
    if ($itensdatabela) {
        while ($produto = mysqli_fetch_assoc($itensdatabela)) {
            $produtos[] = $produto;
        }
        mysqli_free_result($itensdatabela);
            
        
        
        foreach($produtos as $produto){
        echo("<option>{$produto['Codigo_prod']}</option>");
        }
    } else {
        echo "Erro ao buscar produtos: ";
    }
}

function ExibirListaProd() {
    $tabela = "Tb_produto";
    $itensdatabela = DbGetAll($tabela);
    $produtos = [];

    if ($itensdatabela) {
        while ($produto = mysqli_fetch_assoc($itensdatabela)) {
            
            $produtos[] = $produto;
        }
        mysqli_free_result($itensdatabela);

        if($produtos){
        foreach ($produtos as $produto) {
            echo("
            <div class='col-md-4 mb-4'>
                <div class='card h-100'>
                    <img src='{$produto['Img_path']}' class='card-img-top img-fluid' alt='Imagem do produto' style='object-fit: cover; height: 200px;'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$produto['NomeDoProduto']}</h5>
                        <p class='card-text'>ID: {$produto['Id']}</p>
                        <p class='card-text'>Quantidade: {$produto['Quantidade']}</p>
                        <p class='card-text'>Preço: R$ {$produto['Preco']}</p>
                        <p class='card-text'><strong>Descrição:</strong> {$produto['Descricao']}</p>
                    </div>
                </div>
            </div>
            ");
        }
        }
    } else {
        echo "<div class='alert alert-danger'>Erro ao buscar produtos.</div>";
    }
}


function ExibirListaProdblack(){
    $tabela = "Tb_produto";
    $itensdatabela = DbGetAll($tabela);
    $produtos = [];

    if ($itensdatabela) {
        while ($produto = mysqli_fetch_assoc($itensdatabela)) {
            
            $produtos[] = $produto;
        }
        mysqli_free_result($itensdatabela);

        if($produtos){
        foreach ($produtos as $produto) {
            if($produto['BlackFriday'] == true){
                $dec = intval($produto['Desconto']);
                $pf = number_format($produto['Preco'] * (1 - ($produto['Desconto']/100)), 2);

                echo("
                <div class='col-md-4 mb-4'>
                    <div class='card h-100 position-relative border border-danger'>
                        <span class='badge bg-danger text-white position-absolute top-0 end-0 rotate-badge'>
                          {$dec}%
                        </span>

                        <img src='{$produto['Img_path']}' class='card-img-top img-fluid' alt='Imagem do produto' style='object-fit: cover; height: 200px;'>
                        <div class='card-body bg-dark text-white'>
                            <h5 class='card-title'>{$produto['NomeDoProduto']}</h5>
                            <p class='card-text'>ID: {$produto['Id']}</p>
                            <p class='card-text'>Quantidade: {$produto['Quantidade']}</p>
                            <p class='card-text text-decoration-line-through text-white'>De: R$ {$produto['Preco']}</p>
                            <p class='card-text fw-bold text-success'>Por: R$ $pf </p>
                            <p class='card-text'><strong>Descrição:</strong> {$produto['Descricao']}</p>
                        </div>
                    </div>
                </div>
            ");
            }
        }
        }
    } else {
        echo "<div class='alert alert-danger'>Erro ao buscar produtos.</div>";
    }
}


?>