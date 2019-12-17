/* This file is created by MySQLReback 2016-08-31 10:40:52 */
 /* 创建表结构 `lscf_admin` */
 DROP TABLE IF EXISTS `lscf_admin`;/* MySQLReback Separation */ CREATE TABLE `lscf_admin` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_admin` */
 INSERT INTO `lscf_admin` VALUES ('1','system','system','e10adc3949ba59abbe56e057f20f883e','15887835543','3090345345@qq.com','2','','0','1','1','0');/* MySQLReback Separation */
 /* 创建表结构 `lscf_announcement` */
 DROP TABLE IF EXISTS `lscf_announcement`;/* MySQLReback Separation */ CREATE TABLE `lscf_announcement` (
  `annId` int(8) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `annNum` varchar(14) NOT NULL DEFAULT '0' COMMENT '公告编号说明',
  `annDate` date DEFAULT NULL COMMENT '公告时间',
  `annTitle` varchar(50) NOT NULL COMMENT '公告标题',
  `annContent` text NOT NULL COMMENT '公告内容',
  `annShow` int(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`annId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lscf_books` */
 DROP TABLE IF EXISTS `lscf_books`;/* MySQLReback Separation */ CREATE TABLE `lscf_books` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lscf_info` */
 DROP TABLE IF EXISTS `lscf_info`;/* MySQLReback Separation */ CREATE TABLE `lscf_info` (
  `infoId` int(3) NOT NULL AUTO_INCREMENT COMMENT '系统简介ID',
  `infoTitle` varchar(200) NOT NULL COMMENT '系统简介标题',
  `infoDate` datetime NOT NULL COMMENT '系统简介时间',
  `infoContent` text NOT NULL COMMENT '系统简介内容',
  PRIMARY KEY (`infoId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_info` */
 INSERT INTO `lscf_info` VALUES ('1','系统平台简介','2016-07-20 00:00:00','<p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">关于平台</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 240); font-size: 14px;\">这是一个非常完美的平台<br/></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">想要知道怎么赚钱吗？</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\">那么我现在告诉你：只需要投资，就有利息，比银行存款还划算</span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"color: rgb(255, 0, 0);\">你还可以推荐朋友来玩，这个时候你的账户会升级</span></em><em><span style=\"color: rgb(255, 0, 0);\"></span></em><em><span style=\"color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"><br/></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">具体的等级有：123456789</span></em><em><span style=\"font-size: 18px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"><br/></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"font-size: 18px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\">都具备不同的利率</span></em></span><span style=\"font-size: 14px;\"><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em><em><span style=\"font-size: 24px; color: rgb(255, 0, 0);\"></span></em></span></p><p style=\"text-align: left;\"><span style=\"color: rgb(0, 176, 80); font-size: 14px;\"><br/></span></p>');/* MySQLReback Separation */
 /* 创建表结构 `lscf_money_log` */
 DROP TABLE IF EXISTS `lscf_money_log`;/* MySQLReback Separation */ CREATE TABLE `lscf_money_log` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lscf_mregcodes` */
 DROP TABLE IF EXISTS `lscf_mregcodes`;/* MySQLReback Separation */ CREATE TABLE `lscf_mregcodes` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_mregcodes` */
 INSERT INTO `lscf_mregcodes` VALUES ('1','PT3SGUgaNXvmB81i','1','2','2016-08-07 15:32:43','2016-08-07 15:32:57','200','0','200','1','1'),('2','1SHI9Ri2bfGrehFU','2','3','2016-08-07 15:35:59','2016-08-07 15:36:14','200','0','200','1','1'),('3','72wjMKdgzSPtWwAO','3','4','2016-08-07 15:38:35','2016-08-07 15:38:51','200','0','200','1','1'),('4','SfcBQbSHOUmqfvRF','4','5','2016-08-07 15:41:13','2016-08-07 15:41:35','200','0','200','1','1');/* MySQLReback Separation */
 /* 创建表结构 `lscf_reggrades` */
 DROP TABLE IF EXISTS `lscf_reggrades`;/* MySQLReback Separation */ CREATE TABLE `lscf_reggrades` (
  `rgId` int(8) NOT NULL AUTO_INCREMENT COMMENT '注册等级ID',
  `rgName` varchar(20) NOT NULL COMMENT '注册等级名称',
  `rgLixi` float NOT NULL COMMENT '注册等级对应利息',
  `rgTJJangjin` float NOT NULL COMMENT '注册等级推荐奖金',
  `rgTJPeople` int(9) NOT NULL COMMENT '升级本级别所需推广总人数',
  `rgSJNextPeople` int(8) NOT NULL COMMENT '升级下一级还需推广人数',
  `rgShengjiJiangjin` varchar(20) NOT NULL COMMENT '升级奖金',
  `rgShuifei` varchar(20) NOT NULL COMMENT '提现税费',
  PRIMARY KEY (`rgId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_reggrades` */
 INSERT INTO `lscf_reggrades` VALUES ('1','铁牌会员','0.001','0.001','1','1','0','0'),('2','铜牌会员','0.002','0.002','1','1','10','0'),('3','银牌会员','0.004','0.004','2','1','20','0'),('4','金牌会员','0.003','0.003','3','2','30','0'),('5','钻石会员','0.004','0.004','5','3','40','0'),('6','皇冠会员','0.005','0.005','8','4','50','0'),('7','金冠会员','0.006','0.006','12','0','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lscf_system` */
 DROP TABLE IF EXISTS `lscf_system`;/* MySQLReback Separation */ CREATE TABLE `lscf_system` (
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
  `sRegNum` int(4) NOT NULL DEFAULT '0' COMMENT '-2关闭注册，-1重复不限次数，0，不允许重复，否则大于0为重复次数',
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
  `sXuanchanMenu` int(1) NOT NULL DEFAULT '1' COMMENT '后台控制宣传菜单',
  PRIMARY KEY (`sId`),
  KEY `sId` (`sId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_system` */
 INSERT INTO `lscf_system` VALUES ('1','超级连锁创富系统','2016最新最赚钱的超级创富系统','http://mycf.nlipin.com','13800000000','10000000','10000000@qq.com','0','5','50','20','0','5','6','0','10000000','ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz','16','web@sina.com','平台客服','1','管理员正在维护中，具体开机时间请关注最新公告！','CF，Inc. All right reserved','Versions 2.3.6','-1','660','Uploads/Logo/20160722/57917ac69e62d.png','e10adc3949ba59abbe56e057f20f883e','1');/* MySQLReback Separation */
 /* 创建表结构 `lscf_system_log` */
 DROP TABLE IF EXISTS `lscf_system_log`;/* MySQLReback Separation */ CREATE TABLE `lscf_system_log` (
  `slogId` int(9) NOT NULL AUTO_INCREMENT COMMENT '系统日志ID',
  `slogTimes` datetime NOT NULL COMMENT '系统日志记录时间',
  `slogUsers` varchar(25) NOT NULL DEFAULT '游客' COMMENT '记录访问身份',
  `slogIp` varchar(22) DEFAULT NULL COMMENT '系统日志记录IP',
  `slogCity` varchar(50) NOT NULL DEFAULT '暂未获取' COMMENT '系统日志记录的城市',
  `slogAction` varchar(60) NOT NULL COMMENT '系统日志记录的行为',
  PRIMARY KEY (`slogId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lscf_users` */
 DROP TABLE IF EXISTS `lscf_users`;/* MySQLReback Separation */ CREATE TABLE `lscf_users` (
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
  `uBenjin` int(9) NOT NULL DEFAULT '0' COMMENT '会员投资本金',
  `uLixi` float NOT NULL DEFAULT '0' COMMENT '会员利息',
  `uNowLixi` float NOT NULL DEFAULT '0' COMMENT '当前的利息',
  `uPDLixi` float NOT NULL DEFAULT '0' COMMENT '排队期利息',
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
  `uOnlineDate` datetime NOT NULL COMMENT '会员最后在线时间',
  `uQiandaoNum` int(6) NOT NULL DEFAULT '0' COMMENT '会员签到次数',
  `uMXInvisible` int(1) NOT NULL DEFAULT '1' COMMENT '会员投资明细是否隐身',
  `uMXInvisibleValid` int(1) NOT NULL DEFAULT '0' COMMENT '设置隐身后是否本单是否有效',
  PRIMARY KEY (`uId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_users` */
 INSERT INTO `lscf_users` VALUES ('1','admin','创始人','13888888888','cfadmin','cfadmin@sina.com','2','cfadmin@126.com','e10adc3949ba59abbe56e057f20f883e','c33367701511b4f6020ec61ded352059','530300199001010001','1','zhangsan|','0','0','0','0','0','0','0','1','0','0','1','','3','0','0','2016-08-04 00:00:00','0','2016-08-31 09:50:13','0','0','0'),('2','zhangsan','张三','15887835881','zhangsan2016','zhangsan2016@163.com','1','zhangsan2016@qq.com','e10adc3949ba59abbe56e057f20f883e','c33367701511b4f6020ec61ded352059','530326199001012220','1','lisi|','0','0','30','30','0','0','50','1','0','0','1','','2','0','0','2016-08-07 15:31:56','0','2016-08-31 09:53:16','0','0','0'),('3','lisi','李四','15887835882','lisi2016','lisi2016@sina.com','2','lisi2016@163.com','e10adc3949ba59abbe56e057f20f883e','c33367701511b4f6020ec61ded352059','530326199108212222','2','wangwu|','0','0','30','30','0','0','50','1','0','0','1','','1','0','0','2016-08-07 15:35:25','0','2016-08-31 09:53:51','0','1','0'),('4','wangwu','王五','15887835883','wangwu','wangwu2016','1','wangwu2016@qq.com','e10adc3949ba59abbe56e057f20f883e','c33367701511b4f6020ec61ded352059','530326199108212224','3','zhaoliu|','0','0','30','30','0','0','50','1','0','0','1','','1','0','0','2016-08-07 15:38:03','0','0000-00-00 00:00:00','0','1','0'),('5','zhaoliu','赵六','15887835884','zhaoliu26','zhaoliu27','1','zhaoliu28@qq.com','e10adc3949ba59abbe56e057f20f883e','c33367701511b4f6020ec61ded352059','530326199108212226','4','','0','0','30','30','0','0','50','1','0','0','1','','1','0','0','2016-08-07 15:40:43','0','0000-00-00 00:00:00','0','1','0');/* MySQLReback Separation */
 /* 创建表结构 `lscf_users_apply_regcode` */
 DROP TABLE IF EXISTS `lscf_users_apply_regcode`;/* MySQLReback Separation */ CREATE TABLE `lscf_users_apply_regcode` (
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
  `uarCodeNumState` int(3) NOT NULL DEFAULT '0' COMMENT '发放手续费的次数',
  PRIMARY KEY (`uarId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_users_apply_regcode` */
 INSERT INTO `lscf_users_apply_regcode` VALUES ('1','1','2016-08-07 15:32:28','200','200','0','0','Uploads/Users/zhifucode/20160807/57a6e40c6a018.jpg','1','cfadmin@sina.com','0','支付宝','web@sina.com','支付宝','1','1'),('2','2','2016-08-07 15:35:40','200','200','0','0','Uploads/Users/zhifucode/20160807/57a6e4cca5550.jpg','1','zhangsan2016@163.com','0','支付宝','web@sina.com','支付宝','1','1'),('3','3','2016-08-07 15:38:20','200','200','0','0','Uploads/Users/zhifucode/20160807/57a6e56cf1bf8.jpg','1','lisi2016@sina.com','0','支付宝','web@sina.com','支付宝','1','1'),('4','4','2016-08-07 15:40:54','200','200','0','0','Uploads/Users/zhifucode/20160807/57a6e606b9988.jpg','1','wangwu2016','0','支付宝','web@sina.com','支付宝','1','1');/* MySQLReback Separation */
 /* 创建表结构 `lscf_users_invest` */
 DROP TABLE IF EXISTS `lscf_users_invest`;/* MySQLReback Separation */ CREATE TABLE `lscf_users_invest` (
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
  PRIMARY KEY (`uiId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lscf_users_parameters` */
 DROP TABLE IF EXISTS `lscf_users_parameters`;/* MySQLReback Separation */ CREATE TABLE `lscf_users_parameters` (
  `upId` int(1) NOT NULL AUTO_INCREMENT COMMENT '会员参数ID',
  `upPDLXONorOFF` int(1) NOT NULL DEFAULT '1' COMMENT '排队利息开关',
  `upPDLXDay` int(5) NOT NULL DEFAULT '3' COMMENT '排队计息天数',
  `upTZMultiples` int(8) NOT NULL COMMENT '会员投资的倍数',
  `upMaxMoney` int(8) NOT NULL COMMENT '会员最多投资金额',
  `upLXType` int(1) NOT NULL COMMENT '利息选择的模式(1固定，0浮动)',
  `upLixiAllOrDay` int(1) NOT NULL DEFAULT '2' COMMENT '利息每天发放OR一次发放（1是一次发放，2是每天发放）',
  `upGuDingLX` float NOT NULL COMMENT '固定的利息',
  `upLXMultiples` int(8) NOT NULL COMMENT '利息提现倍数',
  `upJJMultiples` int(8) NOT NULL COMMENT '奖金提现倍数',
  `upTXSXMoney` varchar(20) NOT NULL COMMENT '提现手续费',
  `upPaymentPeriod` int(8) NOT NULL COMMENT '付款期限（小时）',
  `upCollectionPeriod` int(8) NOT NULL COMMENT '确认收款期限（小时）',
  `upTermOfInvestment` int(8) NOT NULL COMMENT '投资期限（天）',
  `upRepeatInvestment` int(1) NOT NULL COMMENT '是否重复投资解冻',
  `upReact` int(1) NOT NULL COMMENT '是否允许反复投资',
  `upRegCodeState` int(1) NOT NULL COMMENT '是否开启注册码注册',
  `upRegCodePrice` int(8) NOT NULL COMMENT '注册码售价（单位元）',
  `upTypeInvestment` int(1) NOT NULL COMMENT '投资金额类型',
  `upRegJiangjin` int(11) NOT NULL DEFAULT '0' COMMENT '注册激活后送奖金',
  `upRegLixi` int(9) NOT NULL DEFAULT '0' COMMENT '激活赠送利息',
  `upShowITgnum` int(9) NOT NULL DEFAULT '5' COMMENT '会员首页提供援助显示天数',
  `upShowIJsnum` int(9) NOT NULL DEFAULT '5' COMMENT '会员首页接受援助显示天数',
  `upQiandaoONOFF` int(1) NOT NULL DEFAULT '1' COMMENT '签到开关',
  `upQiandaoJiangMin` int(8) NOT NULL DEFAULT '5' COMMENT '签到最小奖',
  `upQiandaoJiangMax` int(6) NOT NULL DEFAULT '50' COMMENT '签到最大奖',
  `upRegCodeNum` int(2) NOT NULL DEFAULT '1' COMMENT '每次最多允许购买注册码个数',
  PRIMARY KEY (`upId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员参数设置表';/* MySQLReback Separation */
 /* 插入数据 `lscf_users_parameters` */
 INSERT INTO `lscf_users_parameters` VALUES ('1','1','3','500','8000','1','2','0.002','500','500','0','12','6','7','1','1','1','200','0','50','30','3','3','1','5','50','1');/* MySQLReback Separation */
 /* 创建表结构 `lscf_users_touzidata` */
 DROP TABLE IF EXISTS `lscf_users_touzidata`;/* MySQLReback Separation */ CREATE TABLE `lscf_users_touzidata` (
  `utId` int(6) NOT NULL AUTO_INCREMENT COMMENT '投资参数ID',
  `utBenJin` int(9) NOT NULL COMMENT '投资的本金',
  `utJBLixi` varchar(20) NOT NULL COMMENT '基本利息',
  `utState` int(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`utId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_users_touzidata` */
 INSERT INTO `lscf_users_touzidata` VALUES ('1','500','0.001','1'),('2','1000','0.002','1'),('3','2000','0.003','1'),('4','4000','0.005','1'),('5','8000','0.008','1');/* MySQLReback Separation */
 /* 创建表结构 `lscf_users_uninvest` */
 DROP TABLE IF EXISTS `lscf_users_uninvest`;/* MySQLReback Separation */ CREATE TABLE `lscf_users_uninvest` (
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
  PRIMARY KEY (`uuniId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='被救援数据表';/* MySQLReback Separation */
 /* 创建表结构 `lscf_zccf_datainfo` */
 DROP TABLE IF EXISTS `lscf_zccf_datainfo`;/* MySQLReback Separation */ CREATE TABLE `lscf_zccf_datainfo` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_zccf_datainfo` */
 INSERT INTO `lscf_zccf_datainfo` VALUES ('1','100','200','100','200','300','400','500','10','200');/* MySQLReback Separation */
 /* 创建表结构 `lscf_zccf_focusmap` */
 DROP TABLE IF EXISTS `lscf_zccf_focusmap`;/* MySQLReback Separation */ CREATE TABLE `lscf_zccf_focusmap` (
  `zfId` int(5) NOT NULL AUTO_INCREMENT COMMENT '焦点图ID',
  `zfNum` int(5) NOT NULL COMMENT '焦点图排序',
  `zfTitle` varchar(100) NOT NULL COMMENT '焦点图标题',
  `zfColor` varchar(7) NOT NULL COMMENT '焦点图背景颜色',
  `zfImages` varchar(300) NOT NULL COMMENT '焦点图图片',
  `zfUrl` varchar(300) NOT NULL COMMENT '焦点图路径',
  `zfOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '焦点图是否显示',
  PRIMARY KEY (`zfId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_zccf_focusmap` */
 INSERT INTO `lscf_zccf_focusmap` VALUES ('1','0','焦点图1','#ffe600','Uploads/Focusmap/20160820/57b7b49bd4ecf.png','#','1'),('2','1','焦点图2','#000523','Uploads/Focusmap/20160820/57b7b4f1d6259.png','#','0'),('3','2','焦点图3','#05a4ff','Uploads/Focusmap/20160820/57b7b51f6588c.png','#','1'),('4','3','焦点图4','#00dda7','Uploads/Focusmap/20160820/57b7b54d5da4f.png','#','1'),('5','4','焦点图5','#f189db','Uploads/Focusmap/20160820/57b7b595367f1.png','#','1'),('6','5','焦点图6','#bb9dff','Uploads/Focusmap/20160820/57b7b5eb85bf3.png','#','1'),('7','6','焦点图7','#76cdde','Uploads/Focusmap/20160820/57b7b61b1cfb4.png','#','1'),('8','7','焦点图8','#ff8dab','Uploads/Focusmap/20160820/57b7b642ba198.png','#','0');/* MySQLReback Separation */
 /* 创建表结构 `lscf_zccf_info` */
 DROP TABLE IF EXISTS `lscf_zccf_info`;/* MySQLReback Separation */ CREATE TABLE `lscf_zccf_info` (
  `ziId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传页规则Id',
  `ziTitle` varchar(50) NOT NULL COMMENT '宣传页规则说明标题',
  `ziContent` text NOT NULL COMMENT '宣传页规则说明内容',
  PRIMARY KEY (`ziId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='宣传页规则说明';/* MySQLReback Separation */
 /* 插入数据 `lscf_zccf_info` */
 INSERT INTO `lscf_zccf_info` VALUES ('1','平台规则','<p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center\"><strong><span style=\"font-family: 宋体;color: rgb(255, 0, 0);font-size: 20px\">《众创财富社区》</span></strong></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区没有华丽的包装,也没有恢弘的造势。这里不是赌徒的归宿，更不是投机者的天堂。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">背景实力可虚拟，情怀格局乃真谛！</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区以人人平等为宗旨，互助金融为依托，诚信玩家为纽带，以众创共赢财富为目的。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">不求名扬四海，只求能够在稳步中前行，真正的实现互帮互助，帮助每一位参与者都能获得一份稳定的收益。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">在众创财富互助社区人人平等，人人均富，唯一视玩家如兄弟姐妹的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不以慈善为幌子的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不虚构平台背景的平台。 &nbsp; </span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">每一位众创财富互助社区的参与者都会经过严格的筛选，确保所有会员诚实守信，再通过良好的口碑力量传播给更多的诚信会员参与其中。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">人性化的交易社区平台，全天候的平台信息，亲切高效率的服务。在保证每个参与会员资金安全的前提下，最大限度的指导客户盈利。</span></p><p style=\"margin-top: auto; margin-bottom: auto;\"><span style=\";font-family:宋体;color:rgb(255,0,0);font-size:16px\">互助模式的投资价值被大众认同，而互助模式的应用价值也被商家认可，越来越多的国家、商家认同互助的方式。互助模式是世界未来经济发展的大趋势，被列为财富第八波！</span></p>');/* MySQLReback Separation */
 /* 创建表结构 `lscf_zccf_lianxi` */
 DROP TABLE IF EXISTS `lscf_zccf_lianxi`;/* MySQLReback Separation */ CREATE TABLE `lscf_zccf_lianxi` (
  `zlId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传网站联系我们ID',
  `zlTitle` varchar(50) NOT NULL COMMENT '宣传网站联系我们标题',
  `zlContent` text NOT NULL COMMENT '宣传网站联系我们内容',
  PRIMARY KEY (`zlId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_zccf_lianxi` */
 INSERT INTO `lscf_zccf_lianxi` VALUES ('1','联系我们','<p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center\"><strong><span style=\"font-family: 宋体;color: rgb(255, 0, 0);font-size: 20px\">《众创财富社区》</span></strong></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区没有华丽的包装,也没有恢弘的造势。这里不是赌徒的归宿，更不是投机者的天堂。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">背景实力可虚拟，情怀格局乃真谛！</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">众创财富互助社区以人人平等为宗旨，互助金融为依托，诚信玩家为纽带，以众创共赢财富为目的。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">不求名扬四海，只求能够在稳步中前行，真正的实现互帮互助，帮助每一位参与者都能获得一份稳定的收益。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">在众创财富互助社区人人平等，人人均富，唯一视玩家如兄弟姐妹的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不以慈善为幌子的平台。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">唯一不虚构平台背景的平台。 &nbsp; </span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">每一位众创财富互助社区的参与者都会经过严格的筛选，确保所有会员诚实守信，再通过良好的口碑力量传播给更多的诚信会员参与其中。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">人性化的交易社区平台，全天候的平台信息，亲切高效率的服务。在保证每个参与会员资金安全的前提下，最大限度的指导客户盈利。</span></p><p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto\"><span style=\";font-family:宋体;color:rgb(255,0,0);font-size:16px\">互助模式的投资价值被大众认同，而互助模式的应用价值也被商家认可，越来越多的国家、商家认同互助的方式。互助模式是世界未来经济发展的大趋势，被列为财富第八波！</span></p><p><span style=\";font-family:宋体;font-size:16px\">&nbsp;</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">&nbsp;</span></p><p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center\"><span style=\";font-family:宋体;font-size:16px\">&nbsp;</span><strong><span style=\"font-family: 微软雅黑;color: rgb(255, 0, 0);font-size: 20px\">《玩法及规章制度》</span></strong></p><p style=\"margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center\"><strong><span style=\"font-family: 宋体;font-size: 32px\">&nbsp;</span></strong><strong><span style=\"font-family: 微软雅黑;color: rgb(255, 0, 0);font-size: 18px\">《关于社区会员》</span></strong></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">1、如何成功加入财富社区</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;凡需加入众创财富社区的人员需由会员推荐和后台审核后方可加入，为防止恶意注册的行为，注册会员需由推荐人购买手续费。手续费费用暂为</span><span style=\";font-family:宋体;color:rgb(255,0,0);font-size:16px\">100元/个</span><span style=\";font-family:宋体;font-size:16px\">，注册成功后直接</span><span style=\";font-family:宋体;color:rgb(255,0,0);font-size:16px\">返还50元</span><span style=\";font-family:宋体;font-size:16px\">到被注册会员账号中，剩余部分作为平台建设费用。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">步骤：</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">a、需要由社区会员推荐并注册相关账号（必须按要求真实填写相关信息）</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">b、注册成功后由推荐方为下级会员购买手续费，待后台发放手续费后由推荐方为其激活；</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">c、激活成功后账号便可以直接登录。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;font-size:16px\">d、登录成功后请及时更改登录密码与安全密码。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">2、</span><span style=\";font-family:宋体;font-size:16px\">成为众创财富社区会员后请熟读关于平台的规则说明，并随时关注平台的新闻动态。</span></p><p style=\"margin-top: 7px;margin-bottom: 7px\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">3、</span><span style=\";font-family:宋体;font-size:16px\">凡成为众创财富社区会员后请自觉遵守社区规章制度和相关规定，自觉维护好社区的良好投资环境。</span></p><p style=\"margin-top: 7px; margin-bottom: 7px;\"><span style=\";font-family:宋体;color:rgb(0,176,80);font-size:16px\">4、</span><span style=\";font-family:宋体;font-size:16px\">成功激活的社区会员，若出现登录问题，建议下载并使用平台官方 浏览器登录《QQ浏览器、360浏览器、百度浏览器、猎豹浏览器》。</span></p>');/* MySQLReback Separation */
 /* 创建表结构 `lscf_zccf_system` */
 DROP TABLE IF EXISTS `lscf_zccf_system`;/* MySQLReback Separation */ CREATE TABLE `lscf_zccf_system` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lscf_zccf_system` */
 INSERT INTO `lscf_zccf_system` VALUES ('1','众创财富宣传网','众创财富-财富网-投资网','1','0','0','网站关闭中，请稍后访问，敬请期待','众创财富,财富平台,创富平台','众创财富宣传网成立于2016年01月01日，截至目前用户已达到1500人','13888888888','200000000','13888888888','13888888888@139.com');/* MySQLReback Separation */