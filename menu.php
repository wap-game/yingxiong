<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>游戏菜单</h1>";

$online=mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `date_last` > '".(time()-120)."'"), 0);


echo "<div class='main'><a href='/online.php'>在线 ".$online."人</a></div>";
echo "<div class='main'><a href='/heroe.php'>个人资料</a></div>";
echo "<div class='main'><a href='/building.php'>商店</a></div>";
echo "<div class='main'><a href='/ratusha.php'>建筑</a></div>";
echo "<div class='main'><a href='/taverna.php'>排行榜</a></div>";
echo "<div class='main'><a href='/player.php'>查询玩家信息</a></div>";
echo "<div class='main'><a href='/chat.php'>聊天室</a></div>";
$read =  mysql_result(mysql_query("SELECT COUNT(*) FROM `messages` WHERE `id_grantee`='$user[id]' and `read`='0'"),0);
if ($read['read']>0) {
	$new = "+".$read['read'];
} else {
	$new = "";
}
echo "<div class='main'><a href='/messages.php'>消息 ".$new."</a></div>";
echo "<div class='main'><a href='/logs.php'>攻击记录</a></div>";
echo "<div class='main'><a href='/mine.php'>矿业</a></div>";
echo "<div class='main'><a href='/help.php'>帮助</a></div>";

?>