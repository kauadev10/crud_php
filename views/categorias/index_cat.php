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
$data = $controller->index();
$stmt = $data['stmt'];
$num = $data['num'];
?>

<h2>Categorias</h2>

<div class="buttons">
    <a href="?page=produtos" class="button">Ver Produtos</a>
    <a href="?page=categorias&action=create" class="button">Adicionar Nova Categoria</a>
</div>

<?php
if ($num > 0) {
    echo "<div class='categories'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "<div class='category-card'>";
        echo "<h3>{$nome}</h3>";
        echo "<a href=\"?page=categorias&action=edit&id={$id}\" class=\"button edit\">Editar</a>";
        echo "<a href=\"?page=categorias&action=delete&id={$id}\" class=\"button delete\">Deletar</a>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>Nenhuma categoria encontrada.</p>";
}
?>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
