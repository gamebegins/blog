/*
Navicat MySQL Data Transfer

Source Server         : 本地链接
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : my_bk

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-11-13 11:39:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classname` varchar(60) NOT NULL,
  `orderby` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `isdisplay` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', 'C语言', '1', '0');
INSERT INTO `blog_category` VALUES ('2', 'C加加', '2', '0');
INSERT INTO `blog_category` VALUES ('3', 'PY', '3', '0');
INSERT INTO `blog_category` VALUES ('4', 'JAVA', '4', '0');
INSERT INTO `blog_category` VALUES ('18', 'PHP', '5', '0');

-- ----------------------------
-- Table structure for blog_details
-- ----------------------------
DROP TABLE IF EXISTS `blog_details`;
CREATE TABLE `blog_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(600) DEFAULT NULL,
  `content` mediumtext NOT NULL,
  `first` tinyint(2) NOT NULL DEFAULT '1' COMMENT '发帖',
  `tid` int(10) DEFAULT NULL COMMENT '回贴在帖子ID',
  `uid` int(10) NOT NULL COMMENT '作者ID',
  `username` varchar(50) NOT NULL,
  `addtime` char(20) NOT NULL,
  `classid` int(10) NOT NULL COMMENT '板块ID',
  `huifu` int(10) NOT NULL DEFAULT '0' COMMENT '回复数',
  `liulan` tinyint(2) NOT NULL DEFAULT '0' COMMENT '浏览数',
  `istop` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1为不置顶,2为置顶',
  `elite` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1为不精华，2为精华',
  `ishot` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1为不高亮',
  `isdel` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `isdisplay` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否展示',
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_details
-- ----------------------------
INSERT INTO `blog_details` VALUES ('1', '问问去', '<p>\r\n	我的个人博客总共展示了三个版本，界面也经历了由&ldquo;简单&rdquo;到&ldquo;复杂&rdquo;再到&ldquo;简单&rdquo;，颜色从&ldquo;色泽单一&rdquo;到&ldquo;五彩斑斓&rdquo;再到&ldquo;局部点缀&rdquo;的过程。原来一年一个版本！而每次改版的契机都是被百度惩罚！界面不要频繁更换！好好检查代码，有没有冗余、结构有没有不合理的地方。</p>\r\n', '1', null, '1', 'admin', '1510236186', '1', '0', '1', '1', '1', '1', '0', '0', 'upload/5a04658fcf668.jpg');
INSERT INTO `blog_details` VALUES ('2', '【心路历程】请不要在设计这条路上徘徊啦', '<p>\r\n	我整理了一下网友给我的来信，如果你还在踌躇不前，不妨来看看，到底要不要坚持下去！我也欢迎大家给我来信，希望能帮到更多人。</p>\r\n', '1', null, '1', 'admin', '1510236243', '1', '0', '0', '1', '1', '1', '0', '0', 'upload/5a04658fcf668.jpg');
INSERT INTO `blog_details` VALUES ('3', '问问', '<p>\r\n	我整理了一下网友给我的来信，如果你还在踌躇不前，不妨来看看，到底要不要坚持下去！我也欢迎大家给我来信，希望能帮到更多人。</p>\r\n', '1', null, '1', 'admin', '1510236309', '1', '0', '3', '1', '1', '1', '0', '0', 'upload/5a04658fcf668.jpg');
INSERT INTO `blog_details` VALUES ('4', '【匆匆那些年】总结个人博客经历的这四年…', '<p>\r\n	博客从最初的域名购买，到上线已经有四年的时间了，这四年的时间，有笑过，有怨过，有悔过，有执着过，也有放弃过&hellip;但最后还是坚持了下来，时间如此匆匆，等再回过头已来不及去弥补</p>\r\n', '1', null, '1', 'admin', '1510236414', '2', '0', '3', '1', '1', '1', '0', '0', 'upload/5a04658fcf668.jpg');
INSERT INTO `blog_details` VALUES ('5', '心得笔记', '<p>\r\n	我的个人博客总共展示了三个版本，界面也经历了由&ldquo;简单&rdquo;到&ldquo;复杂&rdquo;再到&ldquo;简单&rdquo;，颜色从&ldquo;色泽单一&rdquo;到&ldquo;五彩斑斓&rdquo;再到&ldquo;局部点缀&rdquo;的过程。原来一年一个版本！而每次改版的契机都是被百度惩罚！界面不要频繁更换！好好检查代码，有没有冗余、结构有没有不合理的地方。</p>\r\n', '1', null, '1', 'admin', '1510236515', '3', '0', '2', '1', '1', '1', '0', '0', 'upload/5a04658fcf668.jpg');
INSERT INTO `blog_details` VALUES ('6', null, '<p>\r\n	这文章写的还可以，就是有点low</p>\r\n', '0', '2', '1', 'admin', '1510290465', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('7', null, '<p>\r\n	人生就是不错。</p>\r\n', '0', '2', '1', 'admin', '1510292676', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('36', '呵呵', '<p>\r\n	请而且我认识对方的反感皇太后</p>\r\n', '1', null, '15', 'miaomiao', '2017-11-12 21:25:22', '18', '0', '42', '1', '1', '1', '0', '0', 'upload/wenzhang/5a084bc2583f8.jpg');
INSERT INTO `blog_details` VALUES ('34', '嘻嘻', '<p>\r\n	热帖预热QGFASDFGSADFGDSAF</p>\r\n', '1', null, '15', 'miaomiao', '2017-11-12 21:24:34', '18', '0', '110', '1', '1', '1', '0', '0', 'upload/wenzhang/5a084b92e1096.jpeg');
INSERT INTO `blog_details` VALUES ('35', 'GAGA', '<p>\r\n	驱蚊器我认为特人声鼎沸vsd啊实打实大上大大的</p>\r\n', '1', null, '15', 'miaomiao', '2017-11-12 21:25:05', '18', '0', '8', '1', '1', '1', '0', '0', 'upload/wenzhang/5a084bb139fac.jpg');
INSERT INTO `blog_details` VALUES ('33', '哈哈', '<p>\r\n	速度还打不V大建安大随机的 阿舒服的那块设备的空间啊</p>\r\n', '1', null, '15', 'miaomiao', '2017-11-12 21:24:10', '18', '0', '109', '1', '1', '1', '0', '0', 'upload/wenzhang/5a084b7a0cc68.png');
INSERT INTO `blog_details` VALUES ('18', null, '<p>\r\n	一年又一年悄无声息地过去。年像是一个小伙伴，一只手拿着欢乐有趣的玩具，另一只掂着饕餮美食，大声召唤着我们，让我们心驰神往。我们渐渐地长大，年像是伴随着我们成长。它由一个活泼淘气的孩子变成彬彬有礼的少年，在岁月更替里又变成了深沉稳重的青年。年不会再像从前一样和我们一起玩鞭炮游戏，不会再像从前一样和我们一起偷吃食物，不会再像从前一样和我们一起奇思妙想&hellip;&hellip;</p>\r\n', '0', '8', '2', 'admin', '1510297791', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('9', '生活咋样', '<p>\r\n	到了农历的年末，城市的超市里挂满了玲珑华<a href=\"http://www.meiwenting.com/a/sanwen-youmei/\" style=\"text-decoration:none;\" target=\"_blank\">美的</a>红灯笼，玻璃橱窗上也贴上了各式花样的剪纸，这些都是年的符号，也是年的名片。我内心深藏的<a href=\"http://www.meiwenting.com/t/%C4%EA%CE%B6/\" style=\"text-decoration:none;\" target=\"_blank\">年味</a>儿犹如一只脆弱不堪的老酒坛被这些符号与名片猛然击碎，老酒倾泻满地，浓郁醇厚的味道漫然飘散。</p>\r\n<p>\r\n	我小的时候，盼望着过年。从农历的腊月二十三开始，接下来的每一天似乎都是色彩斑斓的，都散发着温馨绵厚的香味儿。村里的<a href=\"http://www.meiwenting.com/a/laopo/\" style=\"text-decoration:none;\" target=\"_blank\">老婆</a>婆坐在厚厚的蒲团上教我们唱着童谣：&ldquo;二十三，祭灶官；二十四，扫房子；二十五，磨豆腐；二十六，蒸馒头；二十七，杀只鸡；二十八，贴画画；二十九，去买酒；年三十，包饺子；大初一，撅着屁股乱作揖。&rdquo;这首童谣像是我们村里人的过年指南，农历二十三的时候就吃灶糖、祭灶神，二十四的时候就忙着用笤帚打扫屋子，二十五的时候就准备过年吃的豆腐，二十六的时候家家户户蒸枣花馒头、蒸萝卜缨包子&hellip;&hellip;千百年来，太阳沿着亘古不变的轨迹东升西落；冬去春来，人们世世代代遵循着这样的过年流程过年。</p>\r\n<p>\r\n	腊月二十三是小年，也叫祭灶日，这一天也是我的<a href=\"http://www.meiwenting.com/a/guxiang/\" style=\"text-decoration:none;\" target=\"_blank\">故乡</a>鲁湾逢集的日子。集市上人山人海，热闹沸腾。我紧跟着<a href=\"http://www.meiwenting.com/a/fumu/\" style=\"text-decoration:none;\" target=\"_blank\">父母</a>，看到卖灶糖的嚷着要买灶糖，看到卖鞭炮的嚷着要买鞭炮，看到卖苹果的就嚷着要买苹果&hellip;&hellip;父母一一应允，还会给我买崭新的袜子、鞋子、帽子和衣裳，从头到脚让我焕然一新。父母平时省吃俭用，一分钱掰成两半花。他们平时不肯买水果，不肯买猪肉，不肯买衣裳，到过年的时候却显得慷慨大方。赶集回家的时候，我们像一只只袋鼠抱着大包小包的年货，跌跌撞撞走在回家的路上。我的父母一年四季在农田里忙碌，只有到过年的时候他们才好好享受几天好日子。他们也总是把最好的东西给孩子。</p>\r\n', '1', null, '15', 'miaomiao', '1510294760', '1', '0', '79', '1', '1', '1', '0', '0', 'upload/5a0544e894f04.jpg');
INSERT INTO `blog_details` VALUES ('10', null, '<p>\r\n	感动到我了</p>\r\n', '0', '8', '2', 'admin', '1510295237', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('11', null, '<p>\r\n	大爷</p>\r\n', '0', '8', '2', 'admin', '1510295338', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('12', null, '<p>\r\n	我们这一群疯孩子从小卖铺里买来麻雷子、拉炮、摔炮装在口袋里，在村巷里跑着玩耍，随手将一个摔炮摔在地面上，噼啪一声锐响，吓得鸡飞狗跳。我们玩累了，就在街上挖几个小圆坑，玩弹玻璃球的游戏。至今我已经<a href=\"http://www.meiwenting.com/a/wangji/\" style=\"text-decoration:none;\" target=\"_blank\">忘记</a>了玻璃球游戏的规则，但是记得自己输了就将玻璃球送给赢了这场游戏的小伙伴。长大了之后，我发现成人的世界有很多充满玄机的游戏，比儿童的这种游戏更残酷，更深刻。一旦我们在游戏中失败，输掉的不会是玻璃球这么微不足道的东西，可能是长年累月的心血，甚至是所有的自由与<a href=\"http://www.meiwenting.com/a/xingfu/\" style=\"text-decoration:none;\" target=\"_blank\">幸福</a>。</p>\r\n', '0', '8', '2', 'admin', '1510297094', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('13', null, '<p>\r\n	我们这一群疯孩子从小卖铺里买来麻雷子、拉炮、摔炮装在口袋里，在村巷里跑着玩耍，随手将一个摔炮摔在地面上，噼啪一声锐响，吓得鸡飞狗跳。我们玩累了，就在街上挖几个小圆坑，玩弹玻璃球的游戏。至今我已经<a href=\"http://www.meiwenting.com/a/wangji/\" style=\"text-decoration:none;\" target=\"_blank\">忘记</a>了玻璃球游戏的规则，但是记得自己输了就将玻璃球送给赢了这场游戏的小伙伴。长大了之后，我发现成人的世界有很多充满玄机的游戏，比儿童的这种游戏更残酷，更深刻。一旦我们在游戏中失败，输掉的不会是玻璃球这么微不足道的东西，可能是长年累月的心血，甚至是所有的自由与<a href=\"http://www.meiwenting.com/a/xingfu/\" style=\"text-decoration:none;\" target=\"_blank\">幸福</a>。</p>\r\n', '0', '8', '2', 'admin', '1510297133', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('14', null, '<p>\r\n	二十八是贴年画的日子。<a href=\"http://www.meiwenting.com/a/muqin/\" style=\"text-decoration:none;\" target=\"_blank\">母亲</a>将面粉抓进铁勺里用沸腾的热水搅拌，做成黏黏稠稠的糨糊。父亲在堂屋门口分出每扇门的对联与门画，并用毛刷涂上糨糊。<a href=\"http://www.meiwenting.com/a/gege/\" style=\"text-decoration:none;\" target=\"_blank\">哥哥</a>站在木椅子上贴年画，让我把涂了糨糊的年画递给他。父亲说贴了年画，就等于请来了手持刀枪剑戟、斧钺钩叉的门神，债主不能进门要账，妖魔鬼怪、魑魅魍魉也躲得远远的。我抬头望着威武凛然的门神，心想门神是从天宫来到人间的，一定神通广大，法力高强，就痴想让他们教我几招法术，让我能够像孙悟空一样腾云驾雾，叱咤风云。我望着木门两侧贴好的红对联念。一副对联一共十四个字，很多字不认识。我断断续续地念完后，哥哥哈哈大笑，说我念得狗屁不通。父亲说：&ldquo;他比去年念得好。去年一副对联只念出四个字，今年念出了八个字，明年应该能念得囫囵。&rdquo;大后年贴年画的时候我才把一副对联念通顺。</p>\r\n', '0', '8', '2', 'admin', '1510297186', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('15', null, '<p>\r\n	大年三十那天下午我们一家人坐在厨房包饺子。母亲和面、擀面皮。哥哥烧火。父亲和我坐在馅盆前包饺子。哥哥看着我包的饺子大笑，说我包的饺子有的像死鱼，有的像肥猪，有的像笨鸭子，丑极了。父亲从口袋里掏出一枚一分的硬币，然后包进饺子里，说：&ldquo;今晚谁吃着这个饺子，谁就最有福气！&rdquo;天擦黑的时候，此起彼落的鞭炮轰炸着村庄，空气里弥漫着丝丝缕缕火药味儿。母亲将包好的饺子下到沸水咕嘟咕嘟的锅里。父亲用铁锨在院子里撒下一层沙土。那些沙土是农历二十五用拖拉机从村头的沙岗上拉回来的，弥散着一丝丝清新淳美的气味。至今我也琢磨不透大年三十村里人在院子里撒下一层沙土的奥妙，大概是除旧迎新、接福纳祥的寓意。我踩在新鲜湿润的沙土上，将一挂红红的鞭炮用竹竿挑起。哥哥从灶膛里取出一根火棍将鞭炮点燃。一阵噼里啪啦的炮响之后，母亲已经将一个个冒着热气和香味儿的饺子盛到了白瓷碗里。一碗碗猪肉白菜馅饺子蘸着老醋，就是我们一家人的年夜饭。吃过年夜饭之后，母亲总是烧开一锅热水。一家人坐在木凳上将脚伸进一只大铁盆里用热水洗脚，边洗脚边说笑。母亲说大年夜洗脚能够洗掉一年的灾病邪祟和祸患困厄。新的一年一定会添福添寿、吉祥平安。母亲还会向我和哥哥的口袋里塞几张崭新的钞票。她说不管大人或小孩子，在辞旧迎新的时候口袋里都应该有钱，这样一年到头都不缺钱花，大家都会有富庶优裕的好日子过。现在想来，从前的年更像是勾画美好生活的仪式。</p>\r\n', '0', '8', '2', 'admin', '1510297263', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('16', null, '<p>\r\n	大年三十那天下午我们一家人坐在厨房包饺子。母亲和面、擀面皮。哥哥烧火。父亲和我坐在馅盆前包饺子。哥哥看着我包的饺子大笑，说我包的饺子有的像死鱼，有的像肥猪，有的像笨鸭子，丑极了。父亲从口袋里掏出一枚一分的硬币，然后包进饺子里，说：&ldquo;今晚谁吃着这个饺子，谁就最有福气！&rdquo;天擦黑的时候，此起彼落的鞭炮轰炸着村庄，空气里弥漫着丝丝缕缕火药味儿。母亲将包好的饺子下到沸水咕嘟咕嘟的锅里。父亲用铁锨在院子里撒下一层沙土。那些沙土是农历二十五用拖拉机从村头的沙岗上拉回来的，弥散着一丝丝清新淳美的气味。至今我也琢磨不透大年三十村里人在院子里撒下一层沙土的奥妙，大概是除旧迎新、接福纳祥的寓意。我踩在新鲜湿润的沙土上，将一挂红红的鞭炮用竹竿挑起。哥哥从灶膛里取出一根火棍将鞭炮点燃。一阵噼里啪啦的炮响之后，母亲已经将一个个冒着热气和香味儿的饺子盛到了白瓷碗里。一碗碗猪肉白菜馅饺子蘸着老醋，就是我们一家人的年夜饭。吃过年夜饭之后，母亲总是烧开一锅热水。一家人坐在木凳上将脚伸进一只大铁盆里用热水洗脚，边洗脚边说笑。母亲说大年夜洗脚能够洗掉一年的灾病邪祟和祸患困厄。新的一年一定会添福添寿、吉祥平安。母亲还会向我和哥哥的口袋里塞几张崭新的钞票。她说不管大人或小孩子，在辞旧迎新的时候口袋里都应该有钱，这样一年到头都不缺钱花，大家都会有富庶优裕的好日子过。现在想来，从前的年更像是勾画美好生活的仪式。</p>\r\n', '0', '8', '2', 'admin', '1510297420', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('17', null, '<p>\r\n	大年三十那天下午我们一家人坐在厨房包饺子。母亲和面、擀面皮。哥哥烧火。父亲和我坐在馅盆前包饺子。哥哥看着我包的饺子大笑，说我包的饺子有的像死鱼，有的像肥猪，有的像笨鸭子，丑极了。父亲从口袋里掏出一枚一分的硬币，然后包进饺子里，说：&ldquo;今晚谁吃着这个饺子，谁就最有福气！&rdquo;天擦黑的时候，此起彼落的鞭炮轰炸着村庄，空气里弥漫着丝丝缕缕火药味儿。母亲将包好的饺子下到沸水咕嘟咕嘟的锅里。父亲用铁锨在院子里撒下一层沙土。那些沙土是农历二十五用拖拉机从村头的沙岗上拉回来的，弥散着一丝丝清新淳美的气味。至今我也琢磨不透大年三十村里人在院子里撒下一层沙土的奥妙，大概是除旧迎新、接福纳祥的寓意。我踩在新鲜湿润的沙土上，将一挂红红的鞭炮用竹竿挑起。哥哥从灶膛里取出一根火棍将鞭炮点燃。一阵噼里啪啦的炮响之后，母亲已经将一个个冒着热气和香味儿的饺子盛到了白瓷碗里。一碗碗猪肉白菜馅饺子蘸着老醋，就是我们一家人的年夜饭。吃过年夜饭之后，母亲总是烧开一锅热水。一家人坐在木凳上将脚伸进一只大铁盆里用热水洗脚，边洗脚边说笑。母亲说大年夜洗脚能够洗掉一年的灾病邪祟和祸患困厄。新的一年一定会添福添寿、吉祥平安。母亲还会向我和哥哥的口袋里塞几张崭新的钞票。她说不管大人或小孩子，在辞旧迎新的时候口袋里都应该有钱，这样一年到头都不缺钱花，大家都会有富庶优裕的好日子过。现在想来，从前的年更像是勾画美好生活的仪式。</p>\r\n', '0', '8', '2', 'admin', '1510297714', '1', '0', '0', '1', '1', '1', '0', '0', 'public/images/02.jpg');
INSERT INTO `blog_details` VALUES ('21', null, '\r\n12313\r\n\r\n', '0', '2', '1', 'admin', '2017-11-10 14:43:56', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('22', null, '<p>\r\n	可以</p>\r\n', '0', '2', '1', 'admin', '2017-11-10 14:45:31', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('24', null, '<p>\r\n	123123</p>\r\n', '0', '23', '1', 'admin', '2017-11-11 09:12:29', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('25', '淼淼', '<p>\r\n	12313</p>\r\n', '1', null, '1', 'admin', '2017-11-11 09:27:32', '1', '3', '127', '1', '1', '1', '0', '0', 'upload/wenzhang/5a06520492ed9.jpg');
INSERT INTO `blog_details` VALUES ('26', null, '<p>\r\n	123</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 09:27:44', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('27', null, '<p>\r\n	请我惹我企鹅额我敲</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 10:35:51', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('28', null, '<p>\r\n	请我惹我企鹅额我敲</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 10:36:28', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('29', null, '<p>\r\n	人讨厌他如同与突然他</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 10:36:46', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('30', null, '<p>\r\n	阿打算发多少分公司</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 10:37:03', '1', '0', '0', '1', '1', '1', '0', '0', null);
INSERT INTO `blog_details` VALUES ('31', null, '<p>\r\n	阿打算发多少分公司</p>\r\n', '0', '25', '1', 'admin', '2017-11-11 10:39:36', '1', '0', '0', '1', '1', '1', '0', '0', null);

-- ----------------------------
-- Table structure for blog_dianzan
-- ----------------------------
DROP TABLE IF EXISTS `blog_dianzan`;
CREATE TABLE `blog_dianzan` (
  `dzid` int(11) NOT NULL AUTO_INCREMENT COMMENT '点赞ID',
  `id` int(11) NOT NULL COMMENT '被点赞的文章',
  `uid` int(11) NOT NULL COMMENT '点赞的用户',
  `username` varchar(32) NOT NULL COMMENT '点赞的用户名',
  PRIMARY KEY (`dzid`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_dianzan
-- ----------------------------
INSERT INTO `blog_dianzan` VALUES ('6', '25', '1', 'admin');
INSERT INTO `blog_dianzan` VALUES ('7', '25', '1', 'chenjiang');
INSERT INTO `blog_dianzan` VALUES ('9', '9', '15', 'admin');
INSERT INTO `blog_dianzan` VALUES ('10', '25', '1', 'miaomiao');
INSERT INTO `blog_dianzan` VALUES ('11', '36', '15', 'miaomiao');
INSERT INTO `blog_dianzan` VALUES ('12', '35', '15', 'miaomiao');

-- ----------------------------
-- Table structure for blog_guanzhu
-- ----------------------------
DROP TABLE IF EXISTS `blog_guanzhu`;
CREATE TABLE `blog_guanzhu` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL COMMENT '文章ID',
  `username` varchar(255) NOT NULL COMMENT '关注者用户名',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_guanzhu
-- ----------------------------
INSERT INTO `blog_guanzhu` VALUES ('8', '9', 'admin');
INSERT INTO `blog_guanzhu` VALUES ('7', '25', 'admin');
INSERT INTO `blog_guanzhu` VALUES ('9', '5', 'admin');
INSERT INTO `blog_guanzhu` VALUES ('10', '4', 'admin');
INSERT INTO `blog_guanzhu` VALUES ('11', '25', 'miaomiao');
INSERT INTO `blog_guanzhu` VALUES ('12', '35', 'miaomiao');
INSERT INTO `blog_guanzhu` VALUES ('15', '36', 'admin');
INSERT INTO `blog_guanzhu` VALUES ('16', '36', 'chenjiang');

-- ----------------------------
-- Table structure for blog_guanzhuren
-- ----------------------------
DROP TABLE IF EXISTS `blog_guanzhuren`;
CREATE TABLE `blog_guanzhuren` (
  `grid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '被关注的人名',
  `gusername` varchar(255) NOT NULL COMMENT '关注的人名',
  PRIMARY KEY (`grid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_guanzhuren
-- ----------------------------
INSERT INTO `blog_guanzhuren` VALUES ('1', 'miaomiao', 'admin');
INSERT INTO `blog_guanzhuren` VALUES ('2', 'chenjiang', 'admin');
INSERT INTO `blog_guanzhuren` VALUES ('3', 'admin', 'chenjiang');
INSERT INTO `blog_guanzhuren` VALUES ('8', 'miaomiao', 'chenjiang');

-- ----------------------------
-- Table structure for blog_message
-- ----------------------------
DROP TABLE IF EXISTS `blog_message`;
CREATE TABLE `blog_message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mcontent` varchar(255) NOT NULL COMMENT '留言内容',
  `mtime` date NOT NULL COMMENT '留言时间',
  `uid` int(11) NOT NULL COMMENT '留言用户',
  `username` varchar(32) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_message
-- ----------------------------
INSERT INTO `blog_message` VALUES ('9', '<p>\r\n	垃圾</p>\r\n', '2017-11-10', '3', 'chenjiang');
INSERT INTO `blog_message` VALUES ('10', '采集', '2017-11-11', '3', 'chenjiang');

-- ----------------------------
-- Table structure for blog_moodlist
-- ----------------------------
DROP TABLE IF EXISTS `blog_moodlist`;
CREATE TABLE `blog_moodlist` (
  `did` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dcontent` varchar(255) NOT NULL COMMENT '说说的内容',
  `dtime` char(30) NOT NULL COMMENT '日记发表时间',
  `uid` int(11) NOT NULL,
  `username` char(32) NOT NULL,
  `SStupian` varchar(255) DEFAULT NULL,
  `FHK` int(2) NOT NULL DEFAULT '0' COMMENT '是否为发说说0为发说说1为回说说',
  `SFSC` int(2) NOT NULL COMMENT '是否删除1为是0为否',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_moodlist
-- ----------------------------
INSERT INTO `blog_moodlist` VALUES ('1', '我已开始练习开始慢慢着急，着急这世界没有你', '2017-11-08', '1', 'admin', 'public/images/SStu.jpg', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('2', 'hahahahhahaahahaha', '2017-11-11', '1', 'admin', 'public/images/SStu.jpg', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('3', '<p>\r\n	12313</p>\r\n', '2017-11-10 06:29:44', '1', 'admin', 'upload/shuoshuo/5a0547584b7b6.jpg', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('4', '<p>\r\n	12313</p>\r\n', '2017-11-10 06:40:48', '1', 'admin', 'upload/shuoshuo/5a0549f0b4f39.png', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('5', '<p>\r\n	123123123123123</p>\r\n', '2017-11-10 09:00:09', '1', 'admin', 'upload/shuoshuo/5a056a99a793c.png', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('6', '666', '2017-11-11', '1', 'admin', null, '2', '0');
INSERT INTO `blog_moodlist` VALUES ('14', '<p>\r\n	hahahahah</p>\r\n', '2017-11-11 15:43:34', '1', 'admin', 'upload/shuoshuo/5a06aa2638764.png', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('8', '<p>\r\n	12311231</p>\r\n', '2017-11-10 09:35:14', '1', 'admin', null, '1', '0');
INSERT INTO `blog_moodlist` VALUES ('9', '<p>\r\n	123123</p>\r\n', '2017-11-10 09:36:19', '1', 'admin', null, '1', '0');
INSERT INTO `blog_moodlist` VALUES ('11', '<p>\r\n	垃圾</p>\r\n', '2017-11-10 09:58:35', '1', 'admin', null, '1', '0');
INSERT INTO `blog_moodlist` VALUES ('12', '<p>\r\n	hahahahahhahahahahh1234565434554asdfhnjewznjmj</p>\r\n', '2017-11-10 09:59:54', '3', 'chenjiang', 'upload/shuoshuo/5a05789a8a4a7.jpeg', '0', '0');
INSERT INTO `blog_moodlist` VALUES ('13', '<p>\r\n	666</p>\r\n', '2017-11-10 10:01:53', '1', 'admin', null, '12', '0');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `admin` enum('1','0') NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `register_time` varchar(12) NOT NULL COMMENT '注册时间',
  `lastlogin_time` varchar(12) DEFAULT NULL COMMENT '最后登录时间',
  `phone` varchar(32) NOT NULL COMMENT '电话号',
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `realname` varchar(32) DEFAULT NULL COMMENT '真实姓名',
  `biethday` char(11) DEFAULT NULL COMMENT '生日',
  `sex` tinyint(4) DEFAULT '2',
  `picture` varchar(255) DEFAULT NULL COMMENT '个人头像',
  `xtitle` varchar(255) DEFAULT NULL COMMENT '标题',
  `zuoyouming` varchar(255) DEFAULT NULL,
  `neirong` varchar(255) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL COMMENT '所在地',
  `jiguan` varchar(50) DEFAULT NULL COMMENT '籍贯',
  `qq` char(13) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '20171108', '20171108', '17807728196', '110@qq.com', '陈江', '1995-05-12', '1', 'upload/touxiang/5a05454f2a91f.jpg', '下一秒。。。', '回到以前（reback）——致最好的自己！', '态度要端正', '你猜', '陕西-延安', '1914329427');
INSERT INTO `blog_user` VALUES ('3', '0', 'chenjiang', '21232f297a57a5a743894a0e4a801fc3', '1510197328', '1510197328', '123456', '119@qq.com', null, '19700101', null, 'upload/touxiang/5a0597b3efdc6.jpg', null, null, null, null, null, null);
INSERT INTO `blog_user` VALUES ('15', '0', 'miaomiao', '21232f297a57a5a743894a0e4a801fc3', '1510393408', '1510393408', '17807728196', '119@qq.com', null, null, '2', null, null, null, null, null, null, null);
