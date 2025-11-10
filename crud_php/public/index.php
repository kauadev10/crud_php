<?php
$page = isset($_GET["page"]) ? $_GET["page"] : "home";
$action = isset($_GET["action"]) ? $_GET["action"] : "index";
$id = isset($_GET["id"]) ? $_GET["id"] : null;

include_once __DIR__ . '/../views/includes/header.php';

switch ($page) {

    case "home":
        echo "<section class='home'>";
        echo "<div class='container'>";
        echo "<h2>Bem-vindo ao painel de administração</h2>";
        echo "<div class='buttons'>";
        echo "<a href='?page=produtos' class='button'>Ver Produtos</a>";
        echo "<a href='?page=categorias' class='button'>Ver Categorias</a>";
        echo "</div>";
        echo "</div>";
        echo "</section>";
        break;

    case "produtos":
        switch ($action) {
            case "create":
                include __DIR__ . '/../views/produtos/create_prod.php';
                break;

            case "edit":
                include __DIR__ . '/../views/produtos/edit_prod.php';
                break;

            case "update":
                include __DIR__ . '/../controllers/ProdutoController.php';
                $controller = new ProdutoController();
                $controller->update($id);
                break;

            case "delete":
                include __DIR__ . '/../controllers/ProdutoController.php';
                $controller = new ProdutoController();
                $controller->delete($id);
                break;

            default:
                include __DIR__ . '/../views/produtos/index_prod.php';
                break;
        }
        break;

    case "categorias":
        switch ($action) {
            case "create":
                include __DIR__ . '/../views/categorias/create_cat.php';
                break;

            case "edit":
                include __DIR__ . '/../views/categorias/edit_cat.php';
                break;

            case "delete":
                include __DIR__ . '/../controllers/CategoriaController.php';
                $controller = new CategoriaController();
                $controller->delete($id);
                break;

            default:
                include __DIR__ . '/../views/categorias/index_cat.php';
                break;
        }
        break;

    case "carrinho":
        echo "<h2>Carrinho de Compras</h2>";
        echo "<p>Aqui apareceriam os produtos adicionados ao carrinho.</p>";
        echo "<div class='button-container'>";
        echo "<a href='?page=produtos' class='button'>Continuar comprando</a>";
        echo "</div>";
        break;

    default:
        echo "<section class='home'>";
        echo "<div class='container'>";
        echo "<h2>Página não encontrada</h2>";
        echo "<a href='?page=home' class='button'>Voltar ao Início</a>";
        echo "</div>";
        echo "</section>";
        break;
}

include_once __DIR__ . '/../views/includes/footer.php';
?>
