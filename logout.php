<?php
	session_start();
	$_SESSION["ID"] = null;
	$_SESSION["username"] = null;
	session_destroy();

	header ("location: index.php");


?>