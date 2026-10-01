<?php

declare(strict_types=1);

function conexion(): PDO|false
{
    try {
        $url = (string) (getenv('DATABASE_URL') ?: getenv('POSTGRES_URL') ?: '');

        if ($url !== '') {
            $parts = parse_url($url);

            if (!$parts || empty($parts['host'])) {
                throw new RuntimeException('DATABASE_URL no es valida.');
            }

            $query = [];
            parse_str($parts['query'] ?? '', $query);
            $dsn = 'pgsql:host=' . $parts['host']
                . ';port=' . ($parts['port'] ?? 5432)
                . ';dbname=' . ltrim($parts['path'] ?? '', '/')
                . ';sslmode=' . ($query['sslmode'] ?? 'require');

            return new PDO($dsn, urldecode($parts['user'] ?? ''), urldecode($parts['pass'] ?? ''), pdoOptions());
        }

        return new PDO(
            'pgsql:host=' . (getenv('PGHOST') ?: 'localhost')
                . ';port=' . (getenv('PGPORT') ?: '5432')
                . ';dbname=' . (getenv('PGDATABASE') ?: 'galeria_practica'),
            getenv('PGUSER') ?: '',
            getenv('PGPASSWORD') ?: '',
            pdoOptions()
        );
    } catch (Throwable $exception) {
        error_log('PostgreSQL: ' . $exception->getMessage());

        return false;
    }
}

function pdoOptions(): array
{
    return [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
}

function obtenerFoto(PDO $conexion, int $id): ?array
{
    $statement = $conexion->prepare('SELECT * FROM fotos WHERE id = :id LIMIT 1');
    $statement->execute([':id' => $id]);

    return $statement->fetch() ?: null;
}

function actualizarFoto(PDO $conexion, int $id, string $titulo, string $texto): bool
{
    return $conexion->prepare(
        'UPDATE fotos SET titulo = :titulo, text = :texto, updated_at = CURRENT_TIMESTAMP WHERE id = :id'
    )->execute([
        ':id' => $id,
        ':titulo' => $titulo,
        ':texto' => $texto,
    ]);
}

function imageUrl(string $filename): string
{
    // Blob stores the public URL in the database. Do not treat it as a local
    // filename or it becomes /img/https%3A/... in the rendered HTML.
    if (filter_var($filename, FILTER_VALIDATE_URL)) {
        return $filename;
    }

    return 'img/' . implode('/', array_map('rawurlencode', explode('/', $filename)));
}
