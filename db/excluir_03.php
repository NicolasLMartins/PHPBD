<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="titulo">Excluir Registro #03</div>

<?php
require_once "conexao.php";

$registros = [];
$conexao = novaConexao();

if ($_GET['excluir']) {
    $excluirsql = "DELETE FROM cadastro WHERE id = ?";
    $stmt = $conexao->prepare($excluirsql);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$sql = "SELECT id, nome, nascimento, email FROM cadastro";
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
        <th>ID</th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Email</th>
        <th>Ações</th>
    </thead>

    <tbody>
        <?php foreach ($registros as $registro): ?>   
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nome'] ?></td>
                <td>
                    <?= date('d/m/Y', strtotime($registro['nascimento'])) ?>
                </td>
                <td><?= $registro['email'] ?></td>

                
                <td> 
                    <a href="/atividade.php?dir=db&file=excluir_03&excluir=<?= $registro['id'] ?>" class="btn btn-danger">
                        Excluir 
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
            
    </tbody>
</table>


<style>
    table > *{
        font-size: 1.2rem;
    }
</style>
