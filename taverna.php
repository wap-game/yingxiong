<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>排行榜</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";	

$count_per_page = 10;  // Кол-во записей на странице 
$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 0; // Текущая страница 
 
$count_total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM users")); // Подсчет общего кол-ва записей в базе 
$count_total = $count_total[0];
$count_pages = ceil($count_total / $count_per_page); // Расчет кол-ва страниц 
 
$start = $count_per_page * $page; 
 
echo "<table>";

echo "<tr><th>用户名</th><th>级别</th><th>胜利</th><th>失败</th></tr>";
$query = $db->query ("SELECT * FROM users ORDER BY level DESC LIMIT $start, $count_per_page");
if(mysql_num_rows($query)){
	while ($row = mysql_fetch_assoc($query)) {
		echo "<tr><td><a href='/player.php?id=".$row['id']."'>".$row['login']."</a></td>";
		echo "<td> ".$row['level']."</td>";
		echo "<td>".$row['win']."</td>";
		echo "<td>".$row['loss']."</td></tr>";
	}
}

echo "</table>";

$dal = $page+1;
$naz = $page-1;
if ($count_pages > 1) {
	echo "<div class='block'>";
	if ($naz >= 0 ) {
		echo "<a href='?page=".$naz."'>上一页</a>  ";
	}
	if ($count_pages > $dal) {
		echo "  <a href='?page=".$dal."'>下一页</a>";
	}
	echo "</div>";
}
//echo 'Страница : ' . ($page + 1) . ', страниц всего ' . $count_pages;

?>