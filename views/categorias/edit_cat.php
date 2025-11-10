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

include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$categoria = $controller->readOne($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    if ($controller->update($id, $nome)) {
        header('Location: /crud_php/public/index.php?page=categorias');
        exit();
    }
}
?>

<h2>Editar Categoria</h2>

<form action="/crud_php/public/index.php?page=categorias&action=edit&id=<?php echo $id; ?>" method="POST">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($categoria->nome, ENT_QUOTES); ?>" required>
    <button type="submit" class="button">Salvar</button>
    <a href="/crud_php/public/index.php?page=categorias" class="button">Cancelar</a>
</form>
