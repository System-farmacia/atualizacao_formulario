<?php
session_start();
include "db.php";


$id= $_GET['id_produto'] ?? null;
$id = (int) $id;
$sql = "SELECT id_produto, nome, descricao, preco, imagem FROM produtos WHERE id_produto = $id";
$result= mysqli_query($db, $sql);
$produto=mysqli_fetch_assoc($result);

if(!$produto) {
    echo "Produto não encontrado.";
    exit;
}else{
    $_SESSION['carrinho'] = $_SESSION['carrinho'] ?? [];
    $id_produto = $produto['id_produto'];
    $nome = $produto['nome'];
    $imagem = $produto['imagem'];
    $preco = $produto['preco'];
    $descricao = $produto['descricao'];
    if(!isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto] = [
            'id_produto' => $id_produto,
            'nome' => $nome,
            'imagem' => $imagem,
            'preco' => $preco,
            'descricao' => $descricao,
            'quantidade' => 1

        ];
    } else {
        $_SESSION['carrinho'][$id_produto]['quantidade']++;
    }
    //echo "<script>document.getElementById('saida').innerHTML = 'Produto adicionado ao carrinho!';</script>";
    echo "<script>alert('Produto adicionado ao carrinho!'); window.location.href='inicio.php';</script>";
}
exit;
     


?>
