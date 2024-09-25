<?php

require_once '../model/conexao.php';

$cep = $_POST['cep'];
$rua = $_POST['rua'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$numero = $_POST['numero'];
$conplemento = $_POST['complemento'];

$conexao = new Conexao();

$conexao->insereEndereco($cep, $bairro, $rua, $cidade, $uf, $complemento);

?>
