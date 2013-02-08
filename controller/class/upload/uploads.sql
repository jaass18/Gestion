/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : iwf

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2010-09-24 15:52:17
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `uploads`
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `upl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upl_name` varchar(50) DEFAULT '',
  `upl_file` varchar(50) DEFAULT '',
  PRIMARY KEY (`upl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploads
-- ----------------------------
