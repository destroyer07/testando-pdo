<?php
require_once 'models/Categoria.php';

$categoria = new Categoria();

$categoria->nome = $_POST['nome'];

if (isset($_POST['id'])) {
    $categoria->id = $_POST['id'];
    $categoria->atualizar();
} else {
    $categoria->salvar();
}

header('Location: index.php');
