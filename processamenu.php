<?php 
include 'dbConnection.php';



function ExibirListaProd(){
    $tabela = "Tb_produto";
    $itensdatabela = DbGetAll($tabela);

    if ($itensdatabela) {
        while ($produto = mysqli_fetch_assoc($itensdatabela)) {
            $produtos[] = $produto;
        }
        mysqli_free_result($itensdatabela); // Libera a memória do resultado
            
        

        foreach($produtos as $produto){
        echo("
        <table>
            <tr>
                <td colspan='2'><img src='{$produto['Img_path']}'></td>
            <tr>
            <tr>
                <td>Nome: {$produto['NomeDoProduto']}</td>
                <td>Id: {$produto['Id']}</td>
            </tr>
            <tr>
                <td>Quantidade: {$produto['Quantidade']}</td>
                <td>Preco: {$produto['Preco']}</td>
            </tr>
            <tr>
                <td colspan='2'>Descrição: {$produto['Descricao']}</td>
            </tr>
        </table>
        ");
        }

    } else {
        echo "Erro ao buscar produtos: ";
    }
}


?>