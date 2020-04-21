<?php
include "includes/inc-setup.php";


$query = $db->query ("SELECT * FROM users");
while ($user = mysql_fetch_assoc($query)) {

	$timeD = time() - $user['date_last'];
	$timeminus24 = 60 * 60 * 24;

	if ($timeD < $timeminus24) {

		$prirost = $db->fetch ($db->query ("SELECT * FROM prirost WHERE id_user='$user[id]'"));

		$essence1 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='1'"));
		$essence2 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='2'"));
		$essence3 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='3'"));
		$essence4 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='4'"));
		$essence5 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='5'"));
		$essence6 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='6'"));
		$essence7 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='7'"));
		$essence8 = $db->fetch ($db->query ("SELECT * FROM essence WHERE race='$user[race]' and essence='8'"));

		$kol1 = 0;
		$kol2 = 0;
		$kol3 = 0;
		$kol4 = 0;
		$kol5 = 0;
		$kol6 = 0;
		$kol7 = 0;

		if ($user['building'] >= 1) {
			$kol1 = $essence1['increase'];
		}
		if ($user['building'] >= 2) {
			$kol2 = $essence2['increase'];
		}
		if ($user['building'] >= 3) {
			$kol3 = $essence3['increase'];
		}
		if ($user['building'] >= 4) {
			$kol4 = $essence4['increase'];
		}
		if ($user['building'] >= 5) {
			$kol5 = $essence5['increase'];
		}
		if ($user['building'] >= 6) {
			$kol6 = $essence6['increase'];
		}
		if ($user['building'] >= 7) {
			$kol7 = $essence7['increase'];
		}

		$time = time();
		$db->query("UPDATE prirost SET kol1=kol1+$kol1, kol2=kol2+$kol2, kol3=kol3+$kol3, kol4=kol4+$kol4, kol5=kol5+$kol5,
		kol6=kol6+$kol6, kol7=kol7+$kol7, time=$time WHERE id_user='".$user['id']."'");
		
		
		if ($user['ratusha'] == 1) {
			$dohod = 500;
		} elseif ($user['ratusha'] == 2) {
			$dohod = 1000;
		} elseif ($user['ratusha'] == 3) {
			$dohod = 2000;
		} elseif ($user['ratusha'] == 4) {
			$dohod == 4000;
		}
		
		$db->query("UPDATE users SET gold=gold+$dohod WHERE id='".$user['id']."'");
	}

}

?>