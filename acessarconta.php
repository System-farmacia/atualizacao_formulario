<?php
session_start();
include 'db.php';
if($_SERVER['REQUEST_METHOD'] === 'GET'){

$email = $_GET['email_usuario'] ??'';
$password = $_GET['senha_usuario'] ??'';

$dados = $db->prepare("SELECT nome_usuario,senha_usuario FROM usuarios WHERE email_usuario = ?");
$dados->bind_param("s", $email);
$dados->execute();

$result = $dados->get_result();//imagine que o get_result é como receber um envelope fechado do banco de dados, e o fetch_assoc é como abrir esse envelope para ver o que tem dentro. O fetch_assoc pega os dados do envelope e os organiza em um formato que a gente pode usar, tipo uma tabela com nome_usuario e senha_usuario. Se o fetch_assoc encontrar algo, ele vai colocar o nome do usuário na sessão para a gente usar depois.

if( $usuario=$result->fetch_assoc()){
   //aqui ele tenta "Abrir o envelope" para ver se tem um funcionário com aquele email. Se tiver, ele pega o nome e a senha do funcionário e compara a senha que o usuário digitou com a senha que está no banco de dados. Se as senhas forem iguais, ele coloca o nome do funcionário na sessão e redireciona para a página principal. Se não forem iguais, ele mostra uma mensagem de erro dizendo que o funcionário não foi encontrado.No fim ele salva os dados dentro da variavel usuario.



if($password===$usuario['senha_usuario']){
    $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
    header("Location: inicio.php");
    exit();


}else{
    echo "<h1>Senha incorreta. Usuário não encontrado.</h1>";
}
}else{
    echo "<h1>Usuário não encontrado. Verifique suas credenciais.</h1>";
}

}





