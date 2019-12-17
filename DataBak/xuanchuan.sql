
-- 表的结构 `lscf_zccf_datainfo`
--

CREATE TABLE IF NOT EXISTS `lscf_zccf_datainfo` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lscf_zccf_datainfo`
--

INSERT INTO `lscf_zccf_datainfo` (`zdId`, `zdRegPeople`, `zdYuanzhuJiner`, `zdTixianJiner`, `zdTZNum`, `zdJiangjin`, `zdLixi`, `zdTxNum`, `zdOnlineNumMin`, `zdOnlineNumMax`) VALUES
(1, 100, 200, 100, 200, 300, 400, 500, 10, 200);

-- --------------------------------------------------------

--
-- 表的结构 `lscf_zccf_focusmap`
--

CREATE TABLE IF NOT EXISTS `lscf_zccf_focusmap` (
  `zfId` int(5) NOT NULL AUTO_INCREMENT COMMENT '焦点图ID',
  `zfNum` int(5) NOT NULL COMMENT '焦点图排序',
  `zfTitle` varchar(100) NOT NULL COMMENT '焦点图标题',
  `zfColor` varchar(7) NOT NULL COMMENT '焦点图背景颜色',
  `zfImages` varchar(300) NOT NULL COMMENT '焦点图图片',
  `zfUrl` varchar(300) NOT NULL COMMENT '焦点图路径',
  `zfOnOff` int(1) NOT NULL DEFAULT '1' COMMENT '焦点图是否显示',
  PRIMARY KEY (`zfId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lscf_zccf_focusmap`
--

INSERT INTO `lscf_zccf_focusmap` (`zfId`, `zfNum`, `zfTitle`, `zfColor`, `zfImages`, `zfUrl`, `zfOnOff`) VALUES
(1, 0, '焦点图1', '#ffe600', 'Uploads/Focusmap/20160820/57b7b49bd4ecf.png', '#', 1),
(2, 1, '焦点图2', '#000523', 'Uploads/Focusmap/20160820/57b7b4f1d6259.png', '#', 0),
(3, 2, '焦点图3', '#05a4ff', 'Uploads/Focusmap/20160820/57b7b51f6588c.png', '#', 1),
(4, 3, '焦点图4', '#00dda7', 'Uploads/Focusmap/20160820/57b7b54d5da4f.png', '#', 1),
(5, 4, '焦点图5', '#f189db', 'Uploads/Focusmap/20160820/57b7b595367f1.png', '#', 1),
(6, 5, '焦点图6', '#bb9dff', 'Uploads/Focusmap/20160820/57b7b5eb85bf3.png', '#', 1),
(7, 6, '焦点图7', '#76cdde', 'Uploads/Focusmap/20160820/57b7b61b1cfb4.png', '#', 1),
(8, 7, '焦点图8', '#ff8dab', 'Uploads/Focusmap/20160820/57b7b642ba198.png', '#', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lscf_zccf_info`
--

CREATE TABLE IF NOT EXISTS `lscf_zccf_info` (
  `ziId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传页规则Id',
  `ziTitle` varchar(50) NOT NULL COMMENT '宣传页规则说明标题',
  `ziContent` text NOT NULL COMMENT '宣传页规则说明内容',
  PRIMARY KEY (`ziId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='宣传页规则说明' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lscf_zccf_info`
--

INSERT INTO `lscf_zccf_info` (`ziId`, `ziTitle`, `ziContent`) VALUES
(1, '平台规则', '<p style="margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center"><strong><span style="font-family: 宋体;color: rgb(255, 0, 0);font-size: 20px">《众创财富社区》</span></strong></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">众创财富互助社区没有华丽的包装,也没有恢弘的造势。这里不是赌徒的归宿，更不是投机者的天堂。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">背景实力可虚拟，情怀格局乃真谛！</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">众创财富互助社区以人人平等为宗旨，互助金融为依托，诚信玩家为纽带，以众创共赢财富为目的。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">不求名扬四海，只求能够在稳步中前行，真正的实现互帮互助，帮助每一位参与者都能获得一份稳定的收益。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">在众创财富互助社区人人平等，人人均富，唯一视玩家如兄弟姐妹的平台。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">唯一不以慈善为幌子的平台。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">唯一不虚构平台背景的平台。 &nbsp; </span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">每一位众创财富互助社区的参与者都会经过严格的筛选，确保所有会员诚实守信，再通过良好的口碑力量传播给更多的诚信会员参与其中。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">人性化的交易社区平台，全天候的平台信息，亲切高效率的服务。在保证每个参与会员资金安全的前提下，最大限度的指导客户盈利。</span></p><p style="margin-top: auto; margin-bottom: auto;"><span style=";font-family:宋体;color:rgb(255,0,0);font-size:16px">互助模式的投资价值被大众认同，而互助模式的应用价值也被商家认可，越来越多的国家、商家认同互助的方式。互助模式是世界未来经济发展的大趋势，被列为财富第八波！</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `lscf_zccf_lianxi`
--

CREATE TABLE IF NOT EXISTS `lscf_zccf_lianxi` (
  `zlId` int(1) NOT NULL AUTO_INCREMENT COMMENT '宣传网站联系我们ID',
  `zlTitle` varchar(50) NOT NULL COMMENT '宣传网站联系我们标题',
  `zlContent` text NOT NULL COMMENT '宣传网站联系我们内容',
  PRIMARY KEY (`zlId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lscf_zccf_lianxi`
--

INSERT INTO `lscf_zccf_lianxi` (`zlId`, `zlTitle`, `zlContent`) VALUES
(1, '联系我们', '<p style="margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center"><strong><span style="font-family: 宋体;color: rgb(255, 0, 0);font-size: 20px">《众创财富社区》</span></strong></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">众创财富互助社区没有华丽的包装,也没有恢弘的造势。这里不是赌徒的归宿，更不是投机者的天堂。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">背景实力可虚拟，情怀格局乃真谛！</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">众创财富互助社区以人人平等为宗旨，互助金融为依托，诚信玩家为纽带，以众创共赢财富为目的。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">不求名扬四海，只求能够在稳步中前行，真正的实现互帮互助，帮助每一位参与者都能获得一份稳定的收益。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">在众创财富互助社区人人平等，人人均富，唯一视玩家如兄弟姐妹的平台。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">唯一不以慈善为幌子的平台。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">唯一不虚构平台背景的平台。 &nbsp; </span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">每一位众创财富互助社区的参与者都会经过严格的筛选，确保所有会员诚实守信，再通过良好的口碑力量传播给更多的诚信会员参与其中。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">人性化的交易社区平台，全天候的平台信息，亲切高效率的服务。在保证每个参与会员资金安全的前提下，最大限度的指导客户盈利。</span></p><p style="margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto"><span style=";font-family:宋体;color:rgb(255,0,0);font-size:16px">互助模式的投资价值被大众认同，而互助模式的应用价值也被商家认可，越来越多的国家、商家认同互助的方式。互助模式是世界未来经济发展的大趋势，被列为财富第八波！</span></p><p><span style=";font-family:宋体;font-size:16px">&nbsp;</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">&nbsp;</span></p><p style="margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center"><span style=";font-family:宋体;font-size:16px">&nbsp;</span><strong><span style="font-family: 微软雅黑;color: rgb(255, 0, 0);font-size: 20px">《玩法及规章制度》</span></strong></p><p style="margin-top:7px;margin-bottom:7px;margin-top:auto;margin-bottom:auto;text-align:center"><strong><span style="font-family: 宋体;font-size: 32px">&nbsp;</span></strong><strong><span style="font-family: 微软雅黑;color: rgb(255, 0, 0);font-size: 18px">《关于社区会员》</span></strong></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">1、如何成功加入财富社区</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;凡需加入众创财富社区的人员需由会员推荐和后台审核后方可加入，为防止恶意注册的行为，注册会员需由推荐人购买手续费。手续费费用暂为</span><span style=";font-family:宋体;color:rgb(255,0,0);font-size:16px">100元/个</span><span style=";font-family:宋体;font-size:16px">，注册成功后直接</span><span style=";font-family:宋体;color:rgb(255,0,0);font-size:16px">返还50元</span><span style=";font-family:宋体;font-size:16px">到被注册会员账号中，剩余部分作为平台建设费用。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">步骤：</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">a、需要由社区会员推荐并注册相关账号（必须按要求真实填写相关信息）</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">b、注册成功后由推荐方为下级会员购买手续费，待后台发放手续费后由推荐方为其激活；</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">c、激活成功后账号便可以直接登录。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;font-size:16px">d、登录成功后请及时更改登录密码与安全密码。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">2、</span><span style=";font-family:宋体;font-size:16px">成为众创财富社区会员后请熟读关于平台的规则说明，并随时关注平台的新闻动态。</span></p><p style="margin-top: 7px;margin-bottom: 7px"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">3、</span><span style=";font-family:宋体;font-size:16px">凡成为众创财富社区会员后请自觉遵守社区规章制度和相关规定，自觉维护好社区的良好投资环境。</span></p><p style="margin-top: 7px; margin-bottom: 7px;"><span style=";font-family:宋体;color:rgb(0,176,80);font-size:16px">4、</span><span style=";font-family:宋体;font-size:16px">成功激活的社区会员，若出现登录问题，建议下载并使用平台官方 浏览器登录《QQ浏览器、360浏览器、百度浏览器、猎豹浏览器》。</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `lscf_zccf_system`
--

CREATE TABLE IF NOT EXISTS `lscf_zccf_system` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lscf_zccf_system`
--

INSERT INTO `lscf_zccf_system` (`zsId`, `zsWebName`, `zsWebTitle`, `zsWebOnOff`, `zsWebRegOnOff`, `zsWebLoginOnOff`, `zsWebOnOffInfo`, `zsWebKeyWords`, `zsWebDescription`, `zsTel`, `zsQQ`, `zsWeixin`, `zsEmail`) VALUES
(1, '众创财富宣传网', '众创财富-财富网-投资网', 1, 0, 0, '网站关闭中，请稍后访问，敬请期待', '众创财富,财富平台,创富平台', '众创财富宣传网成立于2016年01月01日，截至目前用户已达到1500人', '13888888888', '200000000', '13888888888', '13888888888@139.com');
