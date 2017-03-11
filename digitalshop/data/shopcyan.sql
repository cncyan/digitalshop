CREATE DATABASE IF NOT EXISTS `cyanshop`;
USE `cyanshop`;
--管理员表
DROP TABLE IF EXISTS `cyna_admain`;
CREATE TABLE `cyan_admin`(
`id` tinyint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`email` varchar(50) not null
);


--分类表
DROP TABLE IF EXISTS `cyan_cate`;
CREATE TABLE `cyan_cate`(
`id` smallint unsigned auto_increment key,
`cname` varchar(50) unique
);

--商品表
DROP TABLE IF EXISTS `cyan_pro`;
CREATE TABLE `cyan_pro`(
`id` int unsigned auto_increment key,
`pname` varchar(50) not null unique,
`psn` varchar(50) not null,
`pnum` int unsigned default 1,
`pprice` decimal(10,2) not null,
`cprice` decimal(10,2) not null,
`pdesc` text,
`pimg` varchar(50) not null,
`pubtime` int unsigned not null,
`isshow` tinyint(1) default 1,
`ishot` tinyint(1) default 0,
`cid` smallint unsigned not null
);
--用户表
DROP TABLE IF EXISTS `cyan_user`;
CREATE TABLE `cyan_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`sex` enum("boy","gail","secriet") not null default "secriet",
`face` varchar(50) not null,
`regtime` int unsigned not null
);
--相册表
DROP TABLE IF EXISTS `cyan_album`;
CREATE TABLE `cyan_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,
`albumpath` varchar(50) not null
);