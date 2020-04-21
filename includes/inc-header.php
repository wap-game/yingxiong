<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/

include "includes/inc-setup.php";

session_start();

//屏蔽错误
//ini_set('display_errors', 0);
//error_reporting(0);
//ini_set("error_reporting","error_reporting = E_ALL & ~E_DEPRECATED");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//RU">
<html>
<head>
<title>英雄在线游戏</title>
<META name=title content="">
<META name=description content="英雄。 网上的游戏.">
<META name=keywords content="online, 游戏、网上城堡的英雄, heroes">
<meta name="Author" content="Nick" >
<!--设置编码-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="res/style.css" type="text/css"/>
<!--<link rel="shortcut icon" href="/favicon.ico" />-->
</head>
<body>
<?
$url = $_SERVER['REQUEST_URI'];

$_SESSION['id'] = (int)$_SESSION['id'];

$user = $db->fetch ($db->query ("SELECT * FROM users WHERE id='$_SESSION[id]'"));

if (empty($user['id'])) {
	if ($url!='/login.php' and $url!='/register.php' and $url!='/index.php' and $url!='/'){
		echo "<h1>英雄在线游戏</h1>";
		//如果放在二级目录也会提示
		echo "<div class='block'>请登录. <a href='/'>返回首页</a></div>";
		die();
	}
}

if ($user['ban'] == 1) {
	echo "<div class='block'>你的账号已被锁定.如有疑问,请联系管理员.</div>";
}

$url_ot=getenv("HTTP_REFERER");

$race = $db->fetch ($db->query ("SELECT * FROM race WHERE id='$user[race]'"));

$prirost = $db->fetch ($db->query ("SELECT * FROM prirost WHERE id_user='$user[id]'"));

$time = time();
$db->query("UPDATE users SET `date_last` = '$time' WHERE `id` = '$user[id]'");

if ($user['exp'] > $user['next_level']) {
	$next_level = $user['next_level'] * 2;
	$db->query("UPDATE users SET level=level+1, next_level=$next_level WHERE id='".$user['id']."'");
	//echo "Ваш уровень поднялся.";
}


?>