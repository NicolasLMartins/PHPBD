<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="titulo">Excluir Registro #01</div>

<?php
require_once "conexao.php";

$registros = [];
$conexao = novaConexao();

$sql = "SELECT * FROM cadastro";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif ($conexao->error) {
    echo("Erro: " . $conexao->error);
}
?>

<table class="table table-hover table-striped table-bordered">
    <thead>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Email</th>
    </thead>

    <tbody>
        <?php foreach ($registros as $registro): ?>   
            <tr>
                <td><?= $registro['nome'] ?></td>
                <td><?= $registro['nascimento'] ?></td>
                <td><?= $registro['email'] ?></td>
            </tr>
        <?php endforeach ?>
            
    </tbody>
</table>

<style>
    table > *{
        font-size: 1.2rem;
    }
</style>