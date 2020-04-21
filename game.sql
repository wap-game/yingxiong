-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 01 月 26 日 18:08
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `game`
--

-- --------------------------------------------------------

--
-- 表的结构 `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `name` varchar(100) NOT NULL,
  `race` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `derevo` int(11) NOT NULL DEFAULT '0',
  `ruda` int(11) NOT NULL DEFAULT '0',
  `rtut` int(11) NOT NULL DEFAULT '0',
  `kristally` int(11) NOT NULL DEFAULT '0',
  `sera` int(11) NOT NULL DEFAULT '0',
  `samocvety` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `building`
--

INSERT INTO `building` (`name`, `race`, `building`, `gold`, `derevo`, `ruda`, `rtut`, `kristally`, `sera`, `samocvety`) VALUES
('制造厂小精灵', 1, 1, 500, 0, 5, 0, 0, 0, 0),
('军事学校', 2, 1, 400, 5, 0, 0, 0, 0, 0),
('农夫小屋', 3, 1, 500, 0, 0, 0, 0, 0, 0),
('锅炉的恶魔', 4, 1, 400, 0, 5, 0, 0, 0, 0),
('在教堂院子里', 5, 1, 300, 0, 5, 0, 0, 0, 0),
('树童话', 6, 1, 300, 5, 0, 0, 0, 0, 0),
('房子的防护罩', 7, 1, 400, 0, 5, 0, 0, 0, 0),
('妖怪的小屋', 8, 1, 400, 0, 0, 0, 0, 0, 0),
('石头的栏杆', 1, 2, 1200, 0, 5, 0, 0, 0, 0),
('该死的舞台上', 2, 2, 1000, 0, 5, 0, 0, 0, 0),
('塔弓箭手', 3, 2, 1200, 0, 10, 0, 0, 0, 0),
('魔鬼塔', 4, 2, 1000, 5, 0, 0, 0, 0, 0),
('地下墓穴', 5, 2, 800, 0, 5, 0, 0, 0, 0),
('游乐场战斗舞', 6, 2, 1100, 5, 5, 0, 0, 0, 0),
('房子的刀', 7, 2, 1000, 10, 0, 0, 0, 0, 0),
('员额的半人马', 8, 2, 1100, 5, 0, 0, 0, 0, 0),
('建立傀儡', 1, 3, 1500, 0, 5, 5, 0, 0, 5),
('迷宫', 2, 3, 1200, 5, 10, 0, 0, 0, 0),
('营', 3, 3, 1500, 10, 10, 0, 0, 0, 0),
('地狱的狗舍', 4, 3, 1200, 10, 0, 0, 0, 2, 0),
('破碎的楼', 5, 3, 1000, 5, 5, 3, 0, 0, 0),
('树屋', 6, 3, 1500, 12, 5, 0, 0, 0, 0),
('分庭熊', 7, 3, 1200, 10, 10, 0, 0, 0, 0),
('军用帐篷', 8, 3, 2000, 0, 5, 0, 0, 0, 0),
('魔法师塔', 1, 4, 2200, 0, 10, 0, 0, 10, 5),
('黑暗的牧场', 2, 4, 2000, 10, 0, 0, 0, 5, 0),
('塔怪兽', 3, 4, 2500, 10, 10, 5, 0, 0, 0),
('大厅的诱惑', 4, 4, 3500, 5, 5, 3, 0, 3, 0),
('吸血鬼的大厦', 5, 4, 1500, 10, 10, 5, 0, 0, 0),
('巨石阵', 6, 4, 1500, 0, 10, 0, 3, 0, 3),
('打圈', 7, 4, 2000, 5, 5, 10, 0, 0, 5),
('庇护灵', 8, 4, 3200, 5, 0, 9, 5, 0, 0),
('祭坛的希望', 1, 5, 2500, 10, 5, 10, 0, 0, 0),
('液压窟', 2, 5, 2500, 5, 5, 0, 5, 0, 0),
('修道院', 3, 5, 3000, 5, 5, 2, 2, 2, 2),
('火马厩', 4, 5, 4000, 5, 5, 0, 0, 10, 0),
('坟墓', 5, 5, 2000, 10, 10, 2, 2, 2, 2),
('格莱德独角兽', 6, 5, 2000, 5, 0, 0, 5, 0, 5),
('庇护所的人的谜语', 7, 5, 3000, 10, 10, 5, 5, 5, 5),
('庇护所的愤怒', 8, 5, 4500, 5, 10, 5, 0, 0, 0),
('银馆', 1, 6, 5000, 0, 10, 0, 5, 5, 10),
('大厅的黄昏', 2, 6, 4000, 5, 5, 4, 0, 4, 4),
('骑士的舞台上', 3, 6, 6000, 15, 0, 0, 10, 0, 0),
('燃烧的错', 4, 6, 5000, 0, 10, 10, 0, 0, 0),
('被遗弃的城堡', 5, 6, 4000, 10, 10, 10, 0, 0, 0),
('拱门的经济需求测试', 6, 6, 4000, 15, 0, 0, 5, 5, 3),
('大厅的门派', 7, 6, 4000, 0, 0, 0, 20, 0, 0),
('我们的基地，双足飞龙', 8, 6, 7000, 20, 0, 0, 0, 5, 0),
('云霄殿', 1, 7, 12000, 10, 10, 0, 0, 0, 5),
('龙的老巢', 2, 7, 12000, 0, 10, 0, 15, 15, 0),
('祭坛光', 3, 7, 10000, 0, 15, 0, 0, 0, 10),
('庙宇的倒下', 4, 7, 10000, 0, 10, 10, 0, 5, 0),
('龙的墓地', 5, 7, 6000, 20, 20, 20, 0, 0, 0),
('祭坛上的龙', 6, 7, 8000, 5, 5, 0, 15, 0, 15),
('烧个洞穴', 7, 7, 10000, 0, 15, 0, 10, 10, 0),
('洞穴的独眼巨人', 8, 7, 10000, 0, 15, 7, 0, 0, 5);

-- --------------------------------------------------------

--
-- 表的结构 `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `essence`
--

CREATE TABLE IF NOT EXISTS `essence` (
  `name` varchar(100) NOT NULL,
  `race` int(11) NOT NULL,
  `essence` int(11) NOT NULL,
  `damage` int(11) NOT NULL,
  `life` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `increase` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `essence`
--

INSERT INTO `essence` (`name`, `race`, `essence`, `damage`, `life`, `price`, `increase`) VALUES
('小精灵', 1, 1, 1, 5, 22, 20),
('间谍', 2, 1, 3, 10, 60, 7),
('农民', 3, 1, 1, 3, 15, 22),
('恶魔', 4, 1, 2, 4, 25, 16),
('骨头大战', 5, 1, 1, 4, 19, 20),
('仙女', 6, 1, 2, 5, 35, 10),
('维护者的山脉', 7, 1, 1, 7, 22, 18),
('妖精', 8, 1, 1, 3, 10, 25),
('就奇形怪状的石头', 1, 2, 1, 15, 45, 14),
('野兽', 2, 2, 6, 16, 125, 5),
('弓箭手', 3, 2, 3, 7, 50, 12),
('恶魔', 4, 2, 2, 13, 40, 15),
('僵尸', 5, 2, 2, 17, 40, 15),
('跳舞刀片', 6, 2, 4, 12, 70, 9),
('标枪喷射器', 7, 2, 2, 9, 45, 14),
('马人', 8, 2, 4, 6, 14, 50),
('铁魔像', 1, 3, 4, 18, 100, 9),
('牛头怪', 2, 3, 11, 40, 140, 6),
('剑士', 3, 3, 4, 16, 85, 10),
('地狱的猎犬', 4, 3, 5, 15, 110, 8),
('鬼魂', 5, 3, 4, 16, 100, 9),
('精灵弓箭手', 6, 3, 6, 10, 120, 7),
('骑士熊', 7, 3, 5, 25, 130, 7),
('兽人战争', 8, 3, 5, 12, 80, 11),
('魔法师', 1, 4, 7, 18, 250, 5),
('骑士的迅猛龙', 2, 4, 10, 40, 300, 4),
('狮身鹰首兽', 3, 4, 4, 16, 250, 5),
('淫妖', 4, 4, 11, 20, 240, 5),
('吸血鬼', 5, 4, 8, 30, 250, 5),
('德鲁伊人', 6, 4, 8, 34, 320, 4),
('Костоломы', 7, 4, 6, 20, 160, 6),
('萨满巫师', 8, 4, 8, 30, 260, 5),
('吉娜', 1, 5, 13, 40, 460, 3),
('九头蛇', 2, 5, 13, 80, 550, 3),
('僧侣', 3, 5, 12, 54, 600, 3),
('见鬼马', 4, 5, 15, 50, 550, 3),
('荔枝', 5, 5, 16, 50, 620, 3),
('独角兽', 6, 5, 17, 57, 630, 3),
('牧师的文字', 7, 5, 14, 60, 470, 3),
('凶手', 8, 5, 9, 34, 350, 5),
('Принцессы ракшан', 1, 6, 21, 120, 1400, 2),
('黄昏的女巫', 2, 6, 23, 80, 1400, 2),
('骑士', 3, 6, 26, 90, 1300, 2),
('恶魔的洞穴里', 4, 6, 23, 110, 1400, 2),
('亡灵', 5, 6, 23, 95, 1400, 2),
('树人', 6, 6, 16, 175, 1100, 2),
('唐娜', 7, 6, 12, 100, 1300, 2),
('吉维尼', 8, 6, 22, 90, 1250, 5),
('巨像', 1, 7, 63, 175, 2700, 1),
('黄昏的龙', 2, 7, 63, 200, 3000, 1),
('天使', 3, 7, 45, 180, 2800, 1),
('恶魔', 4, 7, 60, 166, 2666, 1),
('骨头龙', 5, 7, 26, 150, 1600, 2),
('绿色龙', 6, 7, 45, 200, 2500, 1),
('火龙', 7, 7, 48, 230, 2700, 1),
('独眼巨人', 8, 7, 50, 220, 2900, 1);

-- --------------------------------------------------------

--
-- 表的结构 `konts`
--

CREATE TABLE IF NOT EXISTS `konts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kont` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `log_attack`
--

CREATE TABLE IF NOT EXISTS `log_attack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_defender` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `loss` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sender` int(11) NOT NULL,
  `id_grantee` int(11) NOT NULL,
  `text` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `mine`
--

CREATE TABLE IF NOT EXISTS `mine` (
  `id_user` int(11) NOT NULL,
  `time_gold` int(11) NOT NULL DEFAULT '0',
  `time_derevo` int(11) NOT NULL DEFAULT '0',
  `time_rtut` int(11) NOT NULL DEFAULT '0',
  `time_sera` int(11) NOT NULL DEFAULT '0',
  `time_kristally` int(11) NOT NULL DEFAULT '0',
  `time_ruda` int(11) NOT NULL DEFAULT '0',
  `time_samocvety` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mine`
--

INSERT INTO `mine` (`id_user`, `time_gold`, `time_derevo`, `time_rtut`, `time_sera`, `time_kristally`, `time_ruda`, `time_samocvety`) VALUES
(1, 1422263995, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `prirost`
--

CREATE TABLE IF NOT EXISTS `prirost` (
  `id_user` int(11) NOT NULL,
  `kol1` int(11) NOT NULL DEFAULT '0',
  `kol2` int(11) NOT NULL DEFAULT '0',
  `kol3` int(11) NOT NULL DEFAULT '0',
  `kol4` int(11) NOT NULL DEFAULT '0',
  `kol5` int(11) NOT NULL DEFAULT '0',
  `kol6` int(11) NOT NULL DEFAULT '0',
  `kol7` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `prirost`
--

INSERT INTO `prirost` (`id_user`, `kol1`, `kol2`, `kol3`, `kol4`, `kol5`, `kol6`, `kol7`, `time`) VALUES
(1, 20, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `race`
--

INSERT INTO `race` (`id`, `name`) VALUES
(1, '的魔法学校'),
(2, '联盟的影子'),
(3, '教团秩序'),
(4, '地狱'),
(5, '墓'),
(6, '森林联盟'),
(7, '北方的部族'),
(8, '伟大的部落');

-- --------------------------------------------------------

--
-- 表的结构 `ratusha`
--

CREATE TABLE IF NOT EXISTS `ratusha` (
  `ratusha` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gold` int(11) NOT NULL,
  `dohod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ratusha`
--

INSERT INTO `ratusha` (`ratusha`, `name`, `gold`, `dohod`) VALUES
(1, '房子里的老人', 0, 500),
(2, '市政厅', 2000, 1000),
(3, '治安法官', 5000, 2000),
(4, '国会大厦', 10000, 4000);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ban` int(11) NOT NULL DEFAULT '0',
  `race` int(11) NOT NULL DEFAULT '3',
  `level` int(11) NOT NULL DEFAULT '1',
  `next_level` int(11) NOT NULL DEFAULT '100',
  `rang` int(11) NOT NULL DEFAULT '0',
  `win` int(11) NOT NULL DEFAULT '0',
  `loss` int(11) NOT NULL DEFAULT '0',
  `gold` int(11) NOT NULL DEFAULT '500',
  `derevo` int(11) NOT NULL DEFAULT '10',
  `ruda` int(11) NOT NULL DEFAULT '10',
  `rtut` int(11) NOT NULL DEFAULT '5',
  `kristally` int(11) NOT NULL DEFAULT '5',
  `sera` int(11) NOT NULL DEFAULT '5',
  `samocvety` int(11) NOT NULL DEFAULT '5',
  `exp` int(11) NOT NULL DEFAULT '0',
  `essence1` int(11) NOT NULL DEFAULT '0',
  `essence2` int(11) NOT NULL DEFAULT '0',
  `essence3` int(11) NOT NULL DEFAULT '0',
  `essence4` int(11) NOT NULL DEFAULT '0',
  `essence5` int(11) NOT NULL DEFAULT '0',
  `essence6` int(11) NOT NULL DEFAULT '0',
  `essence7` int(11) NOT NULL DEFAULT '0',
  `building` int(11) NOT NULL DEFAULT '1',
  `ratusha` int(11) NOT NULL DEFAULT '1',
  `date_last` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `ban`, `race`, `level`, `next_level`, `rang`, `win`, `loss`, `gold`, `derevo`, `ruda`, `rtut`, `kristally`, `sera`, `samocvety`, `exp`, `essence1`, `essence2`, `essence3`, `essence4`, `essence5`, `essence6`, `essence7`, `building`, `ratusha`, `date_last`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1, 1, 100, 0, 0, 0, 591, 10, 10, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1422264179);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
