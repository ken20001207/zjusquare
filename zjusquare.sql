-- --------------------------------------------------------
-- 主機:                           127.0.0.1
-- 伺服器版本:                        8.0.17 - MySQL Community Server - GPL
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 zju 的資料庫結構
CREATE DATABASE IF NOT EXISTS `zju` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `zju`;

-- 傾印  表格 zju.message 結構
CREATE TABLE IF NOT EXISTS `message` (
  `name` text,
  `channel` text,
  `msg` text,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  zju.message 的資料：~4 rows (約數)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT IGNORE INTO `message` (`name`, `channel`, `msg`, `time`) VALUES
	('林沅霖', '聊天大广场', '123', '2019/09/11 05:05:59'),
	('林沅霖', '聊天大广场', '这里是聊天大广场', '2019/09/11 05:08:13'),
	('张崇仁', '聊天大广场', '大家好', '2019/09/11 05:21:26'),
	('张崇仁', '你卡熏吗', '大家好，我建立了这个新的包厢！', '2019/09/11 05:22:57'),
	('林沅霖', '你卡熏吗', '咖熏', '2019/09/11 05:23:18');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- 傾印  表格 zju.users 結構
CREATE TABLE IF NOT EXISTS `users` (
  `id` text,
  `pwd` text,
  `name` text,
  `email` text,
  `schoolnumber` text,
  `gender` text,
  `pwd_md5` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- 正在傾印表格  zju.users 的資料：~3 rows (約數)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `pwd`, `name`, `email`, `schoolnumber`, `gender`, `pwd_md5`) VALUES
	('ken20001207', '123', '林沅霖', 'varedx@gmail.com', '3190106167', '小哥哥', '202cb962ac59075b964b07152d234b70'),
	('test01', '123', '測試01', '123@gmail.com', '12345678', '小哥哥', '202cb962ac59075b964b07152d234b70'),
	('test02', '123', '测试02', '123@gmail.com', '123584', '小哥哥', '202cb962ac59075b964b07152d234b70'),
	('jason20001128', 'jason891128', '张崇仁', 'jason1128899ggg@gmail.com', '3190106127', '小哥哥', '247013405b3e551143dcc7cf8ea820f7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
