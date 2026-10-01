<?php

declare(strict_types=1);

require __DIR__ . '/funciones.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$id = (int) ($_POST['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit();
}

$conexion = conexion();
if (!$conexion) {
    http_response_code(503);
    $error = 'No se pudo conectar con PostgreSQL para eliminar la imagen.';
    require __DIR__ . '/error.php';
    exit();
}

try {
    eliminarFoto($conexion, $id);
    header('Location: index.php?deleted=1');
    exit();
} catch (Throwable $exception) {
    error_log($exception->getMessage());
    http_response_code(500);
    $error = 'PostgreSQL no pudo eliminar la imagen.';
    require __DIR__ . '/error.php';
    exit();
}
