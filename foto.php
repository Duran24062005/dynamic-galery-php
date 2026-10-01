<?php

declare(strict_types=1);

require __DIR__ . '/funciones.php';

$conexion = conexion();
if (!$conexion) {
    header('Location: error.php');
    die();
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!$id) {
    header('Location: index.php');
    die();
}

$errores = '';
$actualizado = isset($_GET['updated']) && $_GET['updated'] === '1';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim((string) ($_POST['title'] ?? ''));
    $texto = trim((string) ($_POST['texto'] ?? ''));

    if ($titulo === '' || $texto === '') {
        $errores = 'Debes completar el titulo y la descripcion para actualizar la imagen.';
    } else {
        actualizarFoto($conexion, $id, $titulo, $texto);
        header('Location: foto.php?id=' . $id . '&updated=1');
        exit();
    }
}

$foto = obtenerFoto($conexion, $id);

if (!$foto) {
    header('Location: index.php');
    die();
}


require __DIR__ . '/views/foto.view.php';

?>
