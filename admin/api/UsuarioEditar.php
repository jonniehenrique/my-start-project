<?php

require_once '../../app/App.php';

if (isset($_POST['id'])):

 $dados = validate([
    'id'      => 'int',
    'nome'    => 'str',
    'email'   => 'ema',
    'usuario' => 'str',
    'senha'   => 'str',
    'nivel'   => 'int'
]);

 $id      = $dados->id;
 $nome    = $dados->nome;
 $email   = $dados->email;
 $usuario = $dados->usuario;
 $senha   = md5($dados->senha);
 $nivel   = $dados->nivel;

 $conexao = conectar();

 $sql = "UPDATE login SET nome = '$nome', email = '$email', usuario = '$usuario', nivel = '$nivel' WHERE id = '$id' ";

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

endif;