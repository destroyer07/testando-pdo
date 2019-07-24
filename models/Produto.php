<?php


class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;

    public static function listar()
    {
        $query = 'select p.id, p.nome, p.preco, p.quantidade, p.categoria_id, c.nome as "categoria" from produtos p inner join categorias c on p.categoria_id = c.id';
        $connection = new PDO('mysql:host=mysql;dbname=pdo', 'admin', 'admin');
        $resultado = $connection->query($query);
        return $resultado->fetchAll();
    }

    public function salvar() {
//        $query = 'insert into produtos (nome, preco, quantidade, categoria_id) values ('..')'
    }
}