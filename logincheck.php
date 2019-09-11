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

// 查询资料库是否有与输入匹配的使用者
$result = $conn->query("SELECT * FROM `users` WHERE `id`='" . $_POST["id"] . "' AND `pwd`='" . $_POST["pwd"] . "';")
	or die(mysql_error());

// 查无使用者
if (mysqli_num_rows($result) == 0) echo "0:nouserfound";

// 找到使用者
else {
	$row = $result->fetch_array(MYSQL_BOTH);
	session_start();
	$_SESSION['username'] = $_POST["id"];
	echo $_POST["id"];
}
