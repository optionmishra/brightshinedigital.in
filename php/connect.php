<?php
	$usname= "micaedu";
	$db_password= "German@2012";
	$db_name= "micaeduco";
	$db_host = "mysql.micaeduco.in";


/*
mysql_connect is a built function that allows us to make an easy connection
*/

$link=mysqli_connect($db_host, $usname, $db_password);

/*
mysql_select_db is a built in function that allows us to select the database. This is an essential function.

We use the die function to check for errors.

*/ 

mysqli_select_db($link,$db_name);
