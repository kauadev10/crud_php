<?php
include_once __DIR__ . '/../../controllers/ProdutoController.php';
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new ProdutoController();
$categoriaController = new CategoriaController();

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$produto = $controller->readOne($id);
$categorias = $categoriaController->index()['stmt'];
?>

<h2>Editar Produto</h2>

<form action="/crud_php/public/index.php?page=produtos&action=update&id=<?php echo $id; ?>" method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

    <label>Descrição:</label>
    <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea>

    <label>Preço:</label>
    <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required>

    <label>Categoria:</label>
    <select name="categoria_id" required>
        <?php 
        while ($cat = $categorias->fetch(PDO::FETCH_ASSOC)) {
            $selected = $cat['id'] == $produto['categoria_id'] ? "selected" : "";
            echo "<option value='{$cat['id']}' {$selected}>{$cat['nome']}</option>";
        }
        ?>
    </select>

    <button type="submit" class="button">Salvar</button>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
