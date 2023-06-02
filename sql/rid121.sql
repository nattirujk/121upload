/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : rid121test

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 02/06/2023 15:39:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสกิจกรรม',
  `dp_id` int NULL DEFAULT NULL,
  `activity` int NULL DEFAULT NULL COMMENT 'ชื่อกิจกรรม',
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_general_ci NULL,
  `status` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'T = ใช้งานหรือ F = ไม่ใช้งาน',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `department_id`(`dp_id` ASC) USING BTREE,
  CONSTRAINT `department_id` FOREIGN KEY (`dp_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` int NOT NULL COMMENT 'รหัสสำนัก/กอง',
  `department` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'ชื่อสำนัก/กอง',
  `ref` int NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'สถานะการใช้งาน T = ใช้งานหรือ F = ไม่ใช้งาน',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'สำนักงานชลประทานที่ 1', 0, NULL);
INSERT INTO `department` VALUES (2, 'สำนักงานชลประทานที่ 2', 0, NULL);
INSERT INTO `department` VALUES (3, 'สำนักงานชลประทานที่ 3', 0, NULL);
INSERT INTO `department` VALUES (4, 'สำนักงานชลประทานที่ 4', 0, NULL);
INSERT INTO `department` VALUES (5, 'สำนักงานชลประทานที่ 5', 0, NULL);
INSERT INTO `department` VALUES (6, 'สำนักงานชลประทานที่ 6', 0, NULL);
INSERT INTO `department` VALUES (7, 'สำนักงานชลประทานที่ 7', 0, NULL);
INSERT INTO `department` VALUES (8, 'สำนักงานชลประทานที่ 8', 0, NULL);
INSERT INTO `department` VALUES (9, 'สำนักงานชลประทานที่ 9', 0, NULL);
INSERT INTO `department` VALUES (10, 'สำนักงานชลประทานที่ 10', 0, NULL);
INSERT INTO `department` VALUES (11, 'สำนักงานชลประทานที่ 11', 0, NULL);
INSERT INTO `department` VALUES (12, 'สำนักงานชลประทานที่ 12', 0, NULL);
INSERT INTO `department` VALUES (13, 'สำนักงานชลประทานที่ 13', 0, NULL);
INSERT INTO `department` VALUES (14, 'สำนักงานชลประทานที่ 14', 0, NULL);
INSERT INTO `department` VALUES (15, 'สำนักงานชลประทานที่ 15', 0, NULL);
INSERT INTO `department` VALUES (16, 'สำนักงานชลประทานที่ 16', 0, NULL);
INSERT INTO `department` VALUES (17, 'สำนักงานชลประทานที่ 17', 0, NULL);
INSERT INTO `department` VALUES (18, 'สำนักงานเลขานุการกรม', 0, NULL);
INSERT INTO `department` VALUES (19, 'กองการเงินและบัญชี', 0, NULL);
INSERT INTO `department` VALUES (20, 'กองแผนงาน', 0, NULL);
INSERT INTO `department` VALUES (21, 'กองพัสดุ', 0, NULL);
INSERT INTO `department` VALUES (22, 'ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร', 0, NULL);
INSERT INTO `department` VALUES (23, 'สำนักเครื่องจักรกล', 0, NULL);
INSERT INTO `department` VALUES (24, 'สำนักบริหารโครงการ', 0, NULL);
INSERT INTO `department` VALUES (25, 'สำนักบริหารทรัพยากรบุคคล', 0, NULL);
INSERT INTO `department` VALUES (26, 'สำนักวิจัยและพัฒนา', 0, NULL);
INSERT INTO `department` VALUES (27, 'สำนักสำรวจด้านวิศวกรรมและธรณีวิทยา', 0, NULL);
INSERT INTO `department` VALUES (28, 'สำนักออกแบบวิศวกรรมและสถาปัตยกรรม', 0, NULL);
INSERT INTO `department` VALUES (29, 'กลุ่มพัฒนาระบบบริหาร', 0, NULL);
INSERT INTO `department` VALUES (30, 'สำนักบริหารจัดการน้ำและอุทกวิทยา', 0, NULL);
INSERT INTO `department` VALUES (31, 'สำนักพัฒนาแหล่งน้ำขนาดใหญ่', 0, NULL);
INSERT INTO `department` VALUES (32, 'สำนักงานจัดรูปที่ดินกลาง', 0, NULL);
INSERT INTO `department` VALUES (33, 'กลุ่มตรวจสอบภายใน', 0, NULL);
INSERT INTO `department` VALUES (34, 'กองประสานงานโครงการอันเนื่องมาจากพระราชดำริ', 0, NULL);
INSERT INTO `department` VALUES (35, 'สถาบันพัฒนาการชลประทาน', 0, NULL);
INSERT INTO `department` VALUES (36, 'กองส่งเสริมการมีส่วนรวมของประชาชน', 0, NULL);
INSERT INTO `department` VALUES (37, 'กองพัฒนาแหล่งน้ำขนาดกลาง', 0, NULL);
INSERT INTO `department` VALUES (38, 'สำนักกฎหมายและที่ดิน', 0, NULL);
INSERT INTO `department` VALUES (1001, 'โครงการชลประทานเชียงใหม่', 1, NULL);
INSERT INTO `department` VALUES (1002, 'โครงการชลประทานลำพูน', 1, NULL);
INSERT INTO `department` VALUES (1003, 'โครงการชลประทานแม่ฮ่องสอน', 1, NULL);
INSERT INTO `department` VALUES (1004, 'โครงการส่งน้ำและบำรุงรักษาแม่แตง', 1, NULL);
INSERT INTO `department` VALUES (1005, 'โครงการส่งน้ำและบำรุงรักษาแม่แฝก-แม่งัด', 1, NULL);
INSERT INTO `department` VALUES (1006, 'โครงการส่งน้ำและบำรุงรักษาแม่กวงอุดมธารา', 1, NULL);
INSERT INTO `department` VALUES (1007, 'โครงการก่อสร้าง สชป.1', 1, NULL);
INSERT INTO `department` VALUES (1008, 'ศูนย์ศึกษาการพัฒนาห้วยฮ่องไคร้อันเนื่องมาจากพระราชดำริ', 1, NULL);
INSERT INTO `department` VALUES (2001, 'โครงการชลประทานเชียงราย', 2, NULL);
INSERT INTO `department` VALUES (2002, 'โครงการชลประทานพะเยา', 2, NULL);
INSERT INTO `department` VALUES (2003, 'โครงการชลประทานน่าน', 2, NULL);
INSERT INTO `department` VALUES (2004, 'โครงการชลประทานลำปาง', 2, NULL);
INSERT INTO `department` VALUES (2005, 'โครงการส่งน้ำและบำรุงรักษากิ่วลม - กิ่วคอหมา', 2, NULL);
INSERT INTO `department` VALUES (2006, 'โครงการส่งน้ำและบำรุงรักษาแม่วัง', 2, NULL);
INSERT INTO `department` VALUES (2007, 'โครงการส่งน้ำและบำรุงรักษาแม่ลาว', 2, NULL);
INSERT INTO `department` VALUES (2008, 'โครงการก่อสร้าง สชป.2', 2, NULL);
INSERT INTO `department` VALUES (3001, 'โครงการชลประทานอุตรดิตถ์', 3, NULL);
INSERT INTO `department` VALUES (3002, 'โครงการชลประทานพิษณุโลก', 3, NULL);
INSERT INTO `department` VALUES (3003, 'โครงการชลประทานพิจิตร', 3, NULL);
INSERT INTO `department` VALUES (3004, 'โครงการชลประทานนครสวรรค์', 3, NULL);
INSERT INTO `department` VALUES (3005, 'โครงการส่งน้ำและบำรุงรักษาผาจุก', 3, NULL);
INSERT INTO `department` VALUES (3006, 'โครงการส่งน้ำและบำรุงรักษานเรศวร', 3, NULL);
INSERT INTO `department` VALUES (3007, 'โครงการส่งน้ำและบำรุงรักษาแควน้อยบำรุงแดน', 3, NULL);
INSERT INTO `department` VALUES (3008, 'โครงการส่งน้ำและบำรุงรักษาพลายชุมพล', 3, NULL);
INSERT INTO `department` VALUES (3009, 'โครงการส่งน้ำและบำรุงรักษาดงเศรษฐี', 3, NULL);
INSERT INTO `department` VALUES (3010, 'โครงการส่งน้ำและบำรุงรักษาท่าบัว', 3, NULL);
INSERT INTO `department` VALUES (3011, 'โครงการส่งน้ำและบำรุงรักษายมน่าน', 3, NULL);
INSERT INTO `department` VALUES (3012, 'โครงการก่อสร้าง สชป.3', 3, NULL);
INSERT INTO `department` VALUES (4001, 'โครงการชลประทานสุโขทัย', 4, NULL);
INSERT INTO `department` VALUES (4002, 'โครงการชลประทานตาก', 4, NULL);
INSERT INTO `department` VALUES (4003, 'โครงการชลประทานกำแพงเพชร', 4, NULL);
INSERT INTO `department` VALUES (4004, 'โครงการชลประทานแพร่', 4, NULL);
INSERT INTO `department` VALUES (4005, 'โครงการส่งน้ำและบำรุงรักษาสุโขทัย', 4, NULL);
INSERT INTO `department` VALUES (4006, 'โครงการส่งน้ำและบำรุงรักษาแม่ยม', 4, NULL);
INSERT INTO `department` VALUES (4007, 'โครงการส่งน้ำและบำรุงรักษาท่อทองแดง', 4, NULL);
INSERT INTO `department` VALUES (4008, 'โครงการส่งน้ำและบำรุงรักษาวังบัว', 4, NULL);
INSERT INTO `department` VALUES (4009, 'โครงการส่งน้ำและบำรุงรักษาวังยาง-หนองขวัญ', 4, NULL);
INSERT INTO `department` VALUES (4010, 'โครงการก่อสร้าง สชป.4', 4, NULL);
INSERT INTO `department` VALUES (5001, 'โครงการชลประทานอุดรธานี', 5, NULL);
INSERT INTO `department` VALUES (5002, 'โครงการชลประทานหนองคาย', 5, NULL);
INSERT INTO `department` VALUES (5003, 'โครงการชลประทานหนองบัวลำภู', 5, NULL);
INSERT INTO `department` VALUES (5004, 'โครงการชลประทานสกลนคร', 5, NULL);
INSERT INTO `department` VALUES (5005, 'โครงการชลประทานเลย', 5, NULL);
INSERT INTO `department` VALUES (5006, 'โครงการชลประทานบึงกาฬ', 5, NULL);
INSERT INTO `department` VALUES (5007, 'โครงการส่งน้ำและบำรุงรักษาน้ำอูน', 5, NULL);
INSERT INTO `department` VALUES (5008, 'โครงการส่งน้ำและบำรุงรักษาห้วยหลวง', 5, NULL);
INSERT INTO `department` VALUES (5009, 'โครงการส่งน้ำและบำรุงรักษาห้วยโมง', 5, NULL);
INSERT INTO `department` VALUES (5010, 'โครงการส่งน้ำและบำรุงรักษากุมภวาปี', 5, NULL);
INSERT INTO `department` VALUES (5011, 'โครงการก่อสร้าง สชป.5', 5, NULL);
INSERT INTO `department` VALUES (5012, 'ศูนย์ศึกษาการพัฒนาภูพานอันเนื่องมาจากพระราชดำริ', 5, NULL);
INSERT INTO `department` VALUES (6001, 'โครงการชลประทานขอนแก่น', 6, NULL);
INSERT INTO `department` VALUES (6002, 'โครงการชลประทานมหาสารคาม', 6, NULL);
INSERT INTO `department` VALUES (6003, 'โครงการชลประทานกาฬสินธุ์', 6, NULL);
INSERT INTO `department` VALUES (6004, 'โครงการชลประทานร้อยเอ็ด', 6, NULL);
INSERT INTO `department` VALUES (6005, 'โครงการชลประทานชัยภูมิ', 6, NULL);
INSERT INTO `department` VALUES (6006, 'โครงการส่งน้ำและบำรุงรักษาลำปาว', 6, NULL);
INSERT INTO `department` VALUES (6007, 'โครงการส่งน้ำและบำรุงรักษาหนองหวาย', 6, NULL);
INSERT INTO `department` VALUES (6008, 'โครงการส่งน้ำและบำรุงรักษาพรม-เชิญ', 6, NULL);
INSERT INTO `department` VALUES (6009, 'โครงการส่งน้ำและบำรุงรักษาชีบน', 6, NULL);
INSERT INTO `department` VALUES (6010, 'โครงการส่งน้ำและบำรุงรักษาชีกลาง', 6, NULL);
INSERT INTO `department` VALUES (6011, 'โครงการส่งน้ำและบำรุงรักษาเสียวใหญ่', 6, NULL);
INSERT INTO `department` VALUES (6012, 'โครงการก่อสร้าง สชป.6', 6, NULL);
INSERT INTO `department` VALUES (7001, 'โครงการชลประทานอุบลราชธานี', 7, NULL);
INSERT INTO `department` VALUES (7002, 'โครงการชลประทานยโสธร', 7, NULL);
INSERT INTO `department` VALUES (7003, 'โครงการชลประทานอำนาจเจริญ', 7, NULL);
INSERT INTO `department` VALUES (7004, 'โครงการชลประทานมุกดาหาร', 7, NULL);
INSERT INTO `department` VALUES (7005, 'โครงการชลประทานนครพนม', 7, NULL);
INSERT INTO `department` VALUES (7006, 'โครงการส่งน้ำและบำรุงรักษาโดมน้อย', 7, NULL);
INSERT INTO `department` VALUES (7007, 'โครงการส่งน้ำและบำรุงรักษาน้ำก่ำ', 7, NULL);
INSERT INTO `department` VALUES (7008, 'โครงการส่งน้ำและบำรุงรักษาชีล่างและเซบายล่าง', 7, NULL);
INSERT INTO `department` VALUES (7009, 'โครงการก่อสร้าง สชป.7', 7, NULL);
INSERT INTO `department` VALUES (8001, 'โครงการชลประทานนครราชสีมา', 8, NULL);
INSERT INTO `department` VALUES (8002, 'โครงการชลประทานบุรีรัมย์', 8, NULL);
INSERT INTO `department` VALUES (8003, 'โครงการชลประทานสุรินทร์', 8, NULL);
INSERT INTO `department` VALUES (8004, 'โครงการชลประทานศรีสะเกษ', 8, NULL);
INSERT INTO `department` VALUES (8005, 'โครงการส่งน้ำและบำรุงรักษาลำตะคอง', 8, NULL);
INSERT INTO `department` VALUES (8006, 'โครงการส่งน้ำและบำรุงรักษาลำพระเพลิง', 8, NULL);
INSERT INTO `department` VALUES (8007, 'โครงการส่งน้ำและบำรุงรักษาลำปลายมาศ', 8, NULL);
INSERT INTO `department` VALUES (8008, 'โครงการส่งน้ำและบำรุงรักษาลำนางรอง', 8, NULL);
INSERT INTO `department` VALUES (8009, 'โครงการส่งน้ำและบำรุงรักษาทุ่งสัมฤทธิ์', 8, NULL);
INSERT INTO `department` VALUES (8010, 'โครงการส่งน้ำและบำรุงรักษามูลบน-ลำแชะ', 8, NULL);
INSERT INTO `department` VALUES (8011, 'โครงการส่งน้ำและบำรุงรักษามูลกลาง', 8, NULL);
INSERT INTO `department` VALUES (8012, 'โครงการส่งน้ำและบำรุงรักษามูลล่าง', 8, NULL);
INSERT INTO `department` VALUES (8013, 'โครงการส่งน้ำและบำรุงรักษาหัวนา', 8, NULL);
INSERT INTO `department` VALUES (9001, 'โครงการชลประทานสระแก้ว', 9, NULL);
INSERT INTO `department` VALUES (9002, 'โครงการชลประทานนครนายก', 9, NULL);
INSERT INTO `department` VALUES (9003, 'โครงการชลประทานจันทบุรี', 9, NULL);
INSERT INTO `department` VALUES (9004, 'โครงการชลประทานฉะเชิงเทรา', 9, NULL);
INSERT INTO `department` VALUES (9005, 'โครงการชลประทานชลบุรี', 9, NULL);
INSERT INTO `department` VALUES (9006, 'โครงการชลประทานปราจีนบุรี', 9, NULL);
INSERT INTO `department` VALUES (9007, 'โครงการชลประทานระยอง', 9, NULL);
INSERT INTO `department` VALUES (9008, 'โครงการชลประทานตลาด', 9, NULL);
INSERT INTO `department` VALUES (9009, 'โครงการส่งน้ำและบำรุงรักษานครนายก', 9, NULL);
INSERT INTO `department` VALUES (9010, 'โครงการส่งน้ำและบำรุงรักษาบางพลวง', 9, NULL);
INSERT INTO `department` VALUES (9011, 'โครงการส่งน้ำและบำรุงรักษาบางปะกง', 9, NULL);
INSERT INTO `department` VALUES (9012, 'โครงการส่งน้ำและบำรุงรักษาคลองสียัด', 9, NULL);
INSERT INTO `department` VALUES (9013, 'โครงการส่งน้ำและบำรุงรักษาขุนด่านปราการชล', 9, NULL);
INSERT INTO `department` VALUES (9014, 'โครงการส่งน้ำและบำรุงรักษาประแสร์', 9, NULL);
INSERT INTO `department` VALUES (9015, 'โครงการส่งน้ำและบำรุงรักษาคลองหลวง รัชชโลทร', 9, NULL);
INSERT INTO `department` VALUES (9016, 'โครงการส่งน้ำและบำรุงรักษานฤบดินทรจินดา', 9, NULL);
INSERT INTO `department` VALUES (10010, 'โครงการชลประทานลพบุรี', 10, NULL);
INSERT INTO `department` VALUES (10011, 'โครงการชลประทานเพชรบูรณ์', 10, NULL);
INSERT INTO `department` VALUES (10012, 'โครงการชลประทานสระบุรี', 10, NULL);
INSERT INTO `department` VALUES (10013, 'โครงการชลประทานพระนครศรีอยุธยา', 10, NULL);
INSERT INTO `department` VALUES (10014, 'โครงการส่งน้ำและบำรุงรักษามโนรมย์', 10, NULL);
INSERT INTO `department` VALUES (10015, 'โครงการส่งน้ำและบำรุงรักษาช่องแค', 10, NULL);
INSERT INTO `department` VALUES (10016, 'โครงการส่งน้ำและบำรุงรักษาโคกกะเทียม', 10, NULL);
INSERT INTO `department` VALUES (10017, 'โครงการส่งน้ำและบำรุงรักษาเริงราง', 10, NULL);
INSERT INTO `department` VALUES (10018, 'โครงการส่งน้ำและบำรุงรักษามหาราช', 10, NULL);
INSERT INTO `department` VALUES (10019, 'โครงการส่งน้ำและบำรุงรักษาป่าสักใต้', 10, NULL);
INSERT INTO `department` VALUES (10020, 'โครงการส่งน้ำและบำรุงรักษาคลองเพรียว-สาวไห้', 10, NULL);
INSERT INTO `department` VALUES (10021, 'โครงการส่งน้ำและบำรุงรักษานครหลวง', 10, NULL);
INSERT INTO `department` VALUES (10022, 'โครงการส่งน้ำและบำรุงรักษาบางบาล', 10, NULL);
INSERT INTO `department` VALUES (10023, 'โครงการส่งน้ำและบำรุงรักษาป่าสักชลสิทธิ์', 10, NULL);
INSERT INTO `department` VALUES (10024, 'โครงการก่อสร้าง สชป.10', 10, NULL);
INSERT INTO `department` VALUES (11001, 'โครงการชลประทานนนทบุรี', 11, NULL);
INSERT INTO `department` VALUES (11002, 'โครงการชลประทานปทุมธานี', 11, NULL);
INSERT INTO `department` VALUES (11003, 'โครงการชลประทานสมุทรสาคร', 11, NULL);
INSERT INTO `department` VALUES (11004, 'โครงการชลประทานสมุทรปราการ', 11, NULL);
INSERT INTO `department` VALUES (11005, 'โครงการส่งน้ำและบำรุงรักษารังสิตเหนือ', 11, NULL);
INSERT INTO `department` VALUES (11006, 'โครงการส่งน้ำและบำรุงรักษารังสิตใต้', 11, NULL);
INSERT INTO `department` VALUES (11007, 'โครงการส่งน้ำและบำรุงรักษาชลหารพิจิตร', 11, NULL);
INSERT INTO `department` VALUES (11008, 'โครงการส่งน้ำและบำรุงรักษาพระองค์ไชยานุชิต', 11, NULL);
INSERT INTO `department` VALUES (11009, 'โครงการส่งน้ำและบำรุงรักษาเจ้าเจ็ดบางยี่หน', 11, NULL);
INSERT INTO `department` VALUES (11010, 'โครงการส่งน้ำและบำรุงรักษาพระยาบรรลือ', 11, NULL);
INSERT INTO `department` VALUES (11011, 'โครงการส่งน้ำและบำรุงรักษาพระพิมล', 11, NULL);
INSERT INTO `department` VALUES (11012, 'โครงการส่งน้ำและบำรุงรักษาภาษีเจริญ', 11, NULL);
INSERT INTO `department` VALUES (11013, 'โครงการก่อสร้าง สชป.11', 11, NULL);
INSERT INTO `department` VALUES (12001, 'โครงการชลประทานชัยนาท', 12, NULL);
INSERT INTO `department` VALUES (12002, 'โครงการชลประทานสิงห์บุรี', 12, NULL);
INSERT INTO `department` VALUES (12003, 'โครงการชลประทานอ่างทอง', 12, NULL);
INSERT INTO `department` VALUES (12004, 'โครงการชลประทานสุพรรณบุรี', 12, NULL);
INSERT INTO `department` VALUES (12005, 'โครงการชลประทานอุทัยธานี', 12, NULL);
INSERT INTO `department` VALUES (12006, 'โครงการส่งน้ำและบำรุงรักษาเจ้าพระยา', 12, NULL);
INSERT INTO `department` VALUES (12007, 'โครงการส่งน้ำและบำรุงรักษาพลเทพ', 12, NULL);
INSERT INTO `department` VALUES (12008, 'โครงการส่งน้ำและบำรุงรักษาท่าโบสถ์', 12, NULL);
INSERT INTO `department` VALUES (12009, 'โครงการส่งน้ำและบำรุงรักษาบรมธาตุ', 12, NULL);
INSERT INTO `department` VALUES (12010, 'โครงการส่งน้ำและบำรุงรักษาสามชุก', 12, NULL);
INSERT INTO `department` VALUES (12011, 'โครงการส่งน้ำและบำรุงรักษาดอนเจดีย์', 12, NULL);
INSERT INTO `department` VALUES (12012, 'โครงการส่งน้ำและบำรุงรักษาโพธิ์พระยา', 12, NULL);
INSERT INTO `department` VALUES (12013, 'โครงการส่งน้ำและบำรุงรักษาชัณสูตร', 12, NULL);
INSERT INTO `department` VALUES (12014, 'โครงการส่งน้ำและบำรุงรักษายางมณี', 12, NULL);
INSERT INTO `department` VALUES (12015, 'โครงการส่งน้ำและบำรุงรักษากระเสียว', 12, NULL);
INSERT INTO `department` VALUES (12016, 'โครงการส่งน้ำและบำรุงรักษาทับเสลา', 12, NULL);
INSERT INTO `department` VALUES (12017, 'โครงการส่งน้ำและบำรุงรักษาผักไห่', 12, NULL);
INSERT INTO `department` VALUES (12018, 'โครงการก่อสร้าง สชป.12', 12, NULL);
INSERT INTO `department` VALUES (13001, 'โครงการชลประทานราชบุรี', 13, NULL);
INSERT INTO `department` VALUES (13002, 'โครงการชลประทานนครปฐม', 13, NULL);
INSERT INTO `department` VALUES (13003, 'โครงการชลประทานกาญจนบุรี', 13, NULL);
INSERT INTO `department` VALUES (13004, 'โครงการชลประทานสมุทรสงคราม', 13, NULL);
INSERT INTO `department` VALUES (13005, 'โครงการส่งน้ำและบำรุงรักษาดำเนินสะดวก', 13, NULL);
INSERT INTO `department` VALUES (13006, 'โครงการส่งน้ำและบำรุงรักษานครชุม', 13, NULL);
INSERT INTO `department` VALUES (13007, 'โครงการส่งน้ำและบำรุงรักษาราชบุรีฝั่งซ้าย', 13, NULL);
INSERT INTO `department` VALUES (13008, 'โครงการส่งน้ำและบำรุงรักษาราชบุรีฝั่งขวา', 13, NULL);
INSERT INTO `department` VALUES (13009, 'โครงการส่งน้ำและบำรุงรักษาบางเลน', 13, NULL);
INSERT INTO `department` VALUES (13010, 'โครงการส่งน้ำและบำรุงรักษาสองพี่น้อง', 13, NULL);
INSERT INTO `department` VALUES (13011, 'โครงการส่งน้ำและบำรุงรักษานครปฐม', 13, NULL);
INSERT INTO `department` VALUES (13012, 'โครงการส่งน้ำและบำรุงรักษากำแพงแสน', 13, NULL);
INSERT INTO `department` VALUES (13013, 'โครงการส่งน้ำและบำรุงรักษาพนมทวน', 13, NULL);
INSERT INTO `department` VALUES (13014, 'โครงการส่งน้ำและบำรุงรักษาท่ามะกา', 13, NULL);
INSERT INTO `department` VALUES (13015, 'โครงการส่งน้ำและบำรุงรักษาแม่กลอง', 13, NULL);
INSERT INTO `department` VALUES (13016, 'โครงการก่อสร้าง สชป.13', 13, NULL);
INSERT INTO `department` VALUES (14001, 'โครงการชลประทานเพชรบุรี', 14, NULL);
INSERT INTO `department` VALUES (14002, 'โครงการชลประทานระนอง', 14, NULL);
INSERT INTO `department` VALUES (14003, 'โครงการชลประทานชุมพร', 14, NULL);
INSERT INTO `department` VALUES (14004, 'โครงการชลประทานประจวบคีรีขันธ์', 14, NULL);
INSERT INTO `department` VALUES (14005, 'โครงการส่งน้ำและบำรุงรักษาเพชรบุรี', 14, NULL);
INSERT INTO `department` VALUES (14006, 'โครงการส่งน้ำและบำรุงรักษาแก่งกระจาน', 14, NULL);
INSERT INTO `department` VALUES (14007, 'โครงการส่งน้ำและบำรุงรักษาปราณบุรี', 14, NULL);
INSERT INTO `department` VALUES (14008, 'โครงการก่อสร้าง สชป.14', 14, NULL);
INSERT INTO `department` VALUES (15001, 'โครงการชลประทานนครศรีธรรมราช', 15, NULL);
INSERT INTO `department` VALUES (15002, 'โครงการชลประทานสุราษฎร์ธานี', 15, NULL);
INSERT INTO `department` VALUES (15003, 'โครงการชลประทานกระบี่', 15, NULL);
INSERT INTO `department` VALUES (15004, 'โครงการชลประทานพังงา', 15, NULL);
INSERT INTO `department` VALUES (15005, 'โครงการชลประทานภูเก็ต', 15, NULL);
INSERT INTO `department` VALUES (15006, 'โครงการส่งน้ำและบำรุงรักษานครศรีธรรมราช', 15, NULL);
INSERT INTO `department` VALUES (15007, 'โครงการส่งน้ำและบำรุงรักษาปากพนังบน', 15, NULL);
INSERT INTO `department` VALUES (15008, 'โครงการส่งน้ำและบำรุงรักษาปากพนังล่าง', 15, NULL);
INSERT INTO `department` VALUES (15009, 'โครงการก่อสร้าง สชป.15', 15, NULL);
INSERT INTO `department` VALUES (15010, 'ศูนย์อำนวยการและประสานการพัฒนาพื้นที่ลุ่มน้ำปากพนังอันเนื่องมาจากพระราชดำริ', 15, NULL);
INSERT INTO `department` VALUES (16001, 'โครงการชลประทานพัทลุง', 16, NULL);
INSERT INTO `department` VALUES (16002, 'โครงการชลประทานสงขลา ', 16, NULL);
INSERT INTO `department` VALUES (16003, 'โครงการชลประทานตรัง', 16, NULL);
INSERT INTO `department` VALUES (16004, 'โครงการชลประทานสตูล', 16, NULL);
INSERT INTO `department` VALUES (16005, 'โครงการส่งน้ำและบำรุงรักษาท่าเชียด', 16, NULL);
INSERT INTO `department` VALUES (16006, 'โครงการส่งน้ำและบำรุงรักษาระโนด-กระแสสินธุ์', 16, NULL);
INSERT INTO `department` VALUES (16007, 'โครงการก่อสร้าง สชป.16', 16, NULL);
INSERT INTO `department` VALUES (17001, 'โครงการชลประทานปัตตานี', 17, NULL);
INSERT INTO `department` VALUES (17002, 'โครงการชลประทานยะลา', 17, NULL);
INSERT INTO `department` VALUES (17003, 'โครงการชลประทานนราธิวาส', 17, NULL);
INSERT INTO `department` VALUES (17004, 'โครงการส่งน้ำและบำรุงรักษาโก-ลก (มูโนะ)', 17, NULL);
INSERT INTO `department` VALUES (17005, 'โครงการส่งน้ำและบำรุงรักษาบางนรา', 17, NULL);
INSERT INTO `department` VALUES (17006, 'โครงการส่งน้ำและบำรุงรักษาปัตตานี', 17, NULL);
INSERT INTO `department` VALUES (17007, 'โครงการก่อสร้าง สชป.17', 17, NULL);

-- ----------------------------
-- Table structure for uploaded_photo
-- ----------------------------
DROP TABLE IF EXISTS `uploaded_photo`;
CREATE TABLE `uploaded_photo`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `dp_id` int NULL DEFAULT NULL COMMENT 'รหัสสำนัก/กอง',
  `shorting` int NULL DEFAULT NULL COMMENT 'รหัสส่วน/โครงการ',
  `activity_id` int NULL DEFAULT NULL COMMENT 'รหัสกิจกรรม',
  `filename` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `filepath` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'ที่อยู่ไฟล์',
  `filesize` double NULL DEFAULT NULL COMMENT 'ขนาดไฟล์ (หน่วย kb)',
  `upload_by` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'ผู้ที่อัพโหลด',
  `upload_date` datetime NULL DEFAULT NULL COMMENT 'วันที่อัพโหลด',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `activity_id`(`activity_id` ASC) USING BTREE,
  CONSTRAINT `activity_id` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of uploaded_photo
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'รหัสผ่าน',
  `dp_id` int NULL DEFAULT NULL COMMENT 'รหัสสำนัก/กอง',
  `status` varchar(1) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL COMMENT 'T = ใช้งานหรือ F = ไม่ใช้งาน',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
