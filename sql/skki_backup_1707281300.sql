

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
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO history VALUES("39","Mynel Iesu Santos","created","Powder Detergent","item","Cleaning Materials","2024-02-05 23:10:42");
INSERT INTO history VALUES("40","Marilyn Berry","created","Bleach","item","Cleaning Materials","2024-02-06 09:04:54");
INSERT INTO history VALUES("41","Marilyn Berry","created","Muriatic Acid","item","Cleaning Materials","2024-02-06 09:06:38");
INSERT INTO history VALUES("42","Marilyn Berry","created","Alcohol","item","Cleaning Materials","2024-02-06 09:08:05");
INSERT INTO history VALUES("43","Marilyn Berry","edited","Food warmer","item","Kitchen Materials","2024-02-06 09:08:27");
INSERT INTO history VALUES("44","Marilyn Berry","created","Dining plates","item","Catering Materials","2024-02-06 09:17:34");
INSERT INTO history VALUES("45","Marilyn Berry","created","Salad plates","item","Catering Materials","2024-02-06 09:18:26");
INSERT INTO history VALUES("46","Marilyn Berry","created","Baking Tray","item","Kitchen Materials","2024-02-06 09:20:22");
INSERT INTO history VALUES("47","Marilyn Berry","created","Baking Tray","item","Kitchen Materials","2024-02-06 09:25:32");
INSERT INTO history VALUES("48","Marilyn Berry","edited","Baking Tray","item","Kitchen Materials","2024-02-06 09:29:44");
INSERT INTO history VALUES("49","Marilyn Berry","created","Glass Platter","item","Catering Materials","2024-02-06 09:31:51");
INSERT INTO history VALUES("50","Marilyn Berry","edited","Monobloc chairs","item","Catering Materials","2024-02-06 09:32:39");
INSERT INTO history VALUES("51","Marilyn Berry","edited","Catering Tables","item","Catering Materials","2024-02-06 09:32:58");
INSERT INTO history VALUES("52","Marilyn Berry","edited","Catering Tables","item","Catering Materials","2024-02-06 09:33:10");
INSERT INTO history VALUES("53","Marilyn Berry","edited","Tent","item","Catering Materials","2024-02-06 09:33:21");
INSERT INTO history VALUES("54","Marilyn Berry","edited","Vacuum","item","Others","2024-02-06 09:35:11");
INSERT INTO history VALUES("55","Marilyn Berry","edited","Dining plates","item","Catering Materials","2024-02-06 09:42:37");
INSERT INTO history VALUES("56","Marilyn Berry","edited","user1","account","","2024-02-06 09:52:45");
INSERT INTO history VALUES("57","Marilyn Berry","edited","user2","account","","2024-02-06 09:52:53");
INSERT INTO history VALUES("58","Marilyn Berry","edited","user1","account","","2024-02-06 09:54:03");
INSERT INTO history VALUES("59","Marilyn Berry","edited","user1","account","","2024-02-06 09:55:26");
INSERT INTO history VALUES("60","Marilyn Berry","edited","admin","account","","2024-02-06 09:55:34");
INSERT INTO history VALUES("61","Marilyn Berry","edited","admin","account","","2024-02-06 09:55:42");
INSERT INTO history VALUES("62","Enzo Archer","created","Steel Cabinet","item","Others","2024-02-06 12:47:41");
INSERT INTO history VALUES("63","Enzo Archer","created","Books","item","Others","2024-02-06 12:48:18");
INSERT INTO history VALUES("64","Enzo Archer","created","Switch Socket","item","Others","2024-02-06 12:49:13");
INSERT INTO history VALUES("65","Enzo Archer","created","Water Dispenser","item","Others","2024-02-06 12:50:21");
INSERT INTO history VALUES("66","Enzo Archer","created","Aircon","item","Others","2024-02-06 12:51:31");
INSERT INTO history VALUES("67","Enzo Archer","created","Lights","item","Others","2024-02-06 13:01:46");
INSERT INTO history VALUES("68","Enzo Archer","created","Switch Socket","item","Others","2024-02-06 13:03:41");
INSERT INTO history VALUES("69","Enzo Archer","created","Electric fan","item","Others","2024-02-06 13:04:36");
INSERT INTO history VALUES("70","Enzo Archer","created","Office Table","item","Others","2024-02-06 13:05:43");
INSERT INTO history VALUES("71","Enzo Archer","created","Computer Table","item","Others","2024-02-06 13:06:29");
INSERT INTO history VALUES("72","Enzo Archer","created","Aircon","item","Others","2024-02-06 13:08:03");
INSERT INTO history VALUES("73","Enzo Archer","created","Office Table","item","Others","2024-02-06 13:08:40");
INSERT INTO history VALUES("74","Enzo Archer","created","Laptop","item","Others","2024-02-06 13:09:21");
INSERT INTO history VALUES("75","Enzo Archer","created","Printer","item","Others","2024-02-06 13:10:03");
INSERT INTO history VALUES("76","Enzo Archer","created","Wall Fan","item","Others","2024-02-06 13:10:50");
INSERT INTO history VALUES("77","Enzo Archer","created","Lights","item","Others","2024-02-06 13:11:22");
INSERT INTO history VALUES("78","Enzo Archer","created","Switch Socket","item","Others","2024-02-06 13:12:02");
INSERT INTO history VALUES("79","Enzo Archer","created","Water Refilling","item","Others","2024-02-06 13:13:43");
INSERT INTO history VALUES("80","Enzo Archer","created","Faucet","item","Others","2024-02-06 13:15:46");
INSERT INTO history VALUES("81","Enzo Archer","created","Lights","item","Others","2024-02-06 13:16:33");
INSERT INTO history VALUES("82","Enzo Archer","created","Desktop computer","item","Others","2024-02-06 13:50:05");
INSERT INTO history VALUES("83","Enzo Archer","edited","Desktop computer","item","Others","2024-02-06 13:50:25");
INSERT INTO history VALUES("84","Enzo Archer","created","Table Office","item","Others","2024-02-06 13:51:11");
INSERT INTO history VALUES("85","Enzo Archer","created","Laminating Machine","item","Others","2024-02-06 13:52:00");
INSERT INTO history VALUES("86","Enzo Archer","created","Bed","item","Bedding","2024-02-06 14:13:20");
INSERT INTO history VALUES("87","Enzo Archer","created","Aircon","item","Others","2024-02-06 14:14:05");
INSERT INTO history VALUES("88","Enzo Archer","created","Swicth Socket","item","Others","2024-02-06 14:14:48");
INSERT INTO history VALUES("89","Enzo Archer","created","Conference Table ","item","Others","2024-02-06 14:15:40");
INSERT INTO history VALUES("90","Enzo Archer","created","Lights","item","Others","2024-02-06 14:16:21");
INSERT INTO history VALUES("91","Enzo Archer","created","Switch Socket","item","Others","2024-02-06 14:19:01");
INSERT INTO history VALUES("92","Enzo Archer","created","Lights","item","Others","2024-02-06 14:19:56");
INSERT INTO history VALUES("93","Enzo Archer","created","Switch Socket","item","Others","2024-02-06 14:21:14");
INSERT INTO history VALUES("94","Myles Marks","edited","Switch Socket","item","Others","2024-02-06 14:22:30");
INSERT INTO history VALUES("95","Myles Marks","created","Wood Cabinet","item","Others","2024-02-06 14:29:03");
INSERT INTO history VALUES("96","Myles Marks","created","Faucet","item","Spare Parts of Water","2024-02-06 14:29:49");
INSERT INTO history VALUES("97","Myles Marks","created","Faucet","item","Spare Parts of Water","2024-02-06 14:30:22");
INSERT INTO history VALUES("98","Myles Marks","created","Lights","item","Others","2024-02-06 14:30:53");
INSERT INTO history VALUES("99","Myles Marks","created","Lights","item","Others","2024-02-06 14:31:16");
INSERT INTO history VALUES("100","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 14:31:50");
INSERT INTO history VALUES("101","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 14:32:16");
INSERT INTO history VALUES("102","Myles Marks","edited","Faucet","item","Spare Parts of Water","2024-02-06 14:32:33");
INSERT INTO history VALUES("103","Myles Marks","created","Conference Table","item","Others","2024-02-06 14:34:11");
INSERT INTO history VALUES("104","Myles Marks","created","Lights","item","Others","2024-02-06 14:34:51");
INSERT INTO history VALUES("105","Myles Marks","created","Fire Extinguisher","item","Others","2024-02-06 14:35:23");
INSERT INTO history VALUES("106","Myles Marks","created","Faucet","item","Spare Parts of Water","2024-02-06 14:36:03");
INSERT INTO history VALUES("107","Myles Marks","created","Lights","item","Others","2024-02-06 14:36:47");
INSERT INTO history VALUES("108","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 14:37:14");
INSERT INTO history VALUES("109","Myles Marks","created","Aircon","item","Others","2024-02-06 14:40:04");
INSERT INTO history VALUES("110","Myles Marks","created","Fire Extinguisher","item","Others","2024-02-06 14:40:33");
INSERT INTO history VALUES("111","Myles Marks","created","LCD","item","Others","2024-02-06 14:41:06");
INSERT INTO history VALUES("112","Myles Marks","created","Aircooler","item","Others","2024-02-06 14:41:50");
INSERT INTO history VALUES("113","Myles Marks","edited","Aircooler","item","Catering Materials","2024-02-06 14:42:11");
INSERT INTO history VALUES("114","Myles Marks","created","Reversable Ribbon ","item","Catering Materials","2024-02-06 14:42:43");
INSERT INTO history VALUES("115","Myles Marks","created","Peanut bottle","item","Kitchen Materials","2024-02-06 14:43:28");
INSERT INTO history VALUES("116","Myles Marks","created","Curtain","item","Catering Materials","2024-02-06 14:43:57");
INSERT INTO history VALUES("117","Myles Marks","created","Aircon","item","Others","2024-02-06 14:44:40");
INSERT INTO history VALUES("118","Myles Marks","created","Lights","item","Others","2024-02-06 14:45:10");
INSERT INTO history VALUES("119","Myles Marks","created","Speaker","item","Others","2024-02-06 14:45:52");
INSERT INTO history VALUES("120","Myles Marks","created","Lights","item","Others","2024-02-06 14:46:27");
INSERT INTO history VALUES("121","Myles Marks","edited","Lights","item","Others","2024-02-06 14:46:46");
INSERT INTO history VALUES("122","Myles Marks","created","Refrigerator","item","Kitchen Materials","2024-02-06 14:47:12");
INSERT INTO history VALUES("123","Myles Marks","created","Faucet","item","Spare Parts of Water","2024-02-06 14:47:41");
INSERT INTO history VALUES("124","Myles Marks","created","Lights","item","Others","2024-02-06 14:48:22");
INSERT INTO history VALUES("125","Myles Marks","created","Switch Socket","item","Others","2024-02-06 14:48:59");
INSERT INTO history VALUES("126","Myles Marks","created","Computer","item","Others","2024-02-06 14:49:33");
INSERT INTO history VALUES("127","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 14:50:06");
INSERT INTO history VALUES("128","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 14:50:31");
INSERT INTO history VALUES("129","Myles Marks","created","Lights","item","Others","2024-02-06 14:50:51");
INSERT INTO history VALUES("130","Myles Marks","created","Lights","item","Others","2024-02-06 14:51:13");
INSERT INTO history VALUES("131","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 14:51:35");
INSERT INTO history VALUES("132","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 14:51:59");
INSERT INTO history VALUES("133","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 14:53:11");
INSERT INTO history VALUES("134","Myles Marks","created","Pillows","item","Bedding","2024-02-06 14:53:34");
INSERT INTO history VALUES("135","Myles Marks","created","Beddings","item","Bedding","2024-02-06 14:53:56");
INSERT INTO history VALUES("136","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 14:54:31");
INSERT INTO history VALUES("137","Myles Marks","created","Pillows","item","Bedding","2024-02-06 14:54:55");
INSERT INTO history VALUES("138","Myles Marks","created","Beddings","item","Bedding","2024-02-06 14:55:28");
INSERT INTO history VALUES("139","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 14:56:14");
INSERT INTO history VALUES("140","Myles Marks","created","Pillows","item","Bedding","2024-02-06 14:56:40");
INSERT INTO history VALUES("141","Myles Marks","created","Beddings","item","Bedding","2024-02-06 14:57:07");
INSERT INTO history VALUES("142","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:16:31");
INSERT INTO history VALUES("143","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:17:00");
INSERT INTO history VALUES("144","Myles Marks","created","Cabinet","item","Bedding","2024-02-06 15:17:31");
INSERT INTO history VALUES("145","Myles Marks","created","Bed","item","Bedding","2024-02-06 15:18:02");
INSERT INTO history VALUES("146","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:18:24");
INSERT INTO history VALUES("147","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:18:45");
INSERT INTO history VALUES("148","Myles Marks","created","Bed","item","Bedding","2024-02-06 15:19:30");
INSERT INTO history VALUES("149","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:19:52");
INSERT INTO history VALUES("150","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:20:16");
INSERT INTO history VALUES("151","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 15:20:51");
INSERT INTO history VALUES("152","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 15:21:14");
INSERT INTO history VALUES("153","Myles Marks","created","Lights","item","Others","2024-02-06 15:21:34");
INSERT INTO history VALUES("154","Myles Marks","created","Lights","item","Others","2024-02-06 15:22:01");
INSERT INTO history VALUES("155","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 15:22:20");
INSERT INTO history VALUES("156","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 15:22:43");
INSERT INTO history VALUES("157","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:23:55");
INSERT INTO history VALUES("158","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:24:24");
INSERT INTO history VALUES("159","Myles Marks","created","Cabinet","item","Others","2024-02-06 15:24:48");
INSERT INTO history VALUES("160","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:25:11");
INSERT INTO history VALUES("161","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:25:40");
INSERT INTO history VALUES("162","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:26:04");
INSERT INTO history VALUES("163","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:26:34");
INSERT INTO history VALUES("164","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:27:16");
INSERT INTO history VALUES("165","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:27:40");
INSERT INTO history VALUES("166","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:28:15");
INSERT INTO history VALUES("167","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:28:35");
INSERT INTO history VALUES("168","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:29:00");
INSERT INTO history VALUES("169","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:29:22");
INSERT INTO history VALUES("170","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:29:46");
INSERT INTO history VALUES("171","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:30:05");
INSERT INTO history VALUES("172","Myles Marks","created","Double Deck","item","Bedding","2024-02-06 15:30:34");
INSERT INTO history VALUES("173","Myles Marks","created","Pillows","item","Bedding","2024-02-06 15:30:58");
INSERT INTO history VALUES("174","Myles Marks","created","Beddings","item","Bedding","2024-02-06 15:31:21");
INSERT INTO history VALUES("175","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 15:31:45");
INSERT INTO history VALUES("176","Myles Marks","created","Faucets","item","Spare Parts of Water","2024-02-06 15:32:09");
INSERT INTO history VALUES("177","Myles Marks","created","Lights","item","Others","2024-02-06 15:32:30");
INSERT INTO history VALUES("178","Myles Marks","created","Lights","item","Others","2024-02-06 15:32:57");
INSERT INTO history VALUES("179","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 15:33:20");
INSERT INTO history VALUES("180","Myles Marks","created","Shower","item","Spare Parts of Water","2024-02-06 15:33:37");
INSERT INTO history VALUES("181","Mynel Iesu Santos","edited","Lights","item","Others","2024-02-06 21:18:13");
INSERT INTO history VALUES("182","Mynel Iesu Santos","requested","Dining plates","item","Catering Materials","2024-02-07 09:04:52");
INSERT INTO history VALUES("183","Mynel Iesu Santos","requested","Salad plates","item","Catering Materials","2024-02-07 09:06:29");
INSERT INTO history VALUES("184","Mynel Iesu Santos","requested","Monobloc chairs","item","Catering Materials","2024-02-07 09:07:16");
INSERT INTO history VALUES("185","Mynel Iesu Santos","requested","Tent","item","Catering Materials","2024-02-07 09:22:44");
INSERT INTO history VALUES("186","Mynel Iesu Santos","requested","Food warmer","item","Kitchen Materials","2024-02-07 09:23:16");
INSERT INTO history VALUES("187","Mynel Iesu Santos","requested","Heater","item","Spare Parts of Water","2024-02-07 09:23:55");
INSERT INTO history VALUES("188","Mynel Iesu Santos","requested","Catering Tables","item","Catering Materials","2024-02-07 09:25:21");
INSERT INTO history VALUES("189","Mynel Iesu Santos","restocked","Heater","item","Spare Parts of Water","2024-02-07 09:25:28");
INSERT INTO history VALUES("190","Mynel Iesu Santos","restocked","Tent","item","Catering Materials","2024-02-07 09:25:36");



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
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inventory VALUES("1","Monobloc chairs","Catering Materials","1300","piece","50","0","50","0","-","-","-","-","5 years","65000","Mynel Iesu Santos","2004-04-23","1","1","5","");
INSERT INTO inventory VALUES("2","Catering Tables","Catering Materials","5000","piece","20","0","20","0","-","-","-","-","5 years","100000","Mynel Iesu Santos","2007-11-30","1","1","5","");
INSERT INTO inventory VALUES("3","Catering Tables","Catering Materials","5000","piece","20","0","20","0","-","-","-","-","5 years","100000","Mynel Iesu Santos","2007-12-31","1","1","5","");
INSERT INTO inventory VALUES("4","Tent","Catering Materials","3000","piece","20","0","20","0","-","-","-","-","5 years","60000","Mynel Iesu Santos","2024-02-07","1","1","5","");
INSERT INTO inventory VALUES("5","Vacuum","Others","10000","piece","1","0","1","0","-","-","-","-","5 years","10000","Mynel Iesu Santos","2003-11-15","1","1","1","");
INSERT INTO inventory VALUES("6","Accessories","Others","0","piece","4","0","4","0","-","-","-","-","3 years","0","Mynel Iesu Santos","2005-04-23","1","1","5","for Vacuum");
INSERT INTO inventory VALUES("7","Mosquito Net","Others","200","piece","100","0","100","0","-","-","-","-","3 years","20000","Mynel Iesu Santos","2005-04-23","1","1","5","");
INSERT INTO inventory VALUES("8","Food warmer","Kitchen Materials","3200","piece","6","0","6","0","-","-","Small","-","5 years","19200","Mynel Iesu Santos","2003-01-25","2","1","19","");
INSERT INTO inventory VALUES("9","Food warmer","Kitchen Materials","4000","piece","4","0","4","0","-","-","Full","-","5 years","17600","Mynel Iesu Santos","2003-09-20","2","1","19","");
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
INSERT INTO inventory VALUES("24","Heater","Spare Parts of Water System","1650","piece","3","0","3","0","-","-","-","-","5 years","4950","Mynel Iesu Santos","2024-02-07","0","0","0","");
INSERT INTO inventory VALUES("25","Powder Detergent","Cleaning Materials","319","piece","1","1","0","0","Ariel","-","1.32 kg","-","2 years","319","Mynel Iesu Santos","2024-02-05","1","2","10","");
INSERT INTO inventory VALUES("26","Bleach","Cleaning Materials","143","piece","7","7","0","0","Zonrox","Original","1 Gallon","-","2 years","1001","Marilyn Berry","2024-02-04","1","1","5","");
INSERT INTO inventory VALUES("27","Muriatic Acid","Cleaning Materials","42","piece","4","4","0","0","Apollo","-","350 ml","-","2 years","168","Marilyn Berry","2024-02-06","1","1","5","");
INSERT INTO inventory VALUES("28","Alcohol","Cleaning Materials","700","piece","2","2","0","0","Green Cross","-","1 gallon","-","2 years","1400","Marilyn Berry","2024-02-04","1","1","5","");
INSERT INTO inventory VALUES("29","Dining plates","Catering Materials","200","piece","30","0","30","0","Corelle","White","Regular","Square","5 years","6000","Marilyn Berry","2005-01-23","1","1","5","Vitrelle");
INSERT INTO inventory VALUES("30","Salad plates","Catering Materials","400","piece","90","0","90","0","-","-","-","Bangka","5 years","36000","Marilyn Berry","2007-03-24","1","1","5","");
INSERT INTO inventory VALUES("31","Baking Tray","Kitchen Materials","250","piece","6","0","6","0","-","-","-","Circle","5 years","1500","Marilyn Berry","2007-04-12","1","1","5","");
INSERT INTO inventory VALUES("32","Baking Tray","Kitchen Materials","300","piece","12","0","12","0","-","-","-","Square","5 years","3600","Marilyn Berry","2005-02-23","1","1","5","");
INSERT INTO inventory VALUES("33","Glass Platter","Catering Materials","230","piece","13","0","13","0","-","-","Large","-","5 years","2990","Marilyn Berry","2005-07-29","1","1","5","");
INSERT INTO inventory VALUES("34","Steel Cabinet","Others","9200","piece","2","0","2","0","-","-","-","-","6 years","18400","Enzo Archer","2008-02-21","1","1","1","");
INSERT INTO inventory VALUES("35","Books","Others","100","piece","154","0","154","0","-","-","-","-","3 years","15400","Enzo Archer","2009-08-10","1","1","1","");
INSERT INTO inventory VALUES("36","Switch Socket","Others","30","piece","2","0","2","0","-","-","-","-","2 years","60","Enzo Archer","2015-07-19","1","1","1","");
INSERT INTO inventory VALUES("37","Water Dispenser","Others","10000","piece","1","0","1","0","-","-","-","-","5 years","10000","Enzo Archer","2017-11-10","1","1","1","");
INSERT INTO inventory VALUES("38","Aircon","Others","20000","piece","1","0","1","0","-","-","-","-","7 years","20000","Enzo Archer","2016-10-07","1","1","2","");
INSERT INTO inventory VALUES("39","Lights","Others","40","piece","2","0","2","0","-","-","-","-","3 years","80","Enzo Archer","2018-06-11","1","1","2","");
INSERT INTO inventory VALUES("40","Switch Socket","Others","30","piece","2","0","2","0","-","-","-","-","2 years","60","Enzo Archer","2019-08-16","1","1","2","");
INSERT INTO inventory VALUES("41","Electric fan","Others","1800","piece","1","0","1","0","-","-","-","-","3 years","1800","Enzo Archer","2015-09-09","1","1","3","");
INSERT INTO inventory VALUES("42","Office Table","Others","2500","piece","3","0","3","0","-","-","-","-","7 years","7500","Enzo Archer","2016-10-20","1","1","3","");
INSERT INTO inventory VALUES("43","Computer Table","Others","3000","piece","2","0","2","0","-","-","-","-","4 years","6000","Enzo Archer","2020-07-21","1","1","3","");
INSERT INTO inventory VALUES("44","Aircon","Others","20000","piece","1","0","1","0","-","-","-","-","5 years","20000","Enzo Archer","2021-11-01","1","1","4","");
INSERT INTO inventory VALUES("45","Office Table","Others","2500","piece","1","0","1","0","-","-","-","-","3 years","2500","Enzo Archer","2019-10-28","1","1","4","");
INSERT INTO inventory VALUES("46","Laptop","Others","25000","piece","1","0","1","0","-","-","-","-","7 years","25000","Enzo Archer","2020-10-30","1","1","4","");
INSERT INTO inventory VALUES("47","Printer","Others","7000","piece","1","0","1","0","-","-","-","-","4 years","7000","Enzo Archer","2020-10-30","1","1","4","");
INSERT INTO inventory VALUES("48","Wall Fan","Others","1800","piece","1","0","1","0","-","-","-","-","3 years","1800","Enzo Archer","2019-05-19","1","1","6","");
INSERT INTO inventory VALUES("49","Lights","Others","30","piece","1","0","1","0","-","-","-","-","2 years","30","Enzo Archer","2008-09-08","1","1","6","");
INSERT INTO inventory VALUES("50","Switch Socket","Others","30","piece","2","0","2","0","-","-","-","-","1 year","60","Enzo Archer","2017-01-19","1","1","6","");
INSERT INTO inventory VALUES("51","Water Refilling","Others","240000","piece","1","0","1","0","-","-","-","-","10 years","240000","Enzo Archer","2019-07-18","1","1","7","");
INSERT INTO inventory VALUES("52","Faucet","Others","50","piece","2","0","2","0","-","-","-","-","2 years","100","Enzo Archer","2007-10-11","1","1","7","");
INSERT INTO inventory VALUES("53","Lights","Others","40","piece","1","0","1","0","-","-","-","-","3 years","40","Enzo Archer","2020-06-25","1","1","7","");
INSERT INTO inventory VALUES("54","Desktop computer","Others","30000","piece","3","3","0","0","-","-","-","-","4 years","90000","Enzo Archer","2021-10-01","1","2","8","COOP");
INSERT INTO inventory VALUES("55","Table Office","Others","1500","piece","4","0","4","0","-","-","-","-","2 years","6000","Enzo Archer","2011-02-20","1","2","8","");
INSERT INTO inventory VALUES("56","Laminating Machine","Others","7500","piece","1","0","1","0","-","-","-","-","5 years","7500","Enzo Archer","2018-03-10","1","2","8","");
INSERT INTO inventory VALUES("57","Bed","Bedding","11000","piece","27","0","27","0","-","-","-","-","5 years","297000","Enzo Archer","2005-03-04","1","2","9","");
INSERT INTO inventory VALUES("58","Aircon","Others","20000","piece","1","0","1","0","-","-","-","-","5 years","20000","Enzo Archer","2018-02-05","1","2","9","");
INSERT INTO inventory VALUES("59","Switch Socket","Others","40","piece","10","0","8","2","-","-","-","-","2 years","400","Enzo Archer","2007-08-01","1","2","9","2 defective");
INSERT INTO inventory VALUES("60","Conference Table ","Others","3000","piece","2","0","2","0","-","-","-","-","4 years","6000","Enzo Archer","2018-05-10","1","2","10","");
INSERT INTO inventory VALUES("61","Lights","Others","50","piece","2","0","2","0","-","-","-","-","2 years","100","Enzo Archer","2008-08-15","1","2","10","");
INSERT INTO inventory VALUES("62","Switch Socket","Others","30","piece","4","0","4","0","-","-","-","-","3 years","120","Enzo Archer","2012-09-09","1","2","10","");
INSERT INTO inventory VALUES("63","Lights","Others","30","piece","1","0","0","1","-","-","-","-","2 years","30","Enzo Archer","2016-04-05","1","2","11","no bulb");
INSERT INTO inventory VALUES("64","Switch Socket","Others","40","piece","1","0","1","0","-","-","-","-","2 years","40","Enzo Archer","2017-07-18","1","2","11","");
INSERT INTO inventory VALUES("65","Wood Cabinet","Others","5000","piece","2","0","2","0","-","-","-","-","10 years","10000","Myles Marks","2015-06-11","1","2","11","");
INSERT INTO inventory VALUES("66","Faucet","Spare Parts of Water System","60","piece","4","0","4","0","-","-","-","-","3 years","240","Myles Marks","2017-10-13","1","2","12","");
INSERT INTO inventory VALUES("67","Faucet","Spare Parts of Water System","60","piece","4","0","4","0","-","-","-","-","3 years","240","Myles Marks","2015-10-17","1","2","13","");
INSERT INTO inventory VALUES("68","Lights","Others","40","piece","2","0","2","0","-","-","-","-","3 years","80","Myles Marks","2008-07-09","1","2","12","");
INSERT INTO inventory VALUES("69","Lights","Others","40","piece","2","0","2","0","-","-","-","-","3 years","80","Myles Marks","2018-10-17","1","2","13","");
INSERT INTO inventory VALUES("70","Shower","Spare Parts of Water System","100","piece","2","0","2","0","-","-","-","-","3 years","200","Myles Marks","2011-07-16","1","2","12","");
INSERT INTO inventory VALUES("71","Shower","Spare Parts of Water System","100","piece","2","0","2","0","-","-","-","-","4 years","200","Myles Marks","2011-10-17","1","2","13","");
INSERT INTO inventory VALUES("72","Conference Table","Others","4000","piece","11","0","11","0","-","-","-","-","5 years","44000","Myles Marks","2003-09-18","1","3","14","");
INSERT INTO inventory VALUES("73","Lights","Others","40","piece","21","0","20","1","-","-","-","-","3 years","840","Myles Marks","2020-10-18","1","3","14","1 defective");
INSERT INTO inventory VALUES("74","Fire Extinguisher","Others","1300","piece","2","0","2","0","-","-","-","-","5 years","2600","Myles Marks","2019-11-08","1","3","14","");
INSERT INTO inventory VALUES("75","Faucet","Spare Parts of Water System","60","piece","1","0","1","0","-","-","-","-","2 years","60","Myles Marks","2019-12-20","1","3","15","");
INSERT INTO inventory VALUES("76","Lights","Others","30","piece","1","0","1","0","-","-","-","-","3 years","30","Myles Marks","2020-12-09","1","3","15","");
INSERT INTO inventory VALUES("77","Shower","Spare Parts of Water System","100","piece","1","0","1","0","-","-","-","-","4 years","100","Myles Marks","2020-12-20","1","3","15","");
INSERT INTO inventory VALUES("78","Aircon","Others","20000","piece","1","0","1","0","-","-","-","-","7 years","20000","Myles Marks","1995-03-10","2","1","16","");
INSERT INTO inventory VALUES("79","Fire Extinguisher","Others","1400","piece","1","0","1","0","-","-","-","-","5 years","1400","Myles Marks","1995-03-10","2","1","16","");
INSERT INTO inventory VALUES("80","LCD","Others","5000","piece","1","0","1","0","-","-","-","-","7 years","5000","Myles Marks","1995-03-10","2","1","16","");
INSERT INTO inventory VALUES("81","Aircooler","Catering Materials","15000","piece","2","0","2","0","Iwata","-","-","-","6 years","30000","Myles Marks","1995-03-10","2","1","16","");
INSERT INTO inventory VALUES("82","Reversable Ribbon ","Catering Materials","10","yarn","22","0","22","0","-","-","-","-","-","220","Myles Marks","1995-03-10","2","1","17","");
INSERT INTO inventory VALUES("83","Peanut bottle","Kitchen Materials","11","piece","61","0","61","0","-","-","-","-","2 years","671","Myles Marks","1995-03-10","2","1","17","Empty");
INSERT INTO inventory VALUES("84","Curtain","Catering Materials","100","piece","13","0","13","0","-","-","-","-","3 years","1300","Myles Marks","1995-03-10","2","1","17","");
INSERT INTO inventory VALUES("85","Aircon","Others","20000","piece","2","0","2","0","-","-","-","-","5 years","40000","Myles Marks","1995-03-10","2","1","18","");
INSERT INTO inventory VALUES("86","Lights","Others","30","piece","11","0","11","0","-","-","-","-","3 years","330","Myles Marks","1995-03-10","2","1","18","");
INSERT INTO inventory VALUES("87","Speaker","Others","4000","piece","3","0","3","0","-","-","-","-","7 years","12000","Myles Marks","1995-03-10","2","1","18","");
INSERT INTO inventory VALUES("88","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1995-03-10","2","1","19","");
INSERT INTO inventory VALUES("89","Refrigerator","Kitchen Materials","10000","piece","1","0","1","0","-","-","-","-","7 years","10000","Myles Marks","1995-03-10","2","1","19","");
INSERT INTO inventory VALUES("90","Faucet","Spare Parts of Water System","60","piece","2","0","2","0","-","-","-","-","3 years","120","Myles Marks","1995-03-10","2","1","19","");
INSERT INTO inventory VALUES("91","Lights","Others","30","piece","11","0","11","0","-","-","-","-","3 years","330","Myles Marks","1995-03-10","2","1","20","");
INSERT INTO inventory VALUES("92","Switch Socket","Others","30","piece","9","0","8","1","-","-","-","-","3 years","270","Myles Marks","1995-03-10","2","1","20","1 defective");
INSERT INTO inventory VALUES("93","Computer","Others","20000","piece","1","0","0","1","-","-","-","-","10 years","20000","Myles Marks","1995-03-10","2","1","20","Unserviceable");
INSERT INTO inventory VALUES("94","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","3 years","480","Myles Marks","1995-03-10","2","1","21","");
INSERT INTO inventory VALUES("95","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","3 years","480","Myles Marks","1995-03-10","2","1","22","");
INSERT INTO inventory VALUES("96","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1995-03-10","2","1","21","");
INSERT INTO inventory VALUES("97","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1995-03-10","2","1","22","");
INSERT INTO inventory VALUES("98","Shower","Spare Parts of Water System","100","piece","2","0","2","0","-","-","-","-","3 years","200","Myles Marks","1995-03-11","2","1","21","");
INSERT INTO inventory VALUES("99","Shower","Spare Parts of Water System","100","piece","2","0","2","0","-","-","-","-","3 years","200","Myles Marks","1995-03-10","2","1","22","");
INSERT INTO inventory VALUES("100","Double Deck","Bedding","7000","piece","10","0","10","0","-","-","-","-","25 years","70000","Myles Marks","1997-10-31","2","2","23","");
INSERT INTO inventory VALUES("101","Pillows","Bedding","200","piece","22","0","22","0","-","-","-","-","10 years","4400","Myles Marks","1997-10-31","2","2","23","");
INSERT INTO inventory VALUES("102","Beddings","Bedding","200","piece","20","0","20","0","-","-","-","-","5 years","4000","Myles Marks","1997-10-31","2","2","23","");
INSERT INTO inventory VALUES("103","Double Deck","Bedding","7000","piece","7","0","7","0","-","-","-","-","25 years","49000","Myles Marks","1997-10-31","2","2","24","");
INSERT INTO inventory VALUES("104","Pillows","Bedding","200","piece","18","0","18","0","-","-","-","-","5 years","3600","Myles Marks","1997-10-31","2","2","24","");
INSERT INTO inventory VALUES("105","Beddings","Bedding","200","piece","20","0","20","0","-","-","-","-","5 years","4000","Myles Marks","1997-10-31","2","2","24","");
INSERT INTO inventory VALUES("106","Double Deck","Bedding","7000","piece","10","0","10","0","-","-","-","-","25 years","70000","Myles Marks","1997-10-31","2","2","25","");
INSERT INTO inventory VALUES("107","Pillows","Bedding","200","piece","10","0","10","0","-","-","-","-","5 years","2000","Myles Marks","1997-10-31","2","2","25","");
INSERT INTO inventory VALUES("108","Beddings","Bedding","200","piece","20","0","20","0","-","-","-","-","5 years","4000","Myles Marks","1997-10-31","2","2","25","");
INSERT INTO inventory VALUES("109","Double Deck","Bedding","7000","piece","7","0","7","0","-","-","-","-","25 years","49000","Myles Marks","1997-10-31","2","2","26","");
INSERT INTO inventory VALUES("110","Pillows","Bedding","200","piece","7","0","7","0","-","-","-","-","5 years","1400","Myles Marks","1997-10-31","2","2","26","");
INSERT INTO inventory VALUES("111","Cabinet","Bedding","1000","piece","9","0","9","0","-","-","-","-","7 years","9000","Myles Marks","1997-10-31","2","2","26","");
INSERT INTO inventory VALUES("112","Bed","Bedding","6000","piece","2","0","2","0","-","-","-","-","25 years","12000","Myles Marks","1997-10-31","2","2","27","");
INSERT INTO inventory VALUES("113","Pillows","Bedding","200","piece","4","0","4","0","-","-","-","-","5 years","800","Myles Marks","1997-10-31","2","2","27","");
INSERT INTO inventory VALUES("114","Beddings","Bedding","200","piece","2","0","2","0","-","-","-","-","5 years","400","Myles Marks","1997-10-31","2","2","27","");
INSERT INTO inventory VALUES("115","Bed","Bedding","6000","piece","3","0","3","0","-","-","-","-","25 years","18000","Myles Marks","1997-10-31","2","2","28","");
INSERT INTO inventory VALUES("116","Pillows","Bedding","200","piece","3","0","3","0","-","-","-","-","5 years","600","Myles Marks","1997-10-31","2","2","28","");
INSERT INTO inventory VALUES("117","Beddings","Bedding","200","piece","3","0","3","0","-","-","-","-","5 years","600","Myles Marks","1997-10-31","2","2","28","");
INSERT INTO inventory VALUES("118","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","3 years","480","Myles Marks","1997-10-31","2","2","29","");
INSERT INTO inventory VALUES("119","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","3 years","480","Myles Marks","1997-10-31","2","2","30","");
INSERT INTO inventory VALUES("120","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1997-10-31","2","2","29","");
INSERT INTO inventory VALUES("121","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1997-10-31","2","2","30","");
INSERT INTO inventory VALUES("122","Shower","Spare Parts of Water System","100","piece","4","0","4","0","-","-","-","-","3 years","400","Myles Marks","1997-10-31","2","2","29","");
INSERT INTO inventory VALUES("123","Shower","Spare Parts of Water System","100","piece","4","0","4","0","-","-","-","-","3 years","400","Myles Marks","1997-10-31","2","2","30","");
INSERT INTO inventory VALUES("124","Double Deck","Bedding","7000","piece","5","0","5","0","-","-","-","-","25 years","35000","Myles Marks","1997-10-31","2","3","31","");
INSERT INTO inventory VALUES("125","Beddings","Bedding","200","piece","10","0","10","0","-","-","-","-","5 years","2000","Myles Marks","1997-10-31","2","3","31","");
INSERT INTO inventory VALUES("126","Cabinet","Others","700","piece","4","0","4","0","-","-","-","-","5 years","2800","Myles Marks","1997-10-31","2","3","31","");
INSERT INTO inventory VALUES("127","Double Deck","Bedding","7000","piece","6","0","6","0","-","-","-","-","25 years","42000","Myles Marks","1997-10-31","2","3","32","");
INSERT INTO inventory VALUES("128","Pillows","Bedding","200","piece","12","0","12","0","-","-","-","-","5 years","2400","Myles Marks","1997-10-31","2","3","32","");
INSERT INTO inventory VALUES("129","Beddings","Bedding","200","piece","12","0","12","0","-","-","-","-","5 years","2400","Myles Marks","1997-10-31","2","3","32","");
INSERT INTO inventory VALUES("130","Double Deck","Bedding","7000","piece","10","0","10","0","-","-","-","-","25 years","70000","Myles Marks","1997-10-31","2","3","33","");
INSERT INTO inventory VALUES("131","Pillows","Bedding","200","piece","29","0","29","0","-","-","-","-","5 years","5800","Myles Marks","1997-10-31","2","3","33","");
INSERT INTO inventory VALUES("132","Beddings","Bedding","200","piece","16","0","16","0","-","-","-","-","5 years","3200","Myles Marks","1997-10-31","2","3","33","");
INSERT INTO inventory VALUES("133","Double Deck","Bedding","7000","piece","5","0","5","0","-","-","-","-","25 years","35000","Myles Marks","1997-10-31","2","3","34","");
INSERT INTO inventory VALUES("134","Pillows","Bedding","200","piece","10","0","10","0","-","-","-","-","5 years","2000","Myles Marks","1997-10-31","2","3","34","");
INSERT INTO inventory VALUES("135","Beddings","Bedding","200","piece","10","0","10","0","-","-","-","-","5 years","2000","Myles Marks","1997-10-31","2","3","34","");
INSERT INTO inventory VALUES("136","Double Deck","Bedding","7000","piece","6","0","6","0","-","-","-","-","25 years","42000","Myles Marks","1997-10-31","2","3","35","");
INSERT INTO inventory VALUES("137","Pillows","Bedding","200","piece","12","0","12","0","-","-","-","-","5 years","2400","Myles Marks","1997-10-31","2","3","35","");
INSERT INTO inventory VALUES("138","Beddings","Bedding","200","piece","12","0","12","0","-","-","-","-","5 years","2400","Myles Marks","1997-10-31","2","3","35","");
INSERT INTO inventory VALUES("139","Double Deck","Bedding","7000","piece","10","0","10","0","-","-","-","-","25 years","70000","Myles Marks","1997-10-31","2","3","36","");
INSERT INTO inventory VALUES("140","Pillows","Bedding","200","piece","16","0","16","0","-","-","-","-","5 years","3200","Myles Marks","1997-10-31","2","3","36","");
INSERT INTO inventory VALUES("141","Beddings","Bedding","200","piece","20","0","20","0","-","-","-","-","5 years","4000","Myles Marks","1997-10-31","2","3","36","");
INSERT INTO inventory VALUES("142","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","5 years","480","Myles Marks","1997-10-31","2","3","37","");
INSERT INTO inventory VALUES("143","Faucets","Spare Parts of Water System","60","piece","8","0","8","0","-","-","-","-","5 years","480","Myles Marks","1997-10-31","2","3","38","");
INSERT INTO inventory VALUES("144","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1997-10-31","2","3","37","");
INSERT INTO inventory VALUES("145","Lights","Others","30","piece","2","0","2","0","-","-","-","-","3 years","60","Myles Marks","1997-10-31","2","3","38","");
INSERT INTO inventory VALUES("146","Shower","Spare Parts of Water System","100","piece","4","0","4","0","-","-","-","-","5 years","400","Myles Marks","1997-10-31","2","3","37","");
INSERT INTO inventory VALUES("147","Shower","Spare Parts of Water System","100","piece","4","0","4","0","-","-","-","-","3 years","400","Myles Marks","1997-10-31","2","3","38","");



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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO out_items VALUES("148","Dining plates","10","0","10","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","1","1","5","29");
INSERT INTO out_items VALUES("149","Salad plates","10","0","10","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","1","1","5","30");
INSERT INTO out_items VALUES("150","Monobloc chairs","50","0","50","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","1","1","5","1");
INSERT INTO out_items VALUES("152","Food warmer","2","0","2","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","2","1","19","9");
INSERT INTO out_items VALUES("154","Catering Tables","20","0","20","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","1","1","5","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO restocked_items VALUES("1","Heater","1","0","1","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","0","0","0");
INSERT INTO restocked_items VALUES("2","Tent","10","0","10","0","Mynel Iesu Santos","2024-02-07","Zandrine Wedding","1","1","5");



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
INSERT INTO user VALUES("3","admin","$2y$10$MAWBlHzz3hodEzeQpn7.xu6pThc/92c3ZLZ.zywLueH/eS9BHu6F6","admin","Marilyn Berry","Administrator");
INSERT INTO user VALUES("4","user1","$2y$10$.zeokarPGH.IKshIkmphmOcXrw.h.UcqWotxGbw3OoijCjDbT7Fai","user","Enzo Archer","Staff");
INSERT INTO user VALUES("5","user2","$2y$10$qIT2AhFTg3gb1mNZuLpvyOilXa5yk8U5U2KVAtzGjewnDR58Zu/Tu","user","Myles Marks","Staff");

