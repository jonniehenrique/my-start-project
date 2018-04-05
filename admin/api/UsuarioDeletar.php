<?php

require_once '../../app/App.php';

if (isset($_POST['id'])):

    $dados = validate([
        'id' => 'int'
    ]);

    $id = $dados->id;

    $conexao = conectar();

    $sql = "DELETE FROM login WHERE id = '$id' ";

    $res = $conexao->prepare($sql);

    $res->bindParam(':id', $id, PDO::PARAM_STR);

    $res->execute();

    if ($res->rowCount() > 0):
        echo true;
    else:
        echo false;
    endif;

endif;