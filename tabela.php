<?php
include "db.php";


$select_query = "SELECT * FROM usuarios";
$queryUsers = $db->query($select_query);

function exibirUsuarios() {
    global $queryUsers;
    if ($queryUsers->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";
        while ($row = $queryUsers->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['usuario_id'] . "</td>";
            echo "<td>" . $row['nome_usuario'] . "</td>";
            echo "<td>" . $row['email_usuario'] . "</td>";
            echo "<td><a href='editar.php?id=" . $row['usuario_id'] . "'>Editar</a> | <a href='deletar.php?id=" . $row['usuario_id'] . "'>Deletar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
}
$db->close();





