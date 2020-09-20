CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
  `descripcion` varchar(300) DEFAULT NULL
  `tipoCombustible` varchar(100) DEFAULT NULL
  `cantidadPuertas` int(11) DEFAULT NULL
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `auto` (`idMarca`),
 
COMMIT;
