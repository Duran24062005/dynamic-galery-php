# Desarrollo con Docker

1. Copia `.env.example` a `.env`.
2. Inicia los servicios: `docker compose up --build`.
3. Abre `http://localhost:8082`.

PostgreSQL queda disponible en `localhost:5434`. Las imágenes existentes se sirven desde `img/`; las nuevas cargas permanecen deshabilitadas en este proyecto porque Docker/Vercel no debe tratar el filesystem de la aplicación como almacenamiento permanente.

Para reinicializar la base después de modificar el SQL, ejecuta `docker compose down -v` y vuelve a levantar los servicios.
