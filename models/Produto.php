<?php

/************************************************
25061077-2 - Kauã Ricardo Gomes Fagundes 
25010975-2 - Bruno Petroli
25004001-3 - Rafael Diesel
25229846-2 - Wendel Souza Cardoso
25228676-2 - Marlon Willian Silva Barros
25357682-2 - Eduardo Rupp da Luz
25165088-2 - Vinicius Bastos Rodrigues
25178065-2 - Marcos Barcelar
22001126-2 - Eric Ruthers
***********************************************/

class Produto
{
    private $conn;
    private $table_name = "produtos";

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $categoria_id;

    public function __construct($db = null)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT p.*, c.nome AS categoria_nome
                  FROM produtos p
                  LEFT JOIN categorias c ON p.categoria_id = c.id
                  ORDER BY p.id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readOne()
    {
        $query = "SELECT p.*, c.nome AS categoria_nome 
                  FROM produtos p 
                  LEFT JOIN categorias c ON p.categoria_id = c.id
                  WHERE p.id = :id
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO produtos SET nome=:nome, descricao=:descricao, preco=:preco, categoria_id=:categoria_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":categoria_id", $this->categoria_id);

        return $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE produtos 
                  SET nome=:nome, descricao=:descricao, preco=:preco, categoria_id=:categoria_id
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":categoria_id", $this->categoria_id);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM produtos WHERE id=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
