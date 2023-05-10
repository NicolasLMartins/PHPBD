<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="titulo">Inserir Registro #02</div>

<?php

if (count($_POST) > 0) {
    $dados = $_POST;

    $erros = [];

    if (trim($dados['nome']) === "") {
        $erros['nome'] = 'Nome é obrigatório!';
    }

    if ($dados['nascimento']) {
        $data = DateTime::createFromFormat('d/m/Y', $dado['nascimento'];)
        if (!$data) {
            $erros['nascimento'] = 'Data deve estar no padrão dd/mm/aaaa!';
        }
    }

    if(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido!';
    }

    if(!filter_var($dados['site'], FILTER_VALIDATE_URL)) {
        $erros['site'] = 'Site inválido!';
    }

    $horasConfig = [
        "options" => ["min_range" => 0, "max_range" => 220]
    ];

    if(!filter_var($dados['horas'], FILTER_VALIDATE_INT, $horasConfig) && $dados['horas'] != 0) {
            $erros['horas'] = 'Horas trabalhadas inválida (0-220)!';
    }

    $salarioConfig = [
        "options" => ["decimal" => ',', "min_range" => 1302.0, "max_range" => 10000.0]
    ];
    if(!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT,
        $salarioConfig)) {
            $erros['salario'] = 'Salário inválido (1302-10000)';
    }
}

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