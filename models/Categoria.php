<?php

require_once 'Conexao.php';

class Categoria
{
    public $id;
    public $nome;

    public function __construct($id = null)
    {
        if ($id) {
            $this->id = $id;
            $this->buscar();
        }
    }

    public function listar()
    {
        $query = "select id, nome from categorias";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function salvar()
    {
        $query = "insert into categorias (nome) values ('".$this->nome."')";
        $conexao = Conexao::getConexao();
        $conexao->exec($query);
    }

    public function buscar() {
        $query = "select id, nome from categorias where id = '". $this->id ."'";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $categoria = $resultado->fetch();
        $this->id = $categoria['id'];
        $this->nome = $categoria['nome'];
    }

    public function atualizar()
    {
        $query = "update categorias set nome = '". $this->nome ."' where id = ". $this->id;
        $conexao = Conexao::getConexao();
        $conexao->exec($query);
    }

    public function remover()
    {
        $query = "delete from categorias where id = '". $this->id ."'";
        $conexao = Conexao::getConexao();
        return $conexao->exec($query);
    }
}