<?php
session_start(); // Inicia a sessão para acessar as variáveis de sessão
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destroi a sessão
// Redireciona para a página de login ou outra página após o logout
header("Location: inicio.php");   
exit();


?>