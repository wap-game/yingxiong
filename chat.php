<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>聊天</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";	

if ($_POST['chat'] and !empty($_POST['text']) and strlen($_POST['text'])<300) {
	
	$text = html_entity_decode( stripslashes( $_POST['text'] ) );
	$text = str_replace("'", "", $text);
	$text = str_replace("$", "", $text);
	$text = str_replace(";", "", $text);
	$text = str_replace(">", "", $text);
	$text = str_replace("<", "", $text);
	$text = str_replace("&", "", $text);
	
	$db->query("INSERT INTO chat (`id_user`, `text`) VALUES ('$user[id]', '$text')");
	
}

if ($_GET['act']=='chis' and $user['rang'] > 0) {

	$db->query("TRUNCATE TABLE chat");
	echo "<div class='block'>聊天记录已被删除 <a href='/chat.php'>返回聊天室</a></div>";
	die();

}

if ($_GET['msg']=='del' and $user['rang'] > 0) {
	$id = (int)$_GET['id'];
	$db->query("DELETE FROM chat WHERE id = '$id' LIMIT 1");
}

$query = $db->query ("SELECT * FROM chat ORDER BY id DESC LIMIT 10");
while ($row = mysql_fetch_assoc($query)) {
	$nick = $db->fetch( $db->query("SELECT * FROM users WHERE id='$row[id_user]'"));
	echo "<div class='block'>";
	echo "<a href='/player.php?id=".$row['id_user']."'><b>".$nick['login'].": </b></a> ".$row['text'];
	if ($user['rang'] > 0) {
		echo " [<a href='?msg=del&id=".$row['id']."'>删除</a>]";
	}
	echo "</div>";
}

echo "<div class='block'>";
echo "<form method='post'>";
echo "内容:<br />";
echo "<textarea name='text' maxlength='250'></textarea><br />";
//echo "<input name='text' type='text'  maxlength='250'> ";
echo "<input name='chat' type='submit' value='发送'> ";
echo "<input type='submit' value='重置'>";
echo "</form>";
echo "</div>";

if ($user['rang']>0) {
	
	echo "<div class='block'>";
	echo "<a href='?act=chis'>清空聊天记录</a>";
	echo "</div>";
	
}

?>