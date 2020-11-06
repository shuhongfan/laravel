-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 �?11 �?06 �?09:06
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_chengjixin`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_info`
--

CREATE TABLE IF NOT EXISTS `tb_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `class` varchar(20) NOT NULL,
  `hobby` varchar(20) NOT NULL DEFAULT '111',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `tb_info`
--

INSERT INTO `tb_info` (`id`, `name`, `sex`, `class`, `hobby`) VALUES
(28, 'xxx', 'female', '一班', '足球'),
(25, 'xxx', 'female', '一班', '足球,篮球'),
(23, 'xxx', 'female', '四班', '足球,篮球,排球'),
(7, 'xxx', 'female', '一班', '足球,篮球,排球'),
(31, 'xxx', 'female', '一班', '足球'),
(32, 'xxx', 'female', '一班', '足球'),
(30, 'xxx', 'female', '一班', '足球'),
(24, 'xxx', 'female', '三班', '排球,足球'),
(33, 'zzz', 'male', 'class one', 'football'),
(34, 'liu1', 'male', '一班', '足球'),
(35, 'liu1', 'male', '一班', '111'),
(36, 'liu1', 'male', '一班', '111');

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`id`, `user`, `password`) VALUES
(8, 'fei', '654321'),
(9, 'yyy', '666'),
(10, 'aaa', '7777'),
(11, 'zhong', '888'),
(12, 'aaa', '7777'),
(13, 'zhong', '888');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`) VALUES
(2, 'guanyu', '654321'),
(3, 'aaa', '111'),
(4, 'bbb', '222'),
(5, 'aaa', '111'),
(6, 'bbb', '222'),
(7, 'aaa', '111'),
(8, 'bbb', '222');

-- --------------------------------------------------------

--
-- 表的结构 `usernew`
--

CREATE TABLE IF NOT EXISTS `usernew` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(16) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `usernew`
--

INSERT INTO `usernew` (`id`, `name`, `pwd`) VALUES
(4, 'zhangfei', '11111'),
(3, 'aaa', '111'),
(5, 'aaa', '111'),
(6, 'bbb', '222'),
(7, 'guanyu', 'abcdef'),
(8, 'zhangfei', '11111'),
(9, 'aaa', '111'),
(10, 'bbb', '222');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
