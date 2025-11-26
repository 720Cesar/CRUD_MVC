

DROP TABLE IF EXISTS `lista`;


CREATE TABLE `lista` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pass` varchar(256) NOT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO lista VALUES("1","Yamileth","45","2025-10-15","sis");
INSERT INTO lista VALUES("7","Samanta","22","2025-10-06","");
INSERT INTO lista VALUES("8","Jorge","23","2025-10-06","");
INSERT INTO lista VALUES("13","Eva","24","2025-10-31","$2y$10$KvFRcUi/eVFwUyoM3zDZ2uVdLJNuvIYHA5GP56zqYN0bp2eesMe9u");
INSERT INTO lista VALUES("14","Jorge","24","2025-10-16","$2y$10$eGeAb393nLHulKQXHXOXPe.aBY/ltdd9W8pDmGpNMUUCm/CHuAt5a");
INSERT INTO lista VALUES("17","Abigail","23","2002-03-11","$2y$10$Bh0k4Zh4UmVPdf/fiz80f.pvwZTJxj44xJr9/yN.asfBWxv9vY.3i");
INSERT INTO lista VALUES("18","Samanta","22","2025-10-01","$2y$10$L3O6tSpdPgy6vCSuyQQKgu7DjkB79fHs4ZohlJjXXreYjW9BvHfLS");
INSERT INTO lista VALUES("19","Juanito","20","2025-10-14","$2y$10$V7wqC3lww3fqxJIJVnbate/AZNUcMC67m4a2F6cgY9H9z6msexKJ.");
INSERT INTO lista VALUES("20","Lizbeth","22","2025-10-31","$2y$10$pcyGak18OGexoQVEBV0jNee3d1gTjX1GLKaSzGtR6LvGHk7RW9.oq");
INSERT INTO lista VALUES("25","Perla","12","2025-10-09","$2y$10$gPGqIOXb2CvZuTmz7ah.nuFg1VcfCLBZ8zJzfVMtscQsFRxjNWLw.");
INSERT INTO lista VALUES("26","Yami","11","2025-10-13","$2y$10$2LAveOTDhcaIIwn3WCYEGuxyYTPaNIbOv4NoyukLnIOGuC1HU9a0e");
INSERT INTO lista VALUES("29","Jorge","22","2025-10-15","");
INSERT INTO lista VALUES("30","Yami","22","2025-10-27","");
INSERT INTO lista VALUES("32","Yamileth","22","2025-10-16","$2y$10$6I5Y9/qU4Dc3SZoDx9FmM.Zw.LpSLTRFUxQBjWyKdKI0ZzZtKKRke");
INSERT INTO lista VALUES("33","Jorge","11","2025-10-08","$2y$10$GqV4nEtPeY338RYrCJq5BuwdOfP0vOeuH6dvK7cTei5hfPQPgpyOe");
INSERT INTO lista VALUES("35","Cesar","23","2025-11-21","$2y$10$yVDVo53gY3CLnFMYy6JloOsZdnLIomn/UTsgjgKpnQng8xYjAYhha");
INSERT INTO lista VALUES("36","Ivan","22","2025-11-21","$2y$10$rlG.nLdX21ospbfTnt9bK.yM/TK/JU15eCPefy/DldjJDuHMoOOPe");





DROP TABLE IF EXISTS `producto`;


CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` double NOT NULL,
  `marca` varchar(255) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO producto VALUES("1","Galletas","16","Oreo");
INSERT INTO producto VALUES("2","Leche","29","Lala");
INSERT INTO producto VALUES("3","si","20","Oreo");
INSERT INTO producto VALUES("4","Galletas","21","Oreo");
INSERT INTO producto VALUES("5","Prueba","12","Oreo");
INSERT INTO producto VALUES("6","Refresco","12","Pepsi");
INSERT INTO producto VALUES("7","Papas","20","Sabritas");



