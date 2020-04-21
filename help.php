<?
/*
 *汉化:布衣少年
 *QQ：780998900
*/
include "includes/inc-header.php";

switch ($_GET['act']) {

	case mine:
	echo "<h1>矿业</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";	

	echo "<div class='block'>";
	echo "金矿 - 每两个可以得到10-100黄金<br />";
	echo "锯木厂 - 每四个小时，就可以得到0-3标准木材。<br />";
	echo "炼金术实验室可以每四小时0 - 2标准汞。<br />";
	echo "硫矿床 - 每四个小时，就可以得到0-2标准的硫。<br />";
	echo "水晶洞穴 - 每四个小时，就可以得到0-2的规范晶体。<br />";
	echo "矿石 - 每四个小时，就可以得到0-3的规范矿石。<br />";
	echo "半宝石矿 - 每四个小时，就可以得到0-2规范的宝石。<br />";
	echo "</div>";
	break;
	

	case attack:
	echo "<h1>攻击</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";
	
	echo "<div class='block'>";
	echo "一个英雄可以在四个小时内攻击一次，不管最后一次是谁攻击了他。<br />";
	//echo "В бою побеждает тот, кто больше нанесет общий урон. Если урон будет одинаковый, то победит защищающий.<br />";
	echo "生物只能杀死相同水平的生物。而不能越级杀死。<br />";
	echo "</div>";
	break;

	
	case prirost:
	echo "<h1>生物</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";	

	echo "<div class='block'>";
	//echo "Колличество существ для покупки прибавляется каждые двенадцать часов.<br />";
	echo "如果英雄离开游戏且超过二十四个小时的话，增量的生物终止。";
	echo "</div>";
	break;
	
	
	default:
	echo "<h1帮助</h1>";
	echo "<div class='menu'>";
	echo "<a href='/menu.php'>[游戏菜单]</a> ";
	echo "<a href='".$url_ot."'>[返回上一页]</a>";
	echo "</div>";

	echo "<div class='block'><a href='?act=mine'>矿石</a></div>";
	echo "<div class='block'><a href='?act=attack'>攻击</a></div>";
	echo "<div class='block'><a href='?act=prirost'>生物</a></div>";
	break;

}

?>