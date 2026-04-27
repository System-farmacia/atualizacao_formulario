<?php
session_start();
// Limpa o carrinho
IF (isset($_SESSION['carrinho'])) {
    unset($_SESSION['carrinho']);
}
header("Location: inicio.php");
exit;