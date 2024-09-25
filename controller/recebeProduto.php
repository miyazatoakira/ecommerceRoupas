<?php

require_once '../model/conexao.php';

$cep = $_POST['cemodelo'];
$rua = $_POST['nome'];
$cidade = $_POST['tecido'];
$uf = $_POST['marca'];
$conexao = new Conexao();

$conexao->insereEndereco($cep, $bairro, $rua, $cidade, $uf, $complemento);

?>
