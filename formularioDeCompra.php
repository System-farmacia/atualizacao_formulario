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

<style>

header {
    width: 100%;
    box-sizing: border-box;
}

/* resetar o comportamento do body e do html */
html, body {
    margin: 0;
    padding: 0;
    width: 100%;
    overflow-x: hidden; /* pra nn vazar pela direita */
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #f4f7f6;
}

.produto {
    width: 100%;
    max-width: 1200px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
}

.resumo-compra {
    max-width: 550px;
    margin: 20px auto;
    padding: 20px;
    background: #007bff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    text-align: center;
}

.resumo-compra h2 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 15px;
}


.TITULO{
  text-align: center;
    color: #062166;
    background-color: #fff;
    margin: 30px auto; 
    padding: 15px 30px;
    border-radius: 15px;
    box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
    width: fit-content;
}

/* Container principal */
#carrinho {
    max-width: 550px;
    margin: 40px auto;
    padding: 30px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Título */
#carrinho h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #1a1a1a;
    font-size: 22px;
}

/* Subtítulos */
#carrinho h3 {
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
    border-left: 4px solid #007bff;
    padding-left: 8px;
}

/* Labels */
#carrinho label {
    display: block;
    margin-top: 12px;
    font-weight: 600;
    color: #444;
}

/* Inputs gerais */
#carrinho input,
#carrinho select,
#carrinho textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid #ccc;
    background: #f9f9f9;
    transition: all 0.25s ease;
}

/* Focus */
#carrinho input:focus,
#carrinho select:focus,
#carrinho textarea:focus {
    background: #fff;
    border-color: #007bff;
    box-shadow: 0 0 6px rgba(0,123,255,0.25);
    outline: none;
}

/* Placeholder */
#carrinho input::placeholder,
#carrinho textarea::placeholder {
    color: #aaa;
}

/* Radios */
#carrinho input[type="radio"] {
    width: auto;
    margin-right: 6px;
}

/* Melhor alinhamento dos radios */
#carrinho label input[type="radio"] {
    margin-right: 5px;
}

/* Espaçamento automático */
#carrinho > * {
    margin-bottom: 12px;
}

/* Linha separadora */
#carrinho hr {
    border: none;
    height: 1px;
    background: #eee;
    margin: 20px 0;
}

/* Botão */
#carrinho button {
    width: 100%;
    padding: 14px;
    margin-top: 15px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

/* Hover botão */
#carrinho button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
}

/* Clique */
#carrinho button:active {
    transform: scale(0.98);
}

/* Validação */
#carrinho input:valid {
    border-color: #28a745;
}

#carrinho input:invalid {
    border-color: #1E2842;
}

/* Hover nos campos */
#carrinho input:hover,
#carrinho select:hover,
#carrinho textarea:hover {
    border-color: #999;
}
.entrega{
margin-top: 30px;
   
}


</style>

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
<h1 class="TITULO">Formulário de Compra</h1>
<!--Remedios-->
<section class="produto">

<div id="carrinho">

<form action="" method="POST">
<label for="nome">Nome Completo:</label>
<input type="text" id="nome" name="nome" required>

<label for="gênero">Gênero</label>
<select id="gênero" name="gênero" required>
    <option value="">Selecione</option>
    <option value="Masculino">Masculino</option>
    <option value="Feminino">Feminino</option>
</select>

<label for="Data de Nascimento">Data de Nascimento:</label>
<input type="text" id="DataNascimento">

<label for="peso">Peso:</label>
<input type="text" id="peso" name="peso" required>

<label for="cep">CEP:</label>
<input type="text" id="cep" name="cep">

<label for="uf">UF:</label>
<select name="uf" id="uf">
  <option value="">Selecione o estado</option>
  <option value="AC">Acre</option>
  <option value="AL">Alagoas</option>
  <option value="AP">Amapá</option>
  <option value="AM">Amazonas</option>
  <option value="BA">Bahia</option>
  <option value="CE">Ceará</option>
  <option value="DF">Distrito Federal</option>
  <option value="ES">Espírito Santo</option>
  <option value="GO">Goiás</option>
  <option value="MA">Maranhão</option>
  <option value="MT">Mato Grosso</option>
  <option value="MS">Mato Grosso do Sul</option>
  <option value="MG">Minas Gerais</option>
  <option value="PA">Pará</option>
  <option value="PB">Paraíba</option>
  <option value="PR">Paraná</option>
  <option value="PE">Pernambuco</option>
  <option value="PI">Piauí</option>
  <option value="RJ">Rio de Janeiro</option>
  <option value="RN">Rio Grande do Norte</option>
  <option value="RS">Rio Grande do Sul</option>
  <option value="RO">Rondônia</option>
  <option value="RR">Roraima</option>
  <option value="SC">Santa Catarina</option>
  <option value="SP">São Paulo</option>
  <option value="SE">Sergipe</option>
  <option value="TO">Tocantins</option>
</select>

<label for="cidade">Cidade:</label>
<input type="text" id="cidade" name="cidade">

<label for="numero">Numero:</label>
<input type="text" id="numero" name="numero">
<br>
<br>

<label for="endereco">Endereço de Entrega:</label>
<input type="text" id="endereco" name="endereco">
<br>

<div class="entrega"></div>
<label for="pagamento">Método de Pagamento:</label>
<select id="pagamento" name="pagamento" required>
    <option value="">Selecione</option>
    <option value="cartao">Cartão de Crédito</option>
    <option value="boleto">Boleto Bancário</option>
    <option value="pix">PIX</option>
</select>
<!-- Essa tela de compras é APENAS DE COMPRAS  não precisamos mostrar as imagens do produto, isso pode ser mostrado lá na tela de carrinho aonde o USUARIO pode alterar  -->
 
<button type="submit">concluir compra</button>

</form>
</div>

    <div class="resumo-compra">

  

    <h2>Resumo da Compra</h2>

</div>
<!-- 
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
} -->

<!-- </script> -->
    
</body>
</html>