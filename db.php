<?php
// Configurações do banco de dados
$host = 'localhost'; // Endereço do servidor de banco de dados
$dbname   = 'cadastro_usuarios'; // Nome do banco de dados
$password = '1507'; // Senha do banco de dados
$username='root'; // Nome de usuário do banco de dados 

$db = new mysqli($host, $username, $password, $dbname); //usamos a extensão mysqli para conectar ao banco de dados(basicamente o mysqli é um extensão que permite fazer a conexão de nosso banco de dados com o php)

if ($db->connect_error) {

    die( $db->connect_error);
//aqui ele imprime a mensagem de erro caso haja algum problema na conexão com o banco de dados, caso contrário ele continua normalmente, retorna null se nehum erro tiver ocorrido senão retorna o último erro ocorrido na conexão(esse conect_error faz parte da extensão mysqli, ele é um método que retorna uma string descrevendo o erro de conexão mais recente, ou null se nenhuma conexão tiver sido feita ou se a última conexão tiver sido bem-sucedida)
}

?>

