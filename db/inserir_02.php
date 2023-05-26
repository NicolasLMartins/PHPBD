<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="titulo">Inserir Registro #02</div>

<?php

if (count($_POST) > 0) {

    $dados = $_POST;
    $erros = [];
    
    if (trim($dados['nome']) === "") {
        $erros['nome'] = 'Nome é obrigatório!';
    }
    
    if (isset($dados['nascimento'])) {
        $data = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
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
    
    if(!filter_var($dados['horas'], FILTER_VALIDATE_INT, 
        $horasConfig) && $dados['horas'] != 0) {
        $erros['horas'] = 'Horas trabalhadas inválidas (0-220)!';
    }
    
    $salarioConfig = [
        "options" => ["decimal" => ',', "min_range" => 1302.00, "max_range" => 10000.00] //ERRO: PONTO DECIMAL NÃO REGISTRADO
    ];
    if(!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT,
    $salarioConfig)) {
        $erros['salario'] = 'Salário inválido (R$ 1302.00 - R$ 10000.00)';
    }
    
    if (!count($erros)) {

        require_once "conexao.php";
        
        $sql = "INSERT INTO cadastro (nome, nascimento, email, site, horas, salario) VALUES (?, ?, ?, ?, ?, ?)";
        
        $conexao = novaConexao();
        $stmt = $conexao->prepare($sql);
        
        $params = [
            $dados['nome'],
            $dados ? $data->format('Y-m-d') : null,
            $dados['email'],
            $dados['site'],
            $dados['horas'],
            $dados['salario'] ? str_replace(",", ".", $dados['salario']) : null
        ];
        
        $stmt->bind_param("ssssid", ...$params);
        
        if($stmt->execute()) {
            unset($dados);
        }
    }
}
?>

<?php foreach ($erros as $erro): ?>
        <?= "" ?>   
<?php endforeach; ?>

<form action="#" method="post">
    <div class="form-group row">
        <div class="form-group col-md-8">
            <label for="nome">Nome</label>
            <input type="text" 
                class="form-control <?= $erros['nome'] ? 'is-invalid' : '' ?>"
                id="nome" name="nome" placeholder="Nome"
                value="<?= $dados['nome'] ?>">
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="nascimento">Data de nascimento</label>
            <input type="text" 
                class="form-control <?= $erros['nascimento'] ? 'is-invalid' : '' ?>"
                id="nascimento" name="nascimento" placeholder="Data de nascimento"
                value="<?= $dados['nascimento'] ?>">
            <div class="invalid-feedback">
                <?= $erros['nascimento'] ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="text"
                class="form-control <?= $erros['email'] ? 'is-invalid' : '' ?>"
                id="email" name="email" placeholder="E-mail"
                value="<?= $dados['email'] ?>">
            <div class="invalid-feedback">
                <?= $erros['email'] ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="site">Site</label>
            <input type="text"
                class="form-control <?= $erros['site'] ? 'is-invalid' : '' ?>"
                id="site" name="site" placeholder="Site"
                value="<?= $dados['site'] ?>">
            <div class="invalid-feedback">
                <?= $erros['site'] ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="form-group col-md-6">
            <label for="horas">Horas trabalhadas</label>
            <input type="number"
                class="form-control <?= $erros['horas'] ? 'is-invalid' : '' ?>"
                id="horas" name="horas" placeholder="Horas trabalhadas"
                value="<?= $dados['horas'] ?>">
            <div class="invalid-feedback">
                <?= $erros['horas'] ?>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="salario">Salário</label>
            <input type="text" 
                class="form-control <?= $erros['salario'] ? 'is-invalid' : '' ?>"
                id="salario" name="salario" placeholder="Salário"
                value="<?= $dados['salario'] ?>">
            <div class="invalid-feedback">
                <?= $erros['salario'] ?>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-lg">Enviar</button>
</form>