<?php

declare(strict_types=1);

require __DIR__ . '/funciones.php';

$fotos_por_paginas = 9;

$pagina_actual = (isset($_GET['p']) ? (int)$_GET['p'] : 1 );
$inicio = ($pagina_actual > 1) ? ($pagina_actual * $fotos_por_paginas) - $fotos_por_paginas : 0 ;

$conexion = conexion();
if (!$conexion) {
    header('Location: error.php');
    die();
}

$statements = $conexion->prepare(
    "SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_paginas"
);
$statements->execute();
$fotos = $statements->fetchAll();

if (!$fotos) {
    # code...
    header('Location: error.php');
}
// echo '<pre>';
// print_r($fotos);
// echo '</pre>';

$statements = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");
$statements->execute();
$total_filas = $statements->fetch()['total_filas'];

$total_paginas = ceil($total_filas / $fotos_por_paginas);

require __DIR__ . '/views/index.view.php';

?>
