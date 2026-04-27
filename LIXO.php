


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
<style>
        .header-usuario { float: right; padding: 10px; font-weight: bold; }
    </style>

</head>
<body>
    <header>
        <div class="header-usuario">
             <font face="Arial" size="3" color="#000000">//parte onde vai aparecer o nome do usuario que acabou de se cadastrar // </font><b></font><br><br>
           <?php
         

$hora=date("H");//h minusuculo retorna a hora no formato 12 horas, H maiusculo retorna a hora no formato 24 horas slccc que chatice em kkkkk
if ($hora < 12) {
    echo "Bom dia!";
} elseif ($hora < 18) {
    echo "Boa tarde!";
} else {
    echo "Boa noite!";
}




          
            if (isset($_SESSION["nome_usuario"])) {
                echo "<p>Bem-vindo, " . $_SESSION["nome_usuario"] . "!";
                echo "<a href='logout.php'>[Logout]</a></p>";
                echo "<a href='dadosuser.php'>[Visualizar seus dados]</a></p>";
            } else {
                echo "<p>Bem-vindo, visitante! <a href='index.html'>Faça login</a></p>";
            }
            ?>
    </header>

<h1> Aqui é a parte principal do front end que o pessoal do grupo está desenvolvendo</h1>

</body>
</html>