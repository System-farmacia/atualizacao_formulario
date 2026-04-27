<?php


function exibirDadosUsuario($user_data) {
    
 if($user_data ) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>CPF</th><th>Endereço</th><th>Peso</th><th>Data de Nascimento</th></tr>";
    
        echo "<tr>";
        echo "<td>" . $user_data['usuario_id'] . "</td>";
        echo "<td>" . $user_data['nome_usuario'] . "</td>";
        echo "<td>" . $user_data['email_usuario'] . "</td>";
        echo "<td>" . $user_data['CPF'] . "</td>";
        echo "<td>" . $user_data['endereco_usuario'] . "</td>";
        echo "<td>" . $user_data['peso'] . "</td>";
        echo "<td>" . $user_data['data_de_nasc'] . "</td>";
        echo "<td><a href='editar.php?id=" . $user_data['usuario_id'] . "'>Editar</a> | <a href='deletar.php?id=" . $user_data['usuario_id'] . "'>Deletar</a></td>";
        echo "</tr>";
    
    echo "</table>";
}else{
    echo "Nenhum dado do usuário encontrado.";
}
}
?>








