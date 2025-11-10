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

class Categoria {
    private $conn;
    private $table_name = "categorias";

    public $id;
    public $nome;

    public function __construct($db){
        $this->conn = $db;
    }

    // Usado para ler categorias
    function read(){
        $query = "SELECT id, nome FROM " . $this->table_name . " ORDER BY nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Usado para criar categoria
    function create(){
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));

        $stmt->bindParam(":nome", $this->nome);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // Usado para ler uma única categoria
    function readOne(){
        $query = "SELECT id, nome FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
    }

    // Usado para atualizar a categoria
    function update(){
        $query = "UPDATE " . $this->table_name . " SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // Usado para deletar a categoria
    function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>
