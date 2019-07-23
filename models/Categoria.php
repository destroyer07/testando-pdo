<?php

class Categoria
{
    public function listar()
    {
        $query = "select id, nome from categorias";
        $conexao = new PDO('mysql:host=host.docker.internal;dbname=pdo', 'admin', 'admin');
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir($nome)
    {
        $query = "insert into categorias (nome) values ('".$nome."')";
        $conexao = new PDO('mysql:host=host.docker.internal;dbname=pdo', 'admin', 'admin');
        $conexao->exec($query);
    }
}