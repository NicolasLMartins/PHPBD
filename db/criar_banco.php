<!-- erro de escopo: pasta db estava na pasta assets (sarah) -->

<div class="titulo">Criar Banco</div>

<?php

require_once "conexao.php"; //faltava ponto e virgula

$conexao = novaConexao(null);

$sql = 'CREATE DATABASE IF NOT EXISTS db_php';

$resultado = $conexao->query($sql); //faltava ponto e virgula

if ($resultado) {
    echo("Banco de dados criado com sucesso! ");
}
else {
    echo("Erro: " . $conexao->error);
}

$conexao->close(); //faltava ponto e virgula