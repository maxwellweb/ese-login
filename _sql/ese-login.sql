

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `apellido` varchar(255) NOT NULL DEFAULT '',
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_usuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `login`, `password`)
VALUES
	(1,'Administrador','ADM','admin','54f07d70560d89bb5e9a32394a96063fc7af6d24'),
	

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
