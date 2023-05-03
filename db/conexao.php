<?php

function novaConexao($banco = 'db_php'){
    $servidor = '127.0.0.1:3307';
    $usuario = 'root';
    $senha = 'root';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco); //faltava ponto e virgula

    if ($conexao->connect_error) {
        die("Erro: " . $conexao->connect_error); //tinha espaços entre a seta (sintaxe)
    }

    return $conexao;
}