<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

if ($_GET['id']) {

	$id = (int)$_GET['id'];
	$ratusha = $db->fetch ($db->query ("SELECT * FROM ratusha WHERE ratusha='$id'"));

	echo "<h1>".$ratusha['name']."</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";

	echo "<div class='block'><img src='/images/ratusha/$user[race]/".$ratusha['ratusha'].".png' WIDTH='80' HEIGHT='80'></div>";
	
	if ($user['ratusha']<$id) {
		echo "<div class='block'>"; 
		echo "建筑价格:<br />";
		echo "黄金: ".$ratusha['gold']."<br />";
		echo "</div>";
		
		echo "<div class='block'>";
		
		if ($user['ratusha'] < $id-1) {
			echo "你不能建立此建筑.<br />";
			echo "你需要建立此等级之前的建筑.<br />";
		} elseif ($user['level'] < $id*3) {
			echo "你不能建立此建筑.<br />";
			echo "要求等级为： ". $id*3 .".<br />";
		} else {
			echo "<form method='post'>";
			echo "<input name='pos' type='submit' value='建立'>";
			echo "</form>";
		}
		echo "</div>";
		
		if ($_POST['pos']) {
			if ($user['gold'] < $ratusha['gold']) {
				echo "<div class='err'>你没有足够的黄金.</div>";
			} else {
			
				$db->query( "UPDATE users SET gold=gold-$ratusha[gold], ratusha=ratusha+1 WHERE id='".$user['id']."'" );
				echo "<div class='err'>你建立了".$ratusha['name'].".</div>";
				
			}
		}
		
	} else {
	
		echo "<div class='block'>".$ratusha['name']."已拥有.</div>";
	
	}
	
} else {

	echo "<h1>建筑</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";	
	
	$query = $db->query ("SELECT * FROM ratusha");
	while ($row = mysql_fetch_assoc($query)) {
		echo "<div class='block'><a href='?id=".$row['ratusha']."'>".$row['name']."</a></div>";
	}

}

?>