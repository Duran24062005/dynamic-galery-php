# Plan de cambio: 05-galeria_dinamica

## Problema y objetivo

La galeria solo sembraba unas pocas fotos en el script SQL y no tenia forma de actualizar los datos de una imagen ya cargada. El objetivo es dejar la base inicial alineada con todo el contenido real de `img/` y agregar una edicion basica de metadatos desde la aplicacion.

## Alcance

- Incluir en `galeria_dinamica.sql` todas las imagenes presentes en `img/`.
- Hacer que el script SQL sea reejecutable sin romper la carga inicial.
- Permitir actualizar `titulo` y `text` de una foto existente.
- Mantener sin cambios el flujo de subida y listado.

## Impacto tecnico

- Se agrega `updated_at` para registrar cambios de metadatos.
- Se centraliza en `funciones.php` la lectura y actualizacion de fotos.
- `foto.php` pasa de solo lectura a soportar `POST` para guardar cambios.

## Reglas y validaciones

- La edicion no cambia el archivo fisico de imagen, solo sus datos.
- `titulo` y `text` son obligatorios al actualizar.
- Si el `id` no existe, el flujo vuelve al listado.

## Riesgos y notas

- El SQL depende del contenido actual de `img/`; si la carpeta cambia, el script debe actualizarse tambien.
- El script usa ids explicitos con `ON DUPLICATE KEY UPDATE` para permitir reinstalacion sin duplicados.
