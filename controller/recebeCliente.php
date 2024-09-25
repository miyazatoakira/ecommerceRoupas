<?php

require_once '../model/conexao.php';

$user_name = $_POST['user_name'];
$primeiro_nome = $_POST['primeiro_nome'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$sexo = $_POST['flexRadioDefault'];
$cpf = $_POST['CPF'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$obs = $_POST['obs'];

# Variáveis auxiliares
$confirma_senha = $_POST['confirma_senha'];
$termos = isset($_POST['termos']);  // Certificar-se que o campo "termos" foi preenchido


if($senha == $confirma_senha) {
    if($termos) {
        # Tabelas e colunas
       
        # Criação da conexão com a classe Conexao
        $conexao = new Conexao();

        $conexao->insereCliente($user_name, $primeiro_nome, $sobrenome, $sexo, $telefone, $cpf, $email, $senha, $numero, $complemento, $obs);
       
    } else {
        echo "<script>alert('Termos de uso não preenchidos');</script>";
    }
} else {
    echo "<script>alert('Senha incompatível, digite a mesma senha duas vezes!');</script>";
}

?>
