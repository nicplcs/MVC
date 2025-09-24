<?php
require_once "../modelo/categoriaservice.php";

class CategoriaController {

    public function manejarPeticion() {
        $accion = $_GET['accion'] ?? 'listar';

        switch ($accion) {
            case 'listar':
                $categorias = obtenerCategorias();
                include "../vista/index.php";
                break;

            case 'agregar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nombre = $_POST['nombreCategoria'];
                    $descripcion = $_POST['descripcion'];
                    agregarCategoria($nombre, $descripcion);
                    header("Location: ?accion=listar");
                    exit;
                } else {
                    include "../vista/formAgregarCategoria.php";
                }
                break;

            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['idCategoria'];
                    $nombre = $_POST['nombreCategoria'];
                    $descripcion = $_POST['descripcion'];
                    actualizarCategoria($id, $nombre, $descripcion);
                    header("Location: ?accion=listar");
                    exit;
                } else {
                    include "../vista/formEditarCategoria.php";
                }
                break;

            case 'eliminar':
                if (isset($_GET['id'])) {
                    eliminarCategoria($_GET['id']);
                    header("Location: ?accion=listar");
                    exit;
                }
                break;

            default:
                echo "Acción no válida.";
        }
    }
}
