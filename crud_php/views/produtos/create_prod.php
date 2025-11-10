<?php
include_once __DIR__ . '/../../controllers/ProdutoController.php';
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$categoriaController = new CategoriaController();
$categoriasData = $categoriaController->index();
$stmtCategorias = $categoriasData['stmt'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $categoria_id = $_POST['categoria_id'] ?? '';

    $controller = new ProdutoController();
    $controller->create($nome, $descricao, $preco, $categoria_id);
    exit;
}
?>

<h2>Adicionar Novo Produto</h2>

<form method="POST" action="">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Descrição</label>
    <textarea name="descricao" required></textarea>

    <label>Preço</label>
    <input type="number" step="0.01" name="preco" required>

    <label>Categoria</label>
    <select name="categoria_id" required>
        <option value="">Selecione uma categoria</option>
        <?php
        while ($row = $stmtCategorias->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<option value='{$id}'>{$nome}</option>";
        }
        ?>
    </select>

    <div class="buttons">
        <button type="submit" class="button add">Salvar</button>
        <a href="/crud_php/public/index.php?page=produtos" class="button">Cancelar</a>
    </div>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
