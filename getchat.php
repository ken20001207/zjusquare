<?php

// 引入资料库连线资料
include("settings.php");

// 建立连线
$conn =  new mysqli($sqlHost, $sqlUser, $sqlPass, $sqldbname);

// 连线失败，请检查 settings.php 是否设置正确
if ($conn->connect_errno) {
    echo "资料库连接失败";
    return;
}

// 取得该频道对话记录资料
$result = $conn->query("SELECT * FROM `message` WHERE `channel`='" . $_POST['channel'] . "' ORDER BY `time`;")
    or die(mysql_error());

while ($row = $result->fetch_array()) {
    echo "<div style=\"margin-left: 30px\">
        <p style=\"padding:5px 15px 5px 15px;display: inline-block; background-color:white; border-radius:20px; max-width: 60%\"><a style=\"font-size:6px; color:gray\">" . $row['name'] . " - " . $row['time'] . " </a> <br> " . $row['msg'] . "</p>
        </div>";
}
