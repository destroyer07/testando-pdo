<?php
require_once 'global.php';

session_start();

$categoria = new Categoria();

$categoria->id = $_GET['id'];
$removido = $categoria->remover();

if ($removido > 0) {
    $_SESSION["mensagem"] = 'Categoria removida com sucesso';
} else {
    $_SESSION["mensagem"] = 'Erro ao remover categoria';
}

header('Location: index.php');
