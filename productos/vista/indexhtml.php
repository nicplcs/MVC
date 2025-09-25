<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Categorías</title>
</head>
<body>
    <h1>CRUD Categorías</h1>

    <!-- Ver todas las categorías -->
    <h2>Ver todas las categorías</h2>
    <form action="index.php" method="GET">
        <input type="hidden" name="accion" value="listar">
        <button type="submit">Ver todas</button>
    </form>

    <!-- Agregar categoría -->
    <h2>Agregar categoría</h2>
    <form action="index.php?accion=agregar" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombreCategoria" required><br><br>
        <label>Descripción:</label>
        <input type="text" name="descripcion" required><br><br>
        <button type="submit">Agregar</button>
    </form>

    <!-- Actualizar categoría -->
    <h2>Actualizar categoría</h2>
    <form action="index.php?accion=editar" method="POST">
        <label>ID:</label>
        <input type="number" name="idCategoria" required><br><br>
        <label>Nombre:</label>
        <input type="text" name="nombreCategoria" required><br><br>
        <label>Descripción:</label>
        <input type="text" name="descripcion" required><br><br>
        <button type="submit">Actualizar</button>
    </form>

    <!-- Eliminar categoría -->
    <h2>Eliminar categoría</h2>
    <form action="index.php" method="GET">
        <input type="hidden" name="accion" value="eliminar">
        <label>ID:</label>
        <input type="number" name="id" required>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
