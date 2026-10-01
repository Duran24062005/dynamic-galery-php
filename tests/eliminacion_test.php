<?php

declare(strict_types=1);

require __DIR__ . '/../funciones.php';

$assertions = 0;

function expect(bool $condition, string $message): void
{
    global $assertions;

    if (!$condition) {
        throw new RuntimeException('Fallo: ' . $message);
    }

    $assertions++;
}

final class DynamicGalleryTestPDO extends PDO
{
    public string $query = '';
    public int $affectedRows = 1;

    public function __construct()
    {
    }

    public function prepare($query, $options = []): PDOStatement|false
    {
        $this->query = (string) $query;
        $statement = new DynamicGalleryTestStatement();
        $statement->affectedRows = $this->affectedRows;

        return $statement;
    }
}

final class DynamicGalleryTestStatement extends PDOStatement
{
    public int $affectedRows = 1;
    public array $params = [];

    public function execute(?array $params = null): bool
    {
        $this->params = $params ?? [];

        return true;
    }

    public function rowCount(): int
    {
        return $this->affectedRows;
    }
}

$database = new DynamicGalleryTestPDO();
expect(eliminarFoto($database, 42), 'eliminarFoto devuelve true cuando elimina un registro');
expect($database->query === 'DELETE FROM fotos WHERE id = :id', 'eliminarFoto usa DELETE parametrizado');

$database->affectedRows = 0;
expect(!eliminarFoto($database, 42), 'eliminarFoto devuelve false cuando no existe el registro');

$indexView = file_get_contents(__DIR__ . '/../views/index.view.php');
$detailView = file_get_contents(__DIR__ . '/../views/foto.view.php');
expect(is_string($indexView) && str_contains($indexView, 'action="eliminar.php"'), 'el listado expone la accion de eliminar');
expect(is_string($detailView) && str_contains($detailView, 'method="post"'), 'el detalle usa POST para eliminar');

echo "OK: {$assertions} assertions\n";
