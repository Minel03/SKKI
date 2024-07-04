

CREATE TABLE `building` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO building VALUES("1","Office Building");
INSERT INTO building VALUES("2","CRC Main Building");



CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `condition_new` int(10) NOT NULL,
  `condition_good` int(10) NOT NULL,
  `condition_bad` int(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `shape` varchar(20) NOT NULL,
  `life` varchar(20) NOT NULL,
  `total` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `building` int(20) NOT NULL,
  `floor` int(11) NOT NULL,
  `room` int(20) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `out_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `condition_new` int(20) NOT NULL,
  `condition_good` int(20) NOT NULL,
  `condition_bad` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `building` int(20) NOT NULL,
  `floor` int(11) NOT NULL,
  `room` int(20) NOT NULL,
  `product_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `restocked_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `condition_new` int(20) NOT NULL,
  `condition_good` int(20) NOT NULL,
  `condition_bad` int(20) NOT NULL,
  `user` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `building` int(20) NOT NULL,
  `floor` int(10) NOT NULL,
  `room` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id_building` int(10) NOT NULL,
  `floor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO room VALUES("1","Display Area","1","1");
INSERT INTO room VALUES("2","Program/Finance Room","1","1");
INSERT INTO room VALUES("3","Management/Library Room","1","1");
INSERT INTO room VALUES("4","Business Room","1","1");
INSERT INTO room VALUES("5","Stock Room","1","1");
INSERT INTO room VALUES("6","Day Care Center","1","1");
INSERT INTO room VALUES("7","Water Refilling Station","1","1");
INSERT INTO room VALUES("8","World Vision Room/Counseling Room","1","2");
INSERT INTO room VALUES("9","Mt. Zion","1","2");
INSERT INTO room VALUES("10","Stock Room","1","2");
INSERT INTO room VALUES("11","Finance Room","1","2");
INSERT INTO room VALUES("12","Rest Room 1","1","2");
INSERT INTO room VALUES("13","Rest Room 2","1","2");
INSERT INTO room VALUES("14","Conference Room","1","3");
INSERT INTO room VALUES("15","Rest Room","1","3");
INSERT INTO room VALUES("16","Isaiah","2","1");
INSERT INTO room VALUES("17","Linen","2","1");
INSERT INTO room VALUES("18","King Solomon","2","1");
INSERT INTO room VALUES("19","Kitchen","2","1");
INSERT INTO room VALUES("20","Dining Room","2","1");
INSERT INTO room VALUES("21","Rest Room 1","2","1");
INSERT INTO room VALUES("22","Rest Room 2","2","1");
INSERT INTO room VALUES("23","Mt. Olive","2","2");
INSERT INTO room VALUES("24","Mt. Carmel","2","2");
INSERT INTO room VALUES("25","Judea","2","2");
INSERT INTO room VALUES("26","Galilee","2","2");
INSERT INTO room VALUES("27","Gethsemane","2","2");
INSERT INTO room VALUES("28","Jericho","2","2");
INSERT INTO room VALUES("29","Rest Room 1","2","2");
INSERT INTO room VALUES("30","Rest Room 2","2","2");
INSERT INTO room VALUES("31","Esther","2","3");
INSERT INTO room VALUES("32","Ruth","2","3");
INSERT INTO room VALUES("33","Ezekiel","2","3");
INSERT INTO room VALUES("34","Jonnah","2","3");
INSERT INTO room VALUES("35","Micah","2","3");
INSERT INTO room VALUES("36","Samuel","2","3");
INSERT INTO room VALUES("37","Rest Room 1","2","3");
INSERT INTO room VALUES("38","Rest Room 2","2","3");



CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `hashedpassword` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `handler` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user VALUES("1","superadmin1","$2y$10$VUElFlCE/7JwA7VL7QxZsOBaotscn0P6hVivRdGP2FuPirAj6IwRG","superadmin","Mynel Iesu Santos","Super Admin");
INSERT INTO user VALUES("2","superadmin2","$2y$10$RWofqoNEKvC.dIBoPoZNA.k.xUD.fCyDR/c3xCLZSx/fKO.E9YoZ6","superadmin","Rian Buhay","Super Admin");
INSERT INTO user VALUES("3","admin","$2y$10$yafeABGPqinYYhQa879ro.csZeqFQpIDW/GjJz2Nqdz8Bhm3qP/My","admin","Marilyn Berry","Administrator");
INSERT INTO user VALUES("4","user1","$2y$10$K5iTx4HPW5mzzrO68HUe2.oDrW.PkOUjPpjIHIn7oz1tlqUTaGozG","user","Enzo Archer","User");
INSERT INTO user VALUES("5","user2","$2y$10$/GXpoy55Ji4E1G5Cl79JzumyrtHCbDk2VmJ9D1oE6HouBgVtKJMjG","user","Myles Marks","User");

