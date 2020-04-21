<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>英雄</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";

if ($_POST['search']) {
	
	$result = "/^[A-Za-z0-9]+$/";
	
	$login = html_entity_decode( stripslashes( $_POST['login'] ) );
	$login = str_replace("'", "", $login);
	$login = str_replace("$", "", $login);
	$login = str_replace(";", "", $login);
	$login = str_replace(">", "", $login);
	$login = str_replace("<", "", $login);
	$login = str_replace("&", "", $login);
	
	$userP = $db->fetch( $db->query( "SELECT * FROM users WHERE login='$login'" ) );
	$raceP = $db->fetch ($db->query ("SELECT * FROM race WHERE id='$userP[race]'"));
	
	if (!preg_match($result, $login)) {
		echo "<div class='block'>用户名不符合规范。</div>";
	} elseif (strtolower($login) != strtolower($userP['login'])) {
		echo "<div class='block'>用户名异常.</div>";
	} else {
		echo "<div class='block'>";
		echo "<a href='player.php?id=".$userP['id']."'>".$userP['login']."</a><br />";
		echo "</div>";
	}
	
} elseif ($_GET['id']) {

	$id = (int)$_GET['id'];
	$player = $db->fetch( $db->query( "SELECT * FROM users WHERE id='$id'" ) );
	$player_race = $db->fetch ($db->query ("SELECT * FROM race WHERE id='$player[race]'"));

	if (!$player['id']) {
		echo "<div class='block'>没有找到该玩家.</div>";
		die();
	}

	echo "<div class='row'>资料</div>";
	echo "<div class='block'>";
	echo "用户名: ".$player['login']."<br />";
	echo "城堡: ".$player_race['name']."<br />";
	echo "等级: ".$player['level']."<br />";
	if ($user['rang'] > 1) {
		echo "经验: ".$player['exp']."/".$player['next_level']."<br />";
	}
	echo "胜利: ".$player['win']."<br />";
	echo "失败: ".$player['loss']."<br />";
	echo "</div>";
	
	if ($user['rang'] > 1) {
		echo "<div class='row'>资源</div>";
		echo "<div class='block'>";
		echo "金: ".$player['gold']."<br />";
		echo "木: ".$player['derevo']."<br />";
		echo "矿石: ".$player['ruda']."<br />";
		echo "汞: ".$player['rtut']."<br />";
		echo "晶体: ".$player['kristally']."<br />";
		echo "硫: ".$player['sera']."<br />";
		echo "宝石: ".$player['samocvety']."<br />";
		echo "</div>";
	}
	
	if ($user['rang'] > 1) {
		echo "<div class='row'>生物</div>";
		echo "<div class='block'>";
		$query = $db->query ("SELECT * FROM essence WHERE race='$player[race]'");
		while ($row = mysql_fetch_assoc($query)) {
			$id = $row['essence'];
			echo $row['name'].": ".$player['essence'.$id.'']."<br />";
		}
		echo "</div>";
	}
	
	echo "<div class='block'><a href='/messages.php?id=".$player['id']."'>发送消息</a></div>";
	echo "<div class='block'><a href='/attack.php?id=".$player['id']."'>攻击</a></div>";

} else {

	echo "<div class='block'>";
	echo "<form method='post'>";
	echo "用户名:<br /> <input name='login' type='text' maxlength='10'> ";
	echo "<input name='search' type='submit' value='查询'>";
	echo "</form>";
	echo "</div>";
	
}

?>