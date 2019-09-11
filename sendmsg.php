<?php

date_default_timezone_set("Asia/Taipei");

// 引入资料库连线资料
include("settings.php");

// 建立连线
$conn =  new mysqli($sqlHost, $sqlUser, $sqlPass, $sqldbname);

// 连线失败，请检查 settings.php 是否正确设置
if ($conn->connect_errno) {
    echo "0:dbconnecterror";
    exit();
}

$now = date('Y/m/d h:i:s', time());

$conn->query("INSERT INTO `message` (`name`,`channel`,`msg`,`time`) VALUES ('" . $_POST['msg_name'] . "',
	'" . $_POST['msg_channel'] . "','" . $_POST['msg'] . "','" . $now . "');")
    or die(mysql_error());
echo "1";
