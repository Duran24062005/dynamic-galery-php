# PRD: eliminacion de imagenes de la galeria estatica

## Problema y objetivo

La galeria permite consultar y editar los metadatos de una imagen, pero no
permite retirarla desde la interfaz. El objetivo es agregar una accion explicita
para eliminar una imagen de la galeria sin intentar modificar el filesystem
versionado durante la ejecucion.

## Alcance

- Agregar una accion de eliminacion en el listado y en el detalle.
- Requerir confirmacion del navegador antes de enviar la accion.
- Procesar la eliminacion exclusivamente mediante `POST`.
- Eliminar el registro correspondiente de `fotos` y volver al listado.
- Mantener el archivo fisico en `img/`, porque es un asset del repositorio y
  Vercel ejecuta esta aplicacion con filesystem de solo lectura.

## Actores

- Editor que administra las imagenes visibles en la galeria.

## Impacto en datos y almacenamiento

- Se elimina una fila de `fotos` por su `id`.
- No se modifica ni elimina el archivo versionado en `img/`.
- Una imagen retirada puede volver a publicarse solo restaurando su registro
  mediante el SQL o una futura herramienta de administracion.

## Validaciones y reglas

- El `id` debe ser entero positivo.
- La accion solo acepta solicitudes `POST`.
- Si la imagen no existe, el flujo vuelve al listado sin crear errores nuevos.
- La confirmacion del navegador es una ayuda de UX; la validacion del metodo y
  del identificador ocurre en el servidor.

## Riesgos y casos limite

- El archivo queda en el repositorio aunque ya no sea visible en la galeria.
- Si falla la conexion o el `DELETE`, se muestra un error sin confirmar una
  eliminacion exitosa.
- El borrado no requiere una tabla nueva ni cambia el contrato de lectura.
