<?php
declare(strict_types=1); require __DIR__.'/funciones.php';
$conexion=conexion();
$errores=$conexion?'Las imágenes de esta versión son estáticas y no se pueden subir en Vercel. Agrega la imagen a img/ y sus metadatos al SQL.':'No se pudo conectar con PostgreSQL. Verifica DATABASE_URL o PG*.';
if(!$conexion)http_response_code(503);
require __DIR__.'/views/subir.view.php';
