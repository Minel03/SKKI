

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO history VALUES("1","Mynel Iesu Santos","created","Monobloc chairs","item","Catering Materials","2024-02-04 13:33:26");
INSERT INTO history VALUES("2","Mynel Iesu Santos","created","Catering Tables","item","Catering Materials","2024-02-04 13:59:12");
INSERT INTO history VALUES("3","Mynel Iesu Santos","edited","superadmin1","account","","2024-02-04 14:23:43");
INSERT INTO history VALUES("4","Mynel Iesu Santos","edited","superadmin1","account","","2024-02-04 14:23:50");
INSERT INTO history VALUES("5","Mynel Iesu Santos","created","Catering Tables","item","Catering Materials","2024-02-04 15:41:52");
INSERT INTO history VALUES("6","Mynel Iesu Santos","created","Tent","item","Catering Materials","2024-02-04 15:43:41");
INSERT INTO history VALUES("7","Mynel Iesu Santos","created","Vacuum","item","Others","2024-02-04 15:46:02");
INSERT INTO history VALUES("8","Mynel Iesu Santos","edited","Vacuum","item","Others","2024-02-04 15:46:37");
INSERT INTO history VALUES("9","Mynel Iesu Santos","edited","Vacuum","item","Others","2024-02-04 15:47:00");
INSERT INTO history VALUES("10","Mynel Iesu Santos","edited","Vacuum","item","Others","2024-02-04 15:47:53");
INSERT INTO history VALUES("11","Mynel Iesu Santos","created","Accessories","item","Others","2024-02-04 15:54:39");
INSERT INTO history VALUES("12","Mynel Iesu Santos","edited","Accessories","item","Others","2024-02-04 16:42:05");
INSERT INTO history VALUES("13","Mynel Iesu Santos","edited","Accessories","item","Others","2024-02-04 16:42:46");
INSERT INTO history VALUES("14","Mynel Iesu Santos","created","Mosquito Net","item","Others","2024-02-04 16:57:32");
INSERT INTO history VALUES("15","Mynel Iesu Santos","edited","Accessories","item","Others","2024-02-04 16:57:44");
INSERT INTO history VALUES("16","Mynel Iesu Santos","created","Food warmer","item","Kitchen Materials","2024-02-05 20:06:13");
INSERT INTO history VALUES("17","Mynel Iesu Santos","created","Food warmer","item","Kitchen Materials","2024-02-05 20:08:09");
INSERT INTO history VALUES("18","Mynel Iesu Santos","created","Pressure cooker","item","Kitchen Materials","2024-02-05 20:09:28");
INSERT INTO history VALUES("19","Mynel Iesu Santos","created","Food warmer","item","Kitchen Materials","2024-02-05 20:10:33");
INSERT INTO history VALUES("20","Mynel Iesu Santos","created","Food warmer accessories","item","Kitchen Materials","2024-02-05 20:11:53");
INSERT INTO history VALUES("21","Mynel Iesu Santos","created","Freezer","item","Kitchen Materials","2024-02-05 20:12:45");
INSERT INTO history VALUES("22","Mynel Iesu Santos","created","64 leaves parachute","item","Bedding","2024-02-05 21:30:31");
INSERT INTO history VALUES("23","Mynel Iesu Santos","created","36 leaves parachute","item","Bedding","2024-02-05 21:31:11");
INSERT INTO history VALUES("24","Mynel Iesu Santos","created","Saint laurent table cloth","item","Bedding","2024-02-05 21:46:05");
INSERT INTO history VALUES("25","Mynel Iesu Santos","created","Plastic mat","item","Bedding","2024-02-05 21:50:30");
INSERT INTO history VALUES("26","Mynel Iesu Santos","created","Foam","item","Bedding","2024-02-05 21:54:55");
INSERT INTO history VALUES("27","Mynel Iesu Santos","created","Plastic mat","item","Bedding","2024-02-05 21:55:49");
INSERT INTO history VALUES("28","Mynel Iesu Santos","created","Permahard Deluxe Mattress","item","Bedding","2024-02-05 21:57:57");
INSERT INTO history VALUES("29","Mynel Iesu Santos","edited","Foam","item","Bedding","2024-02-05 21:58:38");
INSERT INTO history VALUES("30","Mynel Iesu Santos","edited","Plastic mat","item","Bedding","2024-02-05 22:01:09");
INSERT INTO history VALUES("31","Mynel Iesu Santos","created","Foam","item","Bedding","2024-02-05 22:02:13");
INSERT INTO history VALUES("32","Mynel Iesu Santos","created","Cottages Linen","item","Bedding","2024-02-05 22:05:04");
INSERT INTO history VALUES("33","Mynel Iesu Santos","created","Hose","item","Spare Parts of Water","2024-02-05 22:07:55");
INSERT INTO history VALUES("34","Mynel Iesu Santos","created","Heater","item","Spare Parts of Water","2024-02-05 22:09:15");
INSERT INTO history VALUES("35","Mynel Iesu Santos","edited","Monobloc chairs","item","Catering Materials","2024-02-05 22:20:45");
INSERT INTO history VALUES("36","Mynel Iesu Santos","edited","Monobloc chairs","item","Catering Materials","2024-02-05 22:35:25");
INSERT INTO history VALUES("37","Mynel Iesu Santos","edited","Monobloc chairs","item","Catering Materials","2024-02-05 22:36:06");
INSERT INTO history VALUES("38","Mynel Iesu Santos","edited","Monobloc chairs","item","Catering Materials","2024-02-05 23:05:21");



CREATE TABLE `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
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

INSERT INTO inventory VALUES("1","Monobloc chairs","Catering Materials","1300","piece","100","0","100","0","-","-","-","-","5 years","130000","Mynel Iesu Santos","2004-04-23","0","0","0","");
INSERT INTO inventory VALUES("2","Catering Tables","Catering Materials","5000","piece","40","0","40","0","-","-","-","-","5 years","200000","Mynel Iesu Santos","2007-11-30","0","0","0","");
INSERT INTO inventory VALUES("3","Catering Tables","Catering Materials","5000","piece","20","0","20","0","-","-","-","-","5 years","100000","Mynel Iesu Santos","2007-12-31","0","0","0","");
INSERT INTO inventory VALUES("4","Tent","Catering Materials","3000","piece","20","0","20","0","-","-","-","-","5 years","60000","Mynel Iesu Santos","2008-10-31","0","0","0","");
INSERT INTO inventory VALUES("5","Vacuum","Others","10000","piece","1","0","1","0","-","-","-","-","5 years","10000","Mynel Iesu Santos","2003-11-15","1","1","5","");
INSERT INTO inventory VALUES("6","Accessories","Others","0","piece","4","0","4","0","-","-","-","-","3 years","0","Mynel Iesu Santos","2005-04-23","1","1","5","for Vacuum");
INSERT INTO inventory VALUES("7","Mosquito Net","Others","200","piece","100","0","100","0","-","-","-","-","3 years","20000","Mynel Iesu Santos","2005-04-23","1","1","5","");
INSERT INTO inventory VALUES("8","Food warmer","Kitchen Materials","3200","piece","6","0","6","0","-","-","Small","-","5 years","19200","Mynel Iesu Santos","2003-01-25","2","1","19","");
INSERT INTO inventory VALUES("9","Food warmer","Kitchen Materials","4000","piece","6","0","6","0","-","-","Full-size","-","5 years","24000","Mynel Iesu Santos","2003-09-20","2","1","19","");
INSERT INTO inventory VALUES("10","Pressure cooker","Kitchen Materials","4700","piece","1","0","1","0","Imarflex","-","Medium","-","5 years","4700","Mynel Iesu Santos","2004-03-25","2","1","19","");
INSERT INTO inventory VALUES("11","Food warmer","Kitchen Materials","4000","piece","6","0","6","0","-","-","-","-","5 years","24000","Mynel Iesu Santos","2004-03-25","2","1","19","");
INSERT INTO inventory VALUES("12","Food warmer accessories","Kitchen Materials","1000","piece","9","0","9","0","-","-","-","-","5 years","9000","Mynel Iesu Santos","2005-06-23","2","1","19","");
INSERT INTO inventory VALUES("13","Freezer","Kitchen Materials","10000","piece","1","0","1","0","-","-","-","-","5 years","10000","Mynel Iesu Santos","2005-11-21","2","1","19","");
INSERT INTO inventory VALUES("14","64 leaves parachute","Bedding","500","piece","1","0","1","0","-","Fatigue","-","-","5 years","500","Mynel Iesu Santos","2004-03-18","0","0","0","");
INSERT INTO inventory VALUES("15","36 leaves parachute","Bedding","500","piece","1","0","1","0","-","Red, yellow, blue","-","-","5 years","500","Mynel Iesu Santos","2004-03-18","0","0","0","");
INSERT INTO inventory VALUES("16","Saint laurent table cloth","Bedding","4","yard","231","0","231","0","-","-","-","-","3 years","924","Mynel Iesu Santos","2004-03-30","0","0","0","saint laurent cloth converted to a table cloth");
INSERT INTO inventory VALUES("17","Plastic mat","Bedding","200","piece","100","0","100","0","-","-","Double","-","5 years","20000","Mynel Iesu Santos","2005-04-23","0","0","0","");
INSERT INTO inventory VALUES("18","Foam","Bedding","2900","piece","12","0","12","0","Uratex","-","Full Double","-","5 years","34800","Mynel Iesu Santos","2003-02-08","0","0","0","");
INSERT INTO inventory VALUES("19","Plastic mat","Bedding","150","piece","50","0","50","0","-","-","Single","-","3 years","7500","Mynel Iesu Santos","2005-04-23","0","0","0","");
INSERT INTO inventory VALUES("20","Permahard Deluxe Mattress","Bedding","5000","piece","1","0","1","0","Uratex","yel autum leaf","Single","-","2 years","5000","Mynel Iesu Santos","2005-05-10","0","0","0","");
INSERT INTO inventory VALUES("21","Foam","Bedding","2000","piece","4","0","4","0","Uratex","-","Single","-","5 years","8000","Mynel Iesu Santos","2005-05-10","0","0","0","");
INSERT INTO inventory VALUES("22","Cottages Linen","Bedding","1200","piece","1","0","1","0","-","-","-","-","3 years","1200","Mynel Iesu Santos","2005-10-22","0","0","0","");
INSERT INTO inventory VALUES("23","Hose","Spare Parts of Water System","780","piece","1","0","1","0","-","-","40 meters","-","5 years","780","Mynel Iesu Santos","2004-05-07","0","0","0","");
INSERT INTO inventory VALUES("24","Heater","Spare Parts of Water System","1650","piece","3","0","3","0","-","-","-","-","5 years","4950","Mynel Iesu Santos","2004-03-27","0","0","0","");



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

INSERT INTO user VALUES("1","superadmin1","$2y$10$uQDb81btlGGaWsWeZkPlJOuyqT8nOaNdPz2mRW43U99lvQTSNwWGe","superadmin","Mynel Iesu Santos","Super Admin");
INSERT INTO user VALUES("2","superadmin2","$2y$10$RWofqoNEKvC.dIBoPoZNA.k.xUD.fCyDR/c3xCLZSx/fKO.E9YoZ6","superadmin","Rian Buhay","Super Admin");
INSERT INTO user VALUES("3","admin","$2y$10$yafeABGPqinYYhQa879ro.csZeqFQpIDW/GjJz2Nqdz8Bhm3qP/My","admin","Marilyn Berry","Administrator");
INSERT INTO user VALUES("4","user1","$2y$10$K5iTx4HPW5mzzrO68HUe2.oDrW.PkOUjPpjIHIn7oz1tlqUTaGozG","user","Enzo Archer","User");
INSERT INTO user VALUES("5","user2","$2y$10$/GXpoy55Ji4E1G5Cl79JzumyrtHCbDk2VmJ9D1oE6HouBgVtKJMjG","user","Myles Marks","User");

