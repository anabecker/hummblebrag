<?php
//include Constants and Functions (necessary for login)

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("PASS", "");
define("DB_NAME", "hum");

// define("DB_SERVER", "starlightgirlsnet.ipagemysql.com");
// define("DB_USER", "hellbirds");
// define("PASS", "TrackThis!");
// define("DB_NAME", "hellbirds");
// define("SITEROOT","http://www.starlightgirls.net/hellbirds/");

$db_server = DB_SERVER;
$db_user = DB_USER;
$pass = PASS;
$db_name = DB_NAME;

//connects to database
$connection = mysql_connect($db_server,$db_user,$pass);
	if (!$connection) {
			die("Database connection failed: " . mysql_error());
	}
	
//select database
$db_select = mysql_select_db($db_name, $connection);
if (!$db_select){
	die("Database selection failed: " .mysql_error());
}
?>