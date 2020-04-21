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

echo "<div class='row'>信息</div>";
echo "<div class='block'>";
echo "用户名: ".$user['login']."<br />";
echo "城堡: ".$race['name']."<br />";
echo "级别: ".$user['level']."<br />";
echo "经验: ".$user['exp']."/".$user['next_level']."<br />";
echo "胜利: ".$user['win']."<br />";
echo "失败: ".$user['loss']."<br />";
echo "</div>";

echo "<div class='row'>资源</div>";
echo "<div class='block'>";
echo "金: ".$user['gold']."<br />";
echo "木: ".$user['derevo']."<br />";
echo "矿石: ".$user['ruda']."<br />";
echo "汞: ".$user['rtut']."<br />";
echo "晶体: ".$user['kristally']."<br />";
echo "硫: ".$user['sera']."<br />";
echo "宝石: ".$user['samocvety']."<br />";
echo "</div>";

echo "<div class='row'>生物</div>";
echo "<div class='block'>";
$query = $db->query ("SELECT * FROM essence WHERE race='$user[race]'");
while ($row = mysql_fetch_assoc($query)) {
	$id = $row['essence'];
	echo $row['name'].": ".$user['essence'.$id.'']."<br />";
}
echo "</div>";


?>