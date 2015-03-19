/*
SQLyog Community v10.3 
MySQL - 5.5.42 : Database - stores
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ms_prefectures` */

CREATE TABLE `ms_prefectures` (
  `prefecture_cd` int(11) NOT NULL AUTO_INCREMENT,
  `prefecture_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefecture_name_kana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefecture_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`prefecture_cd`)
) ENGINE=InnoDB AUTO_INCREMENT=92002 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ms_prefectures` */

insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1000,'TP. Hà Nội','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1100,'Vĩnh Phúc','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1300,'Hoà Bình','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1600,'Bắc Ninh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1700,'Bắc Kạn','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (1900,'Lao Cai','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2000,'Lạng Sơn','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2100,'Bắc Giang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2200,'Cao Bằng','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2300,'Thái Nguyên','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2400,'Phú Thọ','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2500,'Tuyên Quang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2600,'Yên Bái','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2700,'Sơn La','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2800,'Lai Châu','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (2900,'Hà Giang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3000,'Hà Nam','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3100,'Hà Tây','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3200,'Nam Định','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3300,'Thái Bình','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3400,'Hải Dương','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3500,'TP. Hải Phòng','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3600,'Quảng Ninh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (3900,'Hưng Yên','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4000,'Ninh Bình','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4100,'Thanh Hoá','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4200,'Nghệ An','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4300,'Hà Tĩnh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4500,'Quảng Bình','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4600,'Quảng Trị','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (4700,'Thừa Thiên Huế','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5100,'Quảng Nam','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5200,'Quảng Ngãi','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5300,'Bình Định','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5400,'Gia Lai','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5500,'ĐắkLắk','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5600,'Phú Yên','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5700,'Khánh Hoà','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5800,'Kon Tum','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (5900,'TP. Đà Nẵng','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (6100,'Lâm Đồng','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (6200,'Bình Thuận','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (6300,'Ninh Thuận','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7000,'TP. Hồ Chí Minh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7100,'Đồng Nai','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7200,'Bình Dương','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7300,'Tây Ninh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7400,'Bà Rịa Vũng Tàu','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (7700,'Bình Phước','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (8100,'LONG An','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (8200,'Tiền Giang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (8300,'Bến Tre','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9000,'Trà Vinh','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9100,'Vĩnh LONG','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9200,'TP. Cần Thơ','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9300,'Đồng Tháp','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9400,'An Giang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9500,'Kiên Giang','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9600,'Cà Mau','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9700,'Sóc Trăng','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (9900,'Bạc Liêu','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (28001,'Điện Biên','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (55001,'Đắc Nông','','');
insert  into `ms_prefectures`(`prefecture_cd`,`prefecture_name`,`prefecture_name_kana`,`prefecture_name_en`) values (92001,'Hậu Giang','','');

/*Table structure for table `sys_addons` */

CREATE TABLE `sys_addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1',
  `popup` text COLLATE utf8_unicode_ci,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_addons` */

insert  into `sys_addons`(`id`,`name`,`intro`,`image_url`,`active_flg`,`popup`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'Tiếng anh Tương ứng','Hệ thống tự đổi sang tiếng anh.','icon_english.png',1,NULL,0,'2015-03-12 12:45:31',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `sys_advers` */

CREATE TABLE `sys_advers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_advers` */

insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,'anduamet','https://anduamet.stores.jp/#!/','img/main_page/anduamet.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,'ironwork_mk','https://ironwork_mk.stores.jp/#!/','img/main_page/ironwork_mk.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,'ShippoSTORE','http://shippostore.com/#!/','img/main_page/shippostore.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,'???????','https://fleeceleeve.stores.jp/#!/','img/main_page/fleeceleeve.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'Chill Garden','https://chill-garden.stores.jp/#!/','img/main_page/chill-garden.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,'3355','https://3355.stores.jp/#!/','img/main_page/3355.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,'nakedhorse','https://nakedhorse.stores.jp/#!/','img/main_page/nakedhorse.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (8,'tla','https://tla.stores.jp/#!/','img/main_page/tla.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (9,'classico','https://classico.stores.jp/#!/','img/main_page/classico.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (10,'patanica','https://patanica.stores.jp/#!/','img/main_page/patanica.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (11,'ader','https://ader.stores.jp/#!/','img/main_page/ader.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (12,'nohmask','https://nohmask.stores.jp/#!/','img/main_page/nohmask.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (13,'butter','https://butter.stores.jp/#!/','img/main_page/butter.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (14,'conix','https://conix.stores.jp/#!/','img/main_page/conix.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (15,'milkjapon','https://milkjapon.stores.jp/#!/','img/main_page/milkjapon.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (16,'PAPIER LABO.','http://papierlabo-store.com/#!/','img/main_page/papierlabo-store.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (17,'N STORE','https://nstore.stores.jp/#!/','img/main_page/nstore.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (18,'molansoda','https://molansoda.stores.jp/#!/','img/main_page/molansoda.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (19,'1012','https://1012.stores.jp/#!/','img/main_page/1012.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (20,'shoesofprey','https://shoesofprey.stores.jp/#!/','img/main_page/shoesofprey.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (21,'leather_labo','https://leather_labo.stores.jp/#!/','img/main_page/leather_labo.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (22,'ciito','https://ciito.stores.jp/#!/','img/main_page/ciito.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (23,'kotoriten','https://kotoriten.stores.jp/#!/','img/main_page/kotoriten.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (24,'organics','https://organics.stores.jp/#!/','img/main_page/organics.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (25,'drawingandmanual','https://drawingandmanual.stores.jp/#!/','img/main_page/drawingandmanual.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (26,'feacoffee','https://feacoffee.stores.jp/#!/','img/main_page/feacoffee.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (27,'no8vani','https://no8vani.stores.jp/#!/','img/main_page/no8vani.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (28,'bowtie','https://bowtie.stores.jp/#!/','img/main_page/bowtie.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (29,'handmadetights','https://handmadetights.stores.jp/#!/','img/main_page/handmadetights.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (30,'neon','https://neon.stores.jp/#!/','img/main_page/neon.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (31,'actroom','https://actroom.stores.jp/#!/','img/main_page/actroom.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (32,'btfurniture','https://btfurniture.stores.jp/#!/','img/main_page/btfurniture.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (33,'maru-bizen style','https://maru-bizen.stores.jp/#!/','img/main_page/maru-bizen.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (34,'kanvas','https://kanvas.stores.jp/#!/','img/main_page/kanvas.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (35,'1740 AVENUE','https://1740avenue.stores.jp/#!/','img/main_page/1740avenue.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (36,'qua e la','https://quaela.stores.jp/#!/','img/main_page/quaela.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (37,'SpecialFRESH','https://specialfresh.stores.jp/#!/','img/main_page/specialfresh.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (38,'Shiroi Kuro','https://shiroikuro.stores.jp/#!/','img/main_page/shiroikuro.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (39,'YORTZ','https://yortz.stores.jp/#!/','img/main_page/yortz.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (40,'amani','https://amani.stores.jp/#!/','img/main_page/amani.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (41,'Dolce Deco','https://dolcedeco.stores.jp/#!/','img/main_page/dolcedeco.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (42,'Quaint Design','https://quaintdesign.stores.jp/#!/','img/main_page/quaintdesign.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (43,'dls','https://dls.stores.jp/#!/','img/main_page/dls.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (44,'STEREO TENNIS FANCY SHOP','https://stereotennis.stores.jp/#!/','img/main_page/stereotennis.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (45,'arcobaleno','https://arcobaleno.stores.jp/#!/','img/main_page/arcobaleno.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (46,'sowxp','https://sowxp.stores.jp/#!/','img/main_page/sowxp.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_advers`(`id`,`name`,`href`,`url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (47,'DORAMIK','https://doramik.stores.jp/#!/','img/main_page/doramik.jpg',0,'2015-03-12 10:35:51',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `sys_background_colors` */

CREATE TABLE `sys_background_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_background_colors` */

insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,'0','background-color: rgb(229, 25, 25)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,'1','background-color: rgb(229, 188, 25)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,'2','background-color: rgb(102, 183, 20)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,'3','background-color: rgb(25, 188, 229)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'4','background-color: rgb(20, 102, 183)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,'5','background-color: rgb(188, 66, 188)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,'6','background-color: rgb(107, 66, 188)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (8,'7','background-color: rgb(188, 66, 65)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (9,'8','background-color: rgb(188, 164, 66)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (10,'9','background-color: rgb(102, 149, 52)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (11,'10','background-color: rgb(66, 164, 188)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (12,'11','background-color: rgb(52, 102, 150)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (13,'12','background-color: rgb(164, 90, 164)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (14,'13','background-color: rgb(115, 89, 164)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (15,'14','background-color: rgb(255, 147, 147)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (16,'15','background-color: rgb(255, 233, 147)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (17,'16','background-color: rgb(189, 255, 126)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (18,'17','background-color: rgb(183, 240, 254)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (19,'18','background-color: rgb(126, 190, 255)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (20,'19','background-color: rgb(233, 169, 233)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (21,'20','background-color: rgb(190, 169, 233)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (22,'21','background-color: rgb(251, 207, 207)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (23,'22','background-color: rgb(251, 242, 207)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (24,'23','background-color: rgb(224, 251, 197)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (25,'24','background-color: rgb(207, 242, 251)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (26,'25','background-color: rgb(196, 224, 251)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (27,'26','background-color: rgb(242, 216, 242)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (28,'27','background-color: rgb(225, 216, 242)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (29,'28','background-color: rgb(75, 69, 69)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (30,'29','background-color: rgb(75, 74, 69)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (31,'30','background-color: rgb(57, 60, 54)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (32,'31','background-color: rgb(69, 74, 76)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (33,'32','background-color: rgb(55, 58, 60)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (34,'33','background-color: rgb(74, 70, 74)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (35,'34','background-color: rgb(71, 70, 74)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (36,'35','background-color: rgb(0, 0, 0)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (37,'36','background-color: rgb(51, 50, 51)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (38,'37','background-color: rgb(102, 102, 102)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (39,'38','background-color: rgb(128, 128, 128)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (40,'39','background-color: rgb(153, 153, 153)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (41,'40','background-color: rgb(204, 204, 204)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_colors`(`id`,`name`,`color`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (42,'41','background-color: rgb(255, 255, 255)',0,'2015-03-12 10:55:47',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `sys_background_images` */

CREATE TABLE `sys_background_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_background_images` */

insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,'0','bg2_10.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,'1','bg2_11.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,'2','bg2_12.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,'3','bg2_13.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'4','bg2_14.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,'5','bg2_15.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,'6','bg2_16.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (8,'7','bg2_17.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (9,'8','bg2_18.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (10,'9','bg2_19.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (11,'10','bg2_20.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (12,'11','bg2_21.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (13,'12','bg2_22.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (14,'13','bg2_23.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (15,'14','bg2_24.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (16,'15','bg2_25.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (17,'16','bg2_26.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (18,'17','bg2_27.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (19,'18','bg2_28.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (20,'19','bg2_29.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_background_images`(`id`,`name`,`image_url`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (21,'20','bg2_30.gif',0,'2015-03-12 11:17:14',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `sys_layouts` */

CREATE TABLE `sys_layouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layout_css` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_layouts` */

insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,'layout_a','','layout_a',NULL,'',0,'2015-03-12 12:27:52',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,'layout_b','','layout_b',NULL,'',0,'2015-03-12 12:27:56',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,'layout_c','','layout_c',NULL,'',0,'2015-03-12 11:36:17',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,'layout_h','','layout_h',NULL,'',0,'2015-03-12 11:36:49',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'layout_d','','layout_d',NULL,'',0,'2015-03-12 11:37:18',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,'layout_e','','layout_e',NULL,'',0,'2015-03-12 11:37:42',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,'layout_f','','layout_f',NULL,'',0,'2015-03-12 11:38:03',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_layouts`(`id`,`layout_name`,`layout_img`,`layout_css`,`first`,`other`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (8,'layout_g','','layout_g',NULL,'',0,'2015-03-12 11:38:41',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `sys_text_colors` */

CREATE TABLE `sys_text_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_text_colors` */

insert  into `sys_text_colors`(`id`,`name`,`color`,`delete_flg`,`created`,`created_user`,`modified`,`modified_user`) values (1,'1','rgb(0, 0, 0)',0,'2015-03-12 11:34:09',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_text_colors`(`id`,`name`,`color`,`delete_flg`,`created`,`created_user`,`modified`,`modified_user`) values (2,'2','rgb(102, 102, 102)',0,'2015-03-12 11:34:42',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_text_colors`(`id`,`name`,`color`,`delete_flg`,`created`,`created_user`,`modified`,`modified_user`) values (3,'3','rgb(153, 153, 153)',0,'2015-03-12 11:34:59',0,'0000-00-00 00:00:00',NULL);
insert  into `sys_text_colors`(`id`,`name`,`color`,`delete_flg`,`created`,`created_user`,`modified`,`modified_user`) values (4,'4','rgb(255, 255, 255)',0,'2015-03-12 11:35:03',0,'0000-00-00 00:00:00',NULL);

/*Table structure for table `user_addons` */

CREATE TABLE `user_addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '0',
  `authen_token_secret` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_addons` */

insert  into `user_addons`(`id`,`user_id`,`addon_id`,`active_flg`,`authen_token_secret`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,1,5,0,NULL,'2015-03-12 17:14:52',0,'2015-03-12 16:14:52',NULL);
insert  into `user_addons`(`id`,`user_id`,`addon_id`,`active_flg`,`authen_token_secret`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,5,5,0,NULL,'2015-03-12 17:09:02',0,'2015-03-12 16:16:01',NULL);
insert  into `user_addons`(`id`,`user_id`,`addon_id`,`active_flg`,`authen_token_secret`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,2,5,1,NULL,'2015-03-12 15:31:23',0,'2015-03-12 14:38:21',NULL);

/*Table structure for table `user_categories` */

CREATE TABLE `user_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_categories` */

insert  into `user_categories`(`id`,`user_id`,`name`,`order`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,2,'ao_xxx',1,'2015-03-12 15:25:17',0,'2015-03-12 14:32:15',2);

/*Table structure for table `user_items` */

CREATE TABLE `user_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(5) NOT NULL DEFAULT '0',
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduce` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT '0',
  `public_flg` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_items` */

insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,3,'1,2','rrrrrrrrrrrr',123,'14261235506cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg,1426123553canhtuyetdep8jpg1381245118.jpg,1426123555849bbad4_5036_4113_b4a6_b7fa7f427ab5_jpg2.jpg,1426123557canhtuyetdep8jpg1381245118.jpg','444444444',7,0,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,3,'1,2','rrrrrrrrrrrr',123,'14261235506cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg,1426123553canhtuyetdep8jpg1381245118.jpg,1426123555849bbad4_5036_4113_b4a6_b7fa7f427ab5_jpg2.jpg,1426123557canhtuyetdep8jpg1381245118.jpg','444444444',6,0,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,3,'1,2','rrrrrrrrrrrr',123,'14261235506cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg,1426123553canhtuyetdep8jpg1381245118.jpg,1426123555849bbad4_5036_4113_b4a6_b7fa7f427ab5_jpg2.jpg,1426123557canhtuyetdep8jpg1381245118.jpg','444444444',3,1,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,3,'1','5555',123,'1426126172canhtuyetdep8jpg1381245118.jpg','',5,1,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (7,3,'1','433333',123,'1426126515canhtuyetdep8jpg1381245118.jpg,14261265096cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg,1426126511canhtuyetdep8jpg1381245118.jpg','',4,1,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (8,3,'1,6','123444',123,'1426127903canhtuyetdep8jpg1381245118.jpg,14261279516cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg','',2,1,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (9,1,'3','Test',2000,'1426131785index.jpg','http://stores.dev/edit',3,0,'2015-03-12 14:50:19',0,'2015-03-12 13:57:13',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (10,1,'','Test',2000,'1426131785index.jpg','http://stores.dev/edit',3,1,'2015-03-12 14:50:19',0,'2015-03-12 13:57:13',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (11,3,'','eeeeeeeeeeee',123,'1426143217logo_park.png,14261330796cf3e507_adf7_44d1_ab79_eaaefa8283f5_jpg1.jpg','',1,1,'2015-03-12 15:04:23',0,'2015-03-12 14:11:17',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (12,2,'7','ao_xxx_1',15000,'14261360150d7dc49cd2542bb28e7c_460x460.jpeg,14261360305eb28812369f9575aea3_460x460.jpeg','',4,1,'2015-03-12 15:25:33',0,'2015-03-12 14:32:31',3);
insert  into `user_items`(`id`,`user_id`,`category_id`,`name`,`price`,`image_url`,`introduce`,`order`,`public_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (13,2,'7','hau_xxx_2',15000,'142614549401a485489fbb33e6b840_460x460.jpeg,14261455041c917eafac29bec77fde_460x460.jpeg,14261455102b3762ccb0bf03020bbf_460x460.jpeg','ong noi may',1,1,'2015-03-12 15:25:33',0,'2015-03-12 14:32:31',2);

/*Table structure for table `user_items_quantities` */

CREATE TABLE `user_items_quantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_items_quantities` */

insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,5,'','',0,'2015-03-12 08:58:54',0,'2015-03-12 08:58:54',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,6,'','',0,'2015-03-12 09:09:35',0,'2015-03-12 09:09:35',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,7,'','',0,'2015-03-12 09:15:23',0,'2015-03-12 09:15:23',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (6,8,'','',0,'2015-03-12 09:39:23',0,'2015-03-12 09:39:23',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (9,10,'','',2,'2015-03-12 11:16:30',0,'2015-03-12 11:16:30',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (10,12,'','',1,'2015-03-12 11:54:12',0,'2015-03-12 11:54:12',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (11,11,'','',0,'2015-03-12 13:53:42',0,'2015-03-12 13:53:42',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (12,13,'','S',1,'2015-03-12 14:32:16',0,'2015-03-12 14:32:16',NULL);
insert  into `user_items_quantities`(`id`,`item_id`,`category_id`,`size_name`,`quantity`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (13,13,'','M',1,'2015-03-12 14:32:16',0,'2015-03-12 14:32:16',NULL);

/*Table structure for table `user_notifications` */

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `mail_notify` tinyint(2) NOT NULL DEFAULT '3',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_notifications` */

/*Table structure for table `user_profiles` */

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefecture_cd` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(5) DEFAULT NULL,
  `account_bank` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_brand` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` int(5) DEFAULT NULL,
  `account_number` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_holder` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_profiles` */

/*Table structure for table `user_sns` */

CREATE TABLE `user_sns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sns_type` varchar(54) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sns_id` varchar(54) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authen_token` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_sns` */

/*Table structure for table `user_stores` */

CREATE TABLE `user_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_flg` tinyint(1) NOT NULL DEFAULT '0',
  `settings` text COLLATE utf8_unicode_ci NOT NULL,
  `setting_intros` text COLLATE utf8_unicode_ci,
  `setting_trade_law` text COLLATE utf8_unicode_ci,
  `setting_pay_methods` text COLLATE utf8_unicode_ci,
  `setting_postage` text COLLATE utf8_unicode_ci,
  `follow` tinyint(1) NOT NULL DEFAULT '0',
  `promotion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_stores` */

insert  into `user_stores`(`id`,`user_id`,`domain`,`public_flg`,`settings`,`setting_intros`,`setting_trade_law`,`setting_pay_methods`,`setting_postage`,`follow`,`promotion`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,1,'sangpm',0,'{\"authenticity_token\":\"123456\",\"store\":{\"name\":\"Sang ga\",\"store_style\":{\"store_font_style\":\"Arial\",\"store_font_type\":\"google\",\"store_font_weight\":\"400\",\"store_font_size\":\"54\",\"layout\":\"layout_h\",\"display_frame\":false,\"display_item\":true,\"logo_image\":null,\"background_color\":\"background-color: rgb(255, 255, 255)\",\"background_image\":null,\"background_repeat\":\"\",\"item_text_color\":\"#000\",\"store_text_color\":\"#000\",\"layout_id\":\"4\",\"background_color_id\":\"42\",\"item_text_color_id\":\"\",\"store_text_color_id\":\"\"}}}',NULL,NULL,NULL,NULL,0,0,'2015-03-12 17:15:20',0,'2015-03-12 16:15:20',NULL);
insert  into `user_stores`(`id`,`user_id`,`domain`,`public_flg`,`settings`,`setting_intros`,`setting_trade_law`,`setting_pay_methods`,`setting_postage`,`follow`,`promotion`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,2,'haulenhan',0,'{\"authenticity_token\":\"123456\",\"store\":{\"name\":\"haulenhan\",\"store_style\":{\"store_font_style\":\"Arial\",\"store_font_type\":\"google\",\"store_font_weight\":\"400\",\"store_font_size\":\"54\",\"layout\":\"layout_a\",\"display_frame\":1,\"display_item\":1,\"logo_image\":null,\"background_color\":\"#fff\",\"background_image\":\"img\\/samples\\/bg2\\/bg2_27.gif\",\"background_repeat\":\"\",\"item_text_color\":\"#000\",\"store_text_color\":\"#000\",\"layout_id\":1,\"background_color_id\":\"\",\"item_text_color_id\":\"\",\"store_text_color_id\":\"\"}}}',NULL,NULL,NULL,NULL,0,0,'2015-03-12 14:09:09',0,'2015-03-12 13:16:07',NULL);
insert  into `user_stores`(`id`,`user_id`,`domain`,`public_flg`,`settings`,`setting_intros`,`setting_trade_law`,`setting_pay_methods`,`setting_postage`,`follow`,`promotion`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,3,'haulenhane',1,'','','{\"_token\":\"4GrNv7rZTLNAhCn9rZjG8P6oVwbs3sWNWqpe6HSN\",\"price\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"charge\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"contract\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"time_ship\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"contact\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"}',NULL,'{\"circle\":\"eeeeeeee\",\"check_free_ship\":\"1\",\"free_ship\":\"eeeeeeeeeeee\"}',1,1,'2015-03-12 10:33:36',0,'2015-03-12 09:40:30',3);
insert  into `user_stores`(`id`,`user_id`,`domain`,`public_flg`,`settings`,`setting_intros`,`setting_trade_law`,`setting_pay_methods`,`setting_postage`,`follow`,`promotion`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,4,'haulenhan1',0,'',NULL,NULL,NULL,NULL,0,0,'2015-03-12 09:07:38',0,'2015-03-12 09:07:38',NULL);
insert  into `user_stores`(`id`,`user_id`,`domain`,`public_flg`,`settings`,`setting_intros`,`setting_trade_law`,`setting_pay_methods`,`setting_postage`,`follow`,`promotion`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,5,'lenhanhau',0,'{\"authenticity_token\":\"123456\",\"store\":{\"name\":\"haulenhan\",\"store_style\":{\"store_font_style\":\"Arial\",\"store_font_type\":\"google\",\"store_font_weight\":\"400\",\"store_font_size\":\"54\",\"layout\":\"layout_a\",\"display_frame\":1,\"display_item\":1,\"logo_image\":null,\"background_color\":\"#fff\",\"background_image\":\"img\\/samples\\/bg2\\/bg2_27.gif\",\"background_repeat\":\"\",\"item_text_color\":\"#000\",\"store_text_color\":\"#000\",\"layout_id\":1,\"background_color_id\":\"\",\"item_text_color_id\":\"\",\"store_text_color_id\":\"\"}}}',NULL,NULL,NULL,NULL,0,0,'2015-03-12 15:20:57',0,'2015-03-12 14:27:55',NULL);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_active` tinyint(1) NOT NULL DEFAULT '0',
  `resign_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_flg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`account_token`,`account_active`,`resign_reason`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (1,'sangpm@leverages.jp','$2y$10$j9U4fMtErmw0GfC3LO6kw.fxRHh3wyM9MOhrZqZZiPVCjnaeqnhPW','147899bd483cd02951ea169a46e920bf',0,NULL,0,'2015-03-12 08:24:01',0,'2015-03-12 08:24:01',NULL);
insert  into `users`(`id`,`email`,`password`,`account_token`,`account_active`,`resign_reason`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (2,'haulenhan@gmail.com','$2y$10$yDleD6Tn1cBJOfUuD9/JD.vGRESMVkSt/QfzCvkVr7NNNWcbuspJS','1b714abc5c72cd4b0fede97dc636ccec',0,NULL,0,'2015-03-12 08:24:50',0,'2015-03-12 08:24:50',NULL);
insert  into `users`(`id`,`email`,`password`,`account_token`,`account_active`,`resign_reason`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (3,'oanhht53@gmail.com','$2y$10$.PJofR9KoHdsx46FmCWz/ug5ci.xbuJuuZ3tbf8sdEZapsRzQ8NAy','f5398ac2a98cf8d73dc043235785a97a',0,NULL,0,'2015-03-12 14:34:35',0,'2015-03-12 13:41:29',NULL);
insert  into `users`(`id`,`email`,`password`,`account_token`,`account_active`,`resign_reason`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (4,'haulenhan@gmail.cotttm','$2y$10$0kKXg6wcWJVr9o/PelEQP.kK954.sc217B/H4B68XnQL33gM1qeSW','10d44c24fcc7c624cff7afcae2b33931',0,NULL,0,'2015-03-12 09:07:38',0,'2015-03-12 09:07:38',NULL);
insert  into `users`(`id`,`email`,`password`,`account_token`,`account_active`,`resign_reason`,`delete_flg`,`created_at`,`created_user`,`updated_at`,`updated_user`) values (5,'lenhanhau@gmail.com','$2y$10$gJo2Iyj3UGKHORuR./yLAeR5z8bv5NL2qwh6L14lDitEQilhabwpO','7ef1aa81618dcaeacebdae29b5e3b45d',0,NULL,0,'2015-03-12 13:42:34',0,'2015-03-12 13:42:34',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
