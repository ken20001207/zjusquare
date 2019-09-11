<!DOCTYPE html>

<html>

<?php

session_start();

// 引入用于查找使用者资料的 function
include('getuserdata.php');

// 若有 session 代表本次浏览是已经登入的状态
if (isset($_SESSION['username'])) $username = $_SESSION['username'];

// 若 cookie 中的 keeplogin 不是 ture，删除 session 以登出。
if ($_COOKIE['keeplogin'] != 'true') session_destroy();

?>

<head>

    <!-- 引入 Jquery -->
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>

    <title>浙江大学聊天广场</title>

    <!-- 引入线上字体 Noto Sans CJK SC -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap" rel="stylesheet">

    <!-- 引入 CSS 样式设置文件 -->
    <link rel="stylesheet" type="text/css" href="cssfolder/main.css" />

    <!-- 载入 md5 加密演算法套件 -->
    <script src="http://cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

    <!-- 网页标题 -->
    <div class="row" style="text-align: center">
        <h1 style="color: white">浙江大学聊天广场</h1>
    </div>

    <!-- 登入页面 -->
    <div class="row" id="login">
        <div class="center container">
            <div class="row">
                <table>
                    <tr>
                        <td style="width: 50%">
                            <div style="margin-top: 5%">

                                <!-- 登入表单 -->
                                <form style="float: left" id="loginform" class="col s12 m5">
                                    <h1 style="font-weight: bold;">您尚未登入</h1>
                                    <h3>我们有了您而更加精彩，<br>让我们协助您登入。</h3>
                                    <table>
                                        <tr style="height: 50px">
                                            <td style="padding-right: 10px"><label for="id">使用者名称</label></td>
                                            <td><input name="id" id="id" type="text" class="validate" required></td>
                                        </tr>
                                        <tr style="height: 30px">
                                            <td style="padding-right: 10px"><label for="pwd">密码</label></td>
                                            <td><input name="pwd" id="pwd" type="password" class="validate" required>
                                            </td>
                                        </tr>
                                        <tr style="height: 50px">
                                            <td colspan="2"><input name="keeplogin" id="keeplogin" type="checkbox" /><span>维持登入状态</span></td>
                                        </tr>
                                    </table>

                                    <input name="pwd_md5" id="pwd_md5" type="hidden">
                                    <button type="submit" class="button" style="cursor:pointer" name="action">登入</button>
                                    <p>或是现在<a onclick="open_reg()" style="cursor: pointer; color:cadetblue; margin-left: 5px; margin-right: 5px">加入我们</a>来使用更多服务。</p>



                                </form>
                            </div>
                        </td>
                        <td class="show-on-desktop" style="width: 50%">
                            <!-- 右边的登入图片 -->
                            <img src="images/login.png" style="width: 100%" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- 注册页面 -->
    <div class="row" id="register">
        <div class="center container">
            <div class="row">
                <table>
                    <tr>
                        <td style="width: 50%">

                            <!-- 登入表单 -->
                            <form style="float: left" id="registerform" class="col s12 m5">
                                <h1 style="font-weight: bold;">热烈地欢迎您</h1>
                                <h3>只需要简单填写几个资料<br>即可登入聊天广场。</h3>
                                <table>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_name">姓名</label></td>
                                        <td><input name="reg_name" id="reg_name" type="text" class="validate" required>
                                        </td>
                                    </tr>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_email">邮箱</label></td>
                                        <td><input name="reg_email" id="reg_email" type="text" class="validate" required>
                                        </td>
                                    </tr>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_schoolnumber">学号</label></td>
                                        <td><input name="reg_schoolnumber" id="reg_schoolnumber" type="text" class="validate" required>
                                        </td>
                                    </tr>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_gender">性别</label></td>
                                        <td><select name="reg_gender" id="reg_gender">
                                                <option value="小哥哥">小哥哥</option>
                                                <option value="小姐姐">小姐姐</option>
                                                <option value="其他">其他</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr style="height: 50px">
                                        <td style="padding-right: 10px"><label for="reg_id">使用者名称</label></td>
                                        <td><input name="reg_id" id="reg_id" type="text" class="validate" required></td>
                                    </tr>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_pwd">密码</label></td>
                                        <td><input name="reg_pwd" id="reg_pwd" type="password" class="validate" required>
                                        </td>
                                    </tr>
                                    <tr style="height: 30px">
                                        <td style="padding-right: 10px"><label for="reg_checkpwd">再次输入密码</label></td>
                                        <td><input name="reg_checkpwd" id="reg_checkpwd" type="password" class="validate" required>
                                        </td>
                                    </tr>
                                </table>

                                <input name="reg_pwd_md5" id="reg_pwd_md5" type="hidden">
                                <button type="submit" style="margin-top: 20px" class="button" style="cursor:pointer" name="action">注册</button>
                                <p>已经有帐号了？ 马上<a onclick="open_login()" style="cursor: pointer; color:cadetblue; margin-left: 5px; margin-right: 5px">登入</a>聊天广场。</p>



                            </form>

                        </td>
                        <td class="show-on-desktop" style="width: 50%">
                            <!-- 右边的图片 -->
                            <img src="images/register.png" style="width: 100%" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- 聊天室页面 -->
    <div class="row" id="chat">
        <div class="center container">
            <div class="row">
                <table style="width:100%">
                    <tr>
                        <td class="show-on-desktop" style="width: 35%;">
                            <!-- 左边的聊天室列表 -->
                            <div>

                                <div style="height: 650px; overflow:auto">
                                    <table id="channelist">

                                    </table>
                                </div>

                            </div>
                        </td>
                        <td style="width: 65%">
                            <!-- 右边的聊天室 -->
                            <div id="channel_title"><h2>Loading...</h2></div>
                            <div class="chatdiv" id="chatdiv">

                            </div>
                            <div>
                                <form id="chatform">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="width: 80%">
                                                <input name="msg" style="padding: 10px 5px; font-size: 16px;" id="msg" type="text" class="validate" required>
                                            </td>
                                            <td style="width: 20%">
                                                <button type="submit" style="width: 100%;cursor:pointer" class="button" name="action">发送</button>
                                            </td>
                                            <input name="msg_name" id="msg_name" type="hidden">
                                            <input name="msg_channel" id="msg_channel" type="hidden">
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- 给手机的聊天室列表 -->
    <div class="row show-on-phone" id="chatlist_phone">
        <div class="center container">
            <div class="row">
                <table style="width:100%">
                    <tr>
                        <td style="width: 100%;">
                            <!-- 左边的聊天室列表 -->
                            <div>

                                <div style="height: 200px; overflow:auto">
                                    <table id="channelist_phone">

                                    </table>
                                </div>

                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- 使用者资讯页面 -->
    <div class="row" id="profile">
        <div class="center container">
            <div class="row">
                <table>
                    <tr>
                        <td style="width: 50%">
                            <h1 style="font-weight: bold;">个人资讯</h1>
                            <table style="margin-top: 30px; margin-bottom:30px">
                                <tbody>
                                    <tr>
                                        <td style="padding-right: 20px">姓名</td>
                                        <td><?php if (isset($username)) echo getdata($username, 'name');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr>
                                        <td>学号</td>
                                        <td><?php if (isset($username)) echo getdata($username, 'schoolnumber');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-right: 40px">使用者名称</td>
                                        <td><?php if (isset($username)) echo getdata($username, 'id');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr id="fakepwd">
                                        <td>密码</td>
                                        <td style="cursor:pointer" onclick="showpwd()">***********</td>
                                    </tr>
                                    <tr id="realpwd" style="display: none;">
                                        <td>密码</td>
                                        <td style="cursor:pointer" onclick="hidepwd()"><?php if (isset($username)) echo getdata($username, 'pwd');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr>
                                        <td>电子邮箱</td>
                                        <td><?php if (isset($username)) echo getdata($username, 'email');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr>
                                        <td>性别</td>
                                        <td><?php if (isset($username)) echo getdata($username, 'gender');
                                            else echo "loading..."; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button style="margin-top: 20px;cursor:pointer" class="button" onclick="logout()">登出</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td class="show-on-desktop" style="width: 50%">
                            <!-- 右边的图片 -->
                            <img src="images/data.png" style="width: 100%" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- 网页底部说明文字 -->
    <div class="row" style="text-align: center">
        <p style="color:white">该网站是19级新生林沅霖申请浙大勤创技术与推广部的第二阶段面试作品 。</p>
    </div>

    <!-- 根据初始登入状态调整版面配置 -->
    <?php if (!isset($username)) echo "<script>$('#profile').fadeOut(0);$('#register').fadeOut(0);$('#chat').fadeOut(0);$('#chatlist_phone').fadeOut(0);</script>"; ?>
    <?php if (isset($username)) echo "<script>$('#login').fadeOut(0);$('#register').fadeOut(0);</script>"; ?>

    <!-- 若已经登入，将使用者名称存在前端 -->
    <?php if (isset($username)) echo "<script>var user_name = \"" . getdata($username, "name") . "\";</script>"; ?>

    <!-- 主要 JS & Jquery 程序 -->
    <script type="text/javascript" src="js/main.js"></script>

    <!-- 若已经登入，每秒更新一次留言板 -->
    <?php if (isset($username)) echo "<script>var t1=setInterval(update_chat,1000);</script>"; ?>

    <!-- 若已经登入，每秒更新一次频道列表 -->
    <?php if (isset($username)) echo "<script>var t2=setInterval(update_channellist,1000);</script>"; ?>

    <!-- 若已经登入，预设进入聊天大广场 -->
    <?php if (isset($username)) echo "<script>channel = '聊天大广场';</script>"; ?>

</body>

</html>