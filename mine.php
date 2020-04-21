<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

echo "<h1>矿业</h1>";
echo "<div class='menu'>";
echo "<a href='/menu.php'>[游戏菜单]</a> ";
echo "<a href='".$url_ot."'>[返回上一页]</a>";
echo "</div>";	

$mine = $db->fetch( $db->query( "SELECT * FROM mine WHERE id_user='$user[id]'" ) );

if ($_GET['mine']=='gold') {

	$time = time() - $mine['time_gold'];
	$timeminus2 = 60 * 60 * 2;

	echo "<div class='block'><img src='/images/mine/gold.png' WIDTH='90' HEIGHT='90'></div>";
	
	if ($time > $timeminus2) {

		$gold = rand(10, 100);
		echo "<div class='block'>你已经找到了".$gold." 黄金.</div>";
	
		$time = time();
		$db->query("UPDATE mine SET time_gold=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET gold=gold+$gold WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='derevo') {

	$time = time() - $mine['time_derevo'];
	$timeminus4 = 60 * 60 * 4;

	echo "<div class='block'><img src='/images/mine/derevo.png' WIDTH='90' HEIGHT='90'></div>";
	
	if ($time > $timeminus4) {

		$derevo = rand(0, 3);
		if ($derevo == 0) {
			echo "<div class='block'>没有收获到木材哦.</div>";
		} else {
			echo "<div class='block'>你已经获得了".$derevo." 木材.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_derevo=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET derevo=derevo+$derevo WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='rtut') {

	$time = time() - $mine['time_rtut'];
	$timeminus4 = 60 * 60 * 4;
	
	echo "<div class='block'><img src='/images/mine/rtut.png' WIDTH='90' HEIGHT='90'></div>";

	if ($time > $timeminus4) {

		$rtut = rand(0, 2);
		if ($rtut==0) {
			echo "<div class='block'>哎，没有提炼到汞.</div>";
		} else {
			echo "<div class='block'>你获得了".$rtut." kg汞.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_rtut=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET rtut=rtut+$rtut WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='sera') {

	$time = time() - $mine['time_sera'];
	$timeminus4 = 60 * 60 * 4;
	
	echo "<div class='block'><img src='/images/mine/sera.png' WIDTH='90' HEIGHT='90'></div>";

	if ($time > $timeminus4) {

		$sera = rand(0, 2);
		if ($sera==0) {
			echo "<div class='block'>没有找到硫矿石.</div>";
		} else {
			echo "<div class='block'>你获得了 ".$sera." kg硫.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_sera=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET sera=sera+$sera WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='kristally') {

	$time = time() - $mine['time_kristally'];
	$timeminus4 = 60 * 60 * 4;
	
	echo "<div class='block'><img src='/images/mine/kristally.png' WIDTH='90' HEIGHT='90'></div>";

	if ($time > $timeminus4) {

		$kristally = rand(0, 2);
		if ($kristally==0) {
			echo "<div class='block'>没有找到晶体矿.</div>";
		} elseif ($kristally==1) {
			echo "<div class='block'>你获得了".$kristally." 水晶.</div>";
		} else {
			echo "<div class='block'>你获得了 ".$kristally." 晶体.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_kristally=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET kristally=kristally+$kristally WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='ruda') {

	$time = time() - $mine['time_ruda'];
	$timeminus4 = 60 * 60 * 4;
	
	echo "<div class='block'><img src='/images/mine/ruda.png' WIDTH='90' HEIGHT='90'></div>";

	if ($time > $timeminus4) {

		$ruda = rand(0, 3);
		if ($ruda==0) {
			echo "<div class='block'>没有找到矿石.</div>";
		} else {
			echo "<div class='block'>你获得了 ".$ruda." 矿石.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_ruda=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET ruda=ruda+$ruda WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} elseif ($_GET['mine']=='samocvety') {

	$time = time() - $mine['time_samocvety'];
	$timeminus4 = 60 * 60 * 4;
	
	echo "<div class='block'><img src='/images/mine/samocvety.png' WIDTH='90' HEIGHT='90'></div>";

	if ($time > $timeminus4) {

		$samocvety = rand(0, 2);
		if ($samocvety==0) {
			echo "<div class='block'没有找到宝石矿.</div>";
		} elseif ($samocvety==1) {
			echo "<div class='block'你获得了".$samocvety." 宝石.</div>";
		} else {
			echo "<div class='block'>你获得了 ".$samocvety." 宝石.</div>";
		}
	
		$time = time();
		$db->query("UPDATE mine SET time_samocvety=$time WHERE id_user='".$user['id']."'");
		$db->query("UPDATE users SET samocvety=samocvety+$samocvety WHERE id='".$user['id']."'");
	
	} else {
		echo "<div class='block'>资源还未更新.</div>";
	}
	
} else { 

	echo "<div class='block'><a href='?mine=gold'>金矿</a></div>";
	echo "<div class='block'><a href='?mine=derevo'>锯木厂</a></div>";
	echo "<div class='block'><a href='?mine=rtut'>炼汞实验室</a></div>";
	echo "<div class='block'><a href='?mine=sera'>硫矿床</a></div>";
	echo "<div class='block'><a href='?mine=kristally'>水晶洞穴</a></div>";
	echo "<div class='block'><a href='?mine=ruda'>晶体矿</a></div>";
	echo "<div class='block'><a href='?mine=samocvety'>宝石矿</a></div>";

}

?>