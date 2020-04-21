<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>攻击记录</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";	


echo "<div class='row'>你攻击</div>";
$query = $db->query ("SELECT * FROM log_attack WHERE id_user='$user[id]' LIMIT 5");
while ($row = mysql_fetch_assoc($query)) {
	$nick = $db->fetch( $db->query("SELECT * FROM users WHERE id='$row[id_defender]'"));
	echo "<div class='block'>";
	echo "[".$row['date']."] 你攻击 ".$nick['login'];
	if ($row['win']==1){
	echo ".击败并掠夺 ".$row['gold']." 金.";
	} else {
	echo "你输了.";
	}
	echo "</div>";
}

echo "<div class='row'>被攻击</div>";
$query = $db->query ("SELECT * FROM log_attack WHERE id_defender='$user[id]' LIMIT 5");
while ($row = mysql_fetch_assoc($query)) {
	$nick = $db->fetch( $db->query("SELECT * FROM users WHERE id='$row[id_user]'"));
	echo "<div class='block'>";
	echo "[".$row['date']."] ".$nick['login']." 攻击了你";
	if ($row['win']==1){
	echo ".你输了并损失 ".$row['gold']." 金.";
	} else {
	echo " 你赢了.";
	}
	echo "</div>";
}

?>