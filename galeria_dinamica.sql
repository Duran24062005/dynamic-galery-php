-- Proyecto: 05-galeria_dinamica
-- Base esperada por el codigo: galeria_practica

CREATE DATABASE IF NOT EXISTS `galeria_practica`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `galeria_practica`;

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) NOT NULL,
  `imagen` VARCHAR(255) NOT NULL,
  `text` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fotos` (`id`, `titulo`, `imagen`, `text`) VALUES
  (1, '10', '10.png', 'Imagen semilla generada desde la carpeta img: 10.png'),
  (2, '13', '13.png', 'Imagen semilla generada desde la carpeta img: 13.png'),
  (3, '13df83cf 6061 4323 98fc e31eb3928392', '13df83cf-6061-4323-98fc-e31eb3928392.jpeg', 'Imagen semilla generada desde la carpeta img: 13df83cf-6061-4323-98fc-e31eb3928392.jpeg'),
  (4, '14', '14.jpeg', 'Imagen semilla generada desde la carpeta img: 14.jpeg'),
  (5, '16', '16.jpeg', 'Imagen semilla generada desde la carpeta img: 16.jpeg'),
  (6, '17', '17.jpg', 'Imagen semilla generada desde la carpeta img: 17.jpg'),
  (7, '18', '18.jpeg', 'Imagen semilla generada desde la carpeta img: 18.jpeg'),
  (8, '1ef608ea eeaa 4c80 93ae aeb0acdd3267', '1ef608ea-eeaa-4c80-93ae-aeb0acdd3267.jpeg', 'Imagen semilla generada desde la carpeta img: 1ef608ea-eeaa-4c80-93ae-aeb0acdd3267.jpeg'),
  (9, '21', '21.jpeg', 'Imagen semilla generada desde la carpeta img: 21.jpeg'),
  (10, '22', '22.jpeg', 'Imagen semilla generada desde la carpeta img: 22.jpeg'),
  (11, '24', '24.jpeg', 'Imagen semilla generada desde la carpeta img: 24.jpeg'),
  (12, '25', '25.jpeg', 'Imagen semilla generada desde la carpeta img: 25.jpeg'),
  (13, '27', '27.jpeg', 'Imagen semilla generada desde la carpeta img: 27.jpeg'),
  (14, '34a55a6e aa57 4fdd bf03 8002c4e1ec3e', '34a55a6e-aa57-4fdd-bf03-8002c4e1ec3e.jpeg', 'Imagen semilla generada desde la carpeta img: 34a55a6e-aa57-4fdd-bf03-8002c4e1ec3e.jpeg'),
  (15, '4', '4.png', 'Imagen semilla generada desde la carpeta img: 4.png'),
  (16, '5', '5.jpeg', 'Imagen semilla generada desde la carpeta img: 5.jpeg'),
  (17, '50 Amazing Line Art Minimal Logo Design Ideas & Examples', '50 Amazing Line Art Minimal Logo Design Ideas & Examples.jpeg', 'Imagen semilla generada desde la carpeta img: 50 Amazing Line Art Minimal Logo Design Ideas & Examples.jpeg'),
  (18, '50 iconos gratis del Web hosting diseñados por srip (1)', '50 iconos gratis del Web hosting diseñados por srip (1).jpeg', 'Imagen semilla generada desde la carpeta img: 50 iconos gratis del Web hosting diseñados por srip (1).jpeg'),
  (19, '52582b67 8a3c 41f3 8e13 bf42333fa65a', '52582b67-8a3c-41f3-8e13-bf42333fa65a.jpeg', 'Imagen semilla generada desde la carpeta img: 52582b67-8a3c-41f3-8e13-bf42333fa65a.jpeg'),
  (20, '555f06c8 e372 4e55 af3b 69ad90d86ec2', '555f06c8-e372-4e55-af3b-69ad90d86ec2.jpeg', 'Imagen semilla generada desde la carpeta img: 555f06c8-e372-4e55-af3b-69ad90d86ec2.jpeg'),
  (21, '6c4997f8 984d 458f 85ad 2871ba9cd657', '6c4997f8-984d-458f-85ad-2871ba9cd657.jpeg', 'Imagen semilla generada desde la carpeta img: 6c4997f8-984d-458f-85ad-2871ba9cd657.jpeg'),
  (22, '7', '7.png', 'Imagen semilla generada desde la carpeta img: 7.png'),
  (23, '7526bae0 a840 4017 b5de ac311ef76d9d', '7526bae0-a840-4017-b5de-ac311ef76d9d.jpeg', 'Imagen semilla generada desde la carpeta img: 7526bae0-a840-4017-b5de-ac311ef76d9d.jpeg'),
  (24, '8', '8.jpeg', 'Imagen semilla generada desde la carpeta img: 8.jpeg'),
  (25, '8aa5bea5 c122 4153 a5fc 0b2c4bc54769', '8aa5bea5-c122-4153-a5fc-0b2c4bc54769.jpg', 'Imagen semilla generada desde la carpeta img: 8aa5bea5-c122-4153-a5fc-0b2c4bc54769.jpg'),
  (26, 'Bowser Jr', 'Bowser Jr_.jpeg', 'Imagen semilla generada desde la carpeta img: Bowser Jr_.jpeg'),
  (27, 'Breaking Benjamin Logo', 'Breaking Benjamin Logo.jpeg', 'Imagen semilla generada desde la carpeta img: Breaking Benjamin Logo.jpeg'),
  (28, 'Cámara Instantánea Fuji Instax SQ1 Terracota OrangeEnvío Gratis', 'Cámara Instantánea Fuji Instax SQ1 Terracota OrangeEnvío Gratis.jpeg', 'Imagen semilla generada desde la carpeta img: Cámara Instantánea Fuji Instax SQ1 Terracota OrangeEnvío Gratis.jpeg'),
  (29, 'Drink LMNT Paleo Keto Friendly Hydration Zero Sugar Electrolytes – Drink LMNT', 'Drink LMNT_ _ _ Paleo-Keto Friendly Hydration _ Zero Sugar Electrolytes – Drink LMNT_.jpeg', 'Imagen semilla generada desde la carpeta img: Drink LMNT_ _ _ Paleo-Keto Friendly Hydration _ Zero Sugar Electrolytes – Drink LMNT_.jpeg'),
  (30, 'Free Vector Hand drawn vectorized half of tangerine orange sticker design resource', 'Free Vector _ Hand drawn vectorized half of tangerine orange sticker design resource.jpeg', 'Imagen semilla generada desde la carpeta img: Free Vector _ Hand drawn vectorized half of tangerine orange sticker design resource.jpeg'),
  (31, 'Japan', 'Japan.jpeg', 'Imagen semilla generada desde la carpeta img: Japan.jpeg'),
  (32, 'Japón paisaje en estilo grunge Vector Premium', 'Japón paisaje en estilo grunge _ Vector Premium.jpeg', 'Imagen semilla generada desde la carpeta img: Japón paisaje en estilo grunge _ Vector Premium.jpeg'),
  (33, 'Sistema De Rebanadas Cuadradas De Las Frutas De Los Iconos Stock de ilustración Ilustración de travieso, primer 46721821', 'Sistema De Rebanadas Cuadradas De Las Frutas De Los Iconos Stock de ilustración - Ilustración de travieso, primer_ 46721821.jpeg', 'Imagen semilla generada desde la carpeta img: Sistema De Rebanadas Cuadradas De Las Frutas De Los Iconos Stock de ilustración - Ilustración de travieso, primer_ 46721821.jpeg'),
  (34, 'Tons of Nintendo Badge Arcade screenshots and art', 'Tons of Nintendo Badge Arcade screenshots and art.jpeg', 'Imagen semilla generada desde la carpeta img: Tons of Nintendo Badge Arcade screenshots and art.jpeg'),
  (35, 'Website Design 3', 'Website Design 3.jpg', 'Imagen semilla generada desde la carpeta img: Website Design 3.jpg'),
  (36, 'JavaScript Hex sticker Sticker for Sale by Stick Erify', '_JavaScript Hex sticker_ Sticker for Sale by Stick Erify.jpeg', 'Imagen semilla generada desde la carpeta img: _JavaScript Hex sticker_ Sticker for Sale by Stick Erify.jpeg'),
  (37, 'a9f064b6 7474 47c8 93ab 27dbe20c2fa9', 'a9f064b6-7474-47c8-93ab-27dbe20c2fa9.jpeg', 'Imagen semilla generada desde la carpeta img: a9f064b6-7474-47c8-93ab-27dbe20c2fa9.jpeg'),
  (38, 'ab649c1f 2efb 499b aeb6 8fb6342e1ef1', 'ab649c1f-2efb-499b-aeb6-8fb6342e1ef1.jpeg', 'Imagen semilla generada desde la carpeta img: ab649c1f-2efb-499b-aeb6-8fb6342e1ef1.jpeg'),
  (39, 'bc2da066 a36b 473e 8645 d1a6576ad490', 'bc2da066-a36b-473e-8645-d1a6576ad490.jpeg', 'Imagen semilla generada desde la carpeta img: bc2da066-a36b-473e-8645-d1a6576ad490.jpeg'),
  (40, 'cd90801e 1e9e 48ac b0c4 f975f438b66b', 'cd90801e-1e9e-48ac-b0c4-f975f438b66b.jpeg', 'Imagen semilla generada desde la carpeta img: cd90801e-1e9e-48ac-b0c4-f975f438b66b.jpeg'),
  (41, 'ddecf760 9ba3 4d4d 913b 494accaaf5a9', 'ddecf760-9ba3-4d4d-913b-494accaaf5a9.jpeg', 'Imagen semilla generada desde la carpeta img: ddecf760-9ba3-4d4d-913b-494accaaf5a9.jpeg'),
  (42, 'descarga (1)', 'descarga (1).jpeg', 'Imagen semilla generada desde la carpeta img: descarga (1).jpeg')
ON DUPLICATE KEY UPDATE
  `titulo` = VALUES(`titulo`),
  `imagen` = VALUES(`imagen`),
  `text` = VALUES(`text`);

ALTER TABLE `fotos` AUTO_INCREMENT = 43;
