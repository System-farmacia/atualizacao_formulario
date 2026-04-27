<?php
session_start();
  
if (!isset($_SESSION["usuario_id"]))
    {
        //em outrtas palavras, se o id do usuario não estiver definido na sessão, redireciona para a página de login ou outra página apropriada
        header("Location: inicio.php"); // Redireciona para a página de login ou outra página se o id do usuario não estiver definido
        
        exit();
    }
      include "db.php"; // Inclui o arquivo de conexão com o banco de dados
    
$dadosconsulta=$db->prepare("SELECT * FROM usuarios WHERE usuario_id = ?"); // Prepara a consulta SQL para selecionar os dados do usuário com base no ID armazenado na sessão
$dadosconsulta->bind_param("i", $_SESSION["usuario_id"]); // começa com i pq é inteiro. Vincula o parâmetro da consulta com o ID do usuário armazenado na sessão
$dadosconsulta->execute(); // Executa a consulta SQL
$resultado = $dadosconsulta->get_result(); // Obtém o resultado da consulta
$user_data=$resultado->fetch_assoc();

if (!$user_data) {
    // Se os dados do usuário não forem encontrados, redireciona para a página de login ou outra página apropriada
    header("Location: home.php"); // Redireciona para a página de login ou outra página se os dados do usuário não forem encontrados
    
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil-style.css">
    <title>Pagina-de-Perfil</title>
</head>
<body>

    <header>
        <img src="img/logo.png" alt="Logo" class="logotipo">
    </header>

    <main>
        <a href="inicio.php" class="link-perfil">
        <h1 class="title"> < Perfil </h1></a>

        <div class="container">

            <section class="first-section">
                <div class="moldura">
                    <div class="circulo">
                        <img src="icons/user-solid-full.svg" alt="foto-perfil">
                    </div>
                </div>

                <h2>Informações pessoais</h2>

                <div class="dados-pessoais">
                   
                    <div class="camp">
                         <?php
                          if(!empty($user_data['genero'])) {
                            echo "<div class='valor'>" .htmlspecialchars($user_data['genero']) . "</div>";
                        } else {
                            echo "<div class='valor'>Gênero não disponível</div>";
                        }
                         ?>
                        <p class="label">Gênero</p>
                        <div class="genero-opcoes">
                            <input type="radio" id="masculino" name="genero" value="masculino"
                            <?php if ($user_data['genero'] === 'masculino') echo 'checked'; ?>>
                            <label class="input-genero" for="masculino">Masculino</label>



                            <input type="radio" id="feminino" name="genero" value="feminino"
                            <?php if ($user_data['genero'] === 'feminino') echo 'checked'; ?>>
                            <label class="input-genero" for="feminino">Feminino</label>

                            <input type="radio" id="prefiro-nao-dizer" name="genero" value="prefiro-nao-dizer"
                            <?php if ($user_data['genero'] === 'prefiro-nao-dizer') echo 'checked'; ?>>
                            <label class="input-genero" for="prefiro-nao-dizer">Prefiro não dizer</label>

                            <input type="radio" id="outro" name="genero" value="outro"
                            <?php if ($user_data['genero'] === 'outro') echo 'checked'; ?>>
                            <label class="input-genero" for="outro">Outro</label>
                        </div>
                    </div>

                    <div class="camp">
                        <p class="label">Nome</p>
                       <?php
                         if($user_data['nome_usuario']) {
                            echo "<div class='valor'>" . $user_data['nome_usuario'] . "</div>";
                        } else {
                            echo "<div class='valor'>Nome não disponível</div>";
                        }
                        ?>
                       

                    <div class="camp">
                        <p class="label">Email</p>
                        <div class="valor"><?php echo $user_data['email_usuario']; ?></div>
                    </div>

                    <div class="camp">
                        <p class="label">CPF</p>
                        <div class="valor"><?php echo $user_data['CPF']; ?></div>
                    </div>

                    <div class="camp">
                        <p class="label">Nascimento</p>
                        <div class="valor"><?php echo $user_data['data_de_nasc']; ?></div>
                    </div>

                    <div class="endereco">
                        <div class="camp">
                            <p class="label">Rua</p>
                            <div class="valor"><?php echo $user_data['logradouro']; ?></div>
                        </div>
                        <div class="camp">
                            <p class="label">CEP</p>
                            <div class="valor"><?php echo $user_data['cep']; ?> </div>
                        </div>
                    </div>
                    <a class="link-sair" href="logout.php">Sair</a>
                </div>

            </section>

        </div>
    </main>

</body>
</html>