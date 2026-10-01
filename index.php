<?php
declare(strict_types=1); require __DIR__.'/funciones.php';
$perPage=9; $pagina_actual=max(1,(int)($_GET['p']??1)); $conexion=conexion();
if(!$conexion){http_response_code(503);$error='No se pudo conectar con PostgreSQL. Verifica DATABASE_URL o PG*.';require __DIR__.'/error.php';exit;}
try{$total=(int)$conexion->query('SELECT COUNT(*) FROM fotos')->fetchColumn();$s=$conexion->prepare('SELECT * FROM fotos ORDER BY id LIMIT :lim OFFSET :off');$s->bindValue(':lim',$perPage,PDO::PARAM_INT);$s->bindValue(':off',($pagina_actual-1)*$perPage,PDO::PARAM_INT);$s->execute();$fotos=$s->fetchAll();$total_paginas=max(1,(int)ceil($total/$perPage));}catch(Throwable $e){error_log($e->getMessage());http_response_code(500);$error='PostgreSQL no pudo ejecutar la consulta de la galeria.';require __DIR__.'/error.php';exit;}
require __DIR__.'/views/index.view.php';
