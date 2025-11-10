<?php
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/Produto.php';

class ProdutoController
{
    public function index()
    {
        $database = new Database();
        $db = $database->getConnection();

        $produto = new Produto($db);
        $stmt = $produto->read();
        $num = $stmt->rowCount();

        return ['stmt' => $stmt, 'num' => $num];
    }

    public function readOne($id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $produto = new Produto($db);
        $produto->id = $id;

        $stmt = $produto->readOne();

        if ($stmt) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null;
    }

    public function create()
    {
        $database = new Database();
        $db = $database->getConnection();

        $produto = new Produto($db);
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->preco = $_POST['preco'];
        $produto->categoria_id = $_POST['categoria_id'];

        if ($produto->create()) {
            header("Location: /crud_php/public/index.php?page=produtos");
        }
    }

    public function update($id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $produto = new Produto($db);
        $produto->id = $id;
        $produto->nome = $_POST['nome'];
        $produto->descricao = $_POST['descricao'];
        $produto->preco = $_POST['preco'];
        $produto->categoria_id = $_POST['categoria_id'];

        if ($produto->update()) {
            header("Location: /crud_php/public/index.php?page=produtos");
        }
    }

    public function delete($id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $produto = new Produto($db);
        $produto->id = $id;

        if ($produto->delete()) {
            header("Location: /crud_php/public/index.php?page=produtos");
        }
    }
}
