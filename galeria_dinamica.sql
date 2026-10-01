-- PostgreSQL. Ejecutar dentro de la base definida por DATABASE_URL.
CREATE TABLE IF NOT EXISTS fotos (id BIGSERIAL PRIMARY KEY, titulo VARCHAR(150) NOT NULL, imagen VARCHAR(255) NOT NULL, text TEXT NOT NULL, created_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP);
-- Las imagenes iniciales se mantienen versionadas en img/ y sus registros pueden cargarse desde este esquema.
INSERT INTO fotos (titulo, imagen, text) VALUES
('10', '10.png', 'Imagen estatica inicial: 10.png'),
('13', '13.png', 'Imagen estatica inicial: 13.png')
ON CONFLICT DO NOTHING;
