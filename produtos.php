<?php 
include("db.php");
$termo = isset($_GET['busca']) ? $_GET['busca'] : '';
if(!$termo == ''){
$sql = "SELECT * FROM produtos WHERE TRIM(nome) LIKE ?";
$stmt = $db->prepare($sql);
$busca = "%" . $termo . "%";
$stmt->bind_param("s", $termo);
$stmt->execute();
$resultado = $stmt->get_result(); // Obtém o resultado da consulta
if ($resultado->num_rows > 0) {
        echo "<h2>Resultados da pesquisa:</h2>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<img src='" . $row["imagem"] . "' alt='" . $row["nome"] . "' style='width: 100px; height: 100px;'>";
            echo "<br>Nome: " . $row["nome"] . "<br>";
            echo "Princípio ativo: " . $row["descricao"] . "<br>";
            echo "Fabricante: " . $row["fabricante"] . "<br>";
            echo "Categoria: " . $row["categoria_id"] . "<br><hr>";
            echo "Valor: ". "R$ ". $row["preco"] . "</td>";
            echo "<a href='adicionar.php?id_produto=" . $row["id_produto"] . "'>Adicionar ao Carrinho</a><br><hr>";
        }
    } else {
        echo "Nenhum medicamento encontrado.";
    }
}


?>