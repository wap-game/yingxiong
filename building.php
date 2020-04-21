<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

if ($_GET['id']) {

	$id = (int)$_GET['id'];
	$essence = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='$id'"));
	$building = $db->fetch ($db->query ("SELECT * FROM building WHERE race='$user[race]' and building='$id'"));

	echo "<h1>".$building['name']."</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";
	
	echo "<table>";
	echo "<tr><td width='85' rowspan='3'>";
	echo "<img src='/images/building/$user[race]/".$building['building'].".png' WIDTH='70' HEIGHT='70'>";
	echo "</td>";
	echo "<th colspan='2'>建筑价格</th>";
	echo "<td>金: ".$building['gold']."</td>";
	echo "<tr><td>木: ".$building['derevo']."</td>";
	echo "<td>矿石: ".$building['ruda']."</td>";
	echo "<td>汞: ".$building['rtut']."</td></tr>";
	echo "<tr><td>晶体: ".$building['kristally']."</td>";
	echo "<td>硫: ".$building['sera']."</td>";
	echo "<td>宝石: ".$building['samocvety']."</td></tr>";
	echo "</tr>";
	echo "</table>";
	
	echo "<div class='block'><br /></div>";
	
	echo "<table>";
	echo "<tr><td width='85' rowspan='3'>";
	echo "<img src='/images/essence/$user[race]/".$essence['essence'].".png' WIDTH='70' HEIGHT='70'>";
	echo "</td>";
	echo "<th colspan='2'>".$essence['name']."</th>";
	echo "<tr><td>伤害: ".$essence['damage']."</td>";
	echo "<td>生活: ".$essence['life']."</td></tr>";
	echo "<tr><td>产量: ".$essence['increase']."</td>";
	echo "<td>单价: ".$essence['price']." 金</td></tr>";
	echo "</tr>";
	echo "</table>";

	if ($user['building']<$id) {
		
		echo "<div class='block'>";
		
		if ($user['building'] < $id-1) {
			echo "你不能购买这个.<br />";
			echo "需要购买此等级之前的生物<br />";
		} elseif ($user['level'] < $id*2) {
			echo "你不能购买这个.<br />";
			echo "所需等级:". $id*2 ."级.<br />";
		} else {
			echo "购买生物，首尔你需要建立一个家。<br />";
			echo "<form method='post'>";
			echo "<input name='pos' type='submit' value='建立'>";
			echo "</form>";
		}
		echo "</div>";
		
		if ($_POST['pos']) {
			if ($user['gold'] < $building['gold']) {
				echo "<div class='err'>你的黄金不够哦.</div>";
			} elseif ($user['derevo'] < $building['derevo']) {
				echo "<div class='err'>你的木材不够哦.</div>"; 
			} elseif ($user['ruda'] < $building['ruda']) {
				echo "<div class='err'>你的矿石不够哦.</div>";
			} elseif ($user['rtut'] < $building['rtut']) {
				echo "<div class='err'>你的汞不够哦.</div>";
			} elseif ($user['kristally'] < $building['kristally']) {
				echo "<div class='err'>你的晶体不够哦.</div>";
			} elseif ($user['sera'] < $building['sera']) {
				echo "<div class='err'>你的硫不够哦.</div>";
			} elseif ($user['samocvety'] < $building['samocvety']) {
				echo "<div class='err'>你的宝石不够哦.</div>";
			} else {
				$db->query( "UPDATE users SET gold=gold-$building[gold], derevo=derevo-$building[derevo], ruda=ruda-$building[ruda], rtut=rtut-$building[rtut], kristally=kristally-$building[kristally], sera=sera-$building[sera], samocvety=samocvety-$building[samocvety], building=building+1 WHERE id='".$user['id']."'" );
				echo "<div class='block'>你建立了 ".$building['name'].".</div>";
				
				
				$time = time();
				if ($building['building'] == 1) {
					$db->query("UPDATE prirost SET kol1=$essence[increase], time=$time WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 2) {
					$db->query("UPDATE prirost SET kol2=$essence[increase] WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 3) {
					$db->query("UPDATE prirost SET kol3=$essence[increase] WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 4) {
					$db->query("UPDATE prirost SET kol4=$essence[increase] WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 5) {
					$db->query("UPDATE prirost SET kol5=$essence[increase] WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 6) {
					$db->query("UPDATE prirost SET kol6=$essence[increase] WHERE id_user='".$user['id']."'");
				}
				if ($building['building'] == 7) {
					$db->query("UPDATE prirost SET kol7=$essence[increase] WHERE id_user='".$user['id']."'");
				}	
				
			}
		}
		
	} else {
		
		echo "<div class='block'>";
		echo "你想买多少 (最多 ".$prirost['kol'.$id.'']."):<br />";
		echo "<form method='post'>";
		echo "<input name='kol' type='text' maxlength='10'> ";
		echo "<input name='kup' type='submit' value='购买'>";
		echo "</form>";
		echo "</div>";
		
		if($_POST['kup']) {
			$kol = (int)$_POST['kol'];
			$price = $kol * $essence['price'];
			$result = "/^[0-9]+$/";
			if (!preg_match($result, $kol) or $kol==0) {
				echo "<div class='err'>输入不符合规范.</div>";
			} elseif ($user['gold'] < $price) {
				echo "<div class='err'>你缺少必要的黄金".$price.".</div>";
			} elseif ($kol > $prirost['kol'.$id.'']) {
				echo "<div class=''err>你不能购买 ".$kol."个 .</div>";
			} else {
				$db->query( "UPDATE users SET gold=gold-$price, essence$id=essence$id+$kol WHERE id='".$user['id']."'" );
				$db->query( "UPDATE prirost SET kol1=kol1-$kol WHERE id_user='".$user['id']."'" );
				echo "<div class='block'>你购买 ".$kol." 花费了 ".$price." 金.</div>";
			}
		}
	}
	
} else {

	echo "<h1>商店</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";	
	
	$query = $db->query ("SELECT * FROM building WHERE race='$user[race]'");
	while ($row = mysql_fetch_assoc($query)) {
		echo "<div class='block'><a href='?id=".$row['building']."'>".$row['name']."</a></div>";
	}

}

?>