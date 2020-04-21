<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>信息</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";	


if ($_GET['id']) {

	$id = (int)$_GET['id'];

	$grantee = $db->fetch( $db->query( "SELECT * FROM users WHERE id='$id'" ) );
	
	if ($_POST['msg']  and !empty($_POST['text']) and strlen($_POST['text'])<200) {
		
		$text = html_entity_decode( stripslashes( $_POST['text'] ) );
		$text = str_replace("'", "", $text);
		$text = str_replace("$", "", $text);
		$text = str_replace(";", "", $text);
		$text = str_replace(">", "", $text);
		$text = str_replace("<", "", $text);
		$text = str_replace("&", "", $text);
		
		$db->query("INSERT INTO messages (`id_sender`, `id_grantee`, `text`) VALUES ('$user[id]', '$grantee[id]', '$text')");
		echo "<div class='block'>发送消息.</div>";
		
		$msg = $db->fetch($db->query ("SELECT * FROM konts WHERE id_user=$user[id] and id_kont=$grantee[id]"),0);
		if (!$msg) {
			$db->query("INSERT INTO konts (`id_user`, `id_kont`) VALUES ('$user[id]', '$grantee[id]')");
			$db->query("INSERT INTO konts (`id_user`, `id_kont`) VALUES ('$grantee[id]', '$user[id]')");
		}
		
	} else {
	
		$query = $db->query ("SELECT * FROM messages WHERE (id_sender=$user[id] and id_grantee=$id) or (id_grantee=$user[id] and id_sender=$id) ORDER BY data DESC LIMIT 30");
		while ($row = mysql_fetch_assoc($query)) {
			$nick = $db->fetch( $db->query("SELECT * FROM users WHERE id='$row[id_sender]' LIMIT 10"));
			echo "<div class='block'>";
			echo "<a href='/player.php?id=".$row['id_sender']."'>".$nick['login']."</a>: ".$row['text'];
			echo "</div>";
			
			if ($row['id_sender'] != $user['id']) {
				$db->query("UPDATE messages SET `read` = '1' WHERE `id` = '$row[id]'");
			}
		}
	
		echo "<div class='block'>";
		echo "<form method='post'>";
		echo "内容:<br /> <input name='text' type='text'><br />";
		echo "<input name='msg' type='submit' value='发送'>";
		echo "</form>";
		echo "</div>";
	
	}

} else {

	$msg = $db->fetch($db->query ("SELECT * FROM messages WHERE id_grantee=$user[id] "));
	
	$count_per_page = 10;  // Кол-во записей на странице 
	$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 0; // Текущая страница 
 
	$count_total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM konts WHERE id_user=$user[id]")); // Подсчет общего кол-ва записей в базе 
	$count_total = $count_total[0];
	$count_pages = ceil($count_total / $count_per_page); // Расчет кол-ва страниц 
 
	$start = $count_per_page * $page; 

	$query = $db->query ("SELECT * FROM konts WHERE id_user=$user[id] ORDER BY id DESC LIMIT $start, $count_per_page");
	if(mysql_num_rows($query)){
		while ($row = mysql_fetch_assoc($query)) {
			$kont = $db->fetch($db->query ("SELECT * FROM users WHERE id='$row[id_kont]'"));
			$read =  mysql_result(mysql_query("SELECT COUNT(*) FROM `messages` WHERE `id_grantee`='$user[id]' and `id_sender`='$row[id_kont]' and `read`='0'"),0);
			if ($read['read']>0) {
				$new = "+".$read['read'];
			} else {
				$new = "";
			}
			echo "<div class='block'>";
			echo "<a href='?id=".$row['id_kont']."'>".$kont['login']." </a>".$new;
			echo "</div>";
		}
	}
	
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

}

?>