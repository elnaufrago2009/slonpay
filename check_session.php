<?php 
	
	// iniciamos session	
	$doc_ = $_SESSION['email'];

	if ($doc_ == null || $doc_ == '') {
		header("Location: /html/pages/login-simple.html");
	}


?>