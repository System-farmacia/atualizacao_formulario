<?php
session_start();
include "db.php";
if(!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "<p>O carrinho está vazio.</p>";
} else {
   
    $total_carrinho = 0;
    foreach($_SESSION['carrinho'] as $item) {
       echo "<h1 class='nome'>{$item['nome']}</h1>";
    echo "<img class='imagem' src='{$item['imagem']}' alt='{$item['nome']}'>";
    echo "<p class='descricao'>{$item['descricao']}</p>";
    echo "<h2 class='preco'>R$ " . number_format($item['preco'] * $item['quantidade'], 2, ',', '.') . "</h2>";
    $total_carrinho += $item['preco'] * $item['quantidade'];
    

    echo "<p>Quantidade: {$item['quantidade']}</p>";
    echo "<a href='remover.php?id={$item['id_produto']}'>Remover Item</a>";

    echo "<hr>";

   
    }
    echo "<tr><td colspan='3'><strong>Total do Carrinho:</strong></td><td><strong>R$ " . number_format($total_carrinho, 2, ',', '.') . "</strong></td></tr>";
    echo "</table>";
}
?>

<a href="limparsessaocarrinho.php">Limpar Carrinho</a>
<a href="formularioDeCompra.php">Realizar Compra</a>