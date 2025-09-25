<?php
require_once __DIR__ . "/../modelo/categoriaservice.php";

class CategoriaController {

    public function manejarPeticion() {
        $accion = $_GET['accion'] ?? 'menu'; // por defecto carga el menú

        switch ($accion) {
            case 'listar':
                $categorias = obtenerCategorias();
                // Mostrar categorías directamente en la misma vista principal
                echo "<h2>Listado de categorías</h2>";
                if (!empty($categorias)) {
                    echo "<ul>";
                    foreach ($categorias as $c) {
                        echo "<li><b>ID:</b> {$c['idCategoria']} | 
                              <b>Nombre:</b> {$c['nombreCategoria']} | 
                              <b>Descripción:</b> {$c['descripcion']}</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No hay categorías disponibles.</p>";
                }
                echo '<br><a href="index.php">Volver al menú</a>';
                break;

            case 'agregar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nombre = $_POST['nombreCategoria'];
                    $descripcion = $_POST['descripcion'];
                    agregarCategoria($nombre, $descripcion);
                    header("Location: index.php?accion=listar");
                    exit;
                }
                break;

            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['idCategoria'];
                    $nombre = $_POST['nombreCategoria'];
                    $descripcion = $_POST['descripcion'];
                    actualizarCategoria($id, $nombre, $descripcion);
                    header("Location: index.php?accion=listar");
                    exit;
                }
                break;

            case 'eliminar':
                if (isset($_GET['id'])) {
                    eliminarCategoria($_GET['id']);
                    header("Location: index.php?accion=listar");
                    exit;
                }
                break;

            case 'menu':
                include __DIR__ . "/../vista/indexhtml.php";
                break;

            default:
                echo "Acción no válida.";
        }
    }
}
