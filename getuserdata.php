<?php

// 该 function 用于查找特定使用者的资料
function getdata($id, $data)
{

    // 引入资料库连线资料
    include("settings.php");

    // 建立连线
    $conn =  new mysqli($sqlHost, $sqlUser, $sqlPass, $sqldbname);

    // 连线失败，请检查 settings.php 是否设置正确
    if ($conn->connect_errno) {
        return "资料库连接失败";
    }

    // 取得资料使用者资料
    $result = $conn->query("SELECT $data FROM `users` WHERE `id`='" . $id . "';")
        or die(mysql_error());

    // 没有相关资料，使用者可能擅自修改 session 或资料被删除，要求重新登入
    if (mysqli_num_rows($result) == 0) return "请重新登入";

    // 回传要求的资料
    else {
        $row = $result->fetch_assoc();
        return $row[$data];
    }
}
