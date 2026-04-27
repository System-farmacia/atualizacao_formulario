<?php

session_start();
include "db.php";

if(!isset($_SESSION["carrinho"])){
    echo "<script>alert('Não é possível prosseguir para a  compra sem adicionar produtos.'); window.location.href='inicio.php';</script>";
    
    exit();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Compra</title>
    <link rel="stylesheet" href="css/stylecompras.css">
</head>
<body>

<header>
<!--Imagem da Logo da Farmacia -->    
    <a href="inicio.php" target="blank"><img src="img_login/logo.png" alt="Logo" class="Logotipo"></a>
    
    <div class="tudo">
    <div class="Pesquisa">
        <form action="produtos.php" method="get">
            <input type="text" name="busca" placeholder="Buscar Produtos">
            <button type="submit" id = 'pesquisar'>Pesquisar</button>
        </form>
    </div>




 
  <div class="item">

  
 
    <?php 

$cor="cornflowerblue";

if (isset($_SESSION["nome_usuario"])) {
     
     echo  "<a href= 'userconfig.php' style='text-decoration:none; color: " . $cor . ";'>";
     echo "<img src='icons/user.png' alt='Login' id='icone';'>";
     echo  "<br>";
        echo "<p style='color: " . $cor . ";'font-weight: bold;'>" . $_SESSION["nome_usuario"] . "</p>";
        echo "</a>";
     echo "</div>";
      
     } else { 
    echo "<a href='login.html' style='color: $cor; text-decoration: none; font-weight: bold;'>";
    echo "<img style=' margin-bottom: 10px; margin-left:20px;' src='icons/user.png' alt='Login' class='icone'><br>Faça login";
    echo "</a>";
    echo "</div>"; }

?>

   <a href="carrinho.php" target="_blank">
        <img src="icons/carrinho.png" alt="Compra" class="Icone" ></a>

        </div>
    </div>
</header>
<h1 class="titulo">Formulário de Compra</h1>
<!--Remedios-->
<section class="produto">

<div id="produtos_carrinho">

<label for="nome">Nome Completo:</label>
<input type="text" id="nome" name="nome" required>
<label for="endereco">Endereço de Entrega:</label>
<input type="text" id="endereco" name="endereco" required>
<label for="pagamento">Método de Pagamento:</label>
<select id="pagamento" name="pagamento" required>
    <option value="">Selecione</option>
    <option value="cartao">Cartão de Crédito</option>
    <option value="boleto">Boleto Bancário</option>
    <option value="pix">PIX</option>
</select>
<!-- Essa tela de compras é APENAS DE COMPRAS  não precisamos mostrar as imagens do produto , isso pode ser mostrado lá na tela de carrinho aonde o USUARIO pode alterar  -->

</div>

    <div class="resumo-compra">

  

    <h2>Resumo da Compra</h2>

<script>

function atualizarPreco(){
    let quantidade = document.getElementById("quantidade").value;
    let precoUnitario = 7.90;

    let total = quantidade * precoUnitario;

    document.getElementById("preco").innerHTML = "R$ " + total.toFixed(2);
}

// 📦 Calcular frete simples
function calcularFrete(){
    let cep = document.getElementById("cep").value;
    let resultado = document.getElementById("resultado-frete");

    if(cep.length < 8){
        resultado.innerHTML = "CEP inválido!";
        resultado.style.color = "red";
        return;
    }

    let frete = 15.00;

    resultado.innerHTML = "Frete: R$ " + frete.toFixed(2) + " (3 a 5 dias)";
    resultado.style.color = "green";
}

</script>
    
</body>
</html>