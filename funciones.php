<?php

declare(strict_types=1);

const GALERIA_DB_NAME = 'galeria_practica';
const GALERIA_DB_USER = 'alexidg';
const GALERIA_DB_PASS = '12345';

function conexion(string $tabla = GALERIA_DB_NAME, string $user = GALERIA_DB_USER, string $pass = GALERIA_DB_PASS) {

    try {
        //code...
        $conexion = new PDO("mysql:host=localhost;dbname=$tabla", $user, $pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
        
    } catch (PDOException $th) {
        return false;
    }
};

function obtenerFoto(PDO $conexion, int $id)
{
    $statements = $conexion->prepare('SELECT * FROM fotos WHERE id = :id LIMIT 1');
    $statements->execute([':id' => $id]);

    return $statements->fetch(PDO::FETCH_ASSOC);
}

function actualizarFoto(PDO $conexion, int $id, string $titulo, string $texto): bool
{
    $statements = $conexion->prepare('UPDATE fotos SET titulo = :titulo, text = :texto WHERE id = :id');

    return $statements->execute([
        ':id' => $id,
        ':titulo' => $titulo,
        ':texto' => $texto,
    ]);
}

?>
