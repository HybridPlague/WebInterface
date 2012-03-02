<?php

	require_once("mydbclass.inc.php");
	$db = new myDB(DB_HOST, DB_USER, DB_PASS);
	$db->SelectDB(DB_NAME);
?>
