<?php
/*
 *汉化:布衣少年
 *QQ：780998900
*/


$DB_INFO['hostname'] = "127.0.0.1";
$DB_INFO['username'] = "root";
$DB_INFO['password'] = "123456";
$DB_INFO['database'] = "game";

class mysql {

	function connect() {

		global $DB_INFO;
		$connect = mysql_connect( $DB_INFO['hostname'], $DB_INFO['username'], $DB_INFO['password'] );
		if ( !$connect ) {
			die( "连接数据库失败!." );
		} else {
			$select = mysql_select_db( $DB_INFO['database'] );
			if ( !$select ) {
				die( "查询不到此数据库的信息." );
			} else {
				return $select;
            }
        }
    }


    function query( $info ) {
	mysql_query ("SET NAMES utf8");
        return mysql_query( $info );
    }

    function fetch( $info ) {
        return mysql_fetch_array( $info );
    }

    function num( $info ) {
        return mysql_num_rows( $info );
    }

    function affected() {
        return mysql_affected_rows();
    }

    function close() {
        return mysql_close();
    }

}

$db = new mysql;
$db->connect();

?>