<?php
include_once __DIR__ . '/../../controllers/ProdutoController.php';

$controller = new ProdutoController();
$data = $controller->index();
$stmt = $data['stmt'];
$num = $data['num'];
?>

<h2>Produtos</h2>

<div class="top-buttons">
    <a href="/crud_php/public/index.php?page=categorias" class="button">Ver Categorias</a>
    <a href="/crud_php/public/index.php?page=produtos&action=create" class="button add">Adicionar Novo Item</a>
</div>

<?php
if ($num > 0) {
    echo "<div class='menu-items'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<div class='menu-item'>";
        echo "<h3>{$nome}</h3>";
        echo "<p>{$descricao}</p>";
        echo "<p><strong>R$ " . number_format($preco, 2, ',', '.') . "</strong></p>";
        echo "<p>Categoria: {$categoria_nome}</p>";
        echo "<div class='actions'>";
        echo "<a href=\"/crud_php/public/index.php?page=produtos&action=edit&id={$id}\" class=\"button edit\">Editar</a>";
        echo "<a href=\"/crud_php/public/index.php?page=produtos&action=delete&id={$id}\" class=\"button delete\">Deletar</a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
?>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
