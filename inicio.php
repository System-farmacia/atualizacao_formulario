<?php
session_start(); //essa parte tem que ser a primeira a aparecer ao usuario
 include "db.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>FarmaSync-Inicio</title>
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo" class="logotipo">
        <nav>
            <ul class="menu">
                <li><a href="inicio.html">Início</a></li>
                <li><a href="produtos.html">Produtos</a></li>
                <li><a href="sobre.html">Sobre</a></li>
            </ul>
        </nav>
     
<?php 

$cor="cornflowerblue";
$margin="60px 0px 0 -25px";
if (isset($_SESSION["nome_usuario"])) {
     echo "<div style='margin: " . $margin . "; text-align:center;'>";
     echo  "<a href= 'perfil.php' style='text-decoration:none; color: " . $cor . ";'>";
     echo "<img src='icons/user-solid-full.svg' alt='Login' class='icone';'>";
     echo  "<br>";
        echo "<p style='color: " . $cor . ";'font-weight: bold;'>" . $_SESSION["nome_usuario"] . "</p>";
        echo "</a>";
     echo "</div>";
      
     } else { echo "<div style='margin: 60px 0px 0 -45px; text-align:center;'>";
    echo "<a href='login.html' style='color: $cor; text-decoration: none; font-weight: bold;'>";
    echo "<img style=' margin-bottom: 30px; margin-left:20px;' src='icons/user-solid-full.svg' alt='Login' class='icone'><br>Faça login";
    echo "</a>";
    echo "</div>"; }

?>
        <a href="carrinho.php"><img src="icons/cart-arrow-down-solid-full.svg" alt="Carrinho" class="icone"></a>
    </header>

<div class="container-body">
    <section>
    <div class="container-categorias">
        <div class="categoria">
            <a href="medicamento"><img src="icons/medicamento.png" alt="Medicamentos"></a>
            <h3>Medicamentos</h3>
        </div>
        
        <div class="categoria">
            <a href="dermo"><img src="icons/dermo.png" alt="Dermo"></a>
            <h3>Dermo</h3>
        </div>
        
        <div class="categoria">
            <a href="infantil"><img src="icons/infantil.png" alt="Infantil"></a>
            <h3>Infantil</h3>
        </div>
        
        <div class="categoria">
            <a href="vitaminas"><img src="icons/vitaminas.png" alt="Vitaminas"></a>
            <h3>Vitaminas</h3>
        </div>

        <div class="categoria">
            <a href="promocoes"><img src="icons/promocoes.png" alt="Promoções"></a>
            <h3>Promoções</h3>
        </div>
    </div>
    </section>

    <div class="container">
        <div class="banner-img">
            <img src="img/banner2.jpg" alt="Banner">
            <div class="main-text">
                <h1>Na FarmaSync</h1>
                <h2>Você encontra os melhores produtos farmacêuticos com qualidade e confiabilidade.</h2>
            </div>
        </div>
    </div>

    <section>
    <!--começo da sessão de MAIS VENDIDOS-->
    <div class="produtos">
        <h2 class="section-produtos-title">Produtos mais vendidos</h2>

        <hr>

        <div class="container-produtos">
         <?php
$pesquisa="SELECT id_produto, nome, descricao, preco, imagem FROM produtos WHERE id_produto IN (5, 6, 7, 8)"; //aqui tem que ser a consulta para selecionar os produtos mais vendidos, por enquanto coloquei os ids dos produtos que quero mostrar
$resultado=mysqli_query($db, $pesquisa);

while($linha=mysqli_fetch_assoc($resultado)) {
   

?>

            <div class="produto">
    <a href="#">
   <img src=" <?php echo $linha['imagem']; ?>" alt="Foto" style="width:100px;">
</a>
                <h3 class="produto-title"><?php echo $linha['nome']; ?></h3>
                <p><strong>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></strong></p>
                
                <a href="adicionar.php?id_produto=<?php echo $linha['id_produto']; ?>">
                    <button class="btn">Adicionar ao carrinho</button>
                </a>

            </div>
            <?php } ?>
        </div>
    </div>




        <div class="container-produtos">
         <?php
$pesquisa="SELECT id_produto, nome, descricao, preco, imagem FROM produtos WHERE id_produto IN (9, 10, 11, 12)"; //aqui tem que ser a consulta para selecionar os produtos mais vendidos, por enquanto coloquei os ids dos produtos que quero mostrar
$resultado=mysqli_query($db, $pesquisa);

while($linha=mysqli_fetch_assoc($resultado)) {
   

?>

            <div class="produto">
      <a href="#"><img src="<?php echo $linha['imagem']; ?>" alt="Foto"></a>
                <h3 class="produto-title"><?php echo $linha['nome']; ?></h3>
                <p><strong>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></strong></p>
                
                <a href="adicionar.php?id_produto=<?php echo $linha['id_produto']; ?>">
                    <button class="btn">Adicionar ao carrinho</button>
                </a>

            </div>
            <?php } ?>
        </div>
    <div id="saida">
  


    </div>




    <!--final da sessão de MAIS VENDIDOS-->

    <!--começo da sessão de __ -->
    
<hr>
        <div class="container-produtos">
                    <?php
$pesquisa="SELECT id_produto, nome, descricao, preco, imagem FROM produtos WHERE id_produto IN (13, 14, 15, 16)"; //aqui tem que ser a consulta para selecionar os produtos mais vendidos, por enquanto coloquei os ids dos produtos que quero mostrar
$resultado=mysqli_query($db, $pesquisa);

while($linha=mysqli_fetch_assoc($resultado)) {
   

?>

            <div class="produto">
      <a href="#"><img src="<?php echo $linha['imagem']; ?>" alt="Foto"></a>
                <h3 class="produto-title"><?php echo $linha['nome']; ?></h3>
                <p><strong>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></strong></p>
                
                <a href="adicionar.php?id_produto=<?php echo $linha['id_produto']; ?>">
                    <button class="btn">Adicionar ao carrinho</button>
                </a>

            </div>
            <?php } ?>
        </div>
        <div class="container-produtos">
                    <?php
$pesquisa="SELECT id_produto, nome, descricao, preco, imagem FROM produtos WHERE id_produto IN (17, 18, 19, 20)"; //aqui tem que ser a consulta para selecionar os produtos mais vendidos, por enquanto coloquei os ids dos produtos que quero mostrar
$resultado=mysqli_query($db, $pesquisa);

while($linha=mysqli_fetch_assoc($resultado)) {
   

?>

            <div class="produto">
      <a href="#"><img src="<?php echo $linha['imagem']; ?>" alt="Foto"></a>
                <h3 class="produto-title"><?php echo $linha['nome']; ?></h3>
                <p><strong>R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?></strong></p>
                
                <a href="adicionar.php?id_produto=<?php echo $linha['id_produto']; ?>">
                    <button class="btn">Adicionar ao carrinho</button>
                </a>

            </div>
            <?php } ?>
        </div>
        
    <!--final da sessão de __ -->
    </section>
</div>

    <footer>
        <div class="footer-container">
            <div class="footer-contacts">
                <img src="img/logo.png" alt="Logo" class="logotipo">
                <div class="footer-socialmidia">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="github">
                        <i class="fa-brands fa-github"></i>
                    </a>

                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <ul class="footer-list">
                <li>
                    <h3>Institucional</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">Sobre nós</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Nossas Bulas de A à Z</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Todas as Marcas</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Atendimento</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">Atendimento por Email</a>
                </li>
                <li>
                    <a href="#" class="footer-link">FAQ - Perguntas frequentes</a>
                </li>
            </ul>

            <div class="footer-feedback">
                <h3>Feedback</h3>
                <p>Deixe aqui a sua avaliação e sugestões de melhorias para nosso site.</p>

                <div class="input-group">
                    <input type="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            &#169 FarmaSync 2026
            <br>
            Consulte sempre um médico antes de usar qualquer medicamento.
        </div>
    </footer>
</body>
</html>