<?php
session_start();

if(isset($_GET['id'])) {
    $id_produto = $_GET['id'];
    
    if(isset($_SESSION['carrinho'][$id_produto])) {
        unset($_SESSION['carrinho'][$id_produto]);
    }
}

header("Location: carrinho.php");
exit();
?>