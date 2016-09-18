<?php
//include_once("header.php");
$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'emprendevs';

	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
	mysql_select_db($dbname);
?>