<?
/*
 *汉化:布衣少年
 *开发：eKing
 *QQ：228677405
*/
include "includes/inc-header.php";

echo "<h1>英雄在线游戏</h1>";

echo "<div align='center' class='block'>";
echo "欢迎来到网络游戏《英雄游戏》在这里你可以同其他玩家对战。<br />";
echo "</div>";

echo "<div align='center' class='row'><a href='/register.php'><b>注册账号</b></a></div>";

echo "<div align='center' class='block'>";
echo "<form action='login.php' method='post'>";
echo "用户名：<br /><input name='login' type='text' maxlength='10'><br />";
echo "密码:<br /> <input name='password' type='password' maxlength='10'><br />";
echo "<input name='log' type='submit' value='进入游戏'>";
echo "</form>";
echo "</div>";
echo "<div align='right' class='block'>";
echo "by eKing";
echo "</div>";
?>