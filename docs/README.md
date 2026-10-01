# dynamic-galery-php

Galería PHP preparada para PostgreSQL y Vercel. Las imágenes existentes son assets estáticos versionados en `img/`; Vercel no permite subir imágenes nuevas al filesystem efímero, por lo que `subir.php` informa explícitamente esa limitación.

Configura `DATABASE_URL` (o las variables `PG*`) a partir de `.env.example`. Ejecuta `galeria_dinamica.sql` en PostgreSQL. El deploy es independiente desde esta carpeta y usa `vercel.json`.

La columna `fotos.imagen` acepta tanto nombres de archivos locales (por ejemplo,
`10.png`, resueltos desde `img/`) como URLs absolutas públicas de Vercel Blob.
Las URLs absolutas se renderizan directamente; no deben volver a prefijarse con
`img/`.
