<?php

require_once '../../app/App.php';

$dados = validate([
    'nome'    => 'str',
    'email'   => 'ema',
    'usuario' => 'str',
    'senha'   => 'str',
    'nivel'   => 'int'
]);

$nome    = $dados->nome;
$email   = $dados->email;
$usuario = $dados->usuario;
$senha   = md5($dados->senha);
$nivel   = $dados->nivel;

$conexao = conectar();

$sql = "INSERT into usuarios (nome, email, usuario, senha, nivel) VALUES (:nome, :email, :usuario, :senha, :nivel)";

$res = $conexao->prepare($sql);

$res->bindParam(':nome', $nome, PDO::PARAM_STR);
$res->bindParam(':email', $email, PDO::PARAM_STR);
$res->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$res->bindParam(':senha', $senha, PDO::PARAM_STR);
$res->bindParam(':nivel', $nivel, PDO::PARAM_STR);

$res->execute();

if ($res->rowCount() > 0):
    echo true;
else:
    echo false;
endif;

