<div class="titulo">Inserir Registro #01</div>

<?php

require_once "conexao.php";

$sql = "INSERT INTO cadastro (nome, nascimento, email, site, horas, salario)
VALUES (
    'Nícolas',
    '2006-08-24',
    'nicolaslm2006@gmail.com',
    'https://www.polywallpapers.com.br',
    100,
    5958.98)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if ($resultado) {
    echo("Registro inserido com sucesso: ");
}
else {
    echo("Erro: " . $conexao->error);
}

$conexao->close();