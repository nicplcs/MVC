<?php
require_once __DIR__ . "/configcategorias.php";

// ------------------- GET -------------------
function obtenerCategorias() {
    global $URL_GET_CATEGORIAS;

    $consumoCategorias = file_get_contents($URL_GET_CATEGORIAS);

    if ($consumoCategorias === FALSE) {
        die("Error al consumir el servicio de categorías.");
    }

    return json_decode($consumoCategorias, true);
}

// ------------------- POST -------------------
function agregarCategoria($nombre, $descripcion) {
    global $URL_POST_CATEGORIA;

    $data = array(
        'nombreCategoria' => $nombre,
        'descripcion' => $descripcion
    );
    $data_categorias = json_encode($data);    

    $proceso = curl_init($URL_POST_CATEGORIA);

    curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_categorias);    
    curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($proceso, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_categorias)
    ));
    
    $respuestapet = curl_exec($proceso);
    $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

    curl_close($proceso);

    return $http_code === 200;
}

// ------------------- PUT -------------------
function actualizarCategoria($id, $nuevoNombre, $nuevaDescripcion) {
    global $URL_PUT_CATEGORIA;

    $data = array(
        'nombreCategoria' => $nuevoNombre,
        'descripcion' => $nuevaDescripcion
    );
    $data_categorias = json_encode($data);

    $endpoint = $URL_PUT_CATEGORIA . $id;
    $proceso = curl_init($endpoint);

    curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($proceso, CURLOPT_POSTFIELDS, $data_categorias);
    curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($proceso, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_categorias)
    ));

    $respuesta = curl_exec($proceso);
    $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

    curl_close($proceso);

    return $http_code === 200;
}

// ------------------- DELETE -------------------
function eliminarCategoria($id) {
    global $URL_DELETE_CATEGORIA;

    $endpoint = $URL_DELETE_CATEGORIA . $id;
    $proceso = curl_init($endpoint);

    curl_setopt($proceso, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($proceso, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($proceso);
    $http_code = curl_getinfo($proceso, CURLINFO_HTTP_CODE);

    curl_close($proceso);

    return $http_code === 200;
}
?>
