/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : glenmorangie_keep

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-02-26 16:29:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FBAPP_ID` varchar(32) NOT NULL,
  `FBAPP_SECRET` varchar(32) NOT NULL,
  `FBAPP_TITLE` varchar(32) NOT NULL,
  `FBAPP_TITLE_TC` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', '382161975184078', '3592f66b3d313a3ffda67d0156badc2a', 'glenmorangie_keep', 'glenmorangie_keep', '2014-02-26 12:57:53');

-- ----------------------------
-- Table structure for `friend_info`
-- ----------------------------
DROP TABLE IF EXISTS `friend_info`;
CREATE TABLE `friend_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_fbid` varchar(32) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of friend_info
-- ----------------------------
INSERT INTO `friend_info` VALUES ('1', '100000289183379', '22222222222222', '2', null, '222222222222222222', '2222222222', '2014-02-26 16:09:47');
INSERT INTO `friend_info` VALUES ('2', '0', '2222', '222', null, '222', '222', '2014-02-26 16:10:37');
INSERT INTO `friend_info` VALUES ('3', '0', '2222', '222', null, '222', '222', '2014-02-26 16:10:42');
INSERT INTO `friend_info` VALUES ('4', '0', '2222', '2222222222222', null, '222222222222222', '2222222', '2014-02-26 16:10:50');
INSERT INTO `friend_info` VALUES ('5', '0', '2222', '2222222222222', null, '222222222222222', '2222222', '2014-02-26 16:10:54');
INSERT INTO `friend_info` VALUES ('6', '0', '2', '2222222222', null, '222222222', '222', '2014-02-26 16:11:17');
INSERT INTO `friend_info` VALUES ('7', '0', '22', '22', null, '2222', '22', '2014-02-26 16:11:47');
INSERT INTO `friend_info` VALUES ('8', '0', '22', '22', null, '2222', '22', '2014-02-26 16:11:49');
INSERT INTO `friend_info` VALUES ('9', '0', '111', '111', null, '111', '11', '2014-02-26 16:12:18');
INSERT INTO `friend_info` VALUES ('10', '0', '11111111', '111', null, '111', '111', '2014-02-26 16:13:53');
INSERT INTO `friend_info` VALUES ('11', '0', '111', '111', null, '111', '111', '2014-02-26 16:14:14');
INSERT INTO `friend_info` VALUES ('12', '0', '22222', '222', null, '222', '222', '2014-02-26 16:17:27');
INSERT INTO `friend_info` VALUES ('13', '0', 'w', '222', null, 'w', 'w', '2014-02-26 16:17:54');
INSERT INTO `friend_info` VALUES ('14', '100000289183379', '22222222222', '222222222222222', null, '2222222222222222', '22222222', '2014-02-26 16:18:36');
INSERT INTO `friend_info` VALUES ('15', '0', '222', '22', null, '222', '22', '2014-02-26 16:18:46');
INSERT INTO `friend_info` VALUES ('16', '0', '2222222222222222222', '222222222222', null, '222222222222222', '22222222222', '2014-02-26 16:21:47');
INSERT INTO `friend_info` VALUES ('17', '0', 'admin1111111', '11111111111', null, '11111111111111111111111111', '1111111111111', '2014-02-26 16:21:55');
INSERT INTO `friend_info` VALUES ('18', '0', 'hsinyu716', '222', null, '222', '222', '2014-02-26 16:23:15');

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(32) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `fbname` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `is_join` enum('Y','N') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '0', '222222', null, '22222222222222', 'z2493225@hotmail.com', 'N', '2014-02-26 16:22:34');
INSERT INTO `user_info` VALUES ('2', '0', 'admin', null, '0911332725', 'z2493225@hotmail.com', 'N', '2014-02-26 16:23:01');
INSERT INTO `user_info` VALUES ('3', '0', 'admin', null, '0911332725', 'z2493225@hotmail.com', 'N', '2014-02-26 16:23:11');
