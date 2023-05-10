<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\estilo.css">
    <title>Sobre PHP</title>
</head>
<body>
    <header class="cabecalho">
        <h1>PHP (Wonderfull)</h1>
        <h2>Índice das Atividades</h2>
    </header>
    <main class="principal">
        <div class="conteudo">
            <nav class="assuntos">
                <div class="assunto verde">
                    <h3>Assunto 01: Banco de Dados</h3>
                    <ul>
                        <li><a href="atividade.php?dir=db&file=criar_banco">
                            Criar Banco
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=criar_tabela">
                            Criar Tabela
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=inserir_01">
                            Inserir Registro #01
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=inserir_02">
                            Inserir Registro #02 (pelo formulário)
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=consultar_01">
                            Consultar Registros #01
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=consultar_02">
                            Consultar Registros #02
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=excluir_01">
                            Excluir Registro #01
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=excluir_02">
                            Excluir Registro #02 (parcial)
                        </a></li>

                        <li><a href="atividade.php?dir=db&file=excluir_03">
                            Excluir Registro #03
                        </a></li>
                    </ul>
                </div>
                <div class="assunto laranja">
                    <h3>Assunto 02: Formulário</h3>
                    <ul>
                        <li><a href="atividade.php?dir=formulario&file=formulario">
                            Formulário
                        </a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </main>
    <footer class="rodape">
        AnalgesiCODE © <?= date('Y') ?>
    </footer>
</body>
</html>