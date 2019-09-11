<?php

// 引入资料库连线资料
include("settings.php");

// 建立连线
$conn =  new mysqli($sqlHost, $sqlUser, $sqlPass, $sqldbname);

// 连线失败，请检查 settings.php 是否正确设置
if ($conn->connect_errno) {
	echo "0:dbconnecterror";
	exit();
}

// 查询有无同名的使用者
$result = $conn->query("SELECT * FROM `users` WHERE `id`='" . $_POST["reg_id"] . "';")
	or die(mysql_error());

// 有同名的使用者
if (mysqli_num_rows($result) != 0) {
	echo "0:invalid_id";
	return;
}

// 查询有无同学号的使用者
$result = $conn->query("SELECT * FROM `users` WHERE `schoolnumber`='" . $_POST["reg_schoolnumber"] . "';")
	or die(mysql_error());

// 有同学号的使用者
if (mysqli_num_rows($result) != 0) {echo "0:invalid_sn";return;}

// 无同名使用者
else {
	$conn->query("INSERT INTO `users` (`name`,`schoolnumber`,`email`,`gender`,`id`,`pwd`,`pwd_md5`) VALUES ('" . $_POST['reg_name'] . "',
	'" . $_POST['reg_schoolnumber'] . "','" . $_POST['reg_email'] . "','" . $_POST['reg_gender'] . "',
	'" . $_POST['reg_id'] . "','" . $_POST['reg_pwd'] . "','" . $_POST['reg_pwd_md5'] . "');")
		or die(mysql_error());
	echo "1";
}
