<?php
require_once 'models/Categoria.php';

$categoria = new Categoria();
$nome = $_POST['nome'];
$categoria->inserir($nome);

header('Location: index.php');