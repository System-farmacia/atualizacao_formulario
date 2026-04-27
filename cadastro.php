<?php
session_start(); // Inicia a sessão para armazenar informações do usuário
include 'db.php'; // Inclui o arquivo de conexão com o banco de dados

//Adicionamos as informações dos usuarios no banco de dados, usando o método POST para pegar as informações do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome_usuario'] ??''; // Pega o nome do formulário
    $cpf = $_POST['CPF'] ??''; // Pega o CPF do formulário
    $genero = $_POST['genero'] ??''; // Pega o gênero do formulário

    $logradouro = $_POST['logradouro'] ??''; // Pega o logradouro do formulário

    $bairro = $_POST['bairro'] ??''; // Pega o bairro do formulário
    
    $cidade = $_POST['Cidade'] ??''; // Pega a cidade do formulário
    
    $estado = $_POST['estado'] ??'';
    
    $cep = $_POST['cep'] ??'';


    
//$peso = $_POST['peso'] ??''; // Pega o peso do formulário
    

    $email = $_POST['email_usuario'] ??''; // Pega o email do formulário
    $senha = $_POST['senha_usuario'] ??''; // Pega a senha do formulário

    $data_nascimento = $_POST['data_de_nasc'] ??''; // Pega a data de nascimento do formulário
   
    if ($nome != '' && $email != '' && $senha != '' && $cpf != '' && $genero !='' &&  $logradouro != '' && $bairro != '' && $cidade != '' && $estado != '' && $cep != '' && $data_nascimento != '') { // Verifica se os campos não estão vazios

    // Prepara a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome_usuario,CPF,genero,logradouro,bairro,Cidade,estado,cep,email_usuario, senha_usuario,  data_de_nasc) VALUES ('$nome', '$cpf',  '$genero', '$logradouro', '$bairro', '$cidade', '$estado', '$cep', '$email', '$senha', '$data_nascimento')";

    if ($db->query($sql) === TRUE) {

$_SESSION["usuario_id"] = $db->insert_id; // Armazena o ID do usuário recém-inserido na sessão -- slc kkkkkkk esqueci que o id não tava armazenando kkkkkkk, tentei usar o usuario_id lá no dadosuser.php mas não tava funcionando, aí eu descobri que o id do usuário não estava sendo armazenado na sessão, então eu adicionei essa linha aqui para armazenar o id do usuário recém-inserido na sessão, usando o método insert_id da conexão com o banco de dados para obter o ID do último registro inserido, e armazenando esse ID na variável de sessão "usuario_id" para que possa ser usado posteriormente para identificar o usuário logado) kkkkk as vezes sou muito cego e nem lembro as paradas mais básicas do php kkkkkkkk

     $_SESSION["nome_usuario"] = $_POST['nome_usuario']; // Armazena o nome do usuário na sessão"";

        echo "<script>alert('Bem vindo " . $_SESSION["nome_usuario"] . "!');</script>";
        // Redireciona para a página de login após o cadastro
        echo "<script>window.location.href = 'inicio.php';</script>";
    } else {
        echo "<scirpt>alert('Erro ao cadastrar usuário: " .$db->error . "'); </script>";
    }
    
}
}

$db->close(); // Fecha a conexão com o banco de dados

?>