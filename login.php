<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>系统提示</h1>";

if ($_REQUEST['log']) {
	$result = "/^[A-Za-z0-9]+$/";

	$login = html_entity_decode( stripslashes( $_POST['login'] ) );
	$login = str_replace("'", "", $login);
	$login = str_replace("$", "", $login);
	$login = str_replace(";", "", $login);
	$login = str_replace(">", "", $login);
	$login = str_replace("<", "", $login);
	$login = str_replace("&", "", $login);
	
	$password = stripslashes( $_POST['password'] );
	$password = str_replace("'", "", $password);
	$password = str_replace("$", "", $password);
	$password = str_replace(";", "", $password);
	$password = str_replace(">", "", $password);
	$password = str_replace("<", "", $password);
	$password = str_replace("&", "", $password);
	$password = md5($password);
	
	$user = $db->fetch( $db->query( "SELECT * FROM users WHERE login='$login'" ) );
	$login = strtolower($login);
	
	if (!preg_match($result, $login)) {
		echo "<div class='err'>用户名不符合规范.</div>";
	} elseif ($login!=strtolower($user['login'])) {
		echo "<div class='err'>此用户名暂未注册.</div>";
	} elseif (!preg_match($result, $password)) {
		echo "<div class='err'>密码不符合规范!.</div>";
	} elseif ($user['password']!=$password) {
		echo "<div class='err'>密码错误！</div>";
	} else {
		$user = $db->fetch ($db->query ("SELECT * FROM users WHERE login='$login' and password='$password'") );
		$_SESSION['id'] = $user['id'];
		echo "<div class='block'>".$user['login'].", 你已登录. <a href='/menu.php'>进入游戏</a></div>";
	}	

} else {
	echo "<div class='block'>请正确登陆 <a href='/'>返回首页.</a></div>";
}

?>