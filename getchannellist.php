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

// 取得所有频道
$result = $conn->query("SELECT DISTINCT `channel` FROM `message`")
    or die(mysql_error());

if ($_POST['channel'] == "聊天大广场") {
    echo "<tr><td><h3 id=\"聊天大广场\" onclick=\"changechannel('聊天大广场')\" style=\"margin: 20px; font-size: 20px; cursor: pointer;color:brown;\">聊天大广场</h3></td></tr>";
} else {
    echo "<tr><td><h3 id=\"聊天大广场\" onclick=\"changechannel('聊天大广场')\" style=\"margin: 20px; font-size: 20px; cursor: pointer;\">聊天大广场</h3></td></tr>";
}

while ($row = $result->fetch_array()) {

    if ($row['channel'] == "聊天大广场") continue;

    if ($row['channel'] == $_POST['channel']) {
        echo "<tr><td><h3 id=\"" . $row['channel'] . "\" onclick=\"changechannel('" . $row['channel'] . "')\" style=\"margin: 20px; font-size: 20px; color:brown; cursor: pointer;\">" . $row['channel'] . "</h3></td></tr>";
    } else {
        echo "<tr><td><h3 id=\"" . $row['channel'] . "\" onclick=\"changechannel('" . $row['channel'] . "')\" style=\"margin: 20px; font-size: 20px; cursor: pointer;\">" . $row['channel'] . "</h3></td></tr>";
    }
}

echo "<tr><td><h3 id=\"newchannel\" onclick=\"newchannel()\" style=\"margin: 20px; font-size: 20px; cursor: pointer;color:gray;\">+ 创建新对话包厢</h3></td></tr>";
