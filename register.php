<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>注册</h1>";

if ($_POST['register']) {
	
	$result = "/^[A-Za-z0-9]+$/";

	$login = html_entity_decode( stripslashes( $_POST['login'] ) );
	$login = str_replace("'", "", $login);
	$login = str_replace("$", "", $login);
	$login = str_replace(";", "", $login);
	$login = str_replace(">", "", $login);
	$login = str_replace("<", "", $login);
	$login = str_replace("&", "", $login);
	
	$password1 = stripslashes( $_POST['password1'] );
	$password1 = str_replace("'", "", $password1);
	$password1 = str_replace("$", "", $password1);
	$password1 = str_replace(";", "", $password1);
	$password1 = str_replace(">", "", $password1);
	$password1 = str_replace("<", "", $password1);
	$password1 = str_replace("&", "", $password1);
	
	$password2 = stripslashes( $_POST['password2'] );
	$race = htmlentities( stripslashes( $_POST['race'] ) );
	//$loginP = strtolower($login);
	$utaken = $db->fetch ($db->query ( "SELECT * FROM users WHERE login='$login'" ));
	if ($login==$utaken['login']){
		$utaken==false;
	}
	//$utaken = $utaken[0];
	
	if (!preg_match($result, $login)) {
		echo "<div class='err'>用户名不能出现中文或符号.</div>";
	} elseif (strlen($login) < 3) {
		echo "<div class='err'>用户名太短.</div>";
	} elseif (strlen($login) > 10) {
		echo "<div class='err'>用户名不能超过10个字符。</div>";
	} elseif ($utaken) {
		echo "<div class='err'>该用户名已存在.</div>";
	} elseif (strlen($password1) < 4) {
		echo "<div class='err'>密码太短。</div>";
	} elseif (strlen($password1) > 10) {
		echo "<div class='err'>密码不能超过10个字符.</div>";
	} elseif (!preg_match($result, $password1)) {
		echo "<div class='err'>无效的密码.</div>";
	} elseif ($password1!=$password2) {
		echo "<div class='err'>两次密码不一致.</div>";
	} elseif ($race>8 or $race<1) {
		echo "<div class='err'>服务器选择错误.</div>";
	} else {
		$password = md5($password1);
		$query = ("INSERT INTO users (`login`, `password`, `race`) VALUES ('$login', '$password', '$race')");
		$db->query( $query );
		
		$user = $db->fetch ($db->query ("SELECT * FROM users WHERE login='$login'"));
		$kol1 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='1'"));
		$db->query("INSERT INTO prirost (`id_user`, `kol1`) VALUES ('$user[id]', '$kol1[increase]')");
		$db->query("INSERT INTO mine (`id_user`) VALUES ('$user[id]')");
		
		echo "<div class='block'>你已成功注册. <a href='/'>请登录!</a></div>";
	}	
} else {

	echo "<div class='block'>";
	echo "<form method='post'>";
	echo "用户名: <br /><input name='login' type='text' maxlength='10'><br />";
	echo "密码: <br /><input name='password1' type='password' maxlength='10'><br />";
	echo "再次输入密码: <br /><input name='password2' type='password' maxlength='10'><br />";
	echo "城堡: <br /><select name='race'>
		<option value='1'>赤玉魔域</option>
		<option value='2'>守望之海</option>
		<option value='3'>卡拉曼达</option>
		<option value='4'>地狱壕亭</option>
		<option value='5'>古墓丽影</option>
		<option value='6'>森林联盟</option>
		<option value='7'>北方氏族</option>
		<option value='8'>艾欧尼亚</option>
	</select><br />";
	echo "<input name='register' type='submit' value='提交注册'>";
	echo "</form>";
	echo "</div>";

}

?>