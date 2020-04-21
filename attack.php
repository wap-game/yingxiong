<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>攻击</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";

if ($_GET['id']==0){
	echo "<div class='block'>没有找到该玩家.</div>";
	die();
}

if ($_GET['id']) {

	$id = (int)$_GET['id'];
	$defender = $db->fetch( $db->query( "SELECT * FROM users WHERE id='$id'" ) );

	$timeA = $db->fetch( $db->query( "SELECT * FROM log_attack WHERE id_defender='$defender[id]' ORDER BY id DESC" ) );

	$timeP = time() - $timeA['time'];
	$timeminus4 = 60 * 60 * 4;


	if ($id==$user['id']) {
		echo "<div class='block'>不能攻击自己。</div>";
	} elseif ($timeP < $timeminus4) {
		echo "<div class='block'>只能在4小时内攻击一次。</div>";
	} elseif (!$defender['id']) {
		echo "<div class='block'>没有找到该玩家.</div>";
	} else {

		if ($_POST['attack']) {

			$defender_essence1 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='1'"));
			$defender_essence2 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='2'"));
			$defender_essence3 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='3'"));
			$defender_essence4 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='4'"));
			$defender_essence5 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='5'"));
			$defender_essence6 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='6'"));
			$defender_essence7 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$defender[race]' and essence='7'"));

			$defender_uron1 = $defender['essence1'] * $defender_essence1['damage'];
			$defender_uron2 = $defender['essence2'] * $defender_essence2['damage'];
			$defender_uron3 = $defender['essence3'] * $defender_essence3['damage'];
			$defender_uron4 = $defender['essence4'] * $defender_essence4['damage'];
			$defender_uron5 = $defender['essence5'] * $defender_essence5['damage'];
			$defender_uron6 = $defender['essence6'] * $defender_essence6['damage'];
			$defender_uron7 = $defender['essence7'] * $defender_essence7['damage'];


			$defender_uron = $defender_uron1 + $defender_uron2 + $defender_uron3 + $defender_uron4 + $defender_uron5 + $defender_uron6 + $defender_uron7;


			$essence1 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='1'"));
			$essence2 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='2'"));
			$essence3 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='3'"));
			$essence4 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='4'"));
			$essence5 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='5'"));
			$essence6 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='6'"));
			$essence7 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='7'"));
			$essence8 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='8'"));

			$user_uron1 = $user['essence1'] * $essence1['damage'];
			$user_uron2 = $user['essence2'] * $essence2['damage'];
			$user_uron3 = $user['essence3'] * $essence3['damage'];
			$user_uron4 = $user['essence4'] * $essence4['damage'];
			$user_uron5 = $user['essence5'] * $essence5['damage'];
			$user_uron6 = $user['essence6'] * $essence6['damage'];
			$user_uron7 = $user['essence7'] * $essence7['damage'];


			$user_uron = $user_uron1 + $user_uron2 + $user_uron3 + $user_uron4 + $user_uron5 + $user_uron6 + $user_uron7;


			$defender_kill1 = round ($user_uron1 / $defender_essence1['life']);
			$defender_kill2 = round ($user_uron2 / $defender_essence2['life']);
			$defender_kill3 = round ($user_uron3 / $defender_essence3['life']);
			$defender_kill4 = round ($user_uron4 / $defender_essence4['life']);
			$defender_kill5 = round ($user_uron5 / $defender_essence5['life']);
			$defender_kill6 = round ($user_uron6 / $defender_essence6['life']);
			$defender_kill7 = round ($user_uron7 / $defender_essence7['life']);


			$user_kill1 = round ($defender_uron1 / $essence1['life']);
			$user_kill2 = round ($defender_uron2 / $essence2['life']);
			$user_kill3 = round ($defender_uron3 / $essence3['life']);
			$user_kill4 = round ($defender_uron4 / $essence4['life']);
			$user_kill5 = round ($defender_uron5 / $essence5['life']);
			$user_kill6 = round ($defender_uron6 / $essence6['life']);
			$user_kill7 = round ($defender_uron7 / $essence7['life']);


			if ($defender_kill1 > $defender['essence1']) {
				$defender_kill1 = $defender['essence1'];
			}
			if ($defender_kill2 > $defender['essence2']) {
				$defender_kill2 = $defender['essence2'];
			}
			if ($defender_kill3 > $defender['essence3']) {
				$defender_kill3 = $defender['essence3'];
			}
			if ($defender_kill4 > $defender['essence4']) {
				$defender_kill4 = $defender['essence4'];
			}
			if ($defender_kill5 > $defender['essence5']) {
				$defender_kill5 = $defender['essence5'];
			}
			if ($defender_kill6 > $defender['essence6']) {
				$defender_kill6 = $defender['essence6'];
			}
			if ($defender_kill7 > $defender['essence7']) {
				$defender_kill7 = $defender['essence7'];
			}



			if ($user_kill1 > $user['essence1']) {
				$user_kill1 = $user['essence1'];
			}
			if ($user_kill2 > $user['essence2']) {
				$user_kill2 = $user['essence2'];
			}
			if ($user_kill3 > $user['essence3']) {
				$user_kill3 = $user['essence3'];
			}
			if ($user_kill4 > $user['essence4']) {
				$user_kill4 = $user['essence4'];
			}
			if ($user_kill5 > $user['essence5']) {
				$user_kill5 = $user['essence5'];
			}
			if ($user_kill6 > $user['essence6']) {
				$user_kill6 = $user['essence6'];
			}
			if ($user_kill7 > $user['essence7']) {
				$user_kill7 = $user['essence7'];
			}



			if ($user_uron > $defender_uron) {

				echo "<div class='block'>";
				echo "你赢了 ";
				$gold = round(($defender['gold'] / 5));
				echo "并掠夺 ".$gold." 金.";
				echo "</div>";
				$user_win = 1;
				$defender_win = 0;
				$user_loss = 0;
				$defender_loss = 1;

			} else {

				echo "<div class='block'>你输了</div>";
				$gold = 0;
				$user_win = 0;
				$defender_win = 1;
				$user_loss = 1;
				$defender_loss = 0;

			}

			echo "<div class='block'>";
			echo "你造成了 ".$user_uron." 损伤.<br />";
			echo "对手造成了 ".$defender_uron." 损伤.<br />";
			echo "</div>";

			echo "<div class='row'>敌人的损失</div>";

			echo "<div class='block'>";
			if ($defender_kill1+$defender_kill2+$defender_kill3+$defender_kill4+$defender_kill5+$defender_kill6+$defender_kill7 > 0) {
				if ($defender_kill1 > 0) echo $defender_essence1['name']." ".$defender_kill1."<br />";
				if ($defender_kill2 > 0) echo $defender_essence2['name']." ".$defender_kill2."<br />";
				if ($defender_kill3 > 0) echo $defender_essence3['name']." ".$defender_kill3."<br />";
				if ($defender_kill4 > 0) echo $defender_essence4['name']." ".$defender_kill4."<br />";
				if ($defender_kill5 > 0) echo $defender_essence5['name']." ".$defender_kill5."<br />";
				if ($defender_kill6 > 0) echo $defender_essence6['name']." ".$defender_kill6."<br />";
				if ($defender_kill7 > 0) echo $defender_essence7['name']." ".$defender_kill7."<br />";
			} else {
				echo "没有损失.";
			}
			echo "</div>";

			echo "<div class='row'>你的损失</div>";

			echo "<div class='block'>";
			if ($user_kill1+$user_kill2+$user_kill3+$user_kill4+$user_kill5+$user_kill6+$user_kill7 > 0) {
				if ($user_kill1 > 0) echo $essence1['name']." ".$user_kill1."<br />";
				if ($user_kill2 > 0) echo $essence2['name']." ".$user_kill2."<br />";
				if ($user_kill3 > 0) echo $essence3['name']." ".$user_kill3."<br />";
				if ($user_kill4 > 0) echo $essence4['name']." ".$user_kill4."<br />";
				if ($user_kill5 > 0) echo $essence5['name']." ".$user_kill5."<br />";
				if ($user_kill6 > 0) echo $essence6['name']." ".$user_kill6."<br />";
				if ($user_kill7 > 0) echo $essence7['name']." ".$user_kill7."<br />";
			} else {
				echo "没有损失.";
			}
			echo "</div>";

			$exp_user = $user_uron / 2;
			$exp_defender = $defender_uron / 2;

			$time = time();
			$db->query("INSERT INTO log_attack (id_user, id_defender, win, loss, gold, time) VALUES ('$user[id]', '$defender[id]', '$user_win', '$user_loss', '$gold', '$time')");

			$db->query( "UPDATE users SET gold=gold-$gold, exp=exp+$exp_defender, win=win+$defender_win, loss=loss+$defender_loss, essence1=essence1-$defender_kill1, essence2=essence2-$defender_kill2, essence3=essence3-$defender_kill3,
			essence4=essence4-$defender_kill4, essence5=essence5-$defender_kill5, essence6=essence6-$defender_kill6, essence7=essence7-$defender_kill7 WHERE id='".$defender['id']."'" );

			$db->query( "UPDATE users SET gold=gold+$gold, exp=exp+$exp_user, win=win+$user_win, loss=loss+$user_loss, essence1=essence1-$user_kill1, essence2=essence2-$user_kill2, essence3=essence3-$user_kill3,
			essence4=essence4-$user_kill4, essence5=essence5-$user_kill5, essence6=essence6-$user_kill6, essence7=essence7-$user_kill7 WHERE id='".$user['id']."'" );

		} else {

			echo "<div class='block'>";
			echo "<form method='post'>";
			echo "你确定要攻击".$defender['login']."?<br />";
			echo "<input name='attack' type='submit' value='确定,发起攻击'>";
			echo "</form>";
			echo "</div>";

		}

	}

}

?>