/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xinkedui_zmkm0523_com

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-27 09:16:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lscf_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_admin`;
CREATE TABLE `lscf_admin` (
  `aId` int(3) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `aUser` varchar(16) NOT NULL COMMENT '管理员用户名',
  `aName` varchar(10) NOT NULL COMMENT '管理员姓名',
  `aPwd` varchar(32) NOT NULL COMMENT '管理员密码',
  `aTel` varchar(11) NOT NULL COMMENT '管理员手机',
  `aEmail` varchar(40) DEFAULT NULL COMMENT '管理员邮箱',
  `aSex` int(1) NOT NULL COMMENT '管理员性别',
  `aImages` varchar(250) DEFAULT NULL COMMENT '管理员头像',
  `aPowers` int(1) NOT NULL DEFAULT '0' COMMENT '管理员级别',
  `aLoginNum` int(9) NOT NULL DEFAULT '0' COMMENT '记录登陆次数',
  `aStatic` int(1) NOT NULL DEFAULT '1' COMMENT '管理员状态',
  `aErrorPwdNum` int(2) NOT NULL DEFAULT '0' COMMENT '记录密码登陆错误次数',
  PRIMARY KEY (`aId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_admin
-- ----------------------------
INSERT INTO `lscf_admin` VALUES ('1', 'system', 'system', 'e10adc3949ba59abbe56e057f20f883e', '15887835543', '3090345345@qq.com', '2', '', '0', '178', '1', '0');

-- ----------------------------
-- Table structure for `lscf_announcement`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_announcement`;
CREATE TABLE `lscf_announcement` (
  `annId` int(8) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `annNum` varchar(14) NOT NULL DEFAULT '0' COMMENT '公告编号说明',
  `annDate` date DEFAULT NULL COMMENT '公告时间',
  `annTitle` varchar(50) NOT NULL COMMENT '公告标题',
  `annContent` text NOT NULL COMMENT '公告内容',
  `annShow` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`annId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_announcement
-- ----------------------------
INSERT INTO `lscf_announcement` VALUES ('1', '23323213', '2017-05-15', '321321321', '<p>2131321321</p>', '0');
INSERT INTO `lscf_announcement` VALUES ('2', '321321', '2017-05-20', '323212', '<p>321321321321</p>', '1');
INSERT INTO `lscf_announcement` VALUES ('3', '哈哈', '2017-05-20', '哈哈3232', '<p>哈哈哈哈哈哈哈哈 &nbsp; &nbsp;<br/></p>', '1');
INSERT INTO `lscf_announcement` VALUES ('4', '111', '2017-06-01', '1110000', '<p>1111111</p>', '0');
INSERT INTO `lscf_announcement` VALUES ('5', '好消息', '2019-01-14', '哈哈哈哈哈哈哈哈哈', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0020.gif\"/></p>', '1');

-- ----------------------------
-- Table structure for `lscf_books`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_books`;
CREATE TABLE `lscf_books` (
  `bId` int(8) NOT NULL AUTO_INCREMENT COMMENT '留言ID',
  `bUser` varchar(30) NOT NULL COMMENT '留言用户名',
  `bTel` varchar(11) NOT NULL COMMENT '留言电话号码',
  `bTitle` varchar(50) NOT NULL COMMENT '留言标题',
  `bContent` text NOT NULL COMMENT '留言内容',
  `bDate` datetime NOT NULL COMMENT '留言时间',
  `bRcontent` text COMMENT '回复内容',
  `bRdate` datetime DEFAULT NULL COMMENT '回复时间',
  `bState` int(1) NOT NULL DEFAULT '0' COMMENT '是否审核',
  PRIMARY KEY (`bId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_books
-- ----------------------------
INSERT INTO `lscf_books` VALUES ('1', 'admin', '13888888888', 'tggh', 'gghhhb', '2017-05-14 11:02:44', '', '0000-00-00 00:00:00', '2');

-- ----------------------------
-- Table structure for `lscf_info`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_info`;
CREATE TABLE `lscf_info` (
  `infoId` int(3) NOT NULL AUTO_INCREMENT COMMENT '系统简介ID',
  `infoTitle` varchar(200) NOT NULL COMMENT '系统简介标题',
  `infoDate` datetime NOT NULL COMMENT '系统简介时间',
  `infoContent` text NOT NULL COMMENT '系统简介内容',
  PRIMARY KEY (`infoId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_info
-- ----------------------------
INSERT INTO `lscf_info` VALUES ('1', '系统平台简介', '2016-07-20 00:00:00', '<p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">关于平台</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 240); font-size: 14px;\">这是一个非常完美的平台<br/></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">想要知道怎么赚钱吗？</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">那么我现在告诉你：只需要投资，就有利息，比银行存款还划算</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"color: rgb(255, 0, 0);\">你还可以推荐朋友来玩，这个时候你的账户会升级</span></em><em><span style=\"color: rgb(255, 0, 0);\"></span></em><em><span style=\"color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"><br/></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">具体的等级有：123456789</span></em><em><span style=\"font-size: 18px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"><br/></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\">都具备不同的利率</span></em></span><span style=\"font-size: 14px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p>');

-- ----------------------------
-- Table structure for `lscf_money_log`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_money_log`;
CREATE TABLE `lscf_money_log` (
  `mlId` int(10) NOT NULL AUTO_INCREMENT COMMENT '财务日志ID',
  `mlRandNumber` varchar(36) NOT NULL DEFAULT '0' COMMENT '业务流水号',
  `mlUid` int(9) NOT NULL COMMENT '财务日志对应的会员',
  `mlPorM` int(1) NOT NULL COMMENT '加金额还是减金额（1加2减）',
  `mlMoneyType` int(1) DEFAULT '1' COMMENT '金额类型（1本金，2利息，3奖金）',
  `mlJiner` float NOT NULL COMMENT '财务日志对应的金钱',
  `mlInfo` varchar(40) NOT NULL COMMENT '财务日志说明',
  `mlPorC` int(1) NOT NULL DEFAULT '1' COMMENT '系统发放还是人工发放（1为系统，2为人工）',
  `mlSuccess` int(1) NOT NULL DEFAULT '1' COMMENT '成功还是失败',
  `mlToday` date DEFAULT NULL COMMENT '今日是多少号',
  `mlDate` datetime NOT NULL COMMENT '财务日志记录的时间',
  `mlShow` int(1) NOT NULL DEFAULT '1' COMMENT '日志是否显示',
  PRIMARY KEY (`mlId`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_money_log
-- ----------------------------
INSERT INTO `lscf_money_log` VALUES ('237', 'Shop2019021718471242', '42', '1', '5', '30', '下级会员提供援助获得积分收益：30元', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('236', 'T201902171847123', '3', '1', '6', '50', '下级会员接受援助动态钱包系统自动划入同步钱包金额：50元', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('235', 'DJ201902171847123', '3', '2', '4', '50', '下级会员接受援助：50元动态钱包自动转让同步钱包', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('234', 'D2019021718471242', '42', '1', '4', '50', '下级会员提供援助获得动态收益：50元', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('233', 'B2019021718471242', '42', '1', '3', '0', '下级会员qiuhonger提供援助1000元，获得奖金', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('232', 'A2019021718471238', '38', '2', '1', '1000', '接受援助，金额减少1000元', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('231', 'P2019021718471244', '44', '1', '1', '1000', '提供援助，本金增加1000元', '1', '1', '2019-02-17', '2019-02-17 18:47:12', '1');
INSERT INTO `lscf_money_log` VALUES ('230', 'B201902151715581', '1', '1', '3', '30', '当前账号升级，获得奖金30元', '1', '1', '2019-02-15', '2019-02-15 17:15:58', '1');
INSERT INTO `lscf_money_log` VALUES ('229', 'S2019013023241238', '38', '1', '4', '5', '2019-01-30签到，获得奖金5元', '1', '1', '2019-01-30', '2019-01-30 23:24:12', '1');
INSERT INTO `lscf_money_log` VALUES ('228', 'Shop2019012816174942', '42', '1', '5', '30', '下级会员提供援助获得积分收益：30元', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('227', 'T2019012816174940', '40', '1', '6', '50', '下级会员接受援助动态钱包系统自动划入同步钱包金额：50元', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('226', 'DJ2019012816174940', '40', '2', '4', '50', '下级会员接受援助：50元动态钱包自动转让同步钱包', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('225', 'D2019012816174942', '42', '1', '4', '50', '下级会员提供援助获得动态收益：50元', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('224', 'B2019012816174942', '42', '1', '3', '0', '下级会员qiuhonger提供援助1000元，获得奖金', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('223', 'A2019012816174941', '41', '2', '1', '1000', '接受援助，金额减少1000元', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('222', 'P2019012816174944', '44', '1', '1', '1000', '提供援助，本金增加1000元', '1', '1', '2019-01-28', '2019-01-28 16:17:49', '1');
INSERT INTO `lscf_money_log` VALUES ('221', 'Shop2019012815442242', '42', '1', '5', '30', '下级会员提供援助获得积分收益：30元', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('220', 'T2019012815442240', '40', '1', '6', '50', '下级会员接受援助动态钱包系统自动划入同步钱包金额：50元', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('219', 'DJ2019012815442240', '40', '2', '4', '50', '下级会员接受援助：50元动态钱包自动转让同步钱包', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('218', 'D2019012815442242', '42', '1', '4', '50', '下级会员提供援助获得动态收益：50元', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('217', 'B2019012815442242', '42', '1', '3', '0', '下级会员qiuhonger提供援助1000元，获得奖金', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('216', 'A2019012815442241', '41', '2', '1', '1000', '接受援助，金额减少1000元', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');
INSERT INTO `lscf_money_log` VALUES ('215', 'P2019012815442244', '44', '1', '1', '1000', '提供援助，本金增加1000元', '1', '1', '2019-01-28', '2019-01-28 15:44:22', '1');

-- ----------------------------
-- Table structure for `lscf_mregcodes`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_mregcodes`;
CREATE TABLE `lscf_mregcodes` (
  `mrcId` int(9) NOT NULL AUTO_INCREMENT COMMENT '注册码ID',
  `mrcRegCode` varchar(30) NOT NULL COMMENT '注册码',
  `mrcMUid` int(9) NOT NULL COMMENT '注册码购买人',
  `mrcUseUid` int(9) NOT NULL DEFAULT '0' COMMENT '注册码使用人',
  `mrcStartDate` datetime NOT NULL COMMENT '注册码生成时间',
  `mrcUseDate` datetime DEFAULT NULL COMMENT '注册码使用时间',
  `mrcPrice` int(9) NOT NULL COMMENT '当前注册码价格',
  `mrcHuiPrice` int(9) NOT NULL COMMENT '注册码优惠价格',
  `mrcPayPrice` int(9) NOT NULL COMMENT '实际支付价格',
  `mrcMorZ` int(1) NOT NULL COMMENT '注册码获取类型',
  `mrcState` int(1) NOT NULL DEFAULT '0' COMMENT '注册码状态',
  PRIMARY KEY (`mrcId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_mregcodes
-- ----------------------------
INSERT INTO `lscf_mregcodes` VALUES ('1', 'WOuO3nGVxURlUFSD', '1', '2', '2017-05-10 17:24:30', '2017-05-10 17:24:53', '200', '0', '200', '1', '1');
INSERT INTO `lscf_mregcodes` VALUES ('2', '4yHNcO0xqQE631lq', '1', '4', '2017-05-10 17:42:46', '2017-05-14 16:56:17', '200', '200', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('3', 'H5vEpNqJSJNeIXkU', '1', '41', '2017-05-11 11:40:34', '2019-01-19 09:48:12', '200', '200', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('4', 'kPhSYgiPhcEqj5NR', '1', '3', '2017-05-11 11:45:49', '2017-05-11 11:46:26', '200', '0', '200', '1', '1');
INSERT INTO `lscf_mregcodes` VALUES ('5', 'sw6bI6BGEKsCYA69', '1', '0', '2017-05-14 11:03:56', '0000-00-00 00:00:00', '200', '0', '200', '1', '0');
INSERT INTO `lscf_mregcodes` VALUES ('6', 'ZTeCqe9pMV6koQwk', '5', '5', '2017-06-06 18:37:00', '2017-06-06 18:38:51', '3500', '3500', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('7', '', '0', '0', '0000-00-00 00:00:00', null, '0', '10', '0', '0', '0');
INSERT INTO `lscf_mregcodes` VALUES ('8', 'kfnNjTHIyy4xumI5', '3', '44', '2019-01-05 15:56:47', '2019-01-25 19:41:03', '3500', '3500', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('9', 'PUXwSyyah0uVpJS0', '38', '0', '2019-01-06 19:55:13', null, '3500', '3500', '0', '0', '0');
INSERT INTO `lscf_mregcodes` VALUES ('10', 'XtEtXDqKLrFUzJlx', '3', '38', '2019-01-06 19:58:35', '2019-01-06 20:04:22', '3500', '3500', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('11', '', '0', '0', '0000-00-00 00:00:00', null, '0', '100', '0', '0', '0');
INSERT INTO `lscf_mregcodes` VALUES ('12', 'OT45hmgzzSdzqMnd', '39', '42', '2019-01-18 21:32:32', '2019-01-19 09:51:51', '3500', '3500', '0', '0', '1');
INSERT INTO `lscf_mregcodes` VALUES ('13', '', '0', '0', '0000-00-00 00:00:00', null, '0', '1000', '0', '0', '0');
INSERT INTO `lscf_mregcodes` VALUES ('14', '', '0', '0', '0000-00-00 00:00:00', null, '0', '1000', '0', '0', '0');
INSERT INTO `lscf_mregcodes` VALUES ('15', '8h1iO5fXGXMBkCXI', '38', '43', '2019-01-19 16:17:15', '2019-01-19 16:31:23', '100', '0', '100', '1', '1');

-- ----------------------------
-- Table structure for `lscf_reggrades`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_reggrades`;
CREATE TABLE `lscf_reggrades` (
  `rgId` int(8) NOT NULL AUTO_INCREMENT COMMENT '注册等级ID',
  `rgName` varchar(20) NOT NULL COMMENT '注册等级名称',
  `rgLixi` float NOT NULL COMMENT '注册等级对应利息',
  `rgTJJangjin` float NOT NULL COMMENT '注册等级推荐奖金',
  `rgTJPeople` int(9) NOT NULL COMMENT '升级本级别所需推广总人数',
  `rgSJNextPeople` int(8) NOT NULL COMMENT '升级下一级还需推广人数',
  `rgShengjiJiangjin` varchar(20) NOT NULL COMMENT '升级奖金',
  `rgShuifei` varchar(20) NOT NULL COMMENT '提现税费',
  PRIMARY KEY (`rgId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_reggrades
-- ----------------------------
INSERT INTO `lscf_reggrades` VALUES ('3', '银牌会员', '0.004', '0.004', '2', '1', '20', '0');
INSERT INTO `lscf_reggrades` VALUES ('4', '金牌会员', '0.003', '0.003', '3', '2', '30', '0');
INSERT INTO `lscf_reggrades` VALUES ('5', '钻石会员', '0.004', '0.004', '5', '3', '40', '0');

-- ----------------------------
-- Table structure for `lscf_sousuoxianzhi`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_sousuoxianzhi`;
CREATE TABLE `lscf_sousuoxianzhi` (
  `s_id` int(9) NOT NULL AUTO_INCREMENT,
  `s_uid` int(9) DEFAULT NULL COMMENT '搜索人的id',
  `s_time` varchar(150) DEFAULT NULL COMMENT '搜索时间',
  `zixuan_uid` int(9) DEFAULT NULL COMMENT '自选交割用户id',
  `jiaoge_time` varchar(150) DEFAULT NULL COMMENT '交割项目完成时间',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_sousuoxianzhi
-- ----------------------------
INSERT INTO `lscf_sousuoxianzhi` VALUES ('1', '36', '1545985494', '0', '');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('2', '36', '1545971094', '0', '');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('3', '36', '1545625494', '0', '');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('4', '37', '1545625494', '0', '');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('5', '36', '1545995072', '0', '');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('6', '3', '1546611869', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('7', '3', '1546611878', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('8', '3', '1546772347', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('9', '38', '1546776749', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('10', '38', '1546828518', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('11', '38', '1547298812', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('12', '38', '1547891688', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('13', '38', '1547893536', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('14', '40', '1547893956', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('15', '40', '1547893983', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('16', '38', '1547894070', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('17', '38', '1547895244', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('18', '38', '1547895281', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('19', '40', '1547898995', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('20', '38', '1547899116', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('21', '39', '1547899164', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('22', '40', '1547899267', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('23', '40', '1547899288', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('24', '40', '1547899310', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('25', '40', '1547899333', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('26', '38', '1547899578', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('27', '38', '1547899726', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('28', '38', '1547899835', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('29', '38', '1547900005', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('30', '38', '1547900036', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('31', '38', '1547900292', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('32', '37', '1547900396', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('33', '37', '1547900411', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('34', '37', '1547900428', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('35', '38', '1547900487', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('36', '38', '1547900575', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('37', '38', '1547900600', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('38', '38', '1547900690', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('39', '38', '1547900704', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('40', '38', '1547900719', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('41', '38', '1547900727', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('42', '38', '1547900732', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('43', '38', '1547900736', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('44', '38', '1547900740', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('45', '38', '1547900745', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('46', '38', '1547900749', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('47', '38', '1547900754', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('48', '38', '1547900758', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('49', '38', '1547900762', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('50', '38', '1547900767', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('51', '38', '1547900771', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('52', '38', '1547900776', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('53', '38', '1547900780', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('54', '38', '1547900785', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('55', '38', '1547900789', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('56', '38', '1547900793', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('57', '38', '1547900798', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('58', '38', '1547900802', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('59', '38', '1547900807', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('60', '38', '1547900811', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('61', '38', '1547900816', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('62', '38', '1547900820', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('63', '38', '1547900824', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('64', '38', '1547900829', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('65', '38', '1547900833', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('66', '38', '1547900837', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('67', null, null, '38', '1550400432');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('68', '43', '1547904557', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('69', '43', '1547904573', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('70', '43', '1547904594', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('71', '43', '1547904731', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('72', '43', '1547905177', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('73', '43', '1547905182', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('74', '43', '1547905186', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('75', '43', '1547905191', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('76', '43', '1547905195', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('77', '43', '1547905200', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('78', '43', '1547905204', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('79', '43', '1547905209', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('80', '43', '1547905214', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('81', null, null, '43', '1547906035');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('82', '43', '1547906415', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('83', '43', '1547906435', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('84', '43', '1547907521', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('85', '43', '1547907835', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('86', '37', '1547909439', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('87', '37', '1547909448', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('88', '37', '1547909455', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('89', '40', '1547909598', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('90', '38', '1547985445', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('91', '40', '1547985914', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('92', '40', '1547985994', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('93', '40', '1547986675', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('94', '39', '1547989211', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('95', '39', '1547989249', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('96', '38', '1547989361', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('97', '39', '1548403136', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('98', '38', '1548403261', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('99', '38', '1548403415', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('100', '42', '1548405370', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('101', '39', '1548405469', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('102', '41', '1548405646', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('103', '44', '1548645777', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('104', '44', '1548645805', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('105', '44', '1548645845', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('106', '44', '1548645850', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('107', '44', '1548645855', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('108', null, null, '44', '1548646477');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('109', '41', '1548648925', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('110', '41', '1548648932', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('111', '41', '1548648940', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('112', '41', '1548648951', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('113', '41', '1548648956', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('114', '41', '1548648960', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('115', null, null, '41', '1548649348');
INSERT INTO `lscf_sousuoxianzhi` VALUES ('116', '38', '1550400019', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('117', '38', '1550400045', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('118', '38', '1550400050', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('119', '38', '1550400054', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('120', '38', '1550400059', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('121', '38', '1550400064', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('122', '38', '1550400068', null, null);
INSERT INTO `lscf_sousuoxianzhi` VALUES ('123', '38', '1550400073', null, null);

-- ----------------------------
-- Table structure for `lscf_system`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_system`;
CREATE TABLE `lscf_system` (
  `sId` int(1) NOT NULL AUTO_INCREMENT COMMENT '系统设置ID',
  `sName` varchar(50) NOT NULL COMMENT '系统名称',
  `sTitle` varchar(250) NOT NULL COMMENT '系统口号，副标题',
  `sUrl` varchar(100) NOT NULL COMMENT '系统网址',
  `sTel` varchar(15) NOT NULL COMMENT '客服电话',
  `sQQ` varchar(10) NOT NULL COMMENT '客服QQ',
  `sEmail` varchar(50) NOT NULL COMMENT '客服邮箱',
  `sCheckCodeSwitch` int(1) NOT NULL COMMENT '验证码开关',
  `sErrorPwdLockNum` int(3) NOT NULL DEFAULT '3' COMMENT '密码登陆错误几次锁定',
  `sLoginTimeout` int(8) NOT NULL DEFAULT '30' COMMENT '登陆超时（分钟）',
  `sULoginTimeout` int(9) NOT NULL COMMENT '前台登陆超时',
  `sRegNum` int(4) NOT NULL DEFAULT '0' COMMENT '是否允许重复注册【-2为关闭注册，-1为不限重复次数，0为不允许重复，大于0则允许重复】',
  `sUErrorPwdLockNum` int(9) NOT NULL COMMENT '前台登陆错误次数锁定',
  `sUZFErrorPwdLockNum` int(9) NOT NULL DEFAULT '3' COMMENT '前台支付密码连续输入错误次数锁定',
  `sUCheckCodeSwitch` int(1) NOT NULL COMMENT '前台验证码开关',
  `sWeixin` varchar(22) NOT NULL COMMENT '客服微信号',
  `sRegCodeChar` varchar(62) NOT NULL COMMENT '手续费字符串',
  `sRegCodeNum` int(2) NOT NULL COMMENT '手续费位数',
  `sZhifubao` varchar(60) NOT NULL COMMENT '支付宝账户',
  `sZhifubaoName` varchar(16) NOT NULL COMMENT '支付宝姓名',
  `sONOFF` int(1) NOT NULL COMMENT '站点开关',
  `sONOFFInfo` text NOT NULL COMMENT '关闭站点说明',
  `sCopyrightName` varchar(100) NOT NULL COMMENT '版权名称',
  `sVersions` varchar(20) NOT NULL DEFAULT '2.0.0' COMMENT '版本号',
  `sMinOnline` int(10) NOT NULL COMMENT '虚拟在线人数最小值',
  `sMaxOnline` int(10) NOT NULL COMMENT '虚拟在线人数最大值',
  `sLogo` varchar(250) NOT NULL COMMENT '站点LOGO',
  `sSpwd` varchar(32) NOT NULL COMMENT '管理员安全密码前缀',
  `sXuanchanMenu` int(1) NOT NULL DEFAULT '1' COMMENT '宣传模块后台菜单开关',
  PRIMARY KEY (`sId`),
  KEY `sId` (`sId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_system
-- ----------------------------
INSERT INTO `lscf_system` VALUES ('1', '惠民购', '大家好大家好大家好大家好大家好大家好大家好    大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家好大家都在发大家都在发', 'http://mycf.nlipin.com', '13800000000', '10000000', '10000000@qq.com', '0', '5', '50', '20', '0', '5', '6', '0', '10000000', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', '16', '手续费统一200，请找推荐人申请', '平台客服', '1', '管理员正在维护中，具体开机时间请关注最新公告！', 'CF，Inc. All right reserved', 'Versions 2.3.6', '-1', '107', 'Uploads/Logo/20160722/57917ac69e62d.png', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- ----------------------------
-- Table structure for `lscf_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_system_log`;
CREATE TABLE `lscf_system_log` (
  `slogId` int(9) NOT NULL AUTO_INCREMENT COMMENT '系统日志ID',
  `slogTimes` datetime NOT NULL COMMENT '系统日志记录时间',
  `slogUsers` varchar(25) NOT NULL DEFAULT '游客' COMMENT '记录访问身份',
  `slogIp` varchar(22) DEFAULT NULL COMMENT '系统日志记录IP',
  `slogCity` varchar(50) NOT NULL DEFAULT '暂未获取' COMMENT '系统日志记录的城市',
  `slogAction` varchar(60) NOT NULL COMMENT '系统日志记录的行为',
  PRIMARY KEY (`slogId`)
) ENGINE=MyISAM AUTO_INCREMENT=450 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_system_log
-- ----------------------------
INSERT INTO `lscf_system_log` VALUES ('1', '2017-05-11 11:30:53', '游客', '106.115.36.153', '河北省邯郸市', '0');
INSERT INTO `lscf_system_log` VALUES ('2', '2017-05-11 11:31:03', '游客', '101.226.51.229', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('3', '2017-05-11 11:31:30', 'system', '106.115.36.153', '河北省邯郸市', '1');
INSERT INTO `lscf_system_log` VALUES ('4', '2017-05-11 14:00:39', '游客', '60.172.246.72', '安徽省淮北市', '0');
INSERT INTO `lscf_system_log` VALUES ('5', '2017-05-11 14:01:00', 'system', '60.172.246.72', '安徽省淮北市', '1');
INSERT INTO `lscf_system_log` VALUES ('6', '2017-05-12 13:28:58', '游客', '117.75.19.26', '云南省昆明市', '0');
INSERT INTO `lscf_system_log` VALUES ('7', '2017-05-12 14:00:08', '游客', '118.114.237.68', '四川省成都市', '0');
INSERT INTO `lscf_system_log` VALUES ('8', '2017-05-12 14:00:15', 'admin', '118.114.237.68', '四川省成都市', '-2');
INSERT INTO `lscf_system_log` VALUES ('9', '2017-05-12 14:00:27', 'system', '118.114.237.68', '四川省成都市', '1');
INSERT INTO `lscf_system_log` VALUES ('10', '2017-05-12 22:21:51', '游客', '117.136.88.147', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('11', '2017-05-12 22:22:01', '游客', '180.153.214.192', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('12', '2017-05-12 22:22:10', 'system', '117.136.88.147', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('13', '2017-05-12 22:44:07', '游客', '222.87.3.183', '贵州省黔东南州凯里市', '0');
INSERT INTO `lscf_system_log` VALUES ('14', '2017-05-12 22:44:23', 'system', '222.87.3.183', '贵州省黔东南州凯里市', '1');
INSERT INTO `lscf_system_log` VALUES ('15', '2017-05-13 06:54:25', '游客', '222.87.3.183', '贵州省黔东南州凯里市', '0');
INSERT INTO `lscf_system_log` VALUES ('16', '2017-05-13 18:50:39', '游客', '123.12.193.230', '河南省三门峡市', '0');
INSERT INTO `lscf_system_log` VALUES ('17', '2017-05-13 18:50:49', '游客', '112.65.193.14', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('18', '2017-05-13 18:59:58', '游客', '101.245.1.103', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('19', '2017-05-13 19:00:14', 'system', '101.245.1.103', '上海市', '1');
INSERT INTO `lscf_system_log` VALUES ('20', '2017-05-14 10:49:14', '游客', '124.203.156.241', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('21', '2017-05-14 10:49:31', 'system', '124.203.156.241', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('22', '2017-05-14 14:27:23', '游客', '183.148.173.37', '浙江省台州市', '0');
INSERT INTO `lscf_system_log` VALUES ('23', '2017-05-14 14:27:28', 'system', '183.148.173.37', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('24', '2017-05-14 16:31:06', '游客', '180.130.2.214', '云南省大理州', '0');
INSERT INTO `lscf_system_log` VALUES ('25', '2017-05-14 16:31:23', 'system', '180.130.2.214', '云南省大理州', '1');
INSERT INTO `lscf_system_log` VALUES ('26', '2017-05-14 16:51:19', '游客', '183.148.173.37', '浙江省台州市', '0');
INSERT INTO `lscf_system_log` VALUES ('27', '2017-05-14 16:51:23', 'system', '183.148.173.37', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('28', '2017-05-15 01:02:34', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('29', '2017-05-15 01:02:34', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('30', '2017-05-15 01:02:38', 'admin', '218.28.170.218', '河南省郑州市', '-2');
INSERT INTO `lscf_system_log` VALUES ('31', '2017-05-15 01:02:43', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('32', '2017-05-15 01:02:49', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('33', '2017-05-15 01:02:57', 'system   ', '218.28.170.218', '河南省郑州市', '1');
INSERT INTO `lscf_system_log` VALUES ('34', '2017-05-15 01:07:51', '游客', '180.153.205.252', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('35', '2017-05-15 13:50:04', '游客', '58.216.152.4', '江苏省常州市', '0');
INSERT INTO `lscf_system_log` VALUES ('36', '2017-05-15 13:50:05', '游客', '58.216.152.4', '江苏省常州市', '0');
INSERT INTO `lscf_system_log` VALUES ('37', '2017-05-15 13:50:20', 'system', '58.216.152.4', '江苏省常州市', '1');
INSERT INTO `lscf_system_log` VALUES ('38', '2017-05-15 15:13:34', '游客', '117.61.3.91', '江苏省泰州市', '0');
INSERT INTO `lscf_system_log` VALUES ('39', '2017-05-15 15:13:44', 'system', '117.61.3.91', '江苏省泰州市', '1');
INSERT INTO `lscf_system_log` VALUES ('40', '2017-05-15 19:39:01', '游客', '101.17.144.83', '河北省唐山市', '0');
INSERT INTO `lscf_system_log` VALUES ('41', '2017-05-15 19:40:16', 'system', '101.17.144.83', '河北省唐山市', '1');
INSERT INTO `lscf_system_log` VALUES ('42', '2017-05-15 21:23:40', '游客', '220.162.111.20', '福建省龙岩市', '0');
INSERT INTO `lscf_system_log` VALUES ('43', '2017-05-15 21:23:52', 'system', '220.162.111.20', '福建省龙岩市', '1');
INSERT INTO `lscf_system_log` VALUES ('44', '2017-05-15 21:28:08', '游客', '111.206.36.11', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('45', '2017-05-15 21:34:14', '游客', '111.206.36.19', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('46', '2017-05-15 21:34:30', '游客', '111.206.36.146', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('47', '2017-05-15 21:34:35', '游客', '111.206.36.136', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('48', '2017-05-15 21:34:49', '游客', '111.206.36.146', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('49', '2017-05-15 21:35:55', '游客', '111.206.36.13', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('50', '2017-05-15 21:37:57', '游客', '111.206.36.11', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('51', '2017-05-15 21:39:06', '游客', '111.206.36.11', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('52', '2017-05-15 22:37:44', '游客', '111.206.36.11', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('53', '2017-05-15 22:53:19', '游客', '111.206.36.138', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('54', '2017-05-16 07:37:19', '游客', '111.206.36.136', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('55', '2017-05-16 08:50:51', '游客', '111.206.36.13', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('56', '2017-05-16 09:27:24', '游客', '1.197.87.233', '河南省周口市', '0');
INSERT INTO `lscf_system_log` VALUES ('57', '2017-05-16 09:27:46', 'system', '1.197.87.233', '河南省周口市', '1');
INSERT INTO `lscf_system_log` VALUES ('58', '2017-05-16 11:12:02', '游客', '1.192.243.76', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('59', '2017-05-16 11:12:12', 'system', '1.192.243.76', '河南省郑州市', '1');
INSERT INTO `lscf_system_log` VALUES ('60', '2017-05-16 12:29:38', '游客', '27.158.132.123', '福建省龙岩市', '0');
INSERT INTO `lscf_system_log` VALUES ('61', '2017-05-16 12:29:47', 'system', '27.158.132.123', '福建省龙岩市', '1');
INSERT INTO `lscf_system_log` VALUES ('62', '2017-05-16 12:37:26', '游客', '111.206.36.141', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('63', '2017-05-16 13:02:41', '游客', '111.206.36.15', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('64', '2017-05-16 13:11:04', '游客', '180.97.35.20', '江苏省苏州市', '0');
INSERT INTO `lscf_system_log` VALUES ('65', '2017-05-16 13:37:11', '游客', '111.206.36.137', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('66', '2017-05-16 19:12:39', '游客', '180.153.214.180', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('67', '2017-05-17 03:33:34', '游客', '111.206.36.14', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('68', '2017-05-17 11:47:03', '游客', '111.206.36.10', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('69', '2017-05-17 12:08:06', '游客', '106.186.21.113', '日本', '0');
INSERT INTO `lscf_system_log` VALUES ('70', '2017-05-17 12:08:14', 'system', '106.186.21.113', '日本', '1');
INSERT INTO `lscf_system_log` VALUES ('71', '2017-05-17 12:23:55', '游客', '111.206.36.135', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('72', '2017-05-17 12:31:23', '游客', '111.206.36.10', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('73', '2017-05-17 12:37:41', '游客', '111.206.36.17', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('74', '2017-05-17 17:49:57', '游客', '106.186.21.113', '日本', '0');
INSERT INTO `lscf_system_log` VALUES ('75', '2017-05-17 17:49:58', '游客', '106.186.21.113', '日本', '0');
INSERT INTO `lscf_system_log` VALUES ('76', '2017-05-17 21:21:02', '游客', '223.211.255.56', '广东省江门市', '0');
INSERT INTO `lscf_system_log` VALUES ('77', '2017-05-17 21:21:14', 'system', '223.211.255.56', '广东省江门市', '1');
INSERT INTO `lscf_system_log` VALUES ('78', '2017-05-18 05:20:58', '游客', '1.197.77.23', '河南省周口市', '0');
INSERT INTO `lscf_system_log` VALUES ('79', '2017-05-18 05:21:35', '游客', '1.197.77.23', '河南省周口市', '0');
INSERT INTO `lscf_system_log` VALUES ('80', '2017-05-18 05:21:51', '游客', '1.197.77.23', '河南省周口市', '0');
INSERT INTO `lscf_system_log` VALUES ('81', '2017-05-18 05:22:10', '游客', '1.197.77.23', '河南省周口市', '0');
INSERT INTO `lscf_system_log` VALUES ('82', '2017-05-18 05:22:18', 'admin', '1.197.77.23', '河南省周口市', '-2');
INSERT INTO `lscf_system_log` VALUES ('83', '2017-05-18 14:32:51', '游客', '49.89.53.20', '江苏省宿迁市', '0');
INSERT INTO `lscf_system_log` VALUES ('84', '2017-05-18 14:33:07', 'system', '49.89.53.20', '江苏省宿迁市', '1');
INSERT INTO `lscf_system_log` VALUES ('85', '2017-05-18 15:02:58', '游客', '115.201.109.68', '浙江省台州市', '0');
INSERT INTO `lscf_system_log` VALUES ('86', '2017-05-18 15:03:10', 'system', '115.201.109.68', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('87', '2017-05-18 15:03:45', 'system', '115.201.109.68', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('88', '2017-05-18 17:13:02', '游客', '115.164.60.176', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('89', '2017-05-18 17:13:25', 'system ', '115.164.60.176', '马来西亚', '1');
INSERT INTO `lscf_system_log` VALUES ('90', '2017-05-18 20:52:29', '游客', '222.79.216.205', '福建省泉州市', '0');
INSERT INTO `lscf_system_log` VALUES ('91', '2017-05-18 20:52:39', '游客', '117.185.27.113', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('92', '2017-05-18 21:02:47', '游客', '223.104.131.214', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('93', '2017-05-18 22:18:01', '游客', '223.104.131.214', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('94', '2017-05-18 22:18:10', '游客', '180.163.2.119', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('95', '2017-05-18 22:18:33', 'syste m', '223.104.131.214', '中国', '-2');
INSERT INTO `lscf_system_log` VALUES ('96', '2017-05-18 22:18:48', 'system', '223.104.131.214', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('97', '2017-05-19 12:16:44', '游客', '111.206.36.9', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('98', '2017-05-19 14:36:29', '游客', '111.206.36.18', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('99', '2017-05-19 14:51:52', '游客', '220.176.52.72', '江西省赣州市', '0');
INSERT INTO `lscf_system_log` VALUES ('100', '2017-05-19 14:52:13', 'systes', '220.176.52.72', '江西省赣州市', '-2');
INSERT INTO `lscf_system_log` VALUES ('101', '2017-05-19 14:52:27', 'system', '220.176.52.72', '江西省赣州市', '1');
INSERT INTO `lscf_system_log` VALUES ('102', '2017-05-19 15:08:42', '游客', '220.176.52.72', '江西省赣州市', '0');
INSERT INTO `lscf_system_log` VALUES ('103', '2017-05-19 15:08:46', 'system', '220.176.52.72', '江西省赣州市', '1');
INSERT INTO `lscf_system_log` VALUES ('104', '2017-05-19 19:35:06', '游客', '111.85.32.255', '贵州省贵阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('105', '2017-05-19 19:35:21', 'system', '111.85.32.255', '贵州省贵阳市', '1');
INSERT INTO `lscf_system_log` VALUES ('106', '2017-05-20 22:25:18', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('107', '2017-05-20 22:25:18', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('108', '2017-05-20 22:25:25', 'system', '218.28.170.218', '河南省郑州市', '1');
INSERT INTO `lscf_system_log` VALUES ('109', '2017-05-20 22:26:11', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('110', '2017-05-21 00:20:40', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('111', '2017-05-21 00:20:40', '游客', '218.28.170.218', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('112', '2017-05-21 00:20:47', 'system', '218.28.170.218', '河南省郑州市', '1');
INSERT INTO `lscf_system_log` VALUES ('113', '2017-05-21 11:35:39', '游客', '115.202.111.127', '浙江省台州市', '0');
INSERT INTO `lscf_system_log` VALUES ('114', '2017-05-21 11:35:51', 'system', '115.202.111.127', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('115', '2017-05-24 10:57:12', '游客', '36.57.146.61', '安徽省马鞍山市', '0');
INSERT INTO `lscf_system_log` VALUES ('116', '2017-05-24 10:57:23', 'system', '36.57.146.61', '安徽省马鞍山市', '1');
INSERT INTO `lscf_system_log` VALUES ('117', '2017-05-24 16:29:20', '游客', '36.99.92.168', '河南省', '0');
INSERT INTO `lscf_system_log` VALUES ('118', '2017-05-24 16:29:27', 'admin', '36.99.92.168', '河南省', '-2');
INSERT INTO `lscf_system_log` VALUES ('119', '2017-05-24 18:14:44', '游客', '117.36.145.1', '陕西省西安市', '0');
INSERT INTO `lscf_system_log` VALUES ('120', '2017-05-24 18:14:54', '游客', '180.153.211.172', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('121', '2017-05-24 18:15:04', 'system', '117.36.145.1', '陕西省西安市', '1');
INSERT INTO `lscf_system_log` VALUES ('122', '2017-05-24 21:01:37', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('123', '2017-05-24 21:01:57', 'system', '14.192.211.65', '马来西亚', '1');
INSERT INTO `lscf_system_log` VALUES ('124', '2017-05-25 01:21:45', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('125', '2017-05-25 01:22:02', 'system', '14.192.211.65', '马来西亚', '1');
INSERT INTO `lscf_system_log` VALUES ('126', '2017-05-25 09:16:23', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('127', '2017-05-25 09:16:24', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('128', '2017-05-25 22:52:02', '游客', '123.115.37.3', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('129', '2017-05-25 22:52:12', '游客', '101.226.66.193', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('130', '2017-05-25 22:52:16', 'system', '123.115.37.3', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('131', '2017-05-26 07:06:23', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('132', '2017-05-26 07:06:35', 'system', '14.192.211.65', '马来西亚', '1');
INSERT INTO `lscf_system_log` VALUES ('133', '2017-05-26 10:19:59', '游客', '14.192.211.65', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('134', '2017-05-26 13:23:45', '游客', '223.104.169.150', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('135', '2017-05-26 13:23:55', '游客', '180.153.214.192', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('136', '2017-05-26 13:23:58', 'sysrem', '223.104.169.150', '中国', '-2');
INSERT INTO `lscf_system_log` VALUES ('137', '2017-05-26 13:24:14', '游客', '223.104.169.150', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('138', '2017-05-26 13:24:25', 'system', '223.104.169.150', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('139', '2017-05-27 01:02:58', '游客', '182.139.31.206', '四川省成都市', '0');
INSERT INTO `lscf_system_log` VALUES ('140', '2017-05-27 01:03:07', 'system', '182.139.31.206', '四川省成都市', '1');
INSERT INTO `lscf_system_log` VALUES ('141', '2017-05-27 10:22:51', '游客', '115.60.90.10', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('142', '2017-05-27 16:27:13', '游客', '42.56.248.137', '辽宁省', '0');
INSERT INTO `lscf_system_log` VALUES ('143', '2017-05-27 16:27:24', 'system', '42.56.248.137', '辽宁省', '1');
INSERT INTO `lscf_system_log` VALUES ('144', '2017-05-27 21:23:51', '游客', '14.192.210.145', '马来西亚', '0');
INSERT INTO `lscf_system_log` VALUES ('145', '2017-05-29 21:48:42', '游客', '120.7.27.44', '河北省廊坊市', '0');
INSERT INTO `lscf_system_log` VALUES ('146', '2017-05-29 21:48:49', 'system', '120.7.27.44', '河北省廊坊市', '1');
INSERT INTO `lscf_system_log` VALUES ('147', '2017-05-30 14:12:35', '游客', '223.73.100.88', '广东省阳江市', '0');
INSERT INTO `lscf_system_log` VALUES ('148', '2017-05-30 14:12:50', 'system', '223.73.100.88', '广东省阳江市', '1');
INSERT INTO `lscf_system_log` VALUES ('149', '2017-05-30 14:23:24', '游客', '223.88.128.107', '河南省濮阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('150', '2017-05-30 14:24:37', 'system', '223.88.128.107', '河南省濮阳市', '1');
INSERT INTO `lscf_system_log` VALUES ('151', '2017-05-30 15:47:03', '游客', '120.92.32.207', '福建省福州市', '0');
INSERT INTO `lscf_system_log` VALUES ('152', '2017-05-30 15:48:14', '游客', '120.92.32.207', '福建省福州市', '0');
INSERT INTO `lscf_system_log` VALUES ('153', '2017-05-30 18:16:17', '游客', '223.88.128.107', '河南省濮阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('154', '2017-05-30 18:16:17', '游客', '223.88.128.107', '河南省濮阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('155', '2017-05-30 18:17:19', 'admin', '223.88.128.107', '河南省濮阳市', '-2');
INSERT INTO `lscf_system_log` VALUES ('156', '2017-05-30 18:17:29', 'admin', '223.88.128.107', '河南省濮阳市', '-2');
INSERT INTO `lscf_system_log` VALUES ('157', '2017-05-30 18:18:01', 'system', '223.88.128.107', '河南省濮阳市', '1');
INSERT INTO `lscf_system_log` VALUES ('158', '2017-05-30 23:02:01', '游客', '60.12.66.38', '浙江省台州市', '0');
INSERT INTO `lscf_system_log` VALUES ('159', '2017-05-30 23:02:38', 'system', '60.12.66.38', '浙江省台州市', '1');
INSERT INTO `lscf_system_log` VALUES ('160', '2017-05-30 23:55:23', '游客', '180.109.68.206', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('161', '2017-05-30 23:55:46', 'system', '180.109.68.206', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('162', '2017-05-31 12:28:07', '游客', '183.95.44.138', '湖北省襄阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('163', '2017-05-31 12:28:17', '游客', '101.226.33.239', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('164', '2017-05-31 12:29:06', 'system', '183.95.44.138', '湖北省襄阳市', '1');
INSERT INTO `lscf_system_log` VALUES ('165', '2017-05-31 16:10:03', '游客', '180.109.68.206', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('166', '2017-05-31 16:10:10', 'system', '180.109.68.206', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('167', '2017-06-01 02:35:33', '游客', '117.148.194.1', '浙江省丽水市', '0');
INSERT INTO `lscf_system_log` VALUES ('168', '2017-06-01 02:35:47', 'system', '117.148.194.1', '浙江省丽水市', '1');
INSERT INTO `lscf_system_log` VALUES ('169', '2017-06-02 17:19:04', '游客', '183.226.133.191', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('170', '2017-06-02 17:19:13', 'system', '183.226.133.191', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('171', '2017-06-03 02:39:48', '游客', '180.102.218.232', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('172', '2017-06-03 02:41:32', 'system', '180.102.218.232', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('173', '2017-06-04 03:19:52', '游客', '180.102.221.31', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('174', '2017-06-04 03:20:00', 'system', '180.102.221.31', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('175', '2017-06-04 04:36:28', '游客', '180.102.221.31', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('176', '2017-06-04 04:36:30', 'system', '180.102.221.31', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('177', '2017-06-04 11:38:00', '游客', '106.43.103.241', '湖南省', '0');
INSERT INTO `lscf_system_log` VALUES ('178', '2017-06-04 11:38:19', '游客', '106.43.103.241', '湖南省', '0');
INSERT INTO `lscf_system_log` VALUES ('179', '2017-06-04 11:38:27', 'system ', '106.43.103.241', '湖南省', '1');
INSERT INTO `lscf_system_log` VALUES ('180', '2017-06-04 11:53:04', '游客', '101.226.99.197', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('181', '2017-06-04 11:54:54', 'system', '106.43.103.241', '湖南省', '-1');
INSERT INTO `lscf_system_log` VALUES ('182', '2017-06-05 12:58:34', '游客', '101.247.210.30', '广东省东莞市', '0');
INSERT INTO `lscf_system_log` VALUES ('183', '2017-06-05 12:58:57', 'system', '101.247.210.30', '广东省东莞市', '1');
INSERT INTO `lscf_system_log` VALUES ('184', '2017-06-05 18:33:51', '游客', '106.226.92.149', '江西省', '0');
INSERT INTO `lscf_system_log` VALUES ('185', '2017-06-05 18:34:06', 'system', '106.226.90.182', '江西省', '1');
INSERT INTO `lscf_system_log` VALUES ('186', '2017-06-06 18:30:09', '游客', '112.193.234.40', '四川省成都市', '0');
INSERT INTO `lscf_system_log` VALUES ('187', '2017-06-06 18:30:25', 'system', '112.193.234.40', '四川省成都市', '1');
INSERT INTO `lscf_system_log` VALUES ('188', '2017-06-07 00:31:06', '游客', '180.102.214.243', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('189', '2017-06-07 00:31:16', 'System', '180.102.214.243', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('190', '2017-06-07 01:51:47', '游客', '180.102.213.130', '江苏省南京市', '0');
INSERT INTO `lscf_system_log` VALUES ('191', '2017-06-07 01:51:49', 'System', '180.102.213.130', '江苏省南京市', '1');
INSERT INTO `lscf_system_log` VALUES ('192', '2017-06-07 08:48:04', '游客', '59.46.56.18', '辽宁省沈阳市', '0');
INSERT INTO `lscf_system_log` VALUES ('193', '2017-06-07 08:48:14', '游客', '101.226.33.204', '上海市', '0');
INSERT INTO `lscf_system_log` VALUES ('194', '2017-06-07 08:48:21', 'system', '59.46.56.18', '辽宁省沈阳市', '1');
INSERT INTO `lscf_system_log` VALUES ('195', '2017-06-07 10:02:58', '游客', '210.75.240.11', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('196', '2017-06-07 13:38:31', '游客', '117.75.58.192', '云南省昆明市', '0');
INSERT INTO `lscf_system_log` VALUES ('197', '2017-06-07 13:38:36', 'system', '117.75.58.192', '云南省昆明市', '1');
INSERT INTO `lscf_system_log` VALUES ('198', '2019-01-04 10:53:49', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('199', '2019-01-04 10:53:54', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('200', '2019-01-04 11:09:57', '游客', '119.189.105.199', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('201', '2019-01-04 11:10:15', '游客', '119.189.105.199', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('202', '2019-01-04 11:10:27', 'system', '119.189.105.199', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('203', '2019-01-04 14:26:54', '游客', '119.189.105.199', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('204', '2019-01-04 14:27:04', 'system', '119.189.105.199', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('205', '2019-01-04 16:07:03', '游客', '119.189.105.199', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('206', '2019-01-04 16:07:15', 'system', '119.189.105.199', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('207', '2019-01-04 22:21:01', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('208', '2019-01-04 22:21:12', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('209', '2019-01-04 22:29:07', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('210', '2019-01-04 22:29:10', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('211', '2019-01-05 10:08:13', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('212', '2019-01-05 10:08:17', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('213', '2019-01-05 20:37:16', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('214', '2019-01-05 20:37:20', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('215', '2019-01-05 20:54:08', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('216', '2019-01-05 20:54:12', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('217', '2019-01-05 21:24:15', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('218', '2019-01-05 21:24:18', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('219', '2019-01-06 12:46:38', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('220', '2019-01-06 12:46:41', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('221', '2019-01-06 12:49:50', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('222', '2019-01-06 12:49:53', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('223', '2019-01-06 13:27:21', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('224', '2019-01-06 13:27:25', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('225', '2019-01-06 14:14:21', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('226', '2019-01-06 14:14:24', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('227', '2019-01-06 14:44:02', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('228', '2019-01-06 14:44:04', 'dbaby', '175.188.162.66', '北京市', '-2');
INSERT INTO `lscf_system_log` VALUES ('229', '2019-01-06 14:44:10', 'dbaby', '175.188.162.66', '北京市', '-2');
INSERT INTO `lscf_system_log` VALUES ('230', '2019-01-06 14:44:18', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('231', '2019-01-06 19:52:35', '游客', '175.188.162.66', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('232', '2019-01-06 19:52:39', 'system', '175.188.162.66', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('233', '2019-01-06 21:24:39', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('234', '2019-01-06 21:24:43', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('235', '2019-01-06 21:27:29', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('236', '2019-01-06 21:27:33', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('237', '2019-01-07 08:46:47', '游客', '119.189.109.222', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('238', '2019-01-07 08:47:04', 'system', '119.189.109.222', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('239', '2019-01-07 08:47:08', '游客', '42.236.10.75', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('240', '2019-01-07 10:28:07', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('241', '2019-01-07 10:28:10', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('242', '2019-01-07 11:42:25', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('243', '2019-01-07 11:42:29', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('244', '2019-01-07 13:52:10', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('245', '2019-01-07 13:52:13', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('246', '2019-01-07 14:26:20', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('247', '2019-01-07 14:26:24', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('248', '2019-01-07 14:28:32', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('249', '2019-01-07 14:28:35', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('250', '2019-01-07 14:31:51', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('251', '2019-01-07 14:31:55', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('252', '2019-01-07 14:33:36', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('253', '2019-01-07 14:34:11', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('254', '2019-01-07 14:34:15', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('255', '2019-01-11 12:16:31', '游客', '112.239.234.155', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('256', '2019-01-11 12:17:11', '游客', '42.236.10.84', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('257', '2019-01-11 12:17:13', '游客', '112.239.234.155', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('258', '2019-01-11 12:17:33', 'system', '112.239.234.155', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('259', '2019-01-12 21:06:44', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('260', '2019-01-12 21:06:48', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('261', '2019-01-12 21:23:35', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('262', '2019-01-14 22:28:59', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('263', '2019-01-14 22:29:03', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('264', '2019-01-14 22:32:54', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('265', '2019-01-14 22:33:01', '9999', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('266', '2019-01-14 22:41:43', '游客', '175.188.162.84', '北京市', '0');
INSERT INTO `lscf_system_log` VALUES ('267', '2019-01-14 22:41:47', 'system', '175.188.162.84', '北京市', '1');
INSERT INTO `lscf_system_log` VALUES ('268', '2019-01-15 21:10:01', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('269', '2019-01-15 21:10:05', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('270', '2019-01-15 21:41:20', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('271', '2019-01-15 21:41:26', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('272', '2019-01-15 21:43:47', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('273', '2019-01-15 21:43:50', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('274', '2019-01-17 13:25:45', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('275', '2019-01-17 13:25:49', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('276', '2019-01-17 13:27:43', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('277', '2019-01-17 13:27:46', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('278', '2019-01-17 15:18:46', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('279', '2019-01-17 15:18:51', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('280', '2019-01-17 15:47:36', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('281', '2019-01-17 15:47:39', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('282', '2019-01-17 15:58:51', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('283', '2019-01-17 15:58:55', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('284', '2019-01-17 16:01:17', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('285', '2019-01-17 16:01:21', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('286', '2019-01-17 20:08:21', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('287', '2019-01-17 20:08:27', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('288', '2019-01-17 20:27:46', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('289', '2019-01-17 20:27:49', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('290', '2019-01-17 20:30:53', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('291', '2019-01-17 20:30:57', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('292', '2019-01-17 21:53:31', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('293', '2019-01-17 21:53:35', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('294', '2019-01-18 11:41:46', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('295', '2019-01-18 11:41:51', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('296', '2019-01-18 12:41:01', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('297', '2019-01-18 12:41:08', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('298', '2019-01-18 13:03:21', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('299', '2019-01-18 13:03:25', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('300', '2019-01-18 19:30:31', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('301', '2019-01-18 19:30:37', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('302', '2019-01-18 20:48:58', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('303', '2019-01-18 20:48:59', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('304', '2019-01-18 20:49:02', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('305', '2019-01-18 21:31:11', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('306', '2019-01-18 21:31:15', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('307', '2019-01-18 21:42:50', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('308', '2019-01-18 21:42:53', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('309', '2019-01-18 21:53:14', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('310', '2019-01-18 21:53:18', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('311', '2019-01-18 22:16:14', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('312', '2019-01-18 22:16:18', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('313', '2019-01-19 09:07:14', '游客', '119.189.100.125', '山东省聊城市', '0');
INSERT INTO `lscf_system_log` VALUES ('314', '2019-01-19 09:07:17', '游客', '42.236.10.117', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('315', '2019-01-19 09:07:35', 'system', '119.189.100.125', '山东省聊城市', '1');
INSERT INTO `lscf_system_log` VALUES ('316', '2019-01-19 16:03:06', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('317', '2019-01-19 16:03:09', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('318', '2019-01-19 16:15:44', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('319', '2019-01-19 16:15:47', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('320', '2019-01-19 16:21:47', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('321', '2019-01-19 16:21:50', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('322', '2019-01-19 16:33:59', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('323', '2019-01-19 16:34:03', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('324', '2019-01-19 16:48:45', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('325', '2019-01-19 16:48:48', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('326', '2019-01-19 16:57:15', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('327', '2019-01-19 16:57:20', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('328', '2019-01-19 17:20:55', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('329', '2019-01-19 17:20:58', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('330', '2019-01-19 17:59:38', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('331', '2019-01-19 17:59:41', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('332', '2019-01-19 18:35:08', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('333', '2019-01-19 18:35:11', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('334', '2019-01-19 18:49:26', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('335', '2019-01-19 18:49:29', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('336', '2019-01-19 20:11:05', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('337', '2019-01-19 20:11:08', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('338', '2019-01-19 20:51:15', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('339', '2019-01-19 20:51:19', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('340', '2019-01-19 21:11:12', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('341', '2019-01-19 21:11:16', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('342', '2019-01-19 21:16:14', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('343', '2019-01-19 21:16:17', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('344', '2019-01-19 22:28:06', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('345', '2019-01-19 22:28:09', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('346', '2019-01-20 19:41:32', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('347', '2019-01-20 19:41:35', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('348', '2019-01-20 19:50:17', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('349', '2019-01-20 19:50:20', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('350', '2019-01-20 20:02:29', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('351', '2019-01-20 20:02:32', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('352', '2019-01-20 20:48:10', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('353', '2019-01-20 20:48:13', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('354', '2019-01-20 21:08:54', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('355', '2019-01-20 21:08:58', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('356', '2019-01-22 11:16:45', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('357', '2019-01-22 11:16:49', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('358', '2019-01-22 14:59:39', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('359', '2019-01-22 14:59:47', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('360', '2019-01-24 17:32:15', '游客', '39.70.239.65', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('361', '2019-01-24 17:32:21', '游客', '42.236.10.106', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('362', '2019-01-24 17:32:30', 'system', '39.70.239.65', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('363', '2019-01-24 17:36:24', '游客', '39.70.239.65', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('364', '2019-01-24 17:36:34', 'system', '39.70.239.65', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('365', '2019-01-25 13:54:29', '游客', '39.70.248.57', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('366', '2019-01-25 13:57:57', 'system', '39.70.248.57', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('367', '2019-01-25 15:50:28', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('368', '2019-01-25 15:50:32', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('369', '2019-01-25 16:52:58', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('370', '2019-01-25 16:53:01', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('371', '2019-01-25 19:39:34', '游客', '39.70.248.57', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('372', '2019-01-25 19:40:10', '游客', '39.70.248.57', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('373', '2019-01-25 19:40:14', '游客', '42.236.10.78', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('374', '2019-01-25 19:40:24', 'system', '39.70.248.57', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('375', '2019-01-26 08:44:47', '游客', '39.90.3.182', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('376', '2019-01-26 08:45:03', 'system', '39.90.3.182', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('377', '2019-01-26 10:08:34', '游客', '39.90.3.182', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('378', '2019-01-26 10:08:41', 'system', '39.90.3.182', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('379', '2019-01-26 22:14:02', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('380', '2019-01-26 22:14:06', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('381', '2019-01-26 23:13:12', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('382', '2019-01-26 23:13:16', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('383', '2019-01-26 23:20:08', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('384', '2019-01-26 23:20:11', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('385', '2019-01-28 09:21:38', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('386', '2019-01-28 09:21:51', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('387', '2019-01-28 09:22:30', '游客', '42.236.10.106', '河南省郑州市', '0');
INSERT INTO `lscf_system_log` VALUES ('388', '2019-01-28 09:55:46', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('389', '2019-01-28 09:56:10', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('390', '2019-01-28 10:34:11', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('391', '2019-01-28 10:34:22', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('392', '2019-01-28 11:02:25', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('393', '2019-01-28 11:02:29', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('394', '2019-01-28 11:19:07', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('395', '2019-01-28 11:19:11', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('396', '2019-01-28 11:49:09', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('397', '2019-01-28 11:49:13', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('398', '2019-01-28 11:55:18', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('399', '2019-01-28 11:55:21', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('400', '2019-01-28 12:12:12', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('401', '2019-01-28 12:12:15', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('402', '2019-01-28 12:33:41', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('403', '2019-01-28 12:33:48', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('404', '2019-01-28 17:07:56', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('405', '2019-01-28 17:08:11', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('406', '2019-01-28 17:27:40', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('407', '2019-01-28 17:27:43', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('408', '2019-01-28 17:35:17', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('409', '2019-01-28 17:35:25', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('410', '2019-01-28 18:29:43', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('411', '2019-01-28 18:29:47', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('412', '2019-01-28 19:05:26', '游客', '39.70.247.11', '山东省', '0');
INSERT INTO `lscf_system_log` VALUES ('413', '2019-01-28 19:05:40', 'system', '39.70.247.11', '山东省', '1');
INSERT INTO `lscf_system_log` VALUES ('414', '2019-01-28 22:16:54', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('415', '2019-01-28 22:16:59', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('416', '2019-01-29 10:42:36', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('417', '2019-01-29 10:42:39', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('418', '2019-01-29 10:46:15', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('419', '2019-01-29 10:46:20', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('420', '2019-01-29 10:50:37', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('421', '2019-01-29 10:50:40', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('422', '2019-01-29 22:02:18', '游客', '123.196.130.111', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('423', '2019-01-29 22:02:22', 'system', '123.196.130.111', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('424', '2019-02-13 11:36:52', '游客', '182.46.167.60', '山东省潍坊市', '0');
INSERT INTO `lscf_system_log` VALUES ('425', '2019-02-13 22:35:43', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('426', '2019-02-13 22:35:46', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('427', '2019-02-15 17:48:45', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('428', '2019-02-15 17:48:50', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('429', '2019-02-15 18:46:43', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('430', '2019-02-15 18:46:47', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('431', '2019-02-17 18:02:05', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('432', '2019-02-17 18:02:54', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('433', '2019-02-17 18:38:21', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('434', '2019-02-17 18:38:24', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('435', '2019-02-17 19:28:39', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('436', '2019-02-17 19:28:42', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('437', '2019-02-18 21:05:17', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('438', '2019-02-18 21:05:20', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('439', '2019-02-19 22:33:45', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('440', '2019-02-19 22:33:49', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('441', '2019-02-20 22:07:28', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('442', '2019-02-20 22:07:31', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('443', '2019-02-21 22:15:53', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('444', '2019-02-21 22:15:57', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('445', '2019-02-25 17:26:23', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('446', '2019-02-25 17:26:27', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('447', '2019-02-25 17:41:44', '游客', '123.196.130.115', '中国', '0');
INSERT INTO `lscf_system_log` VALUES ('448', '2019-02-25 17:41:46', 'system', '123.196.130.115', '中国', '1');
INSERT INTO `lscf_system_log` VALUES ('449', '2019-02-26 14:26:35', '游客', '123.196.130.115', '中国', '0');

-- ----------------------------
-- Table structure for `lscf_users`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users`;
CREATE TABLE `lscf_users` (
  `uId` int(9) NOT NULL AUTO_INCREMENT COMMENT '会员ID',
  `uUser` varchar(20) NOT NULL COMMENT '会员账号',
  `uName` varchar(16) NOT NULL COMMENT '会员姓名',
  `uTel` varchar(11) NOT NULL COMMENT '电话号码',
  `uWeixin` varchar(24) NOT NULL COMMENT '微信号',
  `uZhifubao` varchar(50) NOT NULL COMMENT '支付宝账户',
  `uSex` int(1) NOT NULL COMMENT '性别',
  `uEmail` varchar(50) NOT NULL COMMENT '电子邮箱',
  `uPwd` varchar(32) NOT NULL COMMENT '登陆密码',
  `uZfPwd` varchar(32) NOT NULL COMMENT '支付密码',
  `uSfId` varchar(18) NOT NULL COMMENT '身份证号码',
  `uTuiId` int(9) NOT NULL COMMENT '推荐人ID',
  `uSonUser` text COMMENT '推荐下线User（数组）',
  `uVip` int(1) NOT NULL DEFAULT '0' COMMENT '会员等级对应ID',
  `shangchengjifen` int(20) DEFAULT '0' COMMENT '商城积分',
  `tongbuqianbao` int(20) DEFAULT '0' COMMENT '同步钱包',
  `dongtaiqianbao` int(20) DEFAULT '0' COMMENT '动态钱包',
  `uBenjin` int(9) NOT NULL DEFAULT '0' COMMENT '会员投资本金',
  `uLixi` float NOT NULL DEFAULT '0' COMMENT '会员利息',
  `uNowLixi` float NOT NULL DEFAULT '0' COMMENT '当前的利息',
  `uPDLixi` float NOT NULL DEFAULT '0' COMMENT '排队期间的利息',
  `uPDLixiMax` float NOT NULL DEFAULT '0' COMMENT '排队期最大利息',
  `uJiangjin` float NOT NULL DEFAULT '0' COMMENT '会员奖金',
  `uState` int(1) NOT NULL DEFAULT '0' COMMENT '会员注册状态',
  `uTouziState` int(1) NOT NULL DEFAULT '0' COMMENT '投资状态',
  `uTouziNum` int(9) NOT NULL DEFAULT '0' COMMENT '投资次数',
  `uLock` int(1) NOT NULL DEFAULT '1' COMMENT '账户状态（1正常,0锁定,-1封号）',
  `uImages` varchar(250) DEFAULT NULL COMMENT '会员头像',
  `uLoginNum` int(9) NOT NULL DEFAULT '0' COMMENT '记录登陆次数',
  `uErrorPwdNum` int(9) NOT NULL DEFAULT '0' COMMENT '记录登错次数',
  `uZFErrorPwdNum` int(9) NOT NULL DEFAULT '0' COMMENT '记录支付密码输入错误次数',
  `uRegDate` varchar(26) NOT NULL COMMENT '注册时间',
  `uOnline` int(1) NOT NULL DEFAULT '0' COMMENT '在线状态',
  `uOnlineDate` datetime NOT NULL COMMENT '最后在线时间',
  `uQiandaoNum` int(6) NOT NULL DEFAULT '0' COMMENT '签到次数',
  `uMXInvisible` int(1) DEFAULT '1' COMMENT '会员投资明细是否隐身',
  `uMXInvisibleValid` int(1) NOT NULL DEFAULT '0' COMMENT '会员投资明细隐身是否生效',
  `paiDanBi` int(9) DEFAULT '0' COMMENT '排单币',
  `xingji` int(9) DEFAULT '0' COMMENT '星级',
  PRIMARY KEY (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_users
-- ----------------------------
INSERT INTO `lscf_users` VALUES ('1', 'admin', '创始人', '13888888888', 'cfadmin', 'cfadmin@sina.com', '2', 'cfadmin@126.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '530300199001010001', '1', 'xiaoniu|1234|guest|wu123|qiuhongyi|', '4', '0', '0', '0', '0', '0', '0', '0', '0', '164', '1', '0', '0', '1', '', '163', '0', '0', '2016-08-04 00:00:00', '0', '2019-02-15 17:53:50', '12', '1', '0', '0', '0');
INSERT INTO `lscf_users` VALUES ('2', 'xiaoniu', '小猫', '15887835889', '123456', '123456666', '1', '12354855885@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '530326199902021122', '1', '', '0', '0', '0', '0', '0', '90', '90', '27', '27', '57', '1', '1', '1', '-1', '', '3', '0', '0', '2017-05-10 17:23:06', '0', '2017-05-14 17:03:11', '1', '0', '1', '0', '0');
INSERT INTO `lscf_users` VALUES ('3', '1234', 'wr', '13211111111', '235', '456', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '13222222222222222', '1', '9999|', '2', '0', '50', '-50', '0', '30', '30', '0', '0', '163', '1', '0', '0', '1', '', '68', '0', '3', '2017-05-11 11:43:52', '0', '2019-02-20 21:56:04', '4', '1', '0', '10', '0');
INSERT INTO `lscf_users` VALUES ('36', 'wu36', '快快快', '18728440532', 'deft人头', '18637285', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '16137246456645467', '1', '', '0', '0', '0', '0', '0', '30', '30', '36', '63', '55', '1', '0', '0', '1', 'Uploads/Users/images/20190111/5c381f861aa31.jpg', '8', '0', '0', '2017-06-06 18:35:58', '0', '2019-01-11 12:49:35', '1', '1', '0', '4464', '44');
INSERT INTO `lscf_users` VALUES ('37', 'guest37', '123456', '18248664785', '123456', '852147', '1', '', 'fcea920f7412b5da7be0cf42b8c93759', 'e10adc3949ba59abbe56e057f20f883e', '612322198704012589', '1', '', '0', '0', '0', '0', '0', '30', '30', '0', '0', '50', '1', '1', '3', '1', '', '16', '0', '0', '2017-05-14 16:52:51', '0', '2019-02-17 19:40:20', '0', '1', '0', '44444', '49');
INSERT INTO `lscf_users` VALUES ('38', '9999', '觉悟', '18849066289', '111111111', '111111111', '1', '', 'fcea920f7412b5da7be0cf42b8c93759', 'e10adc3949ba59abbe56e057f20f883e', '11111111111111111', '3', 'frf888|frf8888|frf88888|', '4', '0', '0', '0', '0', '42', '42', '0', '0', '157.4', '1', '1', '4', '1', null, '93', '0', '4', '2019-01-06 19:49:23', '0', '2019-02-25 17:29:52', '3', '1', '0', '100', '7');
INSERT INTO `lscf_users` VALUES ('39', 'frf888', '觉一', '11111111111', '1111', '111', '1', '', 'fcea920f7412b5da7be0cf42b8c93759', 'e10adc3949ba59abbe56e057f20f883e', '111111111111111', '38', null, '0', '0', '0', '0', '0', '30', '30', '0', '0', '50', '1', '1', '1', '1', null, '29', '0', '0', '2019-01-18 21:11:35', '0', '2019-02-21 22:22:40', '0', '1', '0', '1000', '6');
INSERT INTO `lscf_users` VALUES ('40', 'frf8888', '觉二', '11111111110', '111', '111', '1', '', 'fcea920f7412b5da7be0cf42b8c93759', 'e10adc3949ba59abbe56e057f20f883e', '111111111111118', '38', 'qiuhongyang|y888|', '0', '90', '430', '-300', '0', '30', '30', '0', '0', '50', '1', '1', '2', '1', null, '39', '0', '0', '2019-01-18 21:14:52', '0', '2019-02-25 17:41:32', '0', '1', '0', '1000', '7');
INSERT INTO `lscf_users` VALUES ('41', 'qiuhongyang', '博商技术·', '15266853100', '123456', '12345678', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'c33367701511b4f6020ec61ded352059', '371522199206196530', '40', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '4', '1', null, '61', '0', '0', '2019-01-19 09:46:28', '1', '2019-02-26 14:26:50', '0', '1', '0', '948', '9');
INSERT INTO `lscf_users` VALUES ('42', 'qiuhongyi', '博商技术一', '15266853101', '1654', '1346546', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'c33367701511b4f6020ec61ded352059', '341252125421252125', '1', 'qiuhonger|', '0', '270', '30', '320', '0', '0', '0', '0', '0', '-30', '1', '1', '2', '1', null, '49', '0', '1', '2019-01-19 09:50:58', '0', '2019-02-18 21:02:10', '0', '1', '0', '970', '7');
INSERT INTO `lscf_users` VALUES ('43', 'frf88888', '觉三', '88888888888', '88888', '9999', '1', '', 'fcea920f7412b5da7be0cf42b8c93759', 'e10adc3949ba59abbe56e057f20f883e', '111111111111110', '38', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '4', '1', '1', '3', '1', null, '12', '0', '0', '2019-01-19 16:02:06', '0', '2019-01-19 22:27:30', '1', '1', '0', '100', '8');
INSERT INTO `lscf_users` VALUES ('44', 'qiuhonger', '邱洪二', '15266853102', '22222222', '2222222', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'c33367701511b4f6020ec61ded352059', '37152219920619652', '42', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '11', '1', null, '63', '0', '0', '2019-01-25 19:37:06', '0', '2019-02-25 17:29:22', '0', '1', '0', '9842', '18');
INSERT INTO `lscf_users` VALUES ('45', 'y888', '福功', '11111111115', '111', '1111', '1', '', '1e620d2e3f1907c8ac430f76b92c7880', 'c33367701511b4f6020ec61ded352059', '999999999999999999', '40', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', null, '0', '0', '0', '2019-02-25 17:40:57', '0', '0000-00-00 00:00:00', '0', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for `lscf_users_apply_regcode`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_apply_regcode`;
CREATE TABLE `lscf_users_apply_regcode` (
  `uarId` int(9) NOT NULL AUTO_INCREMENT COMMENT '会员申请注册码ID',
  `uarUid` int(9) NOT NULL COMMENT '申请注册码人ID',
  `uarDate` datetime NOT NULL COMMENT '申请时间',
  `uarPrice` int(9) NOT NULL COMMENT '当前注册码的售价',
  `uarPayPrice` int(9) NOT NULL COMMENT '支付的金额',
  `uarHuiPrice` int(9) NOT NULL DEFAULT '0' COMMENT '优惠的金额',
  `uarReturnPrice` int(9) NOT NULL DEFAULT '0' COMMENT '找回的金额',
  `uarFiles` varchar(300) NOT NULL COMMENT '支付截图',
  `uarState` int(1) NOT NULL DEFAULT '0' COMMENT '审核的结果',
  `uarZhifuUser` varchar(50) NOT NULL COMMENT '付款账户',
  `uarErrorNum` int(3) NOT NULL DEFAULT '0' COMMENT '虚假提交记录次数',
  `uarZhifuUserType` varchar(30) NOT NULL DEFAULT '支付宝' COMMENT '支付账户类型',
  `uarShouKuanUser` varchar(50) NOT NULL COMMENT '收款账户',
  `uarShouKuanUserType` varchar(30) NOT NULL DEFAULT '支付宝' COMMENT '收款账户类型',
  `uarCodeNum` int(3) NOT NULL DEFAULT '1' COMMENT '每次购买激活的个数',
  `uarCodeNumState` int(3) DEFAULT '0' COMMENT '发放手续费的次数',
  PRIMARY KEY (`uarId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_users_apply_regcode
-- ----------------------------
INSERT INTO `lscf_users_apply_regcode` VALUES ('1', '1', '2017-05-10 17:24:09', '200', '200', '0', '0', 'Uploads/Users/zhifucode/20170510/5912dc39a7e96.jpg', '1', 'cfadmin@sina.com', '0', '支付宝', 'web@sina.com', '支付宝', '1', '1');
INSERT INTO `lscf_users_apply_regcode` VALUES ('2', '1', '2017-05-11 11:44:51', '200', '200', '0', '0', 'Uploads/Users/zhifucode/20170511/5913de33c62f4.jpg', '1', 'cfadmin@sina.com', '0', '支付宝', 'web@sina.com', '支付宝', '1', '1');
INSERT INTO `lscf_users_apply_regcode` VALUES ('3', '1', '2017-05-14 11:02:08', '200', '200', '0', '0', 'Uploads/Users/zhifucode/20170514/5917c8b0082fa.png', '1', 'cfadmin@sina.com', '0', '支付宝', 'web@sina.com', '支付宝', '1', '1');
INSERT INTO `lscf_users_apply_regcode` VALUES ('4', '38', '2019-01-19 16:15:10', '100', '100', '0', '0', 'Uploads/Users/zhifucode/20190119/5c42dc8e0cb79.png', '1', '111111111', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '1', '1');

-- ----------------------------
-- Table structure for `lscf_users_invest`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_invest`;
CREATE TABLE `lscf_users_invest` (
  `uiId` int(9) NOT NULL AUTO_INCREMENT COMMENT '救援条目Id',
  `uiUid` int(9) NOT NULL COMMENT '救援人Id',
  `uiImages` varchar(260) DEFAULT NULL COMMENT '救援人截图证明',
  `uiUJiner` int(9) NOT NULL DEFAULT '0' COMMENT '救援金额',
  `uiDate` varchar(26) DEFAULT NULL COMMENT '提交时间',
  `uiState` int(1) NOT NULL DEFAULT '0' COMMENT '匹配状态',
  `uiStateDate` varchar(26) DEFAULT NULL COMMENT '审核成功时间',
  `uiZhifu` int(1) NOT NULL DEFAULT '0' COMMENT '支付状态',
  `uiZhifuDate` varchar(26) DEFAULT NULL COMMENT '支付提交时间',
  `uiSuccess` int(1) NOT NULL DEFAULT '0' COMMENT '救助是否成功',
  `uiSuccessDate` varchar(26) DEFAULT NULL COMMENT '打款成功的时间',
  `uiTouziEnd` int(1) NOT NULL DEFAULT '0' COMMENT '本轮投资是否到期',
  `uiTouziEndDate` varchar(26) DEFAULT NULL COMMENT '投资到期的时间',
  `uiunShenqing` int(1) NOT NULL DEFAULT '0' COMMENT '是否申请了被救助',
  `uiSQShenyuJiner` int(9) NOT NULL DEFAULT '0' COMMENT '能申请的申请后剩余金额',
  `uiEnd` int(1) NOT NULL DEFAULT '0' COMMENT '本轮是否已经结束，0为未结束1为结束',
  `uiBeijiuyuanUid` int(9) NOT NULL DEFAULT '0' COMMENT '接受救援人Id',
  `uiShow` int(1) NOT NULL DEFAULT '1' COMMENT '提供援助是否显示',
  `youXuanQu` int(1) DEFAULT '1' COMMENT '1随机区2优选区',
  PRIMARY KEY (`uiId`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_users_invest
-- ----------------------------
INSERT INTO `lscf_users_invest` VALUES ('96', '41', 'Uploads/Users/payimgs/20181226/5c232b4740137.png ', '1000', '2018-12-26 15:18:01', '1', '2018-12-26 15:18:15', '1', '2018-12-26 15:18:36', '1', '2018-12-26 15:18:53', '1', '2018-12-26 15:22:53', '1', '0', '1', '37', '1', '1');
INSERT INTO `lscf_users_invest` VALUES ('97', '44', 'Uploads/Users/payimgs/20190128/5c4eb9be3d9ac.png ', '1000', '2019-01-28 15:56:05', '1', '2019-01-28 15:57:01', '1', '2019-01-28 16:13:58', '1', '2019-01-28 16:17:49', '1', '2019-01-29 16:17:49', '0', '1000', '0', '41', '1', '1');
INSERT INTO `lscf_users_invest` VALUES ('98', '44', 'Uploads/Users/payimgs/20190217/5c693a9a47f8d.png ', '1000', '2019-01-28 15:57:30', '1', '2019-02-17 18:40:43', '1', '2019-02-17 18:43:20', '1', '2019-02-17 18:47:11', '1', '2019-02-18 18:47:11', '0', '1000', '0', '38', '1', '1');
INSERT INTO `lscf_users_invest` VALUES ('95', '41', 'Uploads/Users/payimgs/20181226/5c2327f75a5ec.jpg ', '1000', '2018-12-26 14:57:59', '1', '2018-12-26 15:02:23', '1', '2018-12-26 15:04:27', '1', '2018-12-26 15:05:08', '1', '2018-12-26 15:15:08', '1', '0', '1', '37', '1', '1');

-- ----------------------------
-- Table structure for `lscf_users_paidanbi_regcode`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_paidanbi_regcode`;
CREATE TABLE `lscf_users_paidanbi_regcode` (
  `uarId` int(9) NOT NULL AUTO_INCREMENT COMMENT '会员申请注册码ID',
  `uarUid` int(9) NOT NULL COMMENT '申请注册码人ID',
  `uarDate` datetime NOT NULL COMMENT '申请时间',
  `uarPrice` int(9) NOT NULL COMMENT '当前排单币的售价',
  `uarPayPrice` int(9) NOT NULL COMMENT '支付的金额',
  `uarHuiPrice` int(9) NOT NULL DEFAULT '0' COMMENT '优惠的金额',
  `uarReturnPrice` int(9) NOT NULL DEFAULT '0' COMMENT '找回的金额',
  `uarFiles` varchar(300) NOT NULL COMMENT '支付截图',
  `uarState` int(1) NOT NULL DEFAULT '0' COMMENT '审核的结果',
  `uarZhifuUser` varchar(50) NOT NULL COMMENT '付款账户',
  `uarErrorNum` int(3) NOT NULL DEFAULT '0' COMMENT '虚假提交记录次数',
  `uarZhifuUserType` varchar(30) NOT NULL DEFAULT '支付宝' COMMENT '支付账户类型',
  `uarShouKuanUser` varchar(50) NOT NULL COMMENT '收款账户',
  `uarShouKuanUserType` varchar(30) NOT NULL DEFAULT '支付宝' COMMENT '收款账户类型',
  `uarCodeNum` int(3) NOT NULL DEFAULT '1' COMMENT '每次购买排单币的个数',
  `uarCodeNumState` int(3) DEFAULT '0' COMMENT '发放排单币的次数',
  PRIMARY KEY (`uarId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_users_paidanbi_regcode
-- ----------------------------
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('1', '36', '2018-11-30 15:00:14', '1', '20', '0', '0', 'Uploads/Users/zhifucode/20181130/5c00dffedd352.png', '1', 'cccc333', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '20', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('2', '36', '2018-11-30 15:08:48', '1', '30', '0', '0', 'Uploads/Users/zhifucode/20181130/5c00e2000460a.jpg', '1', 'cccc333', '1', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '30', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('3', '37', '2018-11-30 15:20:49', '1', '60', '0', '0', 'Uploads/Users/zhifucode/20181130/5c00e4d1ca0b8.jpg', '1', 'dddd4d4d4d4d4', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '60', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('4', '37', '2018-11-30 16:57:42', '1', '2', '0', '0', 'Uploads/Users/zhifucode/20181130/5c00fb86ea0d5.jpg', '1', 'dddd4d4d4d4d4', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '2', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('5', '37', '2018-11-30 17:20:33', '1', '8', '0', '0', 'Uploads/Users/zhifucode/20181130/5c0100e1ba224.jpg', '1', 'dddd4d4d4d4d4', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '8', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('6', '36', '2019-01-04 17:21:57', '100', '2000', '0', '0', 'Uploads/Users/zhifucode/20190104/5c2f25b584f19.jpg', '1', '18637285', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '20', '1');
INSERT INTO `lscf_users_paidanbi_regcode` VALUES ('7', '43', '2019-01-19 16:33:48', '1', '100', '0', '0', 'Uploads/Users/zhifucode/20190119/5c42e0ec0df00.png', '1', '9999', '0', '支付宝', '手续费统一200，请找推荐人申请', '支付宝', '100', '1');

-- ----------------------------
-- Table structure for `lscf_users_parameters`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_parameters`;
CREATE TABLE `lscf_users_parameters` (
  `upId` int(1) NOT NULL AUTO_INCREMENT COMMENT '会员参数ID',
  `upPDLXONorOFF` int(1) NOT NULL DEFAULT '1' COMMENT '排队利息开关',
  `upPDLXDay` int(5) NOT NULL DEFAULT '3' COMMENT '排队计息天数',
  `upTZMultiples` int(8) NOT NULL COMMENT '会员投资的倍数',
  `upMaxMoney` int(8) NOT NULL COMMENT '会员最多投资金额',
  `upLXType` int(1) NOT NULL COMMENT '利息选择的模式(1固定，0浮动)',
  `upLixiAllOrDay` int(1) NOT NULL DEFAULT '2' COMMENT '利息每天发放OR一次发放（1是一次发放，2是每天发放）',
  `upGuDingLX` float NOT NULL COMMENT '固定的利息',
  `upBJMultiples` int(8) NOT NULL COMMENT '本金提现倍数',
  `upLXMultiples` int(8) NOT NULL COMMENT '利息提现倍数',
  `upJJMultiples` int(8) NOT NULL COMMENT '奖金提现倍数',
  `upTXSXMoney` varchar(20) NOT NULL COMMENT '提现手续费',
  `upPaymentPeriod` int(8) NOT NULL COMMENT '付款期限（小时）',
  `upCollectionPeriod` int(8) NOT NULL COMMENT '确认收款期限（小时）',
  `upTermOfInvestment` int(8) NOT NULL COMMENT '投资期限（天）',
  `upRepeatInvestment` int(1) NOT NULL COMMENT '是否重复投资解冻',
  `upReact` int(1) NOT NULL COMMENT '是否允许反复投资',
  `upRegCodeState` int(1) NOT NULL COMMENT '是否开启注册码注册',
  `paiRegCodePrice` int(8) NOT NULL COMMENT '排单币单个售价（元）',
  `upRegCodePrice` int(8) NOT NULL COMMENT '注册码售价（单位元）',
  `upTypeInvestment` int(1) NOT NULL COMMENT '投资金额类型',
  `upRegJiangjin` int(11) NOT NULL DEFAULT '0' COMMENT '注册激活后送奖金',
  `upRegLixi` int(9) NOT NULL DEFAULT '0' COMMENT '激活赠送利息',
  `upShowITgnum` int(9) NOT NULL DEFAULT '5' COMMENT '会员首页提供援助显示天数',
  `upShowIJsnum` int(9) NOT NULL DEFAULT '5' COMMENT '会员首页接受援助显示天数',
  `upQiandaoONOFF` int(1) NOT NULL DEFAULT '1' COMMENT '签到开关',
  `upQiandaoJiangMin` int(6) NOT NULL DEFAULT '5' COMMENT '签到最小奖',
  `upQiandaoJiangMax` int(6) NOT NULL DEFAULT '50' COMMENT '签到最大奖',
  `upRegCodeNum` int(2) NOT NULL DEFAULT '1' COMMENT '每次最多允许购买注册码个数',
  `paiduoshaoyuan` int(11) NOT NULL DEFAULT '0' COMMENT '每排多少元',
  `xiaohaopaidanbi` int(9) NOT NULL DEFAULT '0' COMMENT '消耗排单币',
  `zixuanquSOUSHUOnub` int(9) NOT NULL DEFAULT '0' COMMENT '自选区每天搜索次数(次)',
  `dongtaib` int(5) NOT NULL DEFAULT '0' COMMENT '其中动态收益%',
  `shopjifenb` int(5) NOT NULL DEFAULT '0' COMMENT '其中商城积分%',
  `tongzuidi` int(8) NOT NULL DEFAULT '0' COMMENT '同步钱包提现最低额度',
  PRIMARY KEY (`upId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员参数设置表';

-- ----------------------------
-- Records of lscf_users_parameters
-- ----------------------------
INSERT INTO `lscf_users_parameters` VALUES ('1', '0', '1', '500', '300000', '1', '2', '0.15', '100', '500', '500', '0', '3', '3', '1', '0', '1', '1', '1', '100', '0', '0', '0', '3', '3', '1', '2', '10', '1', '1000', '10', '100', '5', '3', '500');

-- ----------------------------
-- Table structure for `lscf_users_touzidata`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_touzidata`;
CREATE TABLE `lscf_users_touzidata` (
  `utId` int(6) NOT NULL AUTO_INCREMENT COMMENT '投资参数ID',
  `utBenJin` int(9) NOT NULL COMMENT '投资的本金',
  `utJBLixi` varchar(20) NOT NULL COMMENT '基本利息',
  `utState` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`utId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_users_touzidata
-- ----------------------------
INSERT INTO `lscf_users_touzidata` VALUES ('1', '500', '0.001', '1');
INSERT INTO `lscf_users_touzidata` VALUES ('2', '1000', '0.002', '1');
INSERT INTO `lscf_users_touzidata` VALUES ('3', '2000', '0.003', '1');
INSERT INTO `lscf_users_touzidata` VALUES ('4', '4000', '0.005', '1');
INSERT INTO `lscf_users_touzidata` VALUES ('5', '8000', '0.008', '1');

-- ----------------------------
-- Table structure for `lscf_users_uninvest`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_users_uninvest`;
CREATE TABLE `lscf_users_uninvest` (
  `uuniId` int(9) NOT NULL AUTO_INCREMENT COMMENT '被救援记录ID',
  `uuniUid` int(9) DEFAULT NULL COMMENT '被救援用户ID',
  `uuniImages` varchar(250) DEFAULT NULL COMMENT '确认收款截图',
  `uuniJiner` int(9) DEFAULT NULL COMMENT '收款金额',
  `uuniDate` varchar(26) DEFAULT NULL COMMENT '申请被救援时间',
  `uuniState` int(1) NOT NULL DEFAULT '0' COMMENT '被救援匹配状态',
  `uuniSuccess` int(1) NOT NULL DEFAULT '0' COMMENT '是否救援成功',
  `uuniJiuyuanUid` int(9) DEFAULT NULL COMMENT '救援人ID',
  `uuniStateDate` varchar(26) DEFAULT NULL COMMENT '匹配成功时间',
  `uuniPay` int(1) NOT NULL DEFAULT '0' COMMENT '对方付款状态',
  `uuniPayDate` varchar(26) DEFAULT NULL COMMENT '对方付款时间',
  `uuniSuccessDate` varchar(26) DEFAULT NULL COMMENT '确认收款时间',
  `uuniEnd` int(1) NOT NULL DEFAULT '0' COMMENT '整个项目是否彻底结束',
  `uunYuanzhuType` int(1) NOT NULL DEFAULT '0' COMMENT '提供援助与提现的类型',
  `uuniShow` int(1) NOT NULL DEFAULT '1' COMMENT '接受援助是否显示',
  `zixuanbiaoji` int(1) DEFAULT NULL COMMENT '自选区标记',
  PRIMARY KEY (`uuniId`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='被救援数据表';

-- ----------------------------
-- Records of lscf_users_uninvest
-- ----------------------------
INSERT INTO `lscf_users_uninvest` VALUES ('50', '41', '8', '1000', '2019-01-28 15:55:50', '1', '1', '44', '2019-01-28 15:57:01', '1', '2019-01-28 16:13:58', '2019-01-28 16:17:49', '1', '0', '1', null);
INSERT INTO `lscf_users_uninvest` VALUES ('51', '41', null, '1000', '2019-01-28 15:57:44', '0', '0', '0', '0000-00-00 00:00:00', '0', null, null, '0', '0', '1', null);
INSERT INTO `lscf_users_uninvest` VALUES ('52', '38', '8', '1000', '2019-02-17 18:38:53', '1', '1', '44', '2019-02-17 18:40:43', '1', '2019-02-17 18:43:20', '2019-02-17 18:47:11', '1', '0', '1', '2');

-- ----------------------------
-- Table structure for `lscf_zccf_datainfo`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_zccf_datainfo`;
CREATE TABLE `lscf_zccf_datainfo` (
  `zdId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传网站数据配置Id',
  `zdRegPeople` int(10) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟人数（0为真实人数）',
  `zdYuanzhuJiner` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟援助金额',
  `zdTixianJiner` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟提现金额',
  `zdTZNum` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟投资次数',
  `zdJiangjin` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟奖金金额',
  `zdLixi` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟利息金额',
  `zdTxNum` int(12) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟提现次数',
  `zdOnlineNumMin` int(9) NOT NULL DEFAULT '0' COMMENT '宣传网站数据配置虚拟在线人数最小值',
  `zdOnlineNumMax` int(12) NOT NULL DEFAULT '100' COMMENT '宣传网站数据配置虚拟在线最大值',
  PRIMARY KEY (`zdId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_zccf_datainfo
-- ----------------------------
INSERT INTO `lscf_zccf_datainfo` VALUES ('1', '100', '200', '100', '200', '300', '400', '500', '10', '200');

-- ----------------------------
-- Table structure for `lscf_zccf_focusmap`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_zccf_focusmap`;
CREATE TABLE `lscf_zccf_focusmap` (
  `zfId` int(5) NOT NULL AUTO_INCREMENT COMMENT '焦点图ID',
  `zfNum` int(5) NOT NULL COMMENT '焦点图排序',
  `zfTitle` varchar(100) NOT NULL COMMENT '焦点图标题',
  `zfColor` varchar(7) NOT NULL COMMENT '焦点图背景颜色',
  `zfImages` varchar(300) NOT NULL COMMENT '焦点图图片',
  `zfUrl` varchar(300) NOT NULL COMMENT '焦点图路径',
  `zfOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '焦点图是否显示',
  PRIMARY KEY (`zfId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_zccf_focusmap
-- ----------------------------
INSERT INTO `lscf_zccf_focusmap` VALUES ('2', '1', '焦点图2', '#000523', 'Uploads/Focusmap/20160820/57b7b4f1d6259.png', '#', '0');
INSERT INTO `lscf_zccf_focusmap` VALUES ('3', '2', '焦点图3', '#05a4ff', 'Uploads/Focusmap/20160820/57b7b51f6588c.png', '#', '0');
INSERT INTO `lscf_zccf_focusmap` VALUES ('4', '3', '焦点图4', '#00dda7', 'Uploads/Focusmap/20160820/57b7b54d5da4f.png', '#', '0');
INSERT INTO `lscf_zccf_focusmap` VALUES ('5', '4', '焦点图5', '#f189db', 'Uploads/Focusmap/20160820/57b7b595367f1.png', '#', '1');
INSERT INTO `lscf_zccf_focusmap` VALUES ('6', '5', '焦点图6', '#bb9dff', 'Uploads/Focusmap/20160820/57b7b5eb85bf3.png', '#', '1');
INSERT INTO `lscf_zccf_focusmap` VALUES ('7', '6', '焦点图7', '#76cdde', 'Uploads/Focusmap/20160820/57b7b61b1cfb4.png', '#', '1');
INSERT INTO `lscf_zccf_focusmap` VALUES ('8', '7', '焦点图8', '#ff8dab', 'Uploads/Focusmap/20160820/57b7b642ba198.png', '#', '0');
INSERT INTO `lscf_zccf_focusmap` VALUES ('9', '88', '98', '#000000', 'Uploads/Focusmap/20170514/5917c741d09b0.png', '88', '1');

-- ----------------------------
-- Table structure for `lscf_zccf_info`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_zccf_info`;
CREATE TABLE `lscf_zccf_info` (
  `ziId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传页规则Id',
  `ziTitle` varchar(50) NOT NULL COMMENT '宣传页规则说明标题',
  `ziContent` text NOT NULL COMMENT '宣传页规则说明内容',
  PRIMARY KEY (`ziId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='宣传页规则说明';

-- ----------------------------
-- Records of lscf_zccf_info
-- ----------------------------
INSERT INTO `lscf_zccf_info` VALUES ('1', '平台规则', '<p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center\"><strong><span style=\"font-family: 宋体;color: rgb(255, 0, 0);font-size: 20px\">《众2创财富社区》</span></strong></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区没有华丽的包装,也没有恢弘的造势。这里不是赌徒的归宿，更不是投机者的天堂。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">背景实力可虚拟，情怀格局乃真谛！</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区以人人平等为宗旨，互助金融为依托，诚信玩家为纽带，以众创共赢财富为目的。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">不求名扬四海，只求能够在稳步中前行，真正的实现互帮互助，帮助每一位参与者都能获得一份稳定的收益。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">在众创财富互助社区人人平等，人人均富，唯一视玩家如兄弟姐妹的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不以慈善为幌子的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不虚构平台背景的平台。 &nbsp; </span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">每一位众创财富互助社区的参与者都会经过严格的筛选，确保所有会员诚实守信，再通过良好的口碑力量传播给更多的诚信会员参与其中。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">人性化的交易社区平台，全天候的平台信息，亲切高效率的服务。在保证每个参与会员资金安全的前提下，最大限度的指导客户盈利。</span></p><p style=\"margin-top: auto; margin-bottom: auto;\"><span style=\";font-family:宋体;color:rgb(255,0,0);font-size:16px\">互助模式的投资价值被大众认同，而互助模式的应用价值也被商家认可，越来越多的国家、商家认同互助的方式。互助模式是世界未来经济发展的大趋势，被列为财富第八波！</span></p>');

-- ----------------------------
-- Table structure for `lscf_zccf_lianxi`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_zccf_lianxi`;
CREATE TABLE `lscf_zccf_lianxi` (
  `zlId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传网站联系我们ID',
  `zlTitle` varchar(50) NOT NULL COMMENT '宣传网站联系我们标题',
  `zlContent` text NOT NULL COMMENT '宣传网站联系我们内容',
  PRIMARY KEY (`zlId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_zccf_lianxi
-- ----------------------------
INSERT INTO `lscf_zccf_lianxi` VALUES ('1', '联系我们', '');

-- ----------------------------
-- Table structure for `lscf_zccf_system`
-- ----------------------------
DROP TABLE IF EXISTS `lscf_zccf_system`;
CREATE TABLE `lscf_zccf_system` (
  `zsId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传系统配置ID',
  `zsWebName` varchar(40) NOT NULL COMMENT '宣传网站名称',
  `zsWebTitle` varchar(50) NOT NULL COMMENT '宣传网站标题',
  `zsWebOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '宣传网站开关',
  `zsWebRegOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '宣传网站会员注册功能',
  `zsWebLoginOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '宣传网站会员登陆功能',
  `zsWebOnOffInfo` text COMMENT '宣传网站关闭网站说明',
  `zsWebKeyWords` varchar(200) NOT NULL COMMENT '宣传网站关键词',
  `zsWebDescription` varchar(400) NOT NULL COMMENT '宣传网站描述',
  `zsTel` varchar(11) NOT NULL DEFAULT '0' COMMENT '宣传网站电话',
  `zsQQ` varchar(10) NOT NULL DEFAULT '0' COMMENT '宣传网站QQ',
  `zsWeixin` varchar(30) NOT NULL DEFAULT '0' COMMENT '宣传网站微信',
  `zsEmail` varchar(50) NOT NULL DEFAULT '0' COMMENT '宣传网站电子邮箱',
  PRIMARY KEY (`zsId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lscf_zccf_system
-- ----------------------------
INSERT INTO `lscf_zccf_system` VALUES ('1', '众创财富宣传网', '最赚钱的网站', '1', '1', '1', '网站关闭中，请稍后访问，敬请期待', '众创财富,财富平台,创富平台', '众创财富宣传网成立于2016年01月01日，截至目前用户已达到1500人', '13888888888', '200000000', '13888888888', '13888888888@139.com');
