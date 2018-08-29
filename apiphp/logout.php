<?php 

	session_start();
	session_destroy();
	header("Location: /html/home/classic-crypto.html");

?>